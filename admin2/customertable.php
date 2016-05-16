<?php 
include('../db.php');
include('functionstats.php');


if($_SESSION['adminlogged']=='')
{


redirectadmin();
}
if(isset($_POST['submitnewdetails']))
{

        $name=$_POST['name'];
              $email=$_POST['email'];
                $username=$_POST['username'];
                  $phone=$_POST['phone'];
                  $userrake=$_POST['rake_affiliate'];
                    $gameplays=$_POST['gameplays'];
$cmd="update customer set name='$name',username='$username',phone='$phone',rake_affiliate='$userarake' where email='$email'";
$result=mysql_query($cmd);


}
  if(isset($_POST['depositmoney']))
{
      

    $amount=$_POST['money'];
    $email=$_SESSION['email'];
deposit_money_towallet($amount,$email);
  
      }


  if(isset($_GET['submitusernotify']))
{
      

    $usermessage=$_GET['usermessage'];
    $useremail=$_GET['useremail'];
     $cmd="update customer set personal_notifications='$usermessage',read_personal_notifications='0' where email='$useremail'";
              $result=mysql_query($cmd);
      }






                        if(isset($_GET['blockcustomer']))
{
      

    $email=$_GET['blockcustomer'];
            $cmd="update customer set blocked='1' where email='$email'";
            $result=mysql_query($cmd);

            $personal_notifications='Dear User You are blocked from PangaLeague for the next( Gameplys ! please contact the support team)';
$cmd="update customer set   personal_notifications='$personal_notifications',read_personal_notifications=0 where username='$username'";
        $result=mysql_query($cmd);
  
      }




                        if(isset($_GET['unblockcustomer']))
{
      

    $email=$_GET['unblockcustomer'];
            $cmd="update customer set blocked='0' where email='$email'";
            $result=mysql_query($cmd);
  
      }


  if(isset($_POST['edit_submit']))
{
            $name=$_POST['name'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];



$cmd="update customer set address='$address',name='$name',phone='$phone' where email='$email'";
$result=mysql_query($cmd);
        if($result)
        {

          $_SESSION['name']=$name;
          $_SESSION['email']=$email;
          $_SESSION['address']=$address;
          $_SESSION['phone']=$phone;
        }



}

if(isset($_POST['submit_register']))
{
      $name=$_POST['name1'];
      $email1=$_POST['email1'];
      $pass1=$_POST['pass1'];
      $pass2=$_POST['pass2'];
      
      if($pass1==$pass2)
         register_user($name,$email1,$pass1);
      

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

.navbar {
    border-radius: 0px;
    background: black;
}


</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>

       
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
    document.getElementById('allwise').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All customers</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('devicewise').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Device wise </strong>
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
      

       <?php
         $allcust=view_all_customers();

    

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">



              <!-- =================== ADDING THE GRAPHIOCAL STAT5S AT THE TOP =========================================================== -->



 <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                   <h3><?php echo sizeof($allcust);?> </h3>
                            
                            </div>
                            <div class="panel-footer back-footer-green">
                               TOTAL UNIQUE VISITORS 

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3>
     <h3><?php echo get_total_orders_on_website();?></h3>

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
                        <h3><?php echo get_total_callback_on_website();?></h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                      REQUEST A CALLBACK

                            </div>
                        </div>
                    </div>
              
               
           


  </div>


<!-- ======  THE GARPHICAL SYTATS AT THE ROP TEND HERE ===================================================================== -->





       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>View all customers  </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
        
            <div class="row" id='allwise'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All customer details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>Name</th> 
<th>Email id</th> 
<th>phone</th>
<th>address</th>

<th>Total Orders</th>

<th>Instarepair Finance</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allcust);$r++)
        {

          $arr1=get_all_details_by_email($allcust[$r]['email']);

          $ordercount=get_total_orders_customer($allcust[$r]['email']);


          $sumamount=get_total_amountpaid_customer($allcust[$r]['email']);

?>
          <tr><td><?php echo $r; ?></td>
              <td><?php echo $arr1[0]['customer']; ?></td>
               <td><?php echo $arr1[0]['email']; ?></td>
    <td><?php echo $arr1[0]['phonenumber']; ?></td>
<th><?php  echo $arr1[0]['pickupaddress'];?></th>
         
<th><?php  echo $ordercount;?></th>

<th><?php  echo $sumamount;?></th>

<?php } ?>


</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




 <div class="row" id='devicewise' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All customer details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>Name</th> 
<th>Email id</th> 
<th>Registered on</th>

<th>Last Device Repaired</th>
<th>Ordered Dates</th>

</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allcust);$r++)
        {

          $arr1=get_all_details_by_email($allcust[$r]['email']);

$registereddate=get_customer_registereddate($allcust[$r]['email']);

$ordereddate=get_customer_ordered_dates($allcust[$r]['email']);

$lastorderdate=$ordereddate[0];
list($lastdevice,$type)=get_device_repaired_by_date($registereddate);

          $sumamount=get_total_amountpaid_customer($allcust[$r]['email']);

?>
          <tr><td><?php echo $r; ?></td>
              <td><?php echo $arr1[0]['customer']; ?></td>
               <td><?php echo $arr1[0]['email']; ?></td>

<th><?php 

  echo $ordereddate;

 ?></th>
         
<th><?php echo $lastdevice;?><span style='color:red'><?php echo $type; ?></span></th>

<th><?php  echo $registereddate;?></th>

<?php } ?>


</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ========= **************** the customer devi9cwise szorting endhere ===================== -->               
         






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

   document.getElementById('allwise').style.display='none';
    document.getElementById('devicewise').style.display='none';


}

   </script>
</body>
</html>
