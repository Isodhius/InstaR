<?php 
include('../db.php');
include('functionstats.php');
  if(isset($_POST['notificationsubmit']))
{
      

    $text=mysql_real_escape_string($_POST['notificationtext']);

    $cmd="update customer set allnotifications='$text',notificationread='0'";
    $result=mysql_query($cmd);

  
      }
  if(isset($_POST['depositmoney']))
{
      

    $amount=mysql_real_escape_string($_POST['money']);
    $email=mysql_real_escape_string($_SESSION['email']);
deposit_money_towallet($amount,$email);
  
      }

  if(isset($_POST['edit_submit']))
{
            $name=mysql_real_escape_string($_POST['name']);
            $email=mysql_real_escape_string($_POST['email']);
            $address=mysql_real_escape_string($_POST['address']);
            $phone=mysql_real_escape_string($_POST['phone']);



$cmd="update customer set address='$address',name='$name',phone='$phone' where email='$email'";
$result=mysql_query($cmd);
        if($result)
        {

          $_SESSION['name']=$name;
          $_SESSION['email']=$email;
          $_SESSION['address']=$address;
          $_SESSION['phone']=$phone;
        }



}

if(isset($_POST['submit_register']))
{
      $name=$_POST['name1'];
      $email1=$_POST['email1'];
      $pass1=$_POST['pass1'];
      $pass2=$_POST['pass2'];
      
      if($pass1==$pass2)
         register_user($name,$email1,$pass1);
      

}
if(isset($_POST['submit_login']))
{

      $username=$_POST['username1'];
      $password=$_POST['pass1'];
      
      if($pass1==$pass2)
          loginfirst($username,$password);
      

}

if(isset($_GET['logout']))
{

signoutuser();



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Demo</title>

<!-- Bootstrap 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- Custom Style -->
<link rel="stylesheet" href="flags/Style.css" type="text/css">
<link rel="stylesheet" href="../css/responsive.css" type="text/css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="../common.css">



<link rel="stylesheet" href="../common.css">
<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,400italic,400,700,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
    <style>
    #header {
        text-align: center;
    padding: 5px;
    height: 250px;
    background-color: #160A6E;
        background-image: url(cric1.png);
   
    background-size: 100% 100%;
}

    #nav{
    line-height:30px;
    background-color:white;
    height:600px;
    width:30%;
    float:left;
    padding:5px;
    float: left;	      
}
#section {
    width:70%;
    float:right;
    padding:10px;	
    background-color:rgb(153,152,147); 
    height:600px;	 
}

tr{
    line-height: 44px;
    font-size: 18px;
}
td{    border-top: 2px solid #f04b4b;
    border-bottom: 2px solid #f04b4b;}
.user{margin-top: 10px;
    margin-left: 21px;
    line-height: 28px;
    font-size: 18px;}
 .input{margin-left: 67px;
    line-height: 15px}  
  #btncolor{
background-color:#f2dede;
    border: 1px solid white;
    color: white;
  }
    </style>
</head>
<body>



<section>
<div class="container-fluid">
<div class="navbar-header navbtn">
<button aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="index.html">Cricket</a> </div> 
<nav class="collapse navbar-collapse custom-collapse" id="bs-navbar"> 
<ul class="nav navbar-nav navbar-right">
<li> <a href="#">ADMIN PANEL </a> </li>


</ul>
</nav> 
</div>
</section>
<div id="header" style="    background: url(../images/cover1.png);
    background-size: 100% 100%;"></div>

<section>
<div class="container-fluid">
<nav class="secontnav nav">
<ul class="nav navbar-nav navbar-left">
<li> <a href="customertab.php">ALL USERS</a> </li>
<li> <a href="affiliatetab.php">AFFILIATE</a> </li>
<li> <a href="earnings.php">EARNINGS </a> </li>
<li> <a href="matchstats.php">LIVE MATCHES</a> </li>
<li> <a href="pushnotifications.php">PUSH NOTIFICATION</a> </li>
<li> <a href="javascript:void(0)">SETTINGS</a> </li>
</ul>
</nav>
</section>

</div>
<div id="nav">
    <p style="    text-align: center;
    font-size: 24px;
       color:#f04b4b;">RELATED LINKS</p>
    <hr style="height: 5px;
    border: none;
    
    background-color:#f04b4b;;margin-top:9px;" />

   <table style="width:100%;margin-left: 23px" >
    <tr>
    <td><a href="#">LIVE MATCH PUSH</a></td>
    
  </tr>
  <tr>
    <td><a href="#">BULK MAIL</a></td>
    
  </tr>
  <tr>
    <td><a href="#">DISCOUNTS AND OFFERS</a></td>
    
  </tr>
</table>

</div>

<div id="section" id='livematchpush'>
     <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size: 23px;
    font-family: sans-serif;;">USER DASHBOARD NOTIFICATION</div>




    

  <form action="#" method='post'>
    <div class="form-group">
      <label for="email">Enter the notification message :</label><br>
          <textarea name='notificationtext' style='width:50%;max-width:350px;height:300px;padding:2%'></textarea>
    </div>
   
    <button type="submit" name='notificationsubmit' class="btn btn-default">confirm and send</button>
  </form>


</div>







<div id="section" id='bulkmail'>
     <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size: 23px;
    font-family: sans-serif;;">SEND BULK MAIL</div>




            <div class="container" style='padding-top:100px'>

  <form role="form">
    <div class="form-group">
      <label for="email">ENTER THE MESSAGES:</label><br>
          <textarea style='width:50%;max-width:350px;height:300px;padding:2%'></textarea>
    </div>
   
    <button type="submit" class="btn btn-default">confirm and send</button>
  </form>
</div>




<script type="text/javascript">

  function show_pop(a)
              {


                    document.getElementById(a).style.display='block';

              }



              function closepopup(a)
{
    document.getElementById(a).style.display='none';



}



</script>





</div>
</body>
</html>
