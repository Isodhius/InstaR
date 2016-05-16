<?php

require_once 'lzconfig.php';

function auth() {
	$fields = array(
		'access_key' => LZ_access_key,
		'secret_key' => LZ_secret_key,
		'app_id' => LZ_app_id,
		'device_id' => LZ_device_id
	);	

	$fields_string = '';
	
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	$fields_string=rtrim($fields_string, '&');
	 
	$ch = curl_init();
	 
	curl_setopt($ch, CURLOPT_URL, LZ_url.'auth/');
	curl_setopt($ch, CURLOPT_POST, true);
	 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	$response = json_decode($response, true);

	curl_close($ch);

	return $response['auth'];
}

function getData($req_url, $fields){



	$url = LZ_url. $req_url. '/?' . http_build_query($fields);

	//$url="https://api.litzscore.com/rest/v2/match/iplt20_2013_g30/?access_token=2s145319778140429s701351924724807898&card_type=micro_card";
	

echo '///////url is '.$url.'//////////////////////////////////////////';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	$response= json_decode($response,true);


	
	return $response;
}

function getMatch($access_token, $match_key, $card_type){
	$fields = array(
	    'access_token' => $access_token,
	    'card_type' => $card_type,
	);
	echo "Card Type: $card_type \n";

	$url = 'match/' .$match_key;
	$response = getData($url, $fields);
	return $response;
}

function getRecentMatch($access_token, $card_type){

	$fields = array(
	    'access_token' => $access_token,
	    'card_type' => $card_type,
	);
	//echo "Card Type: $card_type \n";

	$url = 'recent_matches';
	$response = getData($url, $fields);
	//return $response;
}

function getRecentSeasonMatch($access_token, $season_key, $card_type){

	$fields = array(
	    'access_token' => $access_token,
	    'card_type' => $card_type,
	);
	echo "Card Type: $card_type \n";

	$url = 'season/' .$season_key .'/recent_matches';
	$response = getData($url, $fields);
	return $response;
}

function getRecentSeason($access_token){
	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'recent_seasons';
	$response = getData($url, $fields);
	return $response;
}

function getSchedule($access_token, $formate){
	$fields = array(
	    'access_token' => $access_token,
	    'date' => $formate,
	);
	$url = 'schedule';
	$response = getData($url, $fields);
	return $response;
}

function getSeasonSchedule($access_token, $season_key, $formate){
	$fields = array(
	    'access_token' => $access_token,
	    'formate' => $formate
	);
	$url = 'season/' .$season_key. '/schedule';
	$response = getData($url, $fields);
	return $response;
}


function getSeason($access_token, $season_key, $card_type){
	$fields = array(
	    'access_token' => $access_token,
	    'card_type' => $card_type,
	);
	$url = 'season/' .$season_key;
	$response = getData($url, $fields);
	return $response;
}


function getSeasonStats($access_token, $season_key){
	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'season/' .$season_key. '/stats';
	$response = getData($url, $fields);
	return $response;
}

function getSeasonPoints($access_token, $season_key){
	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'season/' .$season_key. '/points';
	$response = getData($url, $fields);
	return $response;
}

function getSeasonPlayerStats($access_token, $season_key, $player_key){
	$fields = array(
	    'access_token' => $access_token,
	);

	$url = 'season/' .$season_key. '/player/'.$player_key .'/stats';
	$response = getData($url, $fields);
	return $response;
}


function getMatchSummary($access_token, $match_key){
	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'match/' .$match_key. '/overs_summary';
	$response = getData($url, $fields);
	return $response;
}

function getNewsAaggregation($access_token){
	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'news_aggregation';
	$response = getData($url, $fields);
	return $response;
}

function getBallByBall($access_token, $match_key, $over_key){




	$fields = array(
	    'access_token' => $access_token,
	);
	$url = 'match/' .$match_key. '/balls/' .$over_key;
	$response = getData($url, $fields);

	return $response;





}

?>