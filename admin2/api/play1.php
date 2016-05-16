<?php
require_once 'lzconfig.php';
require_once 'lz.php';
include('../db.php');


$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];
//$response1=getSeason($token,'icc_wc_t20_2016', 'micro_card' );
//print_r($response1);




$matcharr=getMatch($token, 'icc_wc_t20_2016_g3', 'full_card');

print_r($matcharr);



?>
