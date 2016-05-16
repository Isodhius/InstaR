<?php
	// Textlocal account details
	$username = 'amitbhalla.pwc@gmail.com';
	$hash = '97b24fe04708309ab00f51dc53944fb44ce9c93f';
	
	// Message details
	$numbers = array(8467077302);
	$sender = urlencode('INSTAR');
$otp=rand(111,139);

	$msg="New order at instarepair Transaction ID: ".$otp." customer : ".$otp." device nokia530 address : h 187 gurgaon contact number : 8587024270 . Confirm here : ".$otp;
	$message =urlencode($msg);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);

	
	// Process your response here
