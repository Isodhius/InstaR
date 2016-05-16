<?php 
include('db.php');
include('functions.php');

if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }




if(isset($_GET['forward_id']))
{
  $order=array();
  $sl=$_GET['forward_id'];
    $cmd="select * from transaction where trans_id='$sl'";
    $result=mysql_query($cmd);
                  while($row=mysql_fetch_array($result))
                  {
                     array_push($order,$row);
                  }
                     

}

 if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }




if(isset($_POST['allot_vendor']))
{
      $orderid=$_POST['orderid'];
      $vendorcode=$_POST['vendorcode'];
  $arr4=get_order_details($orderid);

  //================================== get pcikup boy name  ==============
$vendorname=get_vendors_name($vendorcode);
$address=get_vendors_address($vendorcode);
$merchant=$arr4[0]['pickupperson'];
            $cmd="select * from pickupboy where personcode='$merchant'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                     $pickupphone=$row['phone'];
                  }
  
  $msg="Dear ".$pickupboyname." your vendor for transaction id : ".$orderid." is ".$vendorname." location : ".$address;
sendmessage($msg,$pickupphone);


$cmd="Update transaction set vendor_alloted='$vendorcode' where trans_id='$orderid'";
$result=mysql_query($cmd);



// update this transaction in the vendor alloted table  for application side interface

add_app_side_vendor_allotment($vendorcode,$orderid);












}
// ========================= alloting the vendor to pickup boy =============================
 
?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>





<!-- =========================== add a new person  ================================================================= -->


<div class="modal fade" id="addnewpickupboy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='opacity:1'>
        <div class="modal-dialog" role="document" style='    margin-top: 22vw;'>
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <!-- modal body -->
            <div class="modal-body">
                <center>
                <form action="#" method='post'>

                        <input type="text" name='person' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='address' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='phone' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                    

                              <input type="submit" name="newpickupsubmit" value="ADD TO SERVICE" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" ><BR>

                        </form>



                              </center>


                </form>   
              



                      </div>
           <!-- modal body ends here -->
          
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== add a new person ================================================================================ -->

      <div class="modal fade" id='order_details' style="text-align: center;
    opacity: 1;padding-top:120px;
    display: block;
    color: white;max-height:500px;
    padding-top: 25px;
    margin-top: 100px;
    background: #0C0A0A;
    width: 60%;min-width:320px;
    max-width:500px;
    margin-left: -30%;
    left: 50%;">

<center>


<br>
<div class="panel-heading" style='    background: white;'>
        <h4 class="panel-title" style='color:black'>

     
  <?php 

  if($order[0]['vendor_alloted']==NULL)
    echo 'ALLOT A VENDOR SOON ';
  else
    echo "<strong style='color:red'> WARNING :</strong>VENDOR ALREADY ALLOTED :".get_vendors_name($order[0]['vendor_alloted']);
          ?>
   </h4>
      </div>
        <table class='table-bordered' style='    color: white;
    margin-top: 5vw;
    font-size: 16px;'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr rowspan='3' style='font-size:16px;'><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].$order[0]['model'].'('.$order[0]['devicetype'].')'; ?></td></tr>
   
        </table>
                <br>
                <a id='allot_service_id' href="javascript:void(0)"
onclick="  
    document.getElementById('order_details').style.display='none';"
                 class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">PROCEED</a>
<form action="#" method="post" style='display:none' id="service_forward_form">
  <input type="text" style="display:none" readonly  value='<?php echo $order[0]['trans_id']; ?>' name="orderid"><br>
  <label style='color: #94501B;'>Service being forwarded to :</label><br>

        <input type="text" style="border:none;background:none" readonly id="merchant" name="merchant"><br>
<label style='color: #94501B;'>Confirmation being sent at phone number :</label><br>
        <input ytpe="phone" style="border:none;background:none" readonly id="merchant_phone" name="merchant_phone"><br>




        <input type="submit" name="confirm_submit" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>



<!-- the header at top ============================ -->




                            
<!-- ================== popup for the venor alltment================================================================================ -->

      <div class="modal fade" id='forwardvendor' style="text-align:center;opacity:1;display:none;margin-top: 63px;
    width: 60%;
    max-height: 501px;
    box-shadow: rgb(34, 36, 38) 10px 10px 5px;
    margin-left: -30%;
    left: 50%;
    padding-top: 75px;
    background: white;">

<center>

<br>
<div class="panel-heading" style='    BACKGROUND: #FFD287;'>
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1" style='font-weight:bold'>SMS FORWARD TO ADMIN AND VENDOR</a>
        </h4>
      </div>

        <table class='table-bordered' style='width: 48%;
    color: black;
    font-size: 18px;
    margin-top: 2vw;
    font-size: 13px;'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].'('.$order[0]['model'].')'; ?></td></tr>
   
     </table>
                <br>
                <a id='allot_vendorservice_id' href="javascript:void(0)"
onclick="  
    document.getElementById('order_details').style.display='none';"
                 class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">ALLOT SERVICE</a>
<form action="#" method="post" style='display:none' id="vendorservice_forward_form">
  <input type="text" style="display:none" readonly  value='<?php echo $order[0]['trans_id']; ?>' name="orderid"><br>
  <label style='color: #94501B;'>service being forwarded to :</label><br>

        <input type="text" style="border:none;color:black" readonly id="vendor" name="vendorcode"><br>
<label style='color: #94501B;'>confirmation being sent at phone number  :<?php echo get_pickup_phone($order[0]['pickupperson']); ?></label><br>
       <label style="color:grey">PICKUP PERSON :</label><?php echo get_pickup_name($order[0]['pickupperson']); ?><br>
      <br>
        <input type="phone" style="border:none;color:black;display:none" readonly id="vendor_phone"
         name="merchant_phone"><br>



        <input type="submit" name="allot_vendor" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>

<!-- ============================== vendor allotmentg popup ends here =================================================== -->

<!-- the header at top============================ -->






<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="javascript:void(0)">
<img src="img/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
  <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
      
                <li STYLE="color:white">TECHNICAL PANELS </li>
        
     



                      <li><a href="?logoutpanel=1" data-toggle="modal" style="
    /* padding: 5px; */
    border-radius: 0px;
    
    font-size: 15px;display:<?php 
if(!isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,14); ?> ( SIGNOUT )</a></li>


        </ul>
            <!-- script-for-menu -->
             <script>
               $( "span.menu" ).click(function() {
               $( "ul.nav1" ).slideToggle( 300, function() {
               // Animation complete.
                });
               });
            </script>
            <!-- /script-for-menu -->
      </div>
    
          <script src="js/classie.js"></script>
          <script src="js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) ); 
            </script>
        <!-- //search-scripts -->
        
      
      <div class="clearfix"> </div>
  </div>


<!-- =============== header ends here -=================== -->










  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw'>

  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
VENDOR ALLOTMENT 
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>
      <tr>
        <th>#</th>
        <th>Vendor code</th>
          <th>Service</th>
          <th>location address</th>
      

       
        <th>operations</th>
        
      </tr>
    </thead>
    <?php 

    $arr2=getallvendordetails('mobile');


    ?>
    <tbody>
      <?php 
          for($r=0;$r<sizeof($arr2);$r++)
                    {
      ?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">
        <td><?php echo $r+1;?></td>
        <td><?php echo '( '.$arr2[$r]['Name'].' )';?></td>
                <td><?php echo $arr2[$r]['Type'];?></td>
        <td><?php echo $arr2[$r]['Address'];?></td>
 
     
                <td><?php echo $arr2[$r]['contact'];?></td>
                  
      
    <td><a href="javascript:void(0)" onclick="
document.getElementById('forwardvendor').style.display='block';
document.getElementById('allot_vendorservice_id').style.display='none';
document.getElementById('vendorservice_forward_form').style.display='block';
document.getElementById('vendor').value='<?php echo $arr2[$r]['VenderId'];?>';
document.getElementById('vendor_phone').value='<?php echo $arr2[$r]['contact'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">FORWARD THIS VENDOR TO PICKUP BOY !</a></td>
      </tr>
      <?php } ?>

      
    </tbody>
  </table>
  </div>
</div>

</div>
  
<div class="container">


      <a href='javascript:void(0)'  class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78" onclick="document.getElementById('addnewpickupboy').style.display='block'">ADD NEW PERSON </a>


  </div>










  <!-- =================================== send vendor details ends here ============================================= -->


</body>	


</html>