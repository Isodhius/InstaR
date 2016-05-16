<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');

if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }

 if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }



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
      
                <li STYLE="color:white">TECHNICAL PANELS </li>
        
     
                            <li STYLE="color:white"><a href='supporthome.php'>SUPPORT HOME </a></li>


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

  $arr1=array();
      $cmd="select * from requestacallback";
    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
       





?>




  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw;'>


  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
VIEW CALL BACK ENTRIES 
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>

              <tr><th>sl</th><th>CALLER</th><th>CONTACT</th><th>TIME</th></tr>
      <?php 
                  for($t=0;$t<sizeof($arr1);$t++)
                  {
      ?>
          <tr><th><?php 
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
       
    </thead>
              

      
    </tbody>
  </table>


  </div>
</div>












</body>	


</html>