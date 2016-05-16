<?php 
include('../db.php');
include('functionstats.php');

if($_SESSION['adminlogged']=='')
{


redirectadmin();
}
 if(isset($_POST['notificationsubmit']))
{
      

    $text=mysql_real_escape_string($_POST['notificationtext']);

    $cmd="update customer set allnotifications='$text',notificationread='0'";
    $result=mysql_query($cmd);

  
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
</head>
<body>

          <div id='show_notify'  style=';    margin-top: 122px;
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
                <a class="navbar-brand" href="index.html">PangaLeague</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
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
                       <li><a href="logout.php?"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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


              <marquee style='color:maroon' behavior="alternate" >Send notification to Online and offline users</marquee>
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>PUSH NOTIFICATION ADMIN</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row" id='allcustomers'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        Notification for all users
                        </div>
              




                   <div class="panel-body">             
  <form action="#" method='post'>
    <div class="form-group">
      <label for="email">Enter the notification message :</label><br>
          <textarea name='notificationtext' style='width:50%;max-width:350px;height:300px;padding:2%'></textarea>
    </div>
   
    <button type="submit" name='notificationsubmit' class="btn btn-default">confirm and send</button>
  </form>



                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
         






                <!-- /. ROW  -->
               
            <div class="row" id='allcustomers'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        Offers and discounts to users (Bulk mail)
                        </div>
              




                   <div class="panel-body">             
 
  <form role="form">
    <div class="form-group">
      <label for="email">enter email body part:</label><br>
          <textarea style='width:50%;max-width:350px;height:300px;padding:2%'></textarea>
    </div>
   
    <button type="submit" class="btn btn-default">confirm and send</button>
  </form>



                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- =================== second row for update users ========================================= -->



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

   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}

   </script>
</body>
</html>
