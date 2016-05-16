<?php 
include('../db.php');
include('functionstats.php');

if(isset($_POST['updaterepaircost']))
{
      $sl=$_POST['sl'];
     $charger=$_POST['charger'];
          $box=$_POST['box'];


      $sl=$_POST['sl'];

      $sl=$_POST['sl'];


     $amount_range=$_POST['amount_range'];

          $depreciation=$_POST['depreciation'];

       
call_the_factor1_change($period,$depreciation,$charger,$box,$invoice,$amount_range,$sl);

if($result){
$show_notify=1;



$optitle='Buy Back factor changed';
$opbody='Congratulations admin ! You have changed the factor for  bauy back depreciation ';


          }
}

if(isset($_POST['updaterepaircost'])){










}






if(isset($_POST['submitperiod_depreciation']))
{
      $sl=$_POST['sl'];

     $period=$_POST['period'];

          $depreciation=$_POST['depreciation'];

       
call_the_factor2_change($period,$depreciation,$sl);

if($result){
$show_notify=1;



$optitle='Buy Back factor changed';
$opbody='Congratulations admin ! You have changed the factor for  bauy bvack depreciatoion ';


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
    <title>Instarepair</title>
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
                                        <strong>Buy back orders</strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('factors').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>View the factors </strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>


                            </a>
                        </li>


                              <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('factors').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>View all buy back factors </strong>
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
                      <small>BUY BACK DATA </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
       <?php
       $arr1=array();
         $arr1=view_all_buyback_request();

?>        
            <div class="row" id='allwise'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        ALL BUYBACK ORDERS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>SRN</th> 
<th>Customer </th> 
<th>Model </th> 

<th>Device Age</th>
<th>Shown Price</th>

<th>Acessories</th>

</tr> 
</thead> 
<tbody> 

<?php  
        for($r=0;$r<sizeof($arr1);$r++)
        {



?>
          <tr><td><?php echo $r+1; ?></td>
              <td><?php echo $arr1[$r]['orderid']; ?></td>
                      <td><?php echo $arr1[$r]['customer']; ?></td>
               <td><?php echo $arr1[$r]['brand'].' '.$arr1[$r]['model']; ?></td>
    <td><?php echo $arr1[$r]['deviceage']; ?></td>


                <td><?php echo $arr1[$r]['shownprice']; ?></td>
    
<th><?php  echo $arr1[$r]['accessories'];?></th>




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




            <div class="row" id='factors' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        VIEW ALL EXISTING FACTORS 
                        </div>
                        <div class="panel-body">


                          <strong>ALGORITHM 1 : CALUCULATE THE ACCESORIES DEPRECIATION BASED ON THE MRP OF THE DEVICE</strong>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>Period </th> 
<th>Amount Range</th>
<th>Ear Phone</th>
<th>Invoice</th>
<th>Charger</th>
<th>Box</th>

<th>Operations</th>
</tr> 
</thead> 
<tbody> 
<?php 

$fact1=get_buyback_factor1();

for($t=0;$t<sizeof($fact1);$t++){
?>
<form action="#" method="post" >
<tr>

<td><input type="text" name="sl" value="<?php echo $fact1[$t]['sl'];?>"></td>
<td><input type="text" name="amount_range" value="<?php echo $fact1[$t]['amount_range'];?>"></td>
<td><input type="text" name="ear_phone" value="<?php echo $fact1[$t]['ear_phone'];?>" ></td>
<td><input type="text" name="invoice" value="<?php echo $fact1[$t]['invoice'];?>"></td>
<td><input type="text" name="charger" value="<?php echo $fact1[$t]['charger'];?>"></td>
<td><input type="text" name="box" value="<?php echo $fact1[$t]['box'];?>"></td>
<td>
<input type="submit" class='btn2' value='update' name='updaterepaircost' >

</td>
</tr>


<tr>

</tr>

</form>

<?php } ?>



</table>
                            </div>
                            
                        </div>



<!-- =-=======  2 nd depreciation factor starts here  ==================================== -->



        <div class="panel-body" id='factor2'>


                          <strong>ALGORITHM 2 : CALUCULATE THE DEVICE DEPRECIATION</strong>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th># </th> 
<th>Period </th> 
<th>Depreciation</th>



<th>Operations</th>
</tr> 
</thead> 
<tbody> 
<?php 

$fact2=get_buyback_factor2();

for($t=0;$t<sizeof($fact2);$t++){
?>
<form action="#" method="post" >
<tr>

<td><input type="text" name="sl" value="<?php echo $fact2[$t]['sl'];?>"></td>
<td><input type="text" name="period" value="<?php echo $fact2[$t]['period'];?>"></td>
<td><input type="text" name="depreciation" value="<?php echo $fact2[$t]['depreciation'];?>" ></td>


<td><input type="submit" class='btn2' value='update' name='submitperiod_depreciation' ></td>

</td>
</tr>



</form>

<?php } ?>



</table>
                            </div>
                            
                        </div>

















<!-- =-================================= 2 nd depreciation end shere ============================== -->




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
    document.getElementById('factors').style.display='none';


}

   </script>
</body>
</html>

