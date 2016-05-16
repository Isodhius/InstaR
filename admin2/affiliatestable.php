<?php 
include('../db.php');
include('functionstats.php');

if($_SESSION['adminlogged']=='')
{


redirectadmin();
}
  if(isset($_POST['submitnewrake']))
{
            $email=$_POST['useremailrakechange'];
            $newrake=$_POST['rakepercentage'];
            $cmd="update customer set rake_affiliate='$newrake' where email='$email'";
            $result=mysql_query($cmd);

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
</head>
<body>

         <!-- === notification popup for changing the rake og the user is here ==== -->

                  <div class='choose_captain' id='changerake' style=';      margin-top: 122px;
    display: none;
    background: #D3D4D6;
    width: 36%;
    max-width: 500px;
    min-width: 320px;
    z-index: 333;
    position: fixed;
    text-align: center;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;'> 
<a href='javascript:void(0)' style='color: black;
    float: right;
    font-size: 21px;' onclick="document.getElementById('changerake').style.display='none';">x</a>
<form action='#' method='post'>
             <h4 class="pop_title">Change rake for this user  : </h4>
      

       <input type='text' id='useremailrakechange'  name='useremailrakechange' class="textbar_popup"><br>

       <label>Decide new rake  ( Rake point out of 100 ):</label><br>

       <input type='text' id='rakepercentage' name='rakepercentage' placeholder='An integer value' class="textbar_popup"><br>



<input type='submit' name='submitnewrake'  style='background:green' class="btn-default" >

        </form>

       </div> 





         <!-- ====  notoification poupup ends hbere ================================= -->
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
                                        <strong>View all Affiliates</strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allaffiliates').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong></strong>
                    
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                      <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('updaterake').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Change User Rake </strong>
                                  
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="javascript:void(0)" onclick="closeallpopup();

      ">
                                <div>
                                    <p>
                                        <strong>Rake report</strong>
       
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



                            <marquee style='color:maroon' behavior="alternate" >View and updates rakes for the registered affiliates</marquee>

			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>AFFILIATES AND RAKE </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row" id='allaffiliates'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                     ALL REGISTERED AFFILIATES
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead> 
<tr> 
<th>#</th> 
<th>Email</th> 
<th>Registered date</th>
<th>League Earnings</th>
<th>Current Rake </th>
<th>Gameplays</th>
</tr> 
</thead> 
<tbody> 
<?php
         $allaffiliates=get_all_affiliate_data();


?>
<?php 

        for($r=0;$r<sizeof($allaffiliates);$r++)
        {

?>
          <tr><td><?php echo $r; ?></td>
    <td><?php echo $allaffiliates[$r]['email']; ?></td>
              <td><?php echo return_registration_date($allaffiliates[$r]['email']); ?></td>
          

          <td><?php echo get_affiliates_total_earnings($allaffiliates[$r]['username']); ?></td>
  <td><?php echo get_user_rake($allaffiliates[$r]['username']); ?></td>

         <td><?php echo $allaffiliates[$r]['gameplays']; ?></td>
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


                        <div class="row" id='updaterake' style='display:none'>
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
<th>Email</th> 

<th>League Earnings</th>
<th>Current Rake </th>
<th>OPERATION</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allaffiliates);$r++)
        {

?>
          <tr><td><?php echo $r; ?></td>
    <td><?php echo $allaffiliates[$r]['email']; ?></td>

          

          <td><?php echo get_affiliates_total_earnings($allaffiliates[$r]['username']); ?></td>

  <td><?php echo get_user_rake($allaffiliates[$r]['username']); ?></td>
      <td> <button class="btn btn-default running"

onclick="document.getElementById('changerake').style.display='block';document.getElementById('useremailrakechange').value='<?php echo $allaffiliates[$r]['email']; ?>'"
       style='max-width:123px;font-size:12px;'>
      UPDATE RAKE</button></td>
          </tr>
<?php } ?>


</tbody>

          </table>


          <!-- ===  table ebds here ======================= -->
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

   document.getElementById('allaffiliates').style.display='none';
    document.getElementById('updaterake').style.display='none';




}

   </script>
</body>
</html>
