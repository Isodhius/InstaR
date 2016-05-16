<?php
include_once('../functions.php');
if(isset($_POST['name']))
{
$name=trim($_POST['name']);



include_app_connection_first();

$query2=mysql_query("SELECT distinct(brand) FROM device_costing WHERE brand LIKE '%$name%'");
echo "<ul type='none' style='background: #F4B912;
    color: black;
    text-align: left;'>";
while($query3=mysql_fetch_array($query2))
{
?>

<li  style='border-bottom: 1px groove #BDBDBD;' onclick='fill("<?php echo $query3['brand']; ?>")'><?php echo $query3['brand']; ?></li>
<?php
}

				?>

					<li  style='border-bottom: 1px groove #BDBDBD;' onclick='fill("<?php echo 'others'; ?>");

show_popup_others_tab();



						'><?php echo 'others'; ?></li>


				<?php
}



if(isset($_POST['modelname']))
{

		$makeselected=$_POST['makeselected'];

	include_app_connection_first();	
$name=trim($_POST['modelname']);

$query2=mysql_query("SELECT * FROM device_costing WHERE model LIKE '%$name%' and brand='$makeselected'");
echo "<ul type='none' style='background: #F4B912;
    color: black;
    text-align: left;'>";
while($query3=mysql_fetch_array($query2))
{
?>

<li  style='border-bottom: 1px groove #BDBDBD;'  onclick='fill2("<?php echo $query3['model']; ?>")'><?php echo $query3['model'].' '.$query3['variant']; ?></li>
<?php
}
}
?>
</ul>