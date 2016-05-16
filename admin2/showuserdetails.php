<?php 
include('../db.php');
include('functionstats.php');




$email=$_GET['showusernow'];
$arr1=array();
$cmd="select * from customer where email='$email'";
$result=mysql_query($cmd);

					while($row=mysql_fetch_array($result))
				{
					array_push($arr1,$row);
				

				}
					
?>



				<div class="custom-table" data-example-id="striped-table" id='allcustomers' > 


					<form action="#" method="post">
<table class="table table-striped" >  
<thead> 
<tr> 
<tr><th>#</th> <th><input type="text" name=""   value="<?php           echo $arr1[0]['sl'];                ?>"></th></tr>
<tr><th>Name</th> <th><input type="text" name="name"   value="<?php           echo $arr1[0]['name'];                ?>"></th></tr>
<tr><th>Email</th><th><input type="text" name="email"   value="<?php           echo $arr1[0]['email'];                ?>"></th></tr>
<tr><th>username</th><th><input type="text" name="username"   value="<?php           echo $arr1[0]['username'];                ?>"></th></tr>
<tr><th>Allnotifications</th><th><input type="text" name="allnotifications"   value="<?php           echo $arr1[0]['allnotifications'];                ?>"></th></tr>
<tr><th>Joined Leagues</th><th><input type="text" name="joinedleagues"   value="<?php           echo $arr1[0]['joined_league'];                ?>"></th></tr>
<tr><th>Lineups</th><th><input type="text" name="lineups"   value="<?php           echo $arr1[0]['lineups'];                ?>"></th></tr>
<tr><th>Phone</th><th><input type="text" name="phone"   value="<?php           echo $arr1[0]['phone'];                ?>"></th></tr>
<tr><th>His affiliate</th><th><input type="text" name="hisaffiliate"   value="<?php           echo $arr1[0]['hisaffiliate'];                ?>"></th></tr>

<tr><th>User rake</th><th><input type="text" name="rake_affiliate"   value="<?php           echo $arr1[0][''];                ?>"></th></tr>
<tr><th>Is blocked</th><th><input type="text" name="blocked"   value="<?php           echo $arr1[0]['blocked'];                ?>"></th></tr>
<tr><th>Total Gameplays</th><th><input type="text" name="gameplays"   value="<?php           echo $arr1[0]['gameplays'];                ?>"></th></tr>
</tr> 
</thead> 
<tbody> 





</table>


					
					<input type="submit" name="submitnewdetails">
</form>
							</div>