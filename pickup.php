<?php 
include('db.php');
include('functions.php');


 if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }

    if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }
        if(isset($_GET['changestatus']))
{

      $transid=$_GET['transid'];

      $cmd="update transaction set status='confirmed' where trans_id='$transid'";
$result=mysql_query($cmd);



}


				if(isset($_POST['submit_new']))
{
	$agency=$_POST['agency'];
  $service=$_POST['type'];
  $domain=$_POST['domains'];
  $opens=$_POST['opens'];
  $close=$_POST['closes'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];

$cmd="insert into merchant_details(agency,domain,opensat,closesat,agency_phone,service,address)
values('$agency','$domain','$opens','$close','$phone','$service','$address');
";
$result=mysql_query($cmd);

}


if(isset($_GET['forward_id']))
{
  $order=array();
	$sl=$_GET['forward_id'];
		$cmd="select * from transaction where trans_id='$sl'";
    $result=mysql_query($cmd);
                  while($row=mysql_fetch_array($result))
                  {
                     array_push($order,$row);
                  }
                     

}
if(isset($_GET['suspendsl']))
{
	$sl=$_GET['suspendsl'];
		$cmd="update productscategory set status='suspend' where sl='$sl'";
		$result=mysql_query($cmd);

}
?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>








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
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,15); ?> ( SIGNOUT )</a></li>


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


<!-- =============== header ends here -=================== -->
<div class="container" style='padding-top:12vw'>
  <h2>View and Update  : </h2>


  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 12.8px;'>
    <thead>
      <tr>
        <th>S.No</th>
        <th>Transaction ID </th>
        <th>Current Status</th>
        <th>Customer</th>
          <th>Email</th>
        <th>Reporting Point</th>
    
         <th>Contact</th>
       

        
      </tr>
    </thead>
    <?php 
    if(isset($_GET['transid']))
    {

    $arr1=get_order_details($_GET['transid']);

    }
    else
    {

            $arr1=get_pickup_boys_all_orders($_SESSION['personcode']);

    }
    ?>
    <tbody>
    	<?php 
    			for($r=0;$r<sizeof($arr1);$r++)
    			    			{
    	?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">


        <td><?php echo $r+1;?></td>
        <td><?php echo $arr1[$r]['trans_id'];?></td>
    <td style="text-transform:capitalize"><?php echo $arr1[$r]['trackstatus'];?></td>
     <td style="text-transform:capitalize"><?php echo $arr1[$r]['customer'];?></td>
      <td style="text-transform:capitalize"><?php echo $arr1[$r]['email'];?></td>
          <td><?php echo $arr1[$r]['pickupaddress'];?></td>
     
              <td><?php echo $arr1[$r]['phonenumber'];?></td>
                    


 <td><a href="?changestatus=<?php echo $arr1[$r]['trans_id']; ?>&transid=<?php echo $arr1[$r]['trans_id'];?>" onclick="
document.getElementById('order_details').style.display='block';
document.getElementById('allot_service_id').style.display='none';
document.getElementById('service_forward_form').style.display='block';
document.getElementById('merchant').value='<?php echo $arr1[$r]['person'];?>';
document.getElementById('merchant_phone').value='<?php echo $arr1[$r]['phone'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78;display:<?php 

            if($arr1[$r]['status']=='confirmed')
                  echo 'none';
                else
                  echo 'block';



      ?>">Yes, I have viewed the order and i confirm.</a></td>




      </tr>

<tr>



</tr>   

 
      <?php } ?>







      
    </tbody>
  </table>
  </div>
</div>





</body>	


</html>