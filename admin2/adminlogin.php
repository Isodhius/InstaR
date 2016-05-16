<?php 
include('../db.php');
include('functionstats.php');

if(isset($_POST['submitadmin']))
{

      $username=$_POST['username'];
      $password=$_POST['password'];
      

if($username=='admin' && $password=='pass123'){
?>
<script type="text/javascript">

window.location='customertable.php';


</script>

<?php

$_SESSION['adminlogged']='admin1';
 }
else
    echo 'error';
      

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
</head>
<body style="    background: black;">

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div>

       
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" style="display: none;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="fa fa-desktop"></i>Registered Users </a>
                    </li>
                    <li>
                        <a href="chart.html"><i class="fa fa-bar-chart-o">Panga Stats</i></a>
                    </li>
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i>Live Matches</a>
                    </li>
                    
                    <li>
                        <a href="table.html" class="active-menu"><i class="fa fa-table"></i> Affiliates</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i>Earnings</a>
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
        <div id="page-wrapper" style="    display: none;">
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>ADMIN LOGIN PANEL </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
     liasjdjasldjalsjdasjd



<!-- =================== second row for update users ========================================= -->



        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->




<!-- ===  here comes thye login popupo for the admin login ================= -->

            <section style="margin-top:12vw">


                     <center>


                        <img src="../images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="width: 255px;"><br>
                      <span> PLEASE AUTHENCIATE YOURSELF </span> 
                            <form action="#" method="post" >

                                        <input type="text" style="    width: 320px;
    height: 35px;
    text-align: center;" name="username"> <br><br>
                                         <input type="password" style="    width: 320px;
    height: 35px;
    text-align: center;" name="password"> <br><br>

<input type="submit" style='width: 320px;
    height: 35px;
    text-align: center;
    ba: black;
    background: black;
    color: white;
    text-transform: uppercase;
    font-size: 20px;' name="submitadmin" class="btn btn-default"> 


                            </form>




                     </center>      


            </section>      




<!-- ==========  login popup scetion ends here ============================ -->



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
