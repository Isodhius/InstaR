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
    margin-left: 9%;
    margin-right: auto;
    margin-top: -15px;


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




<!-- ===**************************************************************************************************************************************

<!-- ========================== staus change tracker starts here =============================================================== -->




<!-- ====== the firdt form comes here for sslectin g the current staus ogff the order id =======  -->


           <div class="col-md-4 col-sm-4"  id="trackorderstatuschange" style='  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>' >


   <div class="panel panel-primary">
                        <div class="panel-heading">
           CHANGE STATUS OF THIS SRN
                        </div>
                        <div class="panel-body">
  <h4 style="color:black">Transaction ID: <input type="text" name='trackid' class='input2' id='transidchange'></span></h4>
                             <br>

<center>
   <select name='trackstatus' id='currentstatusid' class='input2' onchange="get_status_and_load_form()">
                                        <option>Choose Your Actions</option>
                                       <option value='Assigned'>Assigned</option>
                                  
                                          <option value='Picked Up'>Picked Up</option>
                                            <option value='Under Diagnose'>Under Diagnose</option>
                                          <option value='Under Repair'>Under Repair</option>
                                           <option value='Repaired'>Repaired</option>
                                      
                                          <option value='Delivered'>Delivered</option>

                                    </select> 

                             <br>

<!-- =========================== first and second case  form comes here ========================= -->
             
                            

                <div id='firstform' style='display:none'>        

     <form  action='#' method='post' style=''>
                 <textarea name='trackcomments' style='    width: 300px;
    height: 120px;
    color: black;
    margin-top: 46px;' placeholder='Exact text will be copied to the user tracking'></textarea>
                   
                   <input type="text" name='trackid' id='transidchange2'>         
                
         <input type="submit" name='trackorderstatuschangesubmit' style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step">
         


                 </form>
          </div>


               <div id='secondform' style=''>      </div>
                 </center>
<!-- ====== REPAIRED report case for emds here ====================== -->


                     
<!-- ====== picked up , diagonosis report case for emds here ====================== -->
</div>

     <div class="panel-footer">
                         <a href='javascript:void(0)' onclick="document.getElementById('trackorderstatuschange').style.display='none'"> close it</a>
                        </div>
                    </div>
                </div>
<!-- ======================== status cjhange tracker ends here ================================================================ -->
<!-- ===**************************************************************************************************************************************


              <!-- =================== ADDING THE GRAPHIOCAL STAT5S AT THE TOP =========================================================== -->



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
       <?php
         $orderarr=view_all_orders_details();

    

?>        
            <div class="row" id='allorders' style=''>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All Orders details (<?php echo get_total_orders_on_website();?>)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead> 
<tr> 
<th>#</th> 
<th>SRN </th> 
<th>Device</th> 
<th>Customer</th> 
<th>Address</th>

<th>Pick up date </th>
<th>change tracking status </th>



</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($orderarr);$r++)
        {

          ?>
          <tr>
<td><?php 
echo $r+1;

?></td> 
<td>
<?php 
echo $orderarr[$r]['trans_id'].' '."<span style='color:red'>".$orderarr[$r]['trackstatus']."</span>";


?> </td> 
<td><?php echo $orderarr[$r]['brand'].' '.$orderarr[$r]['model'];?>

<img src="imgpanel/<?php echo get_device_type_pic($orderarr[$r]['devicetype']);?>" width='25' style="float:right">

</td> 
<td><?php 
echo $orderarr[$r]['customer'];
?>
<span style='color:red'>( <?php echo $orderarr[$r]['problem'];?> )</span>
</td> 
<td><?php 
echo $orderarr[$r]['pickupaddress'];

?></td>

<td><?php 
echo $orderarr[$r]['pickupdate'];

?><a href='editorder.php?trans_id=<?php echo $orderarr[$r]['trans_id'];?>' class='edit_small'>EDIT</a></td>

         <td><a href="#" onclick="
  document.getElementById('trackorderstatuschange').style.display='block';
          document.getElementById('transidchange').value='<?php echo $orderarr[$r]['trans_id'];?>';
              document.getElementById('transidchange2').value='<?php echo $orderarr[$r]['trans_id'];?>';
              document.getElementById('transidchange1').value='<?php echo $orderarr[$r]['trans_id'];?>';



            " style="font-family: helvetica;background:maroon;color:white" class="btn btn-default" id="top_menu_self"
          >Update Status</a></li></td>








  



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



<!-- ===== **************************  row for the delivered orders starts here =================== -->


  <div class="row" id='devliveredorders' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                          Delivered orders (<?php echo get_total_delivered_orders_on_website();?>)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>SRN </th> 
<th>Device</th> 
<th>Customer</th> 
<th>Address</th>

<th>Pick up date </th>
<th>status</th>
<th>Bill</th>
<th>view/download Invoice </th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($orderarr);$r++)
        {
if($orderarr[$r]['trackstatus']=='delivered'){
          ?>
          <tr>
<th><?php 
echo $r+1;

?></th> 
<th>
<?php 
echo $orderarr[$r]['trans_id'];

?> </th> 
<th><?php echo $orderarr[$r]['brand'].' '.$orderarr[$r]['model'];?>

<img src="imgpanel/<?php echo get_device_type_pic($orderarr[$r]['devicetype']);?>" width='25' style="float:right">

</th> 
<th><?php 
echo $orderarr[$r]['customer'];

?></th> 
<th><?php 
echo $orderarr[$r]['pickupaddress'];

?></th>

<th><?php 
echo $orderarr[$r]['pickupdate'];

?></th>
<th><?php 
echo $orderarr[$r]['trackstatus'];

?></th>
<th><?php 
echo $orderarr[$r]['bill'];

?></th>


<th><a target='_blank' href="<?php echo '../'.$orderarr[$r]['invoice_pickup'];?>">VIEW</a></th>
   </tr>
       
<?php } }  ?>


</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->





<!-- ===== **************************  row for the cancelled orders starts here =================== -->


  <div class="row" id='inprogressorders' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
  In Progress Orders (<?php echo get_total_pending_orders_on_website();?>)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>SRN </th> 
<th>Device</th> 
<th>Customer</th> 
<th>Address</th>
<th>Pick up date </th>
<th>Track status</th>
<th>Track Comments</th>



</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($orderarr);$r++)
        {
                  // if loop for the inprogress orders 
          if($orderarr[$r]['trackstatus']!='delivered'){
          ?>
          <tr>
<th><?php 
echo $r+1;

?></th> 
<th>
<?php 
echo $orderarr[$r]['trans_id'];

?> </th> 

<th><?php echo $orderarr[$r]['brand'].' '.$orderarr[$r]['model'];?>

<img src="imgpanel/<?php echo get_device_type_pic($orderarr[$r]['devicetype']);?>" width='25' style="float:right">

</th>
<th><?php 
echo $orderarr[$r]['customer'];

?></th> 
<th><?php 
echo $orderarr[$r]['pickupaddress'];

?></th>
<th><?php 
echo $orderarr[$r]['pickupdate'].' '.$orderarr[$r]['pickuptime'] ;

?> </th>
<th><?php 
echo $orderarr[$r]['trackstatus'];

?></th>
<th><?php 
echo $orderarr[$r]['trackcomments'];

?></th>
          <tr>
<?php } } ?>


</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



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
<script type="text/javascript">
        function get_status_and_load_form()
        {


              var t=document.getElementById('currentstatusid').value;

            var r=document.getElementById('transidchange').value;


if(t=='Under Repair')
{


        sendcommonactionfunc(t,r);


}
else if(t=='Repaired')
{

        sendcommonactionfunc(t,r);
}
else if(t=='Delivered')
{

          sendcommonactionfunc(t,r);
}
else if(t=='Under Diagnose')
{
            sendcommonactionfunc(t,r);
}
else if(t=='Picked Up')
{

        sendcommonactionfunc(t,r);
}
else if(t=='Picked Up')
{
document.getElementById('firstform').style.display='block';
document.getElementById('secondform').style.display='none';
}



        }






// loading the customer detiails after repair is completed 

          
function sendcommonactionfunc(transidchange,orderid)
{

var xmlhttp;   


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      


    document.getElementById("secondform").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","../allloads.php?senddeliveryaction="+orderid+"&transidchange="+transidchange,true);
xmlhttp.send();


}











// loading he custoemnr reapir colmplete function over here 




// loading the customer detiails after repair is completed 

          
function create_preview_invoice(orderid)
{

var xmlhttp;   


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      


    document.getElementById("secondform").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","../allloads.php?generate_invoice="+orderid+"&transidchange="+transidchange,true);
xmlhttp.send();


}



</script>
</body> 


</html>