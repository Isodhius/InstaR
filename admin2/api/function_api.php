<?php
// use ElephantIO\Client,
//     ElephantIO\Engine\SocketIO\Version0X;

// require __DIR__ . '/vendor/autoload.php';
// use Ytake\WebSocket\Io;
require_once 'lzconfig.php';
require_once 'lz.php';
include('../../db.php');


function check_already_inserted_or_not($matchkey)
{
		$cmd="select * from matchid_details where matchid='$matchkey'";
								$result=mysql_query($cmd);echo $cmd;
                             $c=mysql_num_rows($result);
                          if($c>=1)
                          return 1;
                      else
                      	return 0;


}

function add_entirematch_from_season($matchkey)
{
	$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];
echo 'cameee'.$token;
		$matcharr=getMatch($token,$matchkey,'full_card');
print_r($matcharr);
$title=mysql_real_escape_string($matcharr['data']['card']['title']);
$matchkey=mysql_real_escape_string($matcharr['data']['card']['key']);
$venue=mysql_real_escape_string($matcharr['data']['card']['venue']);
$team1=mysql_real_escape_string($matcharr['data']['card']['teams']['a']['name']);
$team2=mysql_real_escape_string($matcharr['data']['card']['teams']['b']['name']);
$status=mysql_real_escape_string($matcharr['data']['card']['status']);
$format=mysql_real_escape_string($matcharr['data']['card']['format']);
$timings=mysql_real_escape_string($matcharr['data']['card']['start_date']['str']);
	$versus=mysql_real_escape_string($team1.'_'.$team2);
add_leagues_match_details_to_db($title,$matchkey,$venue,$team1,$team2,$status,$timings,$format);
add_all_players($matcharr,$matchkey,$versus);
add_players_api_stats($matchkey);

}


function add_players_api_stats($matchid)
{



$arr1=get_playing_22($matchid);
 $playersarr=explode('$$$',$arr1);

      $matchname=$matchid;


      $cmd="CREATE TABLE $matchname (
sl INT(29) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
player_name VARCHAR(30) NOT NULL,score int(30)  default 0,wickets int(30) default 0,catches int(30) default 0,points int(30) default 0,stumped int(30)  default 0,economy decimal(6,2)  default 0,balls_faced int(30)  default 0,sixes int(30)  default 0,fours int(30)  default 0,strike_rate decimal(6,2)  default 0,overs int(30)  default 0)";


$result=mysql_query($cmd);

for($r=0;$r<sizeof($playersarr);$r++)
{
$playersname=$playersarr[$r];
$cmd="insert into $matchname (sl,player_name) values ('','$playersname')";
$result=mysql_query($cmd);
echo $cmd;

}
}



function get_playing_22($matchid)
				{

		
							$cmd="SELECT * FROM `playing_22` WHERE `matchid`='$matchid'";
										$result=mysql_query($cmd);
							while($row=mysql_fetch_array($result))
							{
					$lineuparr=$row['all_22'];
				

							}
							return $lineuparr;


				}
function add_leagues_match_details_to_db($title,$matchkey,$venue,$team1,$team2,$status,$timings,$format)
{
		$versus=$team1.'_'.$team2;
			$cmd="insert into matchid_details(match_title,matchid,venue,versus,apistatus,timings,format) values ('$title','$matchkey','$venue','$versus','$status','$timings','$format')";
					$result=mysql_query($cmd);

echo $cmd;

}




function add_all_players($matcharr,$matchkey,$versus)
{			
				$keeper=array();
			$batsman=array();
			$bowler=array();
			$allrounder=array();

	// for team 1 here is the division of players 		
for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){

	echo $k.'-'.$matcharr['data']['card']['teams']['a']['match']['players'][$k].'<br>';
}
			// TEAM 1
			for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){
$playername=$matcharr['data']['card']['teams']['a']['match']['players'][$k];


// checking the type of player he is 

if($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
			{

				    if($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
					   {
					   		$playertype='ALL ROUNDER';

					     array_push($allrounder,$matcharr['data']['card']['players'][$playername]['fullname']);
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper']){
					$playertype='KEEPER';
			       array_push($keeper,$matcharr['data']['card']['players'][$playername]['fullname']);


				      }
				  else{
					$playertype='BATSMAN';
			       array_push($batsman,$matcharr['data']['card']['players'][$playername]['fullname']);


				      }
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
			{

				$playertype='BOWLER';
	array_push($bowler,$matcharr['data']['card']['players'][$playername]['fullname']);

			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper'])
			{

				$playertype='keeper';
	array_push($keeper,$matcharr['data']['card']['players'][$playername]['fullname']);


			}


		

				 }



//=================== // for team 2 here is the division of players 		
for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){

	echo $k.'-'.$matcharr['data']['card']['teams']['b']['match']['players'][$k].'<br>';
}
			// TEAM 1
			for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){
$playername=$matcharr['data']['card']['teams']['b']['match']['players'][$k];


// checking the type of player he is 

if($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
			{

				    if($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
					   {
					   		$playertype='ALL ROUNDER';

					     array_push($allrounder,$matcharr['data']['card']['players'][$playername]['fullname']);
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper']){
					$playertype='KEEPER';
			       array_push($keeper,$matcharr['data']['card']['players'][$playername]['fullname']);


				      }
				  else{
					$playertype='BATSMAN';
			       array_push($batsman,$matcharr['data']['card']['players'][$playername]['fullname']);


				      }
			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
			{

				$playertype='BOWLER';
	array_push($bowler,$matcharr['data']['card']['players'][$playername]['fullname']);

			}
			elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper'])
			{

				$playertype='keeper';
	array_push($keeper,$matcharr['data']['card']['players'][$playername]['fullname']);


			}


		

				 }

echo 'the all details of player are asfollows --'.'<br>';

print_r($batsman);echo '<br>';
print_r($bowler);echo '<br>';
print_r($allrounder);echo '<br>';
print_r($keeper);

insert_team_to_match_key_ids($batsman,$bowler,$allrounder,$keeper,$matchkey,$versus);

}



			function calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs)
{


$runsfactor=$runs*2.5;
$wicketsfactor=$wickets*25;
$sixesfactor=$sixes*5;
$foursfactor=$fours*2.5;

$catchesfactor=$catches*10;
// economy rate bonus 

if(!is_null($economy))
{
if($economy<3)
$economyfactor=25;
elseif ($economy>3 && $economy<4)
	$economyfactor=20*$overs;
elseif ($economy>4 && $economy<5)
	$economyfactor=15*$overs;
elseif ($economy>5 && $economy<6)
	$economyfactor=20*$overs;
elseif ($economy>6 && $economy<7)
	$economyfactor=5*$overs;
}

$stumpfactor=$stump*20;


$extrasfactor=-$extras*5;


if($ballsfaced>25)
{


if ($strike_rate>190 && $strike_rate<210)
	$strikefactor=125;
elseif ($strike_rate>170 && $strike_rate<190)
	$strikefactor=100;
elseif ($strike_rate>150 && $strike_rate<170)
	$strikefactor=75;
elseif ($strike_rate>130 && $strike_rate<150)
	$strikefactor=0;
elseif ($strike_rate>110 && $strike_rate<130)
	$strikefactor=25;


}

		$totalpoints=$runsfactor+$sixesfactor+$catchesfactor+$foursfactor+$strikefactor+$economyfactor+$stumpfactor+$extrasfactor;



		// update into databse ========================================================================================

		$cmd="";

		return $totalpoints;



			}



function insert_team_to_match_key_ids($batsman,$bowler,$allrounder,$keeper,$matchkey,$versus)
{

	$batsmanstring=mysql_real_escape_string(implode('$$$',$batsman));
	$bowlerstring=mysql_real_escape_string(implode('$$$',$bowler));
	$allrounderstring=mysql_real_escape_string(implode('$$$',$allrounder));
	$keeperstring=mysql_real_escape_string(implode('$$$',$keeper));
$allstring=$batsmanstring.'$$$'.$bowlerstring.'$$$'.$allrounderstring.'$$$'.$keeperstring;
	$cmd="insert into playing_22(matchid,country,batsman,bowler,allrounder,wicketkeeper) values ('$matchkey','$versus','$batsmanstring','$bowlerstring','$allrounderstring','$keeperstring')";
			$result=mysql_query($cmd);

	$cmd="update playing_22 set all_22='$allstring' where matchid='$matchkey'";
			$result=mysql_query($cmd);




}




			function add_blank_table_for_contest($contestid)
			{

			$apitable=$contestid.'_pointsapi';
   $cmd="CREATE TABLE $apitable (
sl INT(29) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,lineup varchar(100),points int(30) default 0,ranking int(30))";


$result=mysql_query($cmd);
// create all players with 0-0 entry all over the table made above


			}

function get_the_match_scheduled_from_db(){

$arr1=array();
$cmd="select * from scheduling_matches";
$result=mysql_query($cmd);

								while($row=mysql_fetch_array($result))
							{
					array_push($arr1,$row);
				

							}

						return $arr1;

}


			function update_player_points($matchkey,$runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs,$playername)
			{

$points=calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

$cmd="update $matchkey set score='$runs',wickets='$wickets',balls_faced='$ballsfaced',economy='$economy',strike_rate='strike_rate',catches='$catches',fours='$fours',sixes='$sixes',strike_rate='$strike_rate',points='$points' where player_name='$playername'";
$result=mysql_query($cmd);
echo $cmd;

			}



			function match_completed_event($matchkey)
			{
					$cmd="update matchid_details set apistatus='completed' where matchid='$matchkey'";
					$result=mysql_query($cmd);
echo $cmd;

			}




			function check_already_created_for_entry($matchkey)
			{





				$cmd="select * from matchid_details where matchid='$matchkey'";
				$result=mysql_query($cmd);
				$count=mysql_num_rows($result);
				if($count>0)
					echo 'JOIN LEAGUES';	
				else
				echo 'coming soon';		}



		  function get_serial_dates()
                          {
                          				date_default_timezone_set("Asia/Calcutta");
				$today=date('y-m-d');

				$lastday= strtotime("+12 days", strtotime($today));
                   $lastday= date("y-m-d", $lastday);


		
				$serialdates=array();
				$serialdates=getDatesFromRange($today,$lastday);

return $serialdates;
                          }




                          function getDatesFromRange($start, $end) {
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(
         new DateTime($start),
         $interval,
         $realEnd
    );

    foreach($period as $date) { 
        $array[] = $date->format('y-m-d'); 
    }

    return $array;
}




function get_the_upcoming_matches()
{
$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}


$token = $authData['access_token'];


	$datesarr=get_serial_dates();
	// emptying the earlier records first and then updating the records later

	$cmd="truncate table scheduling_matches";
				$result=mysql_query($cmd);
	    for($t=0;$t<sizeof($datesarr);$t++)
       {
       			
$arr5=getSchedule($token,'20'.$datesarr[$t]);
	for($s=0;$s<sizeof($arr5['data']['matches']);$s++)
       				{
       	$matchkey=mysql_real_escape_string($arr5['data']['matches'][$s]['key']);echo 'matchkey:'.$matchkey.'<br>';
$title=mysql_real_escape_string($arr5['data']['matches'][$s]['name']);
$details=mysql_real_escape_string($arr5['data']['matches'][$s]['related_name']);
$team1=strtolower(mysql_real_escape_string($arr5['data']['matches'][$s]['teams']['a']['name']));
$team2=strtolower(mysql_real_escape_string($arr5['data']['matches'][$s]['teams']['b']['name']));
$status=mysql_real_escape_string($arr5['data']['matches'][$s]['status']);
$startsat=mysql_real_escape_string($arr5['data']['matches'][$s]['start_date']['iso']);
insert_into_scheduling_table($title,$details,$team1,$team2,$status,$startsat,$matchkey);
//===============================================================================================================================================




// now check wheteher the playing 30 of all the scheduled matches is loaded or not in the datatabse 


			// if not then add the match to the databse ================================================

			// checking this match matchkey  shud always be unique in the data base
$varcheck=check_already_inserted_or_not($matchkey);

// if varcheck is 0 then go and add all the value sto the databse fifnaly 



if(!$varcheck){
        // insert the match details entry first 
add_entirematch_from_season($matchkey);

}




//============================================================================================================================================

						}


			}
}


function insert_into_scheduling_table($title,$details,$team1,$team2,$status,$startsat,$matchkey)
{

	$cmd="insert into scheduling_matches(title,details,team1,team2,startsat,currentstatus,matchid) values ('$title','$details','$team1','$team2','$startsat','$status','$matchkey')";

		$result=mysql_query($cmd);

}


   function iso_time_difference($time2)
   {
   			$time2="2016-03-12T11:30+00:00";

	$present=date('M d Y h:i:s',strtotime(date('M d y h:i:s'))); 

$differenceInSeconds = strtotime($time2) - strtotime($present);




// calculating th etime diffrnec in hours, minutes form at

$init =$differenceInSeconds;
$hours = floor($init / 3600);
$minutes = floor(($init / 60) % 60);
$seconds = $init % 60;
echo '<br>';
echo "$hours:$minutes:$seconds";




   }



   function get_all_money_maker_contest($matchid)
   {
$arr1=array();
   			$cmd="select * from match_contest where match_id='$matchid' and tournament='moneymaker'";
   				$result=mysql_query($cmd);
							while($row=mysql_fetch_array($result))
							{
					array_push($arr1,$row);
				

							}

						return $arr1;



   }



// get all the API added magtche for creating tavble for the admin peoople 



   function get_all_api_added_matches()
   {
   			$arr1=array();
   			$cmd="select * from matchid_details where apistatus='notstarted'";
   			$result=mysql_query($cmd);
   						while($row=mysql_fetch_array($result))
							{
					array_push($arr1,$row);
				

							}

						return $arr1;




   }

// returns all_ the current tabkes for this match id
function get_matchid_all_created_tables($matchid)
{

	$cmd="select * from match_contest where match_id='$matchid'";
			$result=mysql_query($cmd);
		$count=mysql_num_rows($result);
   				
						return $count;


}



function load_api_for_table_creation()
{
			$arr1=array();
	$cmd="select * from matchid_details where apistatus='notstarted'";
	$result=mysql_query($cmd);
								while($row=mysql_fetch_array($result))
							{
					array_push($arr1,$row);
				

							}

						return $arr1;

}




function get_api_versus($matchid)
{
		$cmd="select versus from matchid_details where matchid='$matchid'";
	$result=mysql_query($cmd);
								while($row=mysql_fetch_array($result))
							{
					$versus=$row['versus'];
				

							}

						return $versus;



}




function get_all_headsup_amounts($matchid)
{
			$cmd="select amounts from  headsup_contest where matchid='$matchid'";
						$result=mysql_query($cmd);
								while($row=mysql_fetch_array($result))
							{
					$amounts=$row['amounts'];
				

							}

						return $amounts;




}



function check_which_match_live(){
$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}

$today='20'.date('y-m-d');
$token = $authData['access_token'];
$response=getSchedule($token,$today);



/// first find the total matches  running today ====

$countofmatches=sizeof($response['data']['matches']);





// find tha tstus of all the matches ========================================== 

for($t=0;$t<sizeof($response['data']['matches']);$t++)
	{

				if($response['data']['matches'][$t]['status']=='started')
				{
						update_all_match_live_stats($response['data']['matches'][$t]['key']);


				}


	}			








}


//================================================ function for starting or stoping the match based on the litz api real time stats 





function start_or_stop_the_match()
{


		$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}

$today='20'.date('y-m-d');
$token = $authData['access_token'];
$response=getSchedule($token,$today);



/// first find the total matches  running today ====

$countofmatches=sizeof($response['data']['matches']);




// find tha tstus of all the matches ========================================== 

for($t=0;$t<sizeof($response['data']['matches']);$t++)
	{
$matchid=$response['data']['matches'][$t]['key'];
		$arr1=getMatch($token,$response['data']['matches'][$t]['key'],'full_card');
$status=$arr1['data']['card']['status'];
echo 'status is '.$status;

				if($status=='completed')
				{
						$apistatus=check_whether_started_or_not($response['data']['matches'][$t]['key']);echo 'aspistasus '.$apistatus;
						if($apistatus!='completed')
						{
							$cmd="update matchid_details set apistatus='completed' where matchid='$matchid'";
							$result=mysql_query($cmd);

						}


				}
				elseif($status=='started')
				{
					echo 'started loop';
							$apistatus=check_whether_started_or_not($response['data']['matches'][$t]['key']);
						if($apistatus!='started')
						{
							$cmd="update matchid_details set apistatus='started' where matchid='$matchid'";
							$result=mysql_query($cmd);echo $cmd;

						}
						update_all_match_live_stats($matchid);





				}


	}







}

//===================== function for starting or stopipin the match is here ========================================================================








// checking whether a match is already started or not return the APISTATUS ======

function check_whether_started_or_not($key)
{

			$cmd="select * from matchid_details where matchid='$key'";
							$result=mysql_query($cmd);
								while($row=mysql_fetch_array($result))
							{
					$apistatus=$row['apistatus'];
				

							}




						return $apistatus;



}

// checking whether a match is already started or not ===================










// now upodating the started match is here  =============================================================================================================================


function update_all_match_live_stats($key)
{



$authData = auth();
if (! $authData) {
	echo "Error Auth, Please verify your access details on lzconfig.php \n";
	return;
}
$token = $authData['access_token'];
// now getting all the api values for this match ============================================================ 
$matcharr=getMatch($token,$key,'full_card');



// now getting list of 11 players of TEAM 1 AND HIS CURRENT LIVE STATS 


              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){

             $playername=$matcharr['data']['card']['teams']['a']['match']['players'][$k];

      



    $runs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'];echo 'runss---- '.$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'].'===';
$wickets=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets'];echo $wickets;

$catches=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches'];echo $catches;
$sixes=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes'];echo $sixes;
$fours=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours'];echo $fours;

$ballsfaced=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['balls'];echo $ballsfaced;


$economy=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy'];echo $economy;

$stump=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['stumbed'];echo $stump;

$strike_rate=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate;

$extras=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['extras'];echo $extras;


$overs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['overs'];echo $overs;



// calculating the panga points based on these stats ===================================================
$points=calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

// ======== now updating these stats based on theses values ====================================================
             $playernameshort=$matcharr['data']['card']['teams']['a']['match']['players'][$k];

      $playername=$matcharr['data']['card']['players'][$playernameshort]['fullname'];

update_each_player_stats($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs,$playername,$key,$points);


 } 




// now getting list of 11 players of TEAM 1 AND HIS CURRENT LIVE STATS 


              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){

             $playername=$matcharr['data']['card']['teams']['b']['match']['players'][$k];

      



    $runs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'];echo 'runss---- '.$runs.'===';
$wickets=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets'];echo $wickets;

$catches=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches'];echo $catches;
$sixes=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes'];echo $sixes;
$fours=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours'];echo $fours;

$ballsfaced=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['balls'];echo $ballsfaced;


$economy=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy'];echo $economy;

$stump=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['stumbed'];echo $stump;

$strike_rate=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate;

$extras=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['extras'];echo $extras;


$overs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['overs'];echo $overs;



// calculating the panga points based on these stats ===================================================
$points=calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

// ======== now updating these stats based on theses values ====================================================
             $playernameshort=$matcharr['data']['card']['teams']['b']['match']['players'][$k];

      $playername=$matcharr['data']['card']['players'][$playernameshort]['fullname'];

update_each_player_stats($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs,$playername,$key,$points);


 } 



}








//func tion for updating tnhe stats of each of the player stats ======================================== 


			function update_each_player_stats($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs,$playername,$key,$points)
			{



	// get the key value and update the stats to the key based database =========================================

	$cmd="update $key set score='$runs',wickets='$wickets',catches='$catches',points='$points',stumped='$stump',economy='$economy',balls_faced='$ballsfaced',sixes='$sixes',fours='$fours',strike_rate='$strike_rate' where player_name='$playername'";
	$result=mysql_query($cmd);










			}






function check_which_match_to_stop()
{





}
?>