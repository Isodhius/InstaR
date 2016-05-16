<?php 
include('functions.php');

if(isset($_GET['otp']))
{

  $otp=$_GET['otp'];

if($otp=='instakey007')
{

$found=1;
echo 'verified';
}
else{

$found=0;
echo 'Transaction Failure ! Wrong OTP entered .Could not verify ! Please try again . ';
}

}






?>