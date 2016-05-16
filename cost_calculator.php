<?php 
include('functions.php');


if(isset($_GET['submit_buyback']))
{


$brandname=mysql_real_escape_string($_GET['brandname']);
$modelname=mysql_real_escape_string($_GET['modelname']);
$switchon=$_GET['switchon'];





if($switchon=='yes')
{

$deviceage=$_GET['age'];

$allaccessories=$_GET['acc'];

// now calculate the price over here ==========


// first calculate the cost of this model+brands 
$costing=calculate_device_cost($brandname,$modelname,$switchon);
        // =========== apply the depreciation value formaula here ====


$newvalue=get_depreciation_value($deviceage,$costing);



$accarr=explode(',',$allaccessories);
if (in_array("ear_phone",$accarr))
{
			$ear_phone='apply';

}
if (in_array("charger",$accarr))
{
			$charger='apply';

}
if (in_array("invoice",$accarr))
{
			$invoice='apply';

}
if (in_array("box",$accarr))
{
			$box='apply';

}


$reduceamount=get_accessories_reducing($box,$charger,$invoice,$ear_phone,$costing);

$finalcosting=$newvalue-$reduceamount;
if(($finalcosting=='0'))
	$finalcosting='No device found';



	}else{


// dead phone costing will  be calculated here 

$mrp=calculate_device_cost($brandname,$modelname);

		$finalcosting=calculate_dead_phone_costing($mrp);



	}








?>

<img src="img/rupee-symbol.png" width='40'>
<span style='color:grey;' id='shownpriceajax'><?php echo $finalcosting;?></span>


<?php }