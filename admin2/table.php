<?php 
include('../db.php');
include('functionstats.php');


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
    <title>Free Bootstrap Admin Template : Dream</title>
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
</head>
<body>

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
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Dream</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allcustomers').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>View all users</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('editupdatecustomer').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>View Update Customers</strong>
                    
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                      <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('blockcustomer').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Block Users</strong>
                                  
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('notifycustomer').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Notify Users</strong>
       
                                    </p>
                            
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
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
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
					<li>
                        <a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html" class="active-menu"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>Registered Users</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row" id='allcustomers'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Total Cash deposit</th>
<th>Total Cash Redeem</th>
<th>Gameplays</th>
</tr> 
<tbody> 
<?php
         $allusers=get_all_user_data();


?>
<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
              <td><?php $deposit=get_user_deposits($allusers[$r]['email']);echo $deposit; ?></td>
  <td><?php $redeem=get_user_deposits($allusers[$r]['email']);echo '0'; ?></td>

              <td><?php echo $allusers[$r]['gameplays']; ?></td>
          </tr>




<?php } ?>



</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
         







<!-- =================== second row for update users ========================================= -->


                        <div class="row" id='blockcustomer' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                         Update Users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Actions</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
  <td><a href="?blockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:green;color:white" class="btn join-btn" onclick="">CHAT BLOCK</a></td>
              <?php 
              if(!$allusers[$r]['blocked'])
                { ?>
            <td><a href="?blockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:green;color:white" class="btn join-btn" onclick="">BLOCK</a></td>
                  <td>&nbsp;</td>
            <?php }else{ ?>

   <td><a href="javascript:void(0)" style="background-color:red;color:white" class="btn join-btn" >BLOCKED</a></td>
   <td><a href="?unblockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:orange;color:white" class="btn join-btn" >UNBLOCK</a></td>
            <?php }  ?>
          </tr>




<?php } ?>



</table>

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->














<!--==================== second row for update users ends here ============================== -->






<!--================== third row for blocking the users ======================================= -->






                        <div class="row" id='notifycustomer' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        Send notifications to the users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Username</th> 
<th>Email</th>
<th>Actions</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $r; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
                      <td><?php echo $allusers[$r]['username']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>


            <td><a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="document.getElementById('show_notify').style.display='block';
              document.getElementById('invisible_div').style.display='block';
document.getElementById('notify_email').value='<?php echo $allusers[$r]['email']; ?>';

              ">NOTIFY USER</a></td>




          
          </tr>




<?php } ?>



</table>

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->




<!-- =================== third row for blocking the users ends here ============================== -->






<!-- =============== edit update customer starts here =============================== -->
            

                        <div class="row" id='editupdatecustomer' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        Send notifications to the users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Actions</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
            <td><a href="javascript:void(0)" class="btn join-btn" onclick="showinvisible();load_edit_user('<?php echo $allusers[$r]['email']; ?>')" style="background-color:orange;color:white">UPDATE</a></td>
          </tr>




<?php } ?>

</tbody>

</table>


                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->


<!--= =============  edit update customers ========================================== -->




        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
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
    alert();
   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}

   </script>
</body>
</html>
