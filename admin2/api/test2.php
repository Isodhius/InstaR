<?php
require_once 'lzconfig.php';
require_once 'lz.php';
include('../../db.php');
include('function_api.php');
$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];
 $response1=getSchedule($token, '2016-03-09'); 
 echo 'getting the values of match keys for date greater than today '.'<br>';
print_r($response1);

echo 
