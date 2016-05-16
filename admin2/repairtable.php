<?php 
include('../db.php');
include('functionstats.php');

if(isset($_POST['updaterepair']))
{
      $make=$_POST['make'];

     $model=$_POST['model'];

          $repairingitem=$_POST['repairingitem'];

               $cost=$_POST['cost'];

$sl=$_POST['serial'];
echo 'serail is '.$sl;
$service=$_POST['service'];
$cmd="update repair_costing2 set make='$make',model='$model',repairingitem='$repairingitem',cost='$cost' where sl='$sl'";
$result=mysql_query($cmd);
echo $cmd;
if($result){
$show_notify=1;
$optitle='New Repair added';
$opbody='Congratulations admin ! You have successfully updated the new Repair for  '.$make.' '.$model.' for repair item '.$repairingitem.'at  cost '.$cost;



}

}

if(isset($_POST['submitnewrepair']))
{
      $make=$_POST['make'];

     $model=$_POST['model'];

          $repairingitem=$_POST['repairingitem'];

               $cost=$_POST['cost'];

$service=$_POST['service'];
$cmd="insert into repair_costing2(make,model,repairingitem,cost) values ('$make','$model','$repairingitem','$cost')";
$result=mysql_query($cmd);

if($result){
$show_notify=1;
$optitle='New Repair added';
$opbody='Congratulations admin ! You have successfully added the new Repair for  '.$make.' '.$model.' for repair item '.$repairingitem.' cost '.$cost;



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
                                        <strong>All Gadget repair</strong>
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
                                        <strong>Add new Repair</strong>
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
                      <small>GADGET REPAIR PRICING </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
       <?php
         $arr1=view_all_pricing();

?>        
            <div class="row" id='allwise'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                         REPAIR PRICING
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>sl</th>
<th>make</th> 
<th>Model </th> 
<th>Repair Items</th>
<th>Costing</th>
<th>Operations</th>

</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($arr1);$r++)
        {



?>


          <tr>
<form action='#' method='post' >
           <td><input type="text" style='display:none2' readonly name="serial" value="<?php echo $arr1[$r]['sl']; ?>"></td>
              <td></span><input type="text"  name="make" value="<?php echo $arr1[$r]['make']; ?>"></td>
               <td><input type="text"  name="model" value="<?php echo $arr1[$r]['model']; ?>"></td>
    <td><input type="text"  name="repairingitem" value="<?php echo $arr1[$r]['repairingitem']; ?>"></td>
<td><input type="text"  name="cost" value="<?php  echo $arr1[$r]['cost'];?>"></td>

<td><input type="submit"  name="updaterepair" value="Update it" class='btn2'></td>


          </form>
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



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




            <div class="row" id='addnew' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        ADD A NEW REPAIR COSTING
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 

<th>make</th> 
<th>Model </th> 
<th>Repair Items</th>
<th>Costing</th>


</tr> 
</thead> 
<tbody> 

<form action="#" method="post" >
<tr>
<td><input type="text" name="make" ></td>
<td><input type="text" name="model" ></td>
<td><input type="text" name="repairingitem" ></td>
<td><input type="text" name="cost" ></td>


</tr>


<tr>

<td>
<input type="submit" class='btn2' name='submitnewrepair' >

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

