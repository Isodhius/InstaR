<?php 
include('db.php');
include('functions.php');

 if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }

    if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }



                if(isset($_POST['newpickupsubmit']))
{

      $person=$_POST['person'];

  $address=$_POST['address'];

      $phone=$_POST['phone'];


      date_default_timezone_set("Asia/Calcutta");
        $time2=date('dmy');
        $fname=explode(' ',$person);
        $first=$fname[0];


        $service='PCK';
        $code=$service.'-'.$time2.$first;

  
          $cmd="insert into pickupboy(person,personcode,phone,address) values ('$person','$code','$phone','$address')";
          $result=mysql_query($cmd);








}
                if(isset($_POST['confirm_submit']))
{

      $merchant=$_POST['merchant'];


      /* --------- ================ get pickup merchant ka name ==================== ---*/



$cmd="select * from pickupboy where personcode='$merchant'";
$result=mysql_query($cmd);
while($row=mysql_fetch_array($result))
                  {
                 $pickupboy=$row['person'];
                  }


      /* -------------------------------------------------------------------------------------  */
      $merchant_phone=$_POST['merchant_phone'];
      $orderid=$_POST['orderid'];

$time2=get_present_time();
      $cmd="update transaction set pickupperson='$merchant',lastupdate='$time2'
      where trans_id='$orderid'";
      $result=mysql_query($cmd);



$arr1=get_order_details($orderid);
$phone_customer=$arr1[0]['phone_customer'];
$customer=$arr1[0]['customer'];

$devicetype=$arr1[0]['devicetype'];
$pickuptime=$arr1[0]['pickuptime'].' on '.$arr1[0]['pickupdate'];
$address=$arr1[0]['pickupaddress'];
$phone_merchant=$merchant_phone;
$phone_admin=get_admins_phone();
$phone_customer=$arr1[0]['phonenumber'];
$link='abc';
  $customermessage="Congratulations ".$customer." ! Your request for mobile repair has been processed . Transaction ID : ".$orderid.", Order details : ".$devicetype.", . Pick Up address- ".$address.", Your device will be picked up between ".$pickuptime." by ".$pickupboy.".";
sendmessage($customermessage,$phone_customer);


  $merchantmessage="Transaction ID : ".$orderid.", Customer Name : ".$customer." Phone : ".$phone_customer.", Order details : ".$devicetype.", . Pick Up address- ".$address.", Pick up Time : ".$pickuptime.".Press Link When Picked ".$link;
sendmessage($merchantmessage,$phone_merchant);









}


				if(isset($_POST['submit_new']))
{
	$agency=$_POST['agency'];
  $service=$_POST['type'];
  $domain=$_POST['domains'];
  $opens=$_POST['opens'];
  $close=$_POST['closes'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];

$cmd="insert into merchant_details(agency,domain,opensat,closesat,agency_phone,service,address)
values('$agency','$domain','$opens','$close','$phone','$service','$address');
";
$result=mysql_query($cmd);

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
if(isset($_GET['suspendsl']))
{
	$sl=$_GET['suspendsl'];
		$cmd="update productscategory set status='suspend' where sl='$sl'";
		$result=mysql_query($cmd);

}
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

      <div class="modal fade" id='order_details' style="text-align:center;opacity:1;display:block;margin-top:200px;background:white;width:60%;    box-shadow: rgb(34, 36, 38) 10px 10px 5px;    margin-left: -30%;
    left: 50%;">

<center>
  <span>* Please view the order before forwarding :</span>
        <table class='table-bordered' style='margin-top:5vw;font-size:13px'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].'('.$order[0]['devicetype'].')'; ?></td></tr>
   
        </table>
                <br>
                <a id='allot_service_id' href="javascript:void(0)"
onclick="  
    document.getElementById('order_details').style.display='none';"
                 class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">ALLOT SERVICE</a>
<form action="#" method="post" style='display:none' id="service_forward_form">
  <input type="text" style="display:none" readonly  value='<?php echo $order[0]['trans_id']; ?>' name="orderid"><br>
  <label style='color: #94501B;'>service being forwarded to :</label><br>

        <input type="text" style="border:none" readonly id="merchant" name="merchant"><br>
<label style='color: #94501B;'>confirmation being sent at phone number :</label><br>
        <input ytpe="phone" style="border:none" readonly id="merchant_phone" name="merchant_phone"><br>


      <span> * A detailed Invoice will be also sent to his accound in addition to this. </span> 

        <input type="submit" name="confirm_submit" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>



<!-- the header at top ============================ -->




                            
<!-- ================== popup for the venor alltment================================================================================ -->

      <div class="modal fade" id='forwardvendor' style="text-align:center;opacity:1;display:none;margin-top:200px;background:white;width:60%;    box-shadow: rgb(34, 36, 38) 10px 10px 5px;    margin-left: -30%;
    left: 50%;">

<center>
  <span>* Please view the order before forwarding : (This panel will send the selected vendor to the pickup person for futher repair of the device )</span>
        <table class='table-bordered' style='margin-top:5vw;font-size:13px'>
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

        <input type="text" style="border:none" readonly id="vendor" name="merchant"><br>
<label style='color: #94501B;'>confirmation being sent at phone number :</label><br>
        <input ytpe="phone" style="border:none" readonly id="vendor_phone" name="merchant_phone"><br>



        <input type="submit" name="vendorconfirm_submit" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>

<!-- ============================== vendor allotmentg popup ends here =================================================== -->

<!-- the header at top============================ -->













<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="index.html">
<img src="images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
          <li><a href="#" style="font-family: helvetica;"  id="top_menu_self" >
          <img src="img/phone1.gif" style='max-width:32px' >  81 00 75 75 75 
          </a></li>
          <li><a href="#" style="font-family: helvetica;" data-toggle="modal" id="top_menu_self" data-target="#myModal2">Track Order</a></li>
        
            <li><a href="#" style="font-family: helvetica;" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;
    font-size: 15px;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" data-target="#requestacallback">Request call back</a></li>



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

<div class="container" style='padding-top:12vw'>
  <h2>SERVICE FORWARD TAB </h2>
  <p>Refer the enetire list of  service prroviders and forward the order based on your priority 
    (total orders handled,address,ratings, timings etc).<br>
just click on the  <strong>"allot order "</strong> .

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>
      <tr>
        <th>#</th>
        <th>Pickup/Technician </th>
        <th>Pending Orders</th>
          <th>Location address</th>
      
          <th>Rating</th>
         <th>contact</th>
       
        <th>operations</th>
        
      </tr>
    </thead>
    <?php 

    $arr1=getallservicedetails_panel();


    ?>
    <tbody>
    	<?php 
    			for($r=0;$r<sizeof($arr1);$r++)
    			    			{
    	?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">
        <td><?php echo $r+1;?></td>
        <td><?php echo $arr1[$r]['person'].'( '.$arr1[$r]['personcode'].' )';?></td>
        <td><?php echo $arr1[$r]['pendingorders'];?></td>
          <td><?php echo $arr1[$r]['address'];?></td>
     
                <td><?php echo $arr1[$r]['rating'];?></td>
                        <td><?php echo $arr1[$r]['phone'];?></td>
      
    <td><a href="javascript:void(0)" onclick="
document.getElementById('order_details').style.display='block';
document.getElementById('allot_service_id').style.display='none';
document.getElementById('service_forward_form').style.display='block';
document.getElementById('merchant').value='<?php echo $arr1[$r]['person'];?>';
document.getElementById('merchant_phone').value='<?php echo $arr1[$r]['phone'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">ALLOT NOW !</a></td>
      </tr>
      <?php } ?>

      
    </tbody>
  </table>
  </div>
</div>


	
<div class="container">


      <a href='javascript:void(0)'  class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78" onclick="document.getElementById('addnewpickupboy').style.display='block'">ADD NEW PERSON </a>


  </div>








  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw'>
  <h2>VENDOR FORWARD TAB </h2>
  <p>Refer the enetire list of vendor prroviders and forward the order based on your priority 
    (total orders handled,address,ratings, timings etc).<br>
just click on the  <strong>"allot order "</strong> .

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>
      <tr>
        <th>#</th>
        <th>Vendor code</th>

          <th>location address</th>
      
          <th>Rating</th>
         <th>contact</th>
       
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
        <td><?php echo $arr2[$r]['code'].'( '.$arr2[$r]['vendor'].' )';?></td>
        <td><?php echo $arr2[$r]['address'];?></td>
          <td><?php echo $arr2[$r]['rating'];?></td>
     
                <td><?php echo $arr2[$r]['contact'];?></td>
                  
      
    <td><a href="javascript:void(0)" onclick="
document.getElementById('forwardvendor').style.display='block';
document.getElementById('allot_vendorservice_id').style.display='none';
document.getElementById('vendorservice_forward_form').style.display='block';
document.getElementById('vendor').value='<?php echo $arr2[$r]['code'];?>';
document.getElementById('vendor_phone').value='<?php echo $arr2[$r]['contact'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">FORWARD THIS VENDOR TO PICKUP BOY !</a></td>
      </tr>
      <?php } ?>

      
    </tbody>
  </table>
  </div>
</div>


  
<div class="container">


      <a href='javascript:void(0)'  class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78" onclick="document.getElementById('addnewpickupboy').style.display='block'">ADD NEW PERSON </a>


  </div>










  <!-- =================================== send vendor details ends here ============================================= -->


</body>	


</html>