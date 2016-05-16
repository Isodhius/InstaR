<?php 
include('../db.php');
include('functionstats.php');


if($_SESSION['adminlogged']=='')
{


redirectadmin();
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


input.text_fld1 {
    border: 2px groove black;
    margin-top: 55px;
}

.input2{

  color: black;
    width: 230px;
    height: 40px;
    border: 2px groove black;
    font-size: 15px;
    background: #5CB85C;
}
div#trackorderstatuschange
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}


.edit_small{
float: right;
      color: white;
    background: #21A0C5;
    font-size: 13px;
    font-size: 11px;
    padding: 3px;
    border-radius: 5px;
}
div#top_covers:hover{


  zoom:1.2;
}

.navbar {
    border-radius: 0px;
    background: black;
}


</style>




    <!-- -=-============= the css part ends here ================================ -->
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



<?php

  $arr1=array();
      $cmd="select * from requestacallback ORDER by sl desc";
    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
       





?>





<!-- =============== callback stats =============================================================================================== -->

  <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All CALLBACK DATA (<?php echo get_total_callback_on_website();?>)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead> 
     <tr><th>sl</th><th>CALLER</th><th>CONTACT</th><th>TIME</th></tr>

   </thead>

   <tbody>
      <?php 
                  for($t=0;$t<sizeof($arr1);$t++)
                  {
      ?>
          <tr style="<?php 
if(($arr1[$t]['caller']==''))
echo 'display:none';


          ?>"><th><?php 
echo $r;

          ?></th><th><?php 
echo $arr1[$t]['caller'];

          ?></th><th><?php 
echo $arr1[$t]['phonenumber'];

          ?></th><th>
        <?php 
echo $arr1[$t]['time'];

          ?></th></tr>
     
        
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











<!-- ============== callback stats ends here =================================================================================== -->




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
    
  


</body> 


</html>