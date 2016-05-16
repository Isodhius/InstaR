<?php 
include('functions.php');

if(isset($_GET['otp']))
{

  $otp=$_GET['otp'];

if($_SESSION['otpcode']==$otp)
{

$found=1;
echo 'verified';
}
else{

$found=0;
echo 'Transaction Failure ! Wrong OTP entered .Could not verify ! Please try again . ';
}

}






if(isset($_GET['call_transaction_id']))
{
echo ' Thanks '.$_SESSION['visitorsname'].' for choosing Instarepair. Your Transaction ID is '.$_SESSION['transaction_id'].'<BR>'."<span style='font-size:12px;color:black'>Soon, you will recieve a verfication sms by Insta Team.  </span>";


}




						
if(isset($_GET['trackorder']))
{
			$trackorder=$_GET['trackorder'];
	$cmd="select * from transaction where trans_id='$trackorder'";
	$result=mysql_query($cmd);
	while($row=mysql_fetch_array($result))
{

//$phone=$row['phone'];
$trackstatus=$row['trackstatus'];
$trackcomments=$row['trackcomments'];
}
echo 'Your current status : '.$trackstatus.'<br>';
echo nl2br($trackcomments);



}



?>