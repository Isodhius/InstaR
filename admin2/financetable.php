<?php 
include('../db.php');
include_once('functionstats.php');


if($_SESSION['adminlogged']=='')
{


redirectadmin();
}

        if(isset($_POST['submittransactiondata'])){
              $trans_id=$_POST['trans_id'];
              $name=$_POST['customer'];
              $email=$_POST['email'];
              $address=$_POST['address'];
              $devicetype=$_POST['devicetype'];
              $model=$_POST['model'];
              $brand=$_POST['brand'];
              $contact=$_POST['contact'];
             $freetime=$_POST['freetime'];
             $freedate=$_POST['freedate'];

$cmd="update transaction set customer='$name',email='$email',pickupaddress='$address',devicetype='$devicetype',model='$model',brand='$brand',phonenumber='$contact',pickuptime='$freetime',pickupdate='$freedate' where trans_id='$trans_id'";


$result=mysql_query($cmd);


$show_notify=1;

$optitle='details changed';

$opbody='Congratulations Admin your order id '.$trans_id.' has been updated succesfully ! ';
        }

if(isset($_POST['submit_login']))
{

      $username=$_POST['username1'];
      $password=$_POST['pass1'];
      
      if($pass1==$pass2)
          loginfirst($username,$password);
      

}

if(isset($_GET['logout']))
{

signoutuser();



}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin -Instarepair</title>

    <link rel="shortcut icon" href="favicon.ico" />
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />




    <!-- ======  the css styling party start  here -= ============================ -->
<style type="text/css">
div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
div#top_covers:hover{


  zoom:1.2;
}

.navbar {
    border-radius: 0px;
    background: black;
}


.edit_small{

    margin-top: 10px;
    margin-right: 94px;
float: right;
      color: white;
    background: #21A0C5;
    font-size: 13px;
    font-size: 11px;
    padding: 7px;
    border-radius: 5px;

}

</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>


<!-- -=============== update order ka notifications starts here ================================= -->

    <div class="col-md-4 col-sm-4" id='performed_op' style='  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>' >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                    <?php echo $optitle;?>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $opbody;?></p>
                        <div class="panel-footer">
                         <a href='javascript:void(0)' onclick="document.getElementById('performed_op').style.display='none'"> close it</a>
                        </div>
                    </div>
                </div>
</div>

<!-- ================ updaTE ORDER KA NOTIFICARIONS ENDS HERE ==================================== -->





          <div id='show_notify' class="choose_captain" style=';    margin-top: 122px;
    display: block;
    background: #E5EBF2;
    max-width: 500px;
    z-index: 333;
    position: fixed;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;display:none' >
                         
                          <span id="success_notify_text" style='color:red;display:none'>MESSAGE HAS BEEN POSTED SUCCESSFULLY </span>

                          <form action="#" method="post" >
                        <input type="text" name='useremail' style='border:none'  class="textbar_popup" id='notify_email' readonly><br><br>

                      <textarea name="usermessage" id='usermessage' class="textbar_popup" style="width:320px;height:120px;">

                          </textarea><br><br>

                          <a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="submit_personal_notification()">
                              POST TO USER DASHBOARD</a>
                              </form>



                         </div>
    <div id="wrapper" style='background:black'>
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style='    background: black;'>
<img src="../images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" width='200px'>



                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
            
                <!-- /.dropdown -->
     
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
            <?php
          include('assets/left_sidenavbar.php');

       ?>



        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">



              <!-- =================== ADDING THE GRAPHIOCAL STAT5S AT THE TOP =========================================================== -->


<?php

if(isset($_GET['trans_id']))

  $trans_id=$_GET['trans_id'];
        $arr1=get_order_details($_GET['trans_id']);




?>

 <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo get_total_orders_on_website();?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               TOTAL ORDERS

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3>&#8377;

<?php


echo website_total_sales(); 





?>

                                </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Sales

                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?php echo get_total_pending_orders_on_website();?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                               Pending Orders

                            </div>
                        </div>
                    </div>
                </div>





<!-- ======  THE GARPHICAL SYTATS AT THE ROP TEND HERE ===================================================================== -->
       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>View all Orders  </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
   
<div class="container" style='padding-top:12vw;font-size:23px'>








    <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
WEBSITE TOTOAL AMOUNT 
          </h4>
        </div>



<img src="imgpanel/<?php echo get_device_type_pic('mobile');?>" width='25' style="float:right">MOBILE :<strong style=''>&#8377;<?php echo all_par1_stats_by_device('sum','mobile'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('mobile','sum');?>%;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('mobile','sum');?><br>
<br>
<img src="imgpanel/<?php echo get_device_type_pic($orderarr[$r]['tablet']);?>" width='25' style="float:right">TABLET:<strong>&#8377;<?php echo all_par1_stats_by_device('sum','tablet'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('tablet','sum');?>%;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('tablet','sum');?><br>
<br>

<img src="imgpanel/<?php echo get_device_type_pic('desktop');?>" width='25' style="float:right">DESKTOP:<strong>&#8377;<?php echo all_par1_stats_by_device('sum','desktop'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('desktop','sum');?>;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('desktop','sum');?><br>
<br>
<img src="imgpanel/<?php echo get_device_type_pic('laptop');?>" width='25' style="float:right">PC:<strong>&#8377;<?php echo all_par1_stats_by_device('sum','laptop'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('laptop','sum');?>;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('laptop','sum');?><br>
<br>

  </p>                                                                                   
  
</div><!-- CONTAINER -->

<!-- ============ ************************** average calculation start here ********************************************************** ====-->


   
<div class="container" style='padding-top:12vw;font-size:23px'>








    <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
WEBSITE AVERAGE AMOUNT 
          </h4>
        </div>



<img src="imgpanel/<?php echo get_device_type_pic('mobile');?>" width='25' style="float:right">MOBILE :<strong style=''>&#8377;<?php echo all_par1_stats_by_device('avg','mobile'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('mobile','sum');?>%;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('mobile','sum');?><br>
<br>
<img src="imgpanel/<?php echo get_device_type_pic($orderarr[$r]['tablet']);?>" width='25' style="float:right">TABLET:<strong>&#8377;<?php echo all_par1_stats_by_device('avg','tablet'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('tablet','sum');?>%;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('tablet','sum');?><br>
<br>

<img src="imgpanel/<?php echo get_device_type_pic('desktop');?>" width='25' style="float:right">DESKTOP:<strong>&#8377;<?php echo all_par1_stats_by_device('avg','desktop'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('desktop','sum');?>;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('desktop','sum');?><br>
<br>
<img src="imgpanel/<?php echo get_device_type_pic('laptop');?>" width='25' style="float:right">PC:<strong>&#8377;<?php echo all_par1_stats_by_device('avg','laptop'); ?></strong><br>
 <div style="width:<?php echo get_this_percantage_by_total('laptop','sum');?>;height:22px;background:green;"></div><?php echo get_this_percantage_by_total('laptop','sum');?><br>
<br>

  </p>                                                                                   
  
</div><!-- CONTAINER -->











<!-- ================== ************average calculation ends here ******************************************************************* ===== -->




<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   <script type="text/javascript">


                      function closeallpopup()
{

   document.getElementById('allorders').style.display='none';
    document.getElementById('devliveredorders').style.display='none';
    document.getElementById('inprogressorders').style.display='none';

}

   </script>
</body>
</html>
