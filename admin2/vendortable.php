<?php 
include('../db.php');
include('functionstats.php');


if(isset($_POST['updatevendor']))
{
      $code=$_POST['code'];

     $vendor=$_POST['vendor'];
               $service=$_POST['service'];
          $address=$_POST['address'];
      $sl=$_POST['sl'];
               $contact=$_POST['contact'];

$service=$_POST['service'];

$cmd="update vendordetails set code='$code',service='$service',address='$address',vendor='$vendor',contact='$contact' where sl='$sl'";
$result=mysql_query($cmd);

echo 'command is '.$cmd;

if($result){
$show_notify=1;
$optitle='VENDOR ADDED';
$opbody='Congratulations admin ! You have successfully added the new vendor '.$vendor;



}


}

if(isset($_POST['submitnewvendor']))
{
      $code=$_POST['code'];

      $sl=$_POST['sl'];

     $vendor=$_POST['vendor'];

          $address=$_POST['address'];

               $contact=$_POST['contact'];

$service=$_POST['service'];
$cmd="insert into vendordetails(code,service,inhouse,vendor,address,contact) values ('$code','$service','$inhouse','$vendor','$address','$contact')";
$result=mysql_query($cmd);

if($result){
$show_notify=1;
$optitle='VENDOR ADDED';
$opbody='Congratulations admin ! You have successfully added the new vendor '.$vendor;



}

}



if($_SESSION['adminlogged']=='')
{


redirectadmin();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin -Instarepair</title>

    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
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

div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
.btn2{

  background: #F8B910;
    color: white;
    width: 143px;
    height: 40px;
    font-size: 20px;
    text-transform: uppercase;
    border: none;
}

</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>

<div class='row' >
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
    document.getElementById('allwise').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All Vendors detail</strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('addnew').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Add new vendor </strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>



                               <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('updatelast').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Update last vendor </strong>
                                        <span class="pull-right text-muted"></span>
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
       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>INSTAREPAIR VENDORS  </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
       <?php
         $arr1=view_all_vendors();

    

?>        
            <div class="row" id='allwise'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All vendor details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>code</th> 
<th>Venodor </th> 
<th>service</th>
<th>address</th>
<th>contact</th>

</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($arr1);$r++)
        {



?>
          <tr><td><?php echo $r; ?></td>
              <td><?php echo $arr1[$r]['code']; ?></td>
               <td><?php echo $arr1[$r]['vendor']; ?></td>
    <td><?php echo $arr1[$r]['service']; ?></td>
<th><?php  echo $arr1[$r]['address'];?></th>
       <th><?php  echo $arr1[$r]['contact'];?></th>  



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




            <div class="row" id='addnew' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        ADD A NEW VENDOR HERE
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 

<th>code</th> 
<th>Venodor </th> 
<th>service</th>
<th>In House</th>


</tr> 
</thead> 
<tbody> 

<form action="#" method="post" >
<tr>
<td><input type="text" name="code" ></td>
<td><input type="text" name="vendor" ></td>
<td><select name="service" >

  <option>choose his service</option>
<option value='computer'>computer & desktops</option>

<option value='tablets'>Mobile & Tablets</option>
</select>
</td>


<td><select name="inhouse" >

  <option>whether inhouse ?</option>
<option value='1'>Yes</option>

<option value='0'>No</option>
</select>
</td>
</tr>

<tr>
<th>Address</th><th>Contact</th>
</tr>
<tr>
<td><textarea name="address" >

</textarea>
</td>
<td><input type="text" name="contact" ></td>



</tr>
<tr>

<td>
<input type="submit" class='btn2' name='submitnewvendor' >

</td>
</tr>

</form>





</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->


<!-- =========================== updater trhe lastr vensdors starts here ============================================ -->

          
<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




            <div class="row" id='updatelast' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        UPDATE THE EXISTING VENDORS           </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>code</th> 
<th>Venodor </th> 
<th>service</th>
<th>address</th>
<th>contact</th>

</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($arr1);$r++)
        {



?>


<form action="#" method="post" >
          <tr><td><input type="text" value="<?php echo $r+1; ?>" name="sl"></td>
              <td><input type="text" value="<?php echo $arr1[$r]['code']; ?>" name="code"></td>
               <td><input type="text" value="<?php echo $arr1[$r]['vendor']; ?>" name="vendor"></td>
    <td><input type="text" value="<?php echo $arr1[$r]['service']; ?>" name="service"></td>
<th><input type="text" value="<?php  echo $arr1[$r]['address'];?>" name="address"></th>
       <th><input type="text" value="<?php  echo $arr1[$r]['contact'];?>" name="contact"></th>  
       <th><input type="submit" value="update" name="updatevendor"></th>  
</form>

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




<!-- =-================ udpate the lastr vendors ends hetre ========================================================== -->1







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
    document.getElementById('addnew').style.display='none';


}

   </script>
</body>
</html>

