<?php
require_once 'lzconfig.php';
require_once 'lz.php';


$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];


echo 'token obtained is '.$token;
//print_r($token);
/* get Match API data. Allowed card types are micro_card, summary_card and full_card. For more info https://developers.litzscore.com/docs/match_api/ */
//echo getMatch($token, 'iplt20_2013_g30', 'micro_card'); 




/* get RecentMatch API data. Allowed card types are micro_card and summary_card. For more info https://developers.litzscore.com/docs/recent_match_api/ */
//echo getRecentMatch($token, 'micro_card');  

/* get RecentSeasonMatch API data. Allowed card types are micro_card and summary_card. For more info https://developers.litzscore.com/docs/recent_match_api/ */
 //echo getRecentSeasonMatch($token, 'dev_season_2014',  'micro_card'); 


// ========================= getting the macth ka recent apis hre ===========================================







//$response4="api.litzscore.com/rest/v2/match/iplt20_2013_g30/?access_token=2s145319778140429s700692848571465024&card_type=micro_card";

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';







?>


<div style="background:black;width:100%;height:100px;color:white">
	


The values we obatined for the schedule apis are :


	</div>




	<?php 


echo 'get ball by ball ';


echo getBallByBall($token,'iplt20_2013_g30','a_6_3');
	?>