<?php 
include('../db.php');

$emailown=$_SESSION['name'];







function signoutuser()
{
	unset($_SESSION['adminlogged']);
}

function redirectadmin()
{


	
				?>
						<script type="text/javascript">

window.location='index.php';

						</script>
	<?php 



}


			function return_registration_date($email)
					{
								$cmd="select * from customer where email='$email'";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	$date1=$row['registration_date'];
				

				          }

				          
						      return $date1;



					}




function get_affiliates_total_earnings($username)
{

$cmd="select siteearnings from customer where username='$username'";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				                 $siteearnings=$row['siteearnings'];

				                }

				    
				  return $siteearnings;



}





function get_all_transaction_data()
{
	$arr1=array();
				$cmd="select * from transaction";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				    
				  return $arr1;






}





function get_all_affiliates()
{

			$cmd="select * from affila";



}


			function get_site_profit()
			{
					$cmd="select sum(amount) as total from transaction where type='DEPOSIT'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$total=$row['total'];

				                }

				                	return $total;


			}



function get_user_deposits($email)
{

			$cmd="select sum(amount) as total1 from transaction where type='DEPOSIT' and email='$email'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totaldeposit=$row['total1'];

				                }

return $totaldeposit;


}

function get_user_total_orders($email)
{

			$cmd="select sl from transaction where email='$email'";
						$result=mysql_query($cmd);echo $cmd;

						$count=mysql_num_rows($result);

						return $count;



}



function get_groups_headsup($match_id,$amount)
{

$columnname='aftermatchstart'.$amount;
			$cmd="select $columnname from headsup_plays where match_id='$match_id'";echo  $cmd;
					$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$allgroups=$row[$columnname];

				                }

				       

return $allgroups;












}





				function get_site_money_account()
			{
					$cmd="select sum(amount) as total1 from transaction where type='DEPOSIT'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totaldeposit=$row['total1'];

				                }


				                $cmd="select sum(amount) as total2 from transaction where type='REDEEM'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totalredeem=$row['total2'];

				                }
				         
				              
				         $moneyinaccount=$totaldeposit-$totalredeem;
				         
				                	return $moneyinaccount;


			}
function get_user_rake($username)
{

			$cmd="select rake_affiliate from customer where username='$username'";
			$result=mysql_query($cmd);


										 while($row=mysql_fetch_array($result))
			              	{
				        	$rake=$row['rake_affiliate'];
				
   
				            }

				          return $rake;





}




function get_all_headsup_matches()
{
	$arr1=array();

					$cmd="select * from headsup_plays";
			$result=mysql_query($cmd);
			while($row=mysql_fetch_array($result))
			              	 {
				        				array_push($arr1,$row);
				
   
				             }

				          return $arr1;



}


																								function get_playersheadsup_list($t,$amount)
                                                                            {

                                                                            	$arr2=array();
                                                                            	$columnname='beforematchstart'.$amount;

		                                                                        $cmd="select $columnname from headsup_plays where match_id='$t'";
		                                                                            	$result=mysql_query($cmd);
		                                                                          
			                                                                            	while($row=mysql_fetch_array($result)){
					
				                                                                            		array_push($arr2,$row);

					                                                                                                      }

					                                                                                                      return $arr2;



				                                                                                }


	function get_all_user_data()
					{
						$arr4=array();
								$cmd="select * from transaction";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr4,$row);
				

				          }

				          
						      return $arr4;



					}



					function get_user_cash_deposit($email)
					{
					$cmd="select sum(amount) as total from transaction where type='DEPOSIT' and email='$email'";
					
											$result=mysql_query($cmd);
											  while($row=mysql_fetch_array($result))
			     	{
			     					$sum=$row['total'];
					}
								return $sum;


							}








						function get_user_cash_reedem($email)
					{
					$cmd="select sum(amount) as total from transaction where type='REDEEM' and email='$email'";
					
											$result=mysql_query($cmd);
											  while($row=mysql_fetch_array($result))
			     	{
			     					$sum=$row['total'];
					}
								return $sum;


							}



							function return_affiliates_buisness()
							{
									

							}




function get_unique_heasdup_tableid()
{

			$cmd="select count(*) as count1 from headsup_tables";
			$result=mysql_query($cmd);
										$result=mysql_query($cmd);
											  while($row=mysql_fetch_array($result))
			     	{
			     					$count1=$row['count1'];
					}
					$id=$count1+1;
							return $id;


}


		

function get_all_affiliate_data()
{

		$arr1=array();
								$cmd="select * from customer where affiliate='YES'";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

			
						      return $arr1;



}



// function for getting the tramke of the registered affilaite starts herte 

			function get_affiliate_present_rake($affiliate)
			{

							$cmd="select rake_affiliate from customer where username='$affiliate'";

									 $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        $rake_affiliate=$row['rake_affiliate'];
				

				          }

				          
						      return $rake_affiliate;




			}






// functiob for getting thee rake ensd here 



													
				function return_usernames_encodings_from_headsupgroup($groupencode)
				{

								$arr1=explode('***',$groupencode);print_r($arr1);
									$code1=$arr1[0];
										$code2=$arr1[1];

								$user1=explode('$$$',$code1);
								$user2=explode('$$$',$code2);
					
											return array($user1[1],$user2[1]);


				}







function get_discount_coupon_data()
{
				$arr1=array();
								$cmd="select * from coupons_list";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				          
						      return $arr1;




}

function get_present_time()
{

			date_default_timezone_set("Asia/Calcutta");
				                          $timenow=date('y/m/d h:i:s');	
				                          return $timenow;


}





// inbsatrepoair ststistics starts here ===================================================================================


 function view_all_customers(){
$arr1=array();

$cmd="select distinct(email) from transaction";
   $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				          
						      return $arr1;






 }




  function get_all_details_by_email($email){
$arr1=array();
$cmd="select * from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				      
						      return $arr1;
						  }


						  				function get_total_orders_customer($email){


$cmd="select count(trans_id) as count1 from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				     $count1=$row['count1'];
				

				          }

				      
						      return $count1;
						  }




						  function get_total_amountpaid_customer($email){

// calculkate te he sum of amounjt paid to instare[pair by this customer



$cmd="select sum(bill) as bill1 from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				     $bill1=$row['bill1'];
				

				          }

				      
						      return $bill1;






						  }



						  // retrurn the scuistome r ka ordered dtaes fronm the webiste of instarepAIR 

						  function get_customer_ordered_dates($email){

$arr2=array();
$cmd="select pickupdate from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row['pickupdate']);

				          }

			
				      	$string=implode(',',$arr2);
						      return $string;
						  }



		  function get_customer_registereddate($email){

$arr2=array();
$cmd="select pickupdate from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row['pickupdate']);

				          }

			return $arr2[0];
						  }



function get_device_repaired_by_date($pickupdate)
{

	$cmd="select model,brand,devicetype from transaction where pickupdate='$pickupdate'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	$model=$row['model'];
	$brand=$row['brand'];
		$type=$row['devicetype'];
				          }

				          $devicestring=$brand.'- '.$model;


			return array($devicestring,$type);




}




// ********************* order detailing strats here *****************************************************

function view_all_orders_details(){

$arr2=array();
$cmd="select * from transaction order by sl desc";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row);

				          }

			return $arr2;





}



// return devoice typer ka pic 



function get_device_type_pic($devicetype){

if($devicetype=='mobile')
	return 'mobile.png';
else if($devicetype=='laptop')
	return 'lappy.png';
else if($devicetype=='desktop')
return 'pc.png';
else
return 'tablet.png';







}



function get_total_callback_on_website(){
$cmd="select count(sl) as count2 from requestacallback";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


}
			function get_total_orders_on_website(){

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='cancelled'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}



				function get_total_pending_orders_on_website(){

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='delivered' and trackstatus!='cancelled' and trackstatus!=''";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}

			function get_total_delivered_orders_on_website()
			{

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='delivered'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}


			function view_all_vendors(){
$arr1=array();
$cmd="select * from vendordetails";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;






			}



	// ALL REPAIRING RELATED FUNCTIONS OCMES HERE 



			function view_all_pricing(){


$arr1=array();
$cmd="select * from repair_costing2";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;







			}


			function view_all_buyback_request(){


$arr1=array();
$cmd="select * from buybackuser";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




			}




							function get_all_the_device_cureent_mrp_for_buyback(){

							include_app_connection_first();

$arr1=array();

$cmd="select * from device_costing";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




							}
function get_buyback_factor1(){
include_app_connection_first();
$arr1=array();

$cmd="select * from accessories_depreciation";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




}


function call_the_factor1_change($period,$depreciation,$charger,$box,$invoice,$amount_range,$sl){


include_app_connection_first();
$cmd="update accessories_depreciation set amount_range='$amount_range',charger='$charger',invoice='$invoice',ear_phone='$ear_phone',box='$box' where sl='$sl'";
$result=mysql_query($cmd);



echo 'command is '.$cmd;



}



function get_buyback_factor2(){
include_app_connection_first();
$arr1=array();

$cmd="select * from device_depreciation";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }


				

return $arr1;




}


function close_connection_close()
{
$con=@mysql_connect("localhost","abhinavuser","pass");

mysql_select_db("abhinav_test",$con);
mysql_close($con);



}


// factor 2 buy back change functoion

function call_the_factor2_change($period,$depreciation,$sl)
{
include_app_connection_first();
$cmd="update device_depreciation set period='$period',depreciation='$depreciation' where sl='$sl'";


echo 'comabnbneis'.$cmd;
$result=mysql_query($cmd);

}

function include_app_connection_first(){



$con=@mysql_connect("localhost","abhinavuser","pass");

mysql_select_db("abhinav_test",$con);


}


 function website_total_sales(){



$cmd="select sum(bill) as sum1 from transaction where status!='cancelled' and trans_id!=''";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				$sum1=$row['sum1'];

				          }

				          				return $sum1;




 }

        function sendmessage($msgborn,$phone1)
{
$phone1='';

            $username = 'amitbhalla.pwc@gmail.com';
  $hash = '97b24fe04708309ab00f51dc53944fb44ce9c93f';
  
  // Message details
  $numbers =array($phone1);
  $sender = urlencode('INSTAR');



  $message =urlencode($msgborn);
 
  $numbers = implode(',', $numbers);
 
  // Prepare data for POST request
  $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
  // Send the POST request with cURL
  $ch = curl_init('http://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
echo $response;





}


function get_bill_details($orderid)
{

  $arr1=array();
  $email=$_SESSION['email'];
      $cmd="select bill from transaction where trans_id='$orderid'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $bill=$row['bill'];
                  }
                  return $bill;


}
    function get_phone_customer_from_transaction($orderid)
                            {


                                  $cmd="select * from transaction where trans_id='$orderid'";
                                  $result=mysql_query($cmd);
                                       while($row=mysql_fetch_array($result))
                  {
                          $phone=$row['phonenumber'];
                  }
                  return $phone;

                            }

 function get_order_details($orderid)
{

	$arr1=array();
	$email=$_SESSION['email'];
			$cmd="select * from transaction where trans_id='$orderid'";
			    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                  return $arr1;


}





// ************************** FINANCIAL STATISTIOCS STARTS HERE ***********************************************************************







function all_par1_stats_by_device($par1,$devicetype)
{


		$cmd="select $par1(bill) as ret1 from transaction where devicetype='$devicetype'";
		$result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $ret=$row['ret1'];
                  }
  
                  return $ret;



}


				function amt_par1_total($par2)
				{

							$cmd="select $par2(bill) as ret1 from transaction";
		$result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $ret=$row['ret1'];
                  }



                  return $ret;


				}




		function get_this_percantage_by_total($par1,$par2){


$localstats=all_par1_stats_by_device($par2,$par1);
$globalstats=amt_par1_total($par2);

$percantage=$localstats/$globalstats*100;



return $percantage;
		}














//*************************** FINANCIAL STATS END HERE *******************************************************************************
?>