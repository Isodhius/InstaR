<?php 
include('db2.php');



function get_all_brandnames(){

$arr1=array();
$cmd="select * from brand";

                  $result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{
array_push($arr1,$row);

}

				return $arr1;


			}


			function get_device_type_by_category($categoryid){


if($categoryid=='1')
	return 'Mobile';
elseif ($categoryid=='2') 
return 'Tablet';
elseif($categoryid=='3')
	return 'Laptop';
elseif ($categoryid=='4') 
return 'Desktop';
}




function get_all_modelnames()
{


$arr1=array();
$cmd="select * from modelname";

                  $result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{
array_push($arr1,$row);

}

				return $arr1;


}



function get_device_model_name_bysl($sl){

$cmd="select Name from modelname where Id='$sl'";

                  $result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{
$brand=$row['Name'];

}
				return $brand;






}

?>