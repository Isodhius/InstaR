<?php 
include('function_api.php');
include('../functionstats.php');


if(isset($_POST['submit_contest']))
{
$entryfees=$_POST['entryfees'];
$maxplayers=$_POST['maxplayers'];
$type=$_POST['type'];
$matchid=$_POST['matchid'];
$cmd="update match_contest set adminstatus='running',entry='$entryfees',total_players='$maxplayers',match_type='$type',chattext='',chatusername='',joined_usernames='' where match_id='$matchid'";
$result=mysql_query($cmd);
echo $cmd;
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
                                        <strong>ADD LEAGUE MATCHES </strong>
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
                                        <strong>ADD HEADSUP TABLES</strong>
                    
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
                        <li><a href="adminlogout.php?signout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
   <a href="customertable.php"><i class="fa fa-desktop"></i>Registered Users </a>
                    </li>
          <li>
                        <a href="matchearnings.php"><i class="fa fa-bar-chart-o">Transaction Stats</i></a>
                    </li>
                    <li>
                        <a href="affiliatestable.php"><i class="fa fa-qrcode"></i>Affiliates and Rakes</a>
                    </li>
                    
                    <li>
                        <a href="coupontable.php" class="active-menu"><i class="fa fa-table"></i>Cash coupons and Offers</a>
                    </li>
                    <li>
                        <a href="notificationtable.php"><i class="fa fa-edit"></i>Notify Users</a>
                    </li>


                

                                </ul>

                            </li>
                        </ul>
                    </li>
                  
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">

<!-- ================== add new match starts here ================================= -->
<label>enter the match key </label>

<input type='text' id='matchkey' placeholder='enter match key '><br>

<input type="button" style='background:black;color:white;' onlick='show_match_status()' value='ADD MATCH'><br>
<form action='#' method='post'>
  <strong>ADD A TABLE EVENT FOR MATCH ID : <?php echo $arr1[0]['match_id']?></strong><br>
<input type="text" name='matchid' style='display:none' value="<?php echo $arr1[0]['match_id']?>">
<label>select the form of table you want to create :</label><br>
<select name='type' class='drop1'>
  <option value='single'>single match</option>
<option value='heads up'>heads up</option>
<option value='half winner' >half winner</option>
<option value='heads up'>Heads up</option>
</select><br>

<label>Enter the total number of players allowed :</label><br>

<input type='text' name='maxplayers' class='drop1'><br>

<label>Entry fees per player :</label><br>

<input type='text' name='entryfees' placeholder='in Rs.'  class='drop1'><br>

<input type='submit' style="    background: #E08912;
    color: white;
    border: none;
    width: 300px;
    height: 46px;" name='submit_contest'>  <br>


  </form>

<!-- ============= add match ends here =========================================== -->


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

   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}

   </script>
</body>
</html>
