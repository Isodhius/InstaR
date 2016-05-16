<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');




        if(isset($_POST['submittransactiondata'])){
              $trans_id=$_POST['trans_id'];
              $name=$_POST['customer'];
              $email=$_POST['email'];
              $address=$_POST['address'];
              $devicetype=$_POST['devicetype'];
              $model=$_POST['model'];
              $brand=$_POST['brand'];
              $contact=$_POST['contact'];
             $freetime=$_POST['freetime'];
             $freedate=$_POST['freedate'];

$cmd="update transaction set customer='$name',email='$email',pickupaddress='$address',devicetype='$devicetype',model='$model',brand='$brand',phonenumber='$contact',pickuptime='$freetime',pickupdate='$freedate' where trans_id='$trans_id'";


$result=mysql_query($cmd);


$showsuccess=1;
        }



if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }





 
?>

<html>
<head>
    <title>Admin -Instarepair</title>

    <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>






<!-- ===================== header class starts here ====================================================== -->
<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="javascript:void(0)">
<img src="img/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
  <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
      
                <li STYLE="color:white"><a href="supporthome.php">SUPPORT HOME</a> </li>
        
     



                      <li><a href="?logoutpanel=1" data-toggle="modal" style="
    /* padding: 5px; */
    border-radius: 0px;
    
    font-size: 15px;display:<?php 
if(!isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,14); ?> ( SIGNOUT )</a></li>


        </ul>
            <!-- script-for-menu -->
             <script>
               $( "span.menu" ).click(function() {
               $( "ul.nav1" ).slideToggle( 300, function() {
               // Animation complete.
                });
               });
            </script>
            <!-- /script-for-menu -->
      </div>
    
          <script src="js/classie.js"></script>
          <script src="js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) ); 
            </script>
        <!-- //search-scripts -->
        
      
      <div class="clearfix"> </div>
  </div>


<!-- =============== header ends here -===================================================== -->





<?php

if(isset($_GET['trans_id']))

  $trans_id=$_GET['trans_id'];
        $arr1=get_order_details($_GET['trans_id']);




?>




  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw;'>
<span style='color:red;display:<?php 

        if(isset($showsuccess))
          echo 'block';
              else
                echo 'none';

?>'>congratulations ! Values are updated successfully, check the below entries.</span>
  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
EDIT TRANSACTION ID: <?php echo $trans_id; ?>
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>

                <form action="#" method="post">
      <?php 
                  for($t=0;$t<sizeof($arr1);$t++)
                  {
      ?>

      <input type="text" value="<?php echo $trans_id;?>" style='display:none'  name="trans_id"    >
             <tr><td>CUSTOMER NAME :</td><td><input type="text" name="customer" value="<?php echo $arr1[0]['customer'];?>"></td></td></tr>
       <tr><td>ADDRESS :</td><td><input type="text" name="address" value="<?php echo $arr1[0]['pickupaddress'];?>"></td></tr>
              <tr><td>EMAIL :</td><td><input type="text" name="email" value="<?php echo $arr1[0]['email']?>"></td></tr>
            <tr><td>DEVICE TYPE :</td><td><input type="text" name="devicetype" value="<?php echo $arr1[0]['devicetype'];?>"></td></tr>
             <tr><td> MODEL :</td><td><input type="text" name="model" value="<?php echo $arr1[0]['model'];?>"></td></tr>
             <tr><td> BRAND :</td><td><input type="text" name="brand" value="<?php echo $arr1[0]['brand'];?>"></td></tr>
                <tr><td> CONTACT NO :</td><td><input type="text" name="contact" value="<?php echo $arr1[0]['phonenumber'];?>"></td></tr>


                  <tr><td> FREE DATE :</td><td><input type="text" name="freetime" value="<?php echo $arr1[0]['pickupdate'];?>"></td></tr>
             <tr><td> FREE TIME :</td><td><input type="text" name="freedate" value="<?php echo $arr1[0]['pickuptime'];?>"></td></tr>
                 


                      <?php } ?>
        
        <tr></tr>

            <tr><td>
        <input type="submit" class="btn btn-default"  style='background:orange' name="submittransactiondata">
              </td></tr>
                        </form>
    </thead>
              

      
    </tbody>
  </table>


  </div>
</div>












</body>	


</html>