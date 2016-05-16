<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');
    if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }

      if(isset($_POST['underrepairchangesubmit'])){
      $report=mysql_real_escape_string($_POST['report']);

$trackid=$_POST['trackid'];
$problem1=$_POST['problem1'];
  $cmd="update transaction set trackstatus='Under Repair',trackcomments='$report',problem='$problem1' where trans_id='$trackid'";
          $result=mysql_query($cmd);
          echo $cmd;

}
if(isset($_POST['reportsubmit']))
{
      $report=mysql_real_escape_string($_POST['report']);



  $cmd="update transaction set trackstatus='Under Repair',trackcomments='$report' where trans_id='$trackid'";
          $result=mysql_query($cmd);

}

if(isset($_POST['diagonosereportsubmit'])){
      $report=mysql_real_escape_string($_POST['report']);

$trackid=$_POST['trackid'];

  $cmd="update transaction set trackstatus='Under Diagnose',trackcomments='$report' where trans_id='$trackid'";
          $result=mysql_query($cmd);

}

if(isset($_POST['senddeliveryaction']))
{
      $orderid=$_POST['trackid'];
        $t1=$_POST['customername'];
        $t2=$_POST['bill'];
        $t3=$_POST['link'];

          $phonecustomer=get_phone_customer_from_transaction($orderid);
$bill=get_bill_details($orderid);

        $message="Congratulations ".$t1." ! Your device has been repaired. Your bill amount is INR : ".$t2.". Thanks for choosing Instarepair.";

            sendmessage($message,$phonecustomer);
            $report="Congratulations ".$t1." Your mobile has been repaired successfully".'<br>';
              $report.="Bill generated : Rs. ".$t2;
  $cmd="update transaction set trackstatus='repaired',trackcomments='$report',bill='$t2' where trans_id='$orderid'";
                              $result=mysql_query($cmd);



      // generate final invoice for the user here =================







}


 if(isset($_GET['cancel']))
                    {
                  $cancel=$_GET['cancel'];                        

                          $cmd="update transaction set status='cancelled' where trans_id='$cancel'";

                              $result=mysql_query($cmd);

                              ?>
<script>

window.location='supporthome.php';

</script>


                              <?php 

                     }      



if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }





                if(isset($_POST['trackorderstatuschangesubmit']))
                        {
                                $trackid=mysql_real_escape_string($_POST['trackid']);
                                        $trackcomments=mysql_real_escape_string($_POST['trackcomments']);

                                        $trackstatus=mysql_real_escape_string($_POST['trackstatus']);

                        $cmd="update transaction set trackstatus='$trackstatus',trackcomments='$trackcomments' where trans_id='$trackid'";
                              $result=mysql_query($cmd);

                        }



				if(isset($_POST['submitlogin']))
{
	$username1=$_POST['username1'];

  $password1=$_POST['password1'];

loginpanelppl($username1,$password1);

}

        if(isset($_GET['logoutpanel']))
                  {
                                    


                                      unset( $_SESSION['alloteduser']);
                                      unset($_SESSION['allotedperson']);
                                        unset($_SESSION['redirectpage']);

                                                  ?>
<script>
window.location='panels.php';

</script>

<?php


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


<style type="text/css" >

      .text_fld1{

      padding-left: 17px;
    background: transparent;
    /* background: orange; */
    width: 200px;
    height: 31px;    text-align: center;
    border: 1px groove black;
    font-size: 12px;
    color: #5F5959;
        margin-top: 24px;
    margin-bottom: 5px; 
}


a.black_button{
          background: black;
    color: white;
    /* padding-right: 79px; */
    /* padding-left: 12px; */
    padding: 6px;
    padding-left: 25px;
    text-transform: uppercase;
    padding-right: 25px;
}
a.black_button:hover{

background: white;
color:black;

}
</style>


</head>
<body style="    background: url('img/back3.jpg');">




<!-- =========================== for requesting a callback ================================================================= -->


<div class="modal fade" id="trackorderstatuschange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                <section>
                  <div class="wizard">
             
            
           
                      <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          <div class="mobile-grids">
                          
                    <center>


<!-- ====== the firdt form comes here for sslectin g the current staus ogff the order id =======  -->



  <h4 style="color:black">Transaction ID: <input type="text" name='trackid' id='transidchange'></span></h4>
                             <br>


   <select name='trackstatus' id='currentstatusid' style='color:black;width:230px;
                             height:54px;font-size:15px;' onchange="get_status_and_load_form()">
                                        <option>Choose Your Actions</option>
                                       <option value='Assigned'>Assigned</option>
                                  
                                          <option value='Picked Up'>Picked Up</option>
                                            <option value='Under Diagnose'>Under Diagnose</option>
                                          <option value='Under Repair'>Under Repair</option>
                                           <option value='Repaired'>Repaired</option>
                                      
                                          <option value='Delivered'>Delivered</option>

                                    </select> 

                             <br>

<!-- =========================== first and second case  form comes here ========================= -->
             
                            

                <div id='firstform' style='display:none'>        

     <form  action='#' method='post' style=''>
                 <textarea name='trackcomments' style='    width: 300px;
    height: 120px;
    color: black;
    margin-top: 46px;' placeholder='Exact text will be copied to the user tracking'></textarea>
                   
                   <input type="text" name='trackid' id='transidchange2'>         
                
         <input type="submit" name='trackorderstatuschangesubmit' style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step">
         


                 </form>
          </div>
<!-- ====== picked up , diagonosis report case for emds here ====================== -->





<!-- =========================== REPAIRED  case  form comes here ========================= -->

       <div id='secondform' style=''>   
                 
<!-- ====== REPAIRED report case for emds here ====================== -->


                        </div>
                    
                        <div class="clearfix"></div>
                      </div>
      
                  </div>
                </section>
            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== requersting a callback ================================================================================ -->





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
      
          
        
       <li STYLE="color:white"><a href="supportoffline.php" >OFFLINE BOOKING </a></li>


               <li STYLE="color:white"><a href="callback.php" >CALLBACK DATA </a></li>
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
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,10); ?> ( SIGNOUT )</a></li>


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

      <center>


<div class="container" style='background: white;
    margin-top: 12vw;
    height: auto;'>
 
 <div class="panel-heading" style='    background: black;
    height: 55px;
    width: 100%;
    padding-top: 20px;'>
        <h4 class="panel-title" style='color:white'>
VIEW -> FORWARD -> VENDOR ALLOTMENT -> GENERATE BILL ->DELIVERY 
          </h4>
        </div>




<!-- ======== all orders will come here ============================================================================= -->
          <div class="table-responsive" id='allorders'>          
  <table class="table" style='font-size: 11px;'>






<?php 

        $arr1=get_support_all_orders();


?>

    <thead>
      <tr>
        <th style='font-size:17px;'>S.NO</th>
        <th style='font-size:17px;'>Transaction ID </th>
        <th style='font-size:17px;'>Current Status</th>
          
        <th style='font-size:17px;'>Reporting Point</th>
    
         <th style='font-size:17px;'>Customer</th>
        <th style='font-size:17px;'>Email</th>

        <th style='font-size:17px;'></th>
        
      </tr>
    </thead>

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
        <td><?php echo $arr1[$r]['trans_id'];?></td>
    <td><span   style='font-size:18px;color:red;text-transform:uppercase'><?php echo $arr1[$r]['trackstatus'];?></span></td>
          <td><?php echo $arr1[$r]['pickupaddress'];?></td>
     
              <td style="text-transform:capitalize"><?php echo $arr1[$r]['customer'].'( '.$arr1[$r]['phonenumber'].' )';?></td>
                    
 <td style="text-transform:capitalize"><?php echo $arr1[$r]['email'];?></td>


<!-- ========================== in case of in process forward order ========================== -->
      

  <?php 
                          if($arr1[$r]['trackstatus']=='in Process')
                          { ?>

      <td><a href="admin_panel.php?forward_id=<?php echo $arr1[$r]['trans_id'];?>" target='_blank' onclick="
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">
                      <?php 
                          if($arr1[$r]['trackstatus']=='in Process')
                          {
                                if($arr1[$r]['pickupperson']==NULL)
                                 echo 'FORWARD TO PICKUP PERSON';
                               else
                                echo 'FORWARDED';
                          

                              }
                               

                        ?>



    </a></td> <?php } ?>


    <!-- ========================== in case of assigned process change ========================== -->
<!-- ========================== in case of assigned process change ========================== -->
<?php 
  if($arr1[$r]['trackstatus']=='Assigned')
                          { ?>

     <td><a href="allot_vendor.php?forward_id=<?php echo $arr1[$r]['trans_id'];?>" target='_blank' onclick="
      " class="btn btn-default" 
      style="background-color:orange;color:white;opacity:0.78">


                        <?php 

                        if($arr1[$r]['trackstatus']=='Assigned')
                                {
                                   if($arr1[$r]['vendor_alloted']!=NULL)
                                       echo 'VENDOR ALLOTED';
                                     else
                                      echo 'VENDOR NOT ALLOTED';



                                }
                               else 
                                {
                               
                                       echo 'REPAIR PROCESS';



                                }

                                ?>
    </a>

  </td>
  <?php } ?>
<!-- ========================== in case of assigned process change ========================== -->
      </tr>

<tr>

    <td><a href="?cancel=<?php echo $arr1[$r]['trans_id'];?>" onclick="
      " class="btn btn-default" 
      style="background-color:red;color:white;opacity:0.78"> CANCEL ORDER</a></td>


           <td><a href="#" onclick="document.getElementById('transidchange').value='<?php echo $arr1[$r]['trans_id'];?>';
              document.getElementById('transidchange2').value='<?php echo $arr1[$r]['trans_id'];?>'
              document.getElementById('transidchange1').value='<?php echo $arr1[$r]['trans_id'];?>'


            " style="font-family: helvetica;background:blue;color:white" class="btn btn-default"  data-toggle="modal" id="top_menu_self"
            data-target="#trackorderstatuschange">Change Tracking Status</a></li></td>


            <td><a href="editorder.php?trans_id=<?php echo $arr1[$r]['trans_id'];?>" style="font-family: helvetica;background:black;color:white" class="btn btn-default"  data-toggle="modal" id="top_menu_self"
          >EDIT THIS ORDER</a></li></td>
</tr>   



      <?php } ?>







      
    </tbody>
  </table>
  </div>




















<!-- ================== all orders will come here ========================================================================== -->
















  </div>
</center>




<script type="text/javascript">
        function get_status_and_load_form()
        {


              var t=document.getElementById('currentstatusid').value;

            var r=document.getElementById('transidchange').value;

if(t=='Under Repair')
{


        sendcommonactionfunc(t,r);


}
else if(t=='Repaired')
{

        sendcommonactionfunc(t,r);
}
else if(t=='Delivered')
{

          sendcommonactionfunc(t,r);
}
else if(t=='Under Diagnose')
{
            sendcommonactionfunc(t,r);
}
else if(t=='Picked Up')
{

        sendcommonactionfunc(t,r);
}
else if(t=='Picked Up')
{
document.getElementById('firstform').style.display='block';
document.getElementById('secondform').style.display='none';
}



        }






// loading the customer detiails after repair is completed 

          
function sendcommonactionfunc(transidchange,orderid)
{

var xmlhttp;   


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      


    document.getElementById("secondform").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","allloads.php?senddeliveryaction="+orderid+"&transidchange="+transidchange,true);
xmlhttp.send();


}











// loading he custoemnr reapir colmplete function over here 




// loading the customer detiails after repair is completed 

          
function create_preview_invoice(orderid)
{

var xmlhttp;   


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      


    document.getElementById("secondform").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","allloads.php?generate_invoice="+orderid+"&transidchange="+transidchange,true);
xmlhttp.send();


}



</script>
</body>	


</html>