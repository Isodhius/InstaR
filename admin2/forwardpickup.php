<?php 
include('../db.php');
include_once('functionstats.php');


if($_SESSION['adminlogged']=='')
{


redirectadmin();
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
                   $problem=$_POST['problem'];

$cmd="update transaction set customer='$name',problem='$problem',email='$email',pickupaddress='$address',devicetype='$devicetype',model='$model',brand='$brand',phonenumber='$contact',pickuptime='$freetime',pickupdate='$freedate' where trans_id='$trans_id'";


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
    <title>Panga Cricket</title>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                   choose service here
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('devliveredorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> ALL delivered orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>

                                    <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('inprogressorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> In Progress Orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>




                        <li class="divider"></li>
       
               
                     
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
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
                                <h3>

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
                                <h3><?php echo get_total_delivered_orders_on_website();?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                               Delivered Orders

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
   
<div class="container" style='padding-top:12vw;'>



  <a href="ordertable.php" class='edit_small'>GO BACK </a>

  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
EDIT TRANSACTION ID: <?php echo $trans_id; ?>
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>

                <form action="#" method="post">
      <?php 
                  for($t=0;$t<sizeof($arr1);$t++)
                  {
      ?>

      <input type="text" value="<?php echo $trans_id;?>" style='display:none'  name="trans_id"    >
             <tr><td>CUSTOMER NAME :</td><td><input type="text" name="customer" value="<?php echo $arr1[0]['customer'];?>"></td></td></tr>
       <tr><td>ADDRESS :</td><td><input type="text" name="address" value="<?php echo $arr1[0]['pickupaddress'];?>"></td></tr>
              <tr><td>EMAIL :</td><td><input type="text" name="email" value="<?php echo $arr1[0]['email']?>"></td></tr>
            <tr><td>DEVICE TYPE :</td><td><input type="text" name="devicetype" value="<?php echo $arr1[0]['devicetype'];?>"></td></tr>
             <tr><td> MODEL :</td><td><input type="text" name="model" value="<?php echo $arr1[0]['model'];?>"></td></tr>
             <tr><td> BRAND :</td><td><input type="text" name="brand" value="<?php echo $arr1[0]['brand'];?>"></td></tr>
                <tr><td> CONTACT NO :</td><td><input type="text" name="contact" value="<?php echo $arr1[0]['phonenumber'];?>"></td></tr>

      <tr><td> Problem :</td><td><input type="text" name="problem" value="<?php echo $arr1[0]['problem'];?>"></td></tr>
                  <tr><td> FREE DATE :</td><td><input type="text" name="freetime" value="<?php echo $arr1[0]['pickupdate'];?>"></td></tr>
             <tr><td> FREE TIME :</td><td><input type="text" name="freedate" value="<?php echo $arr1[0]['pickuptime'];?>"></td></tr>
                 


                      <?php } ?>
        
        <tr></tr>

            <tr><td>
        <input type="submit" class="btn btn-default"  style='background:orange' name="submittransactiondata">
              </td></tr>
                        </form>
    </thead>
              

      
    </tbody>
  </table>


  </div>
</div>






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
