<?php 
include('../db.php');
include('functionstats.php');

include('api/function_api.php');


require_once 'api/lzconfig.php';
require_once 'api/lz.php';

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
if(isset($_POST['submit_contest']))
{
$entryfees=mysql_real_escape_string($_POST['entryfees']);
$maxplayers=mysql_real_escape_string($_POST['maxplayers']);
$type=mysql_real_escape_string($_POST['type']);
$contesttitle=mysql_real_escape_string($_POST['contesttitle']);
$matchid=mysql_real_escape_string($_POST['matchid']);
$contestid=mysql_real_escape_string($matchid.'_'.$maxplayers);
$adminstatus='running';
$cmd="insert into match_contest(adminstatus,entry,total_players,match_type,chattext,chatusername,joined_usernames,contest_id,contest,match_id) values ('$adminstatus','$entry','$maxplayers','$type','','','','$contestid','$contesttitle','$matchid')";

$result=mysql_query($cmd);



//create a blank table for this contest id


add_blank_table_for_contest($contestid);
}

if(isset($_POST['submitnewdetails']))
{

        $name=$_POST['name'];
              $email=$_POST['email'];
                $username=$_POST['username'];
                  $phone=$_POST['phone'];
                  $userrake=$_POST['rake_affiliate'];
                    $gameplays=$_POST['gameplays'];
$cmd="update customer set name='$name',username='$username',phone='$phone',rake_affiliate='$userarake' where email='$email'";
$result=mysql_query($cmd);


}












if(isset($_POST['submit_login']))
{

      $username=$_POST['username1'];
      $password=$_POST['pass1'];
      
      if($pass1==$pass2)
          loginfirst($username,$password);
      

}

if(isset($_GET['logout']))
{

signoutuser();



}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panga Cricket</title>
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>

          <div id='show_notify' class="choose_captain" style=';    margin-top: 122px;
    display: block;
    background: #E5EBF2;
    max-width: 500px;
    z-index: 333;
    position: fixed;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;display:none' >
                         
                          <span id="success_notify_text" style='color:red;display:none'>MESSAGE HAS BEEN POSTED SUCCESSFULLY </span>

                          <form action="#" method="post" >
                        <input type="text" name='useremail' style='border:none'  class="textbar_popup" id='notify_email' readonly><br><br>

                      <textarea name="usermessage" id='usermessage' class="textbar_popup" style="width:320px;height:120px;">

                          </textarea><br><br>

                          <a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="submit_personal_notification()">
                              POST TO USER DASHBOARD</a>
                              </form>



                         </div>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">PangaLeague</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
        
     
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="adminlogout.php?signout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
                 <?php
          include('assets/left_sidenavbar.php');

       ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">


<marquee style='color:maroon' behavior="alternate" >Click on the scheduled matches to view the API stats</marquee>
              <!-- ====== ask the admin for the matchkeyt fisrt by choosing from the list of all the scheduled api from the database ====-->

<?php
$arr=get_the_match_scheduled_from_db();



?>
<table style='border-collapse: separate;
    border-spacing: 17px;
'>
<tr style='  
    color:black;font-weight:bold;
    text-align: center;'>
<td>SL</td><td>MATCHID</td><td>TITLE</td><td>STARTS AT</td><td>OPERATION</td>
</tr>
<?php 

for($r=0;$r<sizeof($arr);$r++)
{ ?>

<tr style='text-align:left'>

<td><?php echo $r+1;?></td><td><?php echo $arr[$r]['matchid'];?></td><td><?php echo $arr[$r]['title'];?></td><td><?php echo $arr[$r]['startsat'];?></td>
<td><a href="javascript:void(0)" style='    background: #09192A;
    color: white;padding:2px;
    font-size: 9px;' onclick="document.getElementById('matchkey').value='<?php echo $arr[$r]['matchid'];?>'">ADD API STATS </a></td>
</tr>


  <?php } ?>



</table>


              <!-- =========  admin schediler ends here ================================================================================ -->




<!-- ==================== view match api starts here =================================== -->

       <div class="row" id='viewandaddmatch'>

<!-- ================== add new match starts here ================================= -->
<label>enter the match key </label>

<input type='text' id='matchkey' placeholder='enter match key here ' style='text-align:center'>


<a href='javascript:void(0)' onclick="show_match_api_data()" style='background: black;
    color: white;
    font-size: 10px;
    padding: 6px;
    margin-top: 100px;'>VIEW MATCH</a>


<!-- ============== api display part ================================================== -->

<!-- ==============  NEW CAPI CODE GENERATION STARTS HERE ==================== -->

<?php 


$authData = auth();
if (! $authData) {
  echo "Error Auth, Please verify your access details on lzconfig.php \n";
  return;
}


$token = $authData['access_token'];
if(isset($_GET['showmatch']))
{
  $matchkey=$_GET['showmatch'];
$matcharr=getMatch($token,$matchkey,'full_card');
      
if($matcharr['status_code']=='404')
  echo 'NO API LOADED';

?>
<div id="uploaded_api" style="display:<?php if($matcharr['status_code']=='404')echo 'none'; ?>">
<span style="color:black;font-weight:bold;font-family:helvetica;">
<?php
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
</span>
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
<strong>TEAM 1 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td><td>Balls Faced</td>
<td>Economy</td><td>stump</td><td>strike-rate</td><td>Extras</td><td>overs</td>
<td>POINTS</td>
</tr>

      <?php
              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){

      ?>
      <tr><td><?php echo $k;?></td><td><?php $playername=$matcharr['data']['card']['teams']['a']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playername]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->


<td><?php if($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper']){
        $playertype='KEEPER';
      }
      elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
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
    


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

    <td><?php $runs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'];echo $runs; ?></td>
<td><?php $wickets=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets'];echo $wickets; ?></td>

<td><?php $catches=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches'];echo $catches; ?></td>
<td><?php $sixes=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes'];echo $sixes; ?></td>

<td><?php $fours=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours'];echo $fours; ?></td>

<td><?php $ballsfaced=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['balls'];echo $ballsfaced; ?></td>


<td><?php $economy=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy'];echo $economy; ?></td>

<td><?php $stump=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['stumbed'];echo $stump; ?></td>

<td><?php $strike_rate=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate; ?></td>

<td><?php $extras=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['extras'];echo $extras; ?></td>


<td><?php $overs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['overs'];echo $overs; ?></td>

<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
<td><?php

calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

?></td>
    <!-- ==== checking the values for the player type here ========== -->


      </tr>
      <?php }?>
</table>

<br><br>
<strong>TEAM 2 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td><td>Balls Faced</td>
<td>Economy</td><td>stump</td><td>strike-rate</td><td>Extras</td><td>overs</td>
<td>POINTS</td>
</tr>

      <?php
              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){

      ?>
      <tr><td><?php echo $k;?></td><td><?php $playername=$matcharr['data']['card']['teams']['b']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playername]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->


<td><?php if($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper']){
        $playertype='KEEPER';
      }
      elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
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
    


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

    <td><?php $runs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'];echo $runs; ?></td>
<td><?php $wickets=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets'];echo $wickets; ?></td>

<td><?php $catches=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches'];echo $catches; ?></td>
<td><?php $sixes=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes'];echo $sixes; ?></td>

<td><?php $fours=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours'];echo $fours; ?></td>

<td><?php $ballsfaced=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['balls'];echo $ballsfaced; ?></td>


<td><?php $economy=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy'];echo $economy; ?></td>

<td><?php $stump=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['stumbed'];echo $stump; ?></td>

<td><?php $strike_rate=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate; ?></td>

<td><?php $extras=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['extras'];echo $extras; ?></td>


<td><?php $overs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['overs'];echo $overs; ?></td>

<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
<td><?php

calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

?></td>
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



</div>

<?php } ?>







<!-- ================== api display part =============================================== -->



<form action='#' method='post' style='display:none'>
  <strong>ADD A TABLE EVENT FOR MATCH ID : <?php echo $arr1[0]['match_id']?></strong><br>
<input type="text" name='matchid' style='display:none1' placeholder='copy the matchid ' value=""><br>
<label>select the form of table you want to create :</label><br>
<select name='type' class='drop1'>
  <option value='single'>single match</option>
<option value='heads up'>heads up</option>
<option value='half winner' >half winner</option>
<option value='heads up'>Heads up</option>
</select><br>
<label>Enter some contest title :</label><br>

<input type='text' name='contesttitle' class='drop1'><br>





<label>Enter the total number of players allowed :</label><br>

<input type='text' name='maxplayers' class='drop1'><br>

<label>Entry fees per player :</label><br>

<input type='text' name='entryfees' placeholder='in Rs.'  class='drop1'><br>

<input type='submit' style="    background: #E08912;
    color: white;
    border: none;
    width: 300px;
    height: 46px;" name='submit_contest'>  <br>


  </form>

<!-- ============= add match ends here =========================================== -->


            </div>
                <!-- /. ROW  -->


<!--= =============  VIEW API ENDS HERE  ========================================== -->


<!-- ============= ADD LEAGUE TABLES STARTS HERE ============================= -->

<div class='row' id='add_tables'>




</div>





<!-- =========== ADD LEAGUE TABLE ENDS HERE ================================ -->

        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   <script type="text/javascript">


                      function closeallpopup()
{

   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}



function show_match_api_data()
{

var t=document.getElementById('matchkey').value;

window.location='?showmatch='+t;


}
   </script>

   <script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){ 


       $('#opponententirepanel').load('updateuserliveapi.php?opponentsteamload=1&contestid=<?php echo $contestid;?>', function(){
           setTimeout(refreshTable,125000);

            });

    }





</script>
</body>
</html>
