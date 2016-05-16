<?php 
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));           // Object
var_dump(json_decode($json, true));




$loginUrl ='fetchapi.php?showbuyback=22';
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$loginUrl);
$result=curl_exec($ch);
curl_close($ch);
var_dump(json_decode($result));





?>
