<?php
require_once 'lzconfig.php';
require_once 'lz.php';

include('function_api.php');
include('../../db.php');
if(isset($_GET['addmatch']))
{
$matchkey=$_GET['addmatch'];
// checking this match d shud always be unique in the data base
$varcheck=check_already_inserted_or_not($matchkey);

// if varcheck is 0 then go and add all the value sto the databse fifnaly 



if(!$varcheck){
				// insert the match details entry first 
add_entirematch_from_season($matchkey);

}



}



$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];
//print_r($token);
/* get Match API data. Allowed card types are micro_card, summary_card and full_card. For more info https://developers.litzscore.com/docs/match_api/ */
//echo getMatch($token, 'iplt20_2013_g30', 'micro_card'); 




/* get RecentMatch API data. Allowed card types are micro_card and summary_card. For more info https://developers.litzscore.com/docs/recent_match_api/ */
//echo getRecentMatch($token, 'micro_card');  




/* get RecentSeasonMatch API data. Allowed card types are micro_card and summary_card. For more info https://developers.litzscore.com/docs/recent_match_api/ */
//$response1=getRecentSeasonMatch($token, 'dev_season_2014',  'micro_card'); 
//print_r($response1);



/* get RecentSeason API data. For more info https://developers.litzscore.com/docs/recent_season_api/ */
// echo getRecentSeason($token);

/* get Schedule API data. Allowed formates are YYYY-MM-DD and YYYY-MM. For more info https://developers.litzscore.com/docs/schedule_api/ */
// echo getSchedule($token, 'YYYY-MM-DD'); 

/* get Season Schedule API data. Allowed formates are YYYY-MM-DD and YYYY-MM.  For more info https://developers.litzscore.com/docs/schedule_api/ */
// echo getSeasonSchedule($token, 'dev_season_2014', 'YYYY-MM');

/* get Season API data. Allowed card type micro_card and summary_card. For more info https://developers.litzscore.com/docs/season_api/ */
// echo getSeason($token, 'dev_season_2014', 'micro_card' );


/* get Season Stats API data. For more info https://developers.litzscore.com/docs/season_stats_api/ */
// echo getSeasonStats($token, 'dev_season_2014');

/* get Season Points API data. For more info https://developers.litzscore.com/docs/season_points_api/ */
// echo getSeasonPoints($token, 'dev_season_2014');

/* get Season Player Stats API data. player_x1 is player key. For more info https://developers.litzscore.com/docs/season_player_stats_api/ */
// getSeasonPlayerStats($token, 'dev_season_2014', 'player_x1');

/* get Match Over Summary API data. For more info https://developers.litzscore.com/docs/over_summary_api/ */
 //getMatchSummary($token, 'iplt20_2013_g30');

/* get News Aaggregation API data.  For more info https://developers.litzscore.com/docs/news_aggregation_api/ */
 //$response1=getNewsAaggregation($token);


/* get Ball by Ball API data. b_1_1 is over key. For more info https://developers.litzscore.com/docs/ball_by_ball_api/ 
$response1=getBallByBall($token, 'iplt20_2013_g30', 'b_1_12'); 


 echo '------------------------------------------------------------------ ';
echo 'response code is '.print_r($response1);
echo '******'.$response1['data']['balls']['5ddc1325-442f-4501-bac5-98140c3a32f5']['striker'].'*****************';

echo '******'.$response1['data']['balls']['5ddc1325-442f-4501-bac5-98140c3a32f5']['comment'].'*****************';


echo '******'.$response1['data']['balls']['5ddc1325-442f-4501-bac5-98140c3a32f5']['match'].'*****************';

 echo '------------------------------------------------------------------ ';*/
?>


<!-- ==============  NEW CAPI CODE GENERATION STARTS HERE ==================== -->
<div style="width:100%;background:black;color:white;text-align:center;vertical-align:middle">
1. getting the match details for a season here 

</div>
<?php 



$matcharr=getMatch($token, 'icc_wc_t20_2016_g5', 'full_card');

echo '<br>';
echo 'MATCH TITLE :'.$matcharr['data']['card']['title'];
echo '<br>';
echo 'MATCH KEY :'.$matcharr['data']['card']['key'];
echo '<br>';
echo 'venue :'.$matcharr['data']['card']['venue'];
echo '<br>';
echo 'TEAM1 :'.$matcharr['data']['card']['teams']['a']['name'];

echo '<br>';
echo 'TEAM2 :'.$matcharr['data']['card']['teams']['b']['name'];
echo '<br>';
?>
<span style="color:black;">CURRENT STATUS :<strong style='color:red'>
<?php
	echo $matcharr['data']['card']['status']; ?></strong>

<a href="?addmatch=<?php echo $matcharr['data']['card']['key']; ?>" >ADD THIS MATCH TO PANGA LEAGUE</a>

</span><br><Br>
<span style="color:black;">STARTS AT  :<strong style='color:red'>
<?php
	echo $matcharr['data']['card']['start_date']['str']; ?></strong>

</span>
<?php

?>




<!-- =============== NEW API CODE ENDS HERE ===================================== -->



<div style="width:100%;background:purple;color:white;text-align:center;vertical-align:middle">
1. getting the playing 11 of both teams 

</div>
<strong>TEAM 2 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td>
<td>Economy</td>
</tr>

			<?php
							for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){

			?>
			<tr><td><?php echo $k;?></td><td><?php $playername=$matcharr['data']['card']['teams']['a']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playername]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->


<td><?php 
			if($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
			{

				if($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
					$playertype='ALL ROUNDER';
				else
					$playertype='BATSMAN';
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
			{

				$playertype='BOWLER';
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman']){
				$playertype='KEEPER';
			}


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

		<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs']; ?></td>
<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets']; ?></td>

<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches']; ?></td>
<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes']; ?></td>

<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours']; ?></td>



<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy']; ?></td>


<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
		

		<!-- ==== checking the values for the player type here ========== -->


			</tr>
			<?php }?>
</table>

<br><br>
<strong>TEAM 2 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td>
<td>Economy</td>
</tr>

			<?php
							for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){

			?>
			<tr><td><?php echo $k;?></td><td><?php $playername=$matcharr['data']['card']['teams']['b']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playername]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->


<td><?php 
			if($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
			{

				if($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
					$playertype='ALL ROUNDER';
				else
					$playertype='BATSMAN';
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
			{

				$playertype='BOWLER';
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman']){
				$playertype='KEEPER';
			}


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

		<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs']; ?></td>
<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets']; ?></td>

<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches']; ?></td>
<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes']; ?></td>

<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours']; ?></td>



<td><?php echo $matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy']; ?></td>


<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
		

		<!-- ==== checking the values for the player type here ========== -->


			</tr>
			<?php }?>
</table>

<br><br>
<div style="width:100%;background:RED;color:white;text-align:center;vertical-align:middle">
BATSMAN LIST COMES HERE 

</div>






<div style="width:100%;background:RED;color:white;text-align:center;vertical-align:middle">
GETTING THE RECENT SEASON LIST  

</div>


<div style="width:100%;background:RED;color:white;text-align:center;vertical-align:middle">
GETTING THE RECENT SEASON LIST  

</div>
<!-- =============APLI DETAILS FOR THE UPCOMING MATCHES STARTS HERE =========================== -->

<?php
echo '=========================================================================';

$todaysdate=date('YYYY-MM');
echo 'today is '.$today.'<br>';
echo '3 days in queue are ';
// getting the dates in serial order here 
$datesarr=get_serial_dates();
echo '------------------------------------'.print_r($datesarr).'-------------------------------------------------';


?>
<span>TOTAL MATCHES FOR THIS DAY : <?php echo sizeof($arr5['data']['matches']); ?> </span>

<?php 
for($t=0;$t<sizeof($datesarr);$t++)
{
	$arr5=getSchedule($token,'20'.$datesarr[$t]);
$matchkey=$arr5['data']['matches'][0]['key'];
echo 'MATCH TITLE'.$arr5['data']['matches'][0]['name'].'<br>';
echo 'MATCH DETAILS'.$arr5['data']['matches'][0]['related_name'].'<br>';
echo 'MATCH KEY'.$arr5['data']['matches'][0]['key'].'<br>';
echo 'current staus'.$arr5['data']['matches'][0]['status'].'<br>';
echo 'starts at'.$arr5['data']['matches'][0]['start_date']['iso'].'<br>';
echo check_already_created_for_entry($matchkey);

}
?>



<!-- =-================ API DETAILS FOR THE UPCOMING M,ATCHES ENDS HERE ====================== -->