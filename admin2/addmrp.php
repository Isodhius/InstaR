<?php 
include('../db.php');
include('functionstats.php');



if(isset($_POST['submitnewrmrp']))
{


$sl=$_POST['serial2'];


echo 'the seriualk ius '.$sl;

      $brand=$_POST['brand'];

     $model=$_POST['model'];

          $varient=$_POST['varient'];

               $costing=$_POST['costing'];

$service=$_POST['service'];
$cmd="insert into device_costing(brand,model,Varient,costing) values ('$brand','$model','$varient','$costing') where sl='$sl'";

// updatye the data for the sl device mrp here 
include_app_connection_first();
$cmd="update device_costing set brand='$brand',model='$model',Varient='$varient',costing='$costing' where sl='$sl'";
echo $cmd;
$result=mysql_query($cmd);

if($result){
$show_notify=1;
$optitle='New Repair added';
$opbody='Congratulations admin ! You have successfully added the new device Mrp costing  '.$brand.' '.$model.' at the costing  '.$costing;



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
                      <small>BUY BACK DATA </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
    


<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




            <div class="row" id='mrp' style=''>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                    BUY BACK gadgets with MRP Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 

<th>Brand</th> 
<th>Model </th> 
<th>Varient</th> 
<th>Costing </th> 
<th>operations </th> 

</tr> 
</thead> 
<tbody> 

   


  <?php  


  $arr2=array();

  $arr2=get_all_the_device_cureent_mrp_for_buyback();
        for($r=0;$r<sizeof($arr2);$r++)
        {

?>

<tr>
    <form action="#" method="post" >

<td><input type="text" name="brand"   value="<?php echo $arr2[$r]['brand'];    ?>">
<input type="text" name='serial2' value='<?php echo $arr2[$r]['sl'];    ?>' style='display:nones' >
</td>
<td><input type="text" name="model"   value="<?php echo $arr2[$r]['model'];    ?>"></td>
<td><input type="text" name="varient"   value="<?php echo $arr2[$r]['Varient'];    ?>"></td>
<td><input type="text" name="costing"   value="<?php echo $arr2[$r]['costing'];    ?>"></td>
<td>
<input type="submit" class='btn2' id=''  name='submitnewrmrp' >

</td>


</tr>
</form>
  <?php  
      }
?>








</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->


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
    document.getElementById('factors').style.display='none';


}

   </script>
</body>
</html>

