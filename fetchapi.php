<?php 
include('db.php');

echo 'the value for the Created API are as follows '.'<br>';
$arr2=show_all_data();

echo 'the json encoded array value is  ';
$out=array_values($arr2);
json_encode($out);

foreach ($variable as $key => $value) {
	# code...
}


$array4 = array(
  'code' => '1234',
  'country' => 'india'
);

// array_values() removes the original keys and replaces
// with plain consecutive numbers
$new1=json_encode($out,true);
var_dump($new1);
$new4=json_encode($array4,true);
var_dump($new4);
//=======================
echo '<br>';
return $new4;
//================================================






if(isset($_GET['showbuyback']))
{
	$arr2=show_all_data();


$out=array_values($arr2);
json_encode($out);
$new1=json_encode($out,true);
var_dump($new1);

//=======================
echo '<br>';
return $new1;


}
function show_all_data()
{

	$arr1=array();
   $cmd="select * from buyback";
	    $result=mysql_query($cmd);
 while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                  return $arr1;



}



?>