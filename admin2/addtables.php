<?php 
include('../db.php');
include('functionstats.php');

include('api/function_api.php');


require_once 'api/lzconfig.php';
require_once 'api/lz.php';

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

    <style type="text/css">
table,td{padding: 9px;
    padding-top: 9px;
    }

    .button_a1{
          background: black;
    color: white;
    font-size: 14px;
    padding: 7px;
      }</style>
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
    document.getElementById('viewandaddmatch').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>VIEW APIS</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('addleague').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>ADD LEAGUES</strong>
                    
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




<!--= =============  VIEW API ENDS HERE  ========================================== -->


<!-- ============= ADD LEAGUE TABLES STARTS HERE ============================= -->

<div class='row' id='add_tables'>

<?php
$arr2=get_all_api_added_matches();
?>
<table border='2'> 
  <tr style='background:black;color:white'>
<td>MATCHID</td>
<td>FORMAT</td>
<td>APISTATUS</td>
<td>TITLE</td>
<td>CREATED TABLES</td>
<td>TIMINGS</td>
<td colspan='2'>OPERATIONS</td>
</tr>

<?php 


      for($t=0;$t<sizeof($arr2);$t++)
        {

$moneymakercount=get_matchid_all_created_tables($arr2[$t]['matchid']);
         ?>
  <tr>
<td><?php echo $arr2[$t]['matchid'];?></td>
<td><?php echo $arr2[$t]['format'];?></td>
<td><?php echo $arr2[$t]['apistatus']?></td>
<td><?php echo $arr2[$t]['match_title']?></td>
<td style='color:red'><?php echo $moneymakercount.'MONEY MAKER';?></td>
<td><?php echo $arr2[$t]['match_title']?> <span style='color:blue'><?php echo $arr2[$t]['timings']?></span></td>

<td colspan='2'><a href='create_tables.php?matchidfor=<?php 
echo $arr2[$t]['matchid'];?>' class="button_a1">ADD TABLES</a></td>
</tr>
<?php 
} ?>
</table>






</div>





<!-- =========== ADD LEAGUE TABLE ENDS HERE ================================ -->

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



function show_match_api_data()
{

var t=document.getElementById('matchkey').value;

window.location='?showmatch='+t;


}
   </script>

   <script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){ 


       $('#opponententirepanel').load('updateuserliveapi.php?opponentsteamload=1&contestid=<?php echo $contestid;?>', function(){
           setTimeout(refreshTable,125000);

            });

    }





</script>
</body>
</html>
