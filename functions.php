<?php 
include_once('db.php');









function get_user_all_order()
{

	$arr1=array();
	$email=$_SESSION['email'];
			$cmd="select * from booking where email='$email'";
			    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                  return $arr1;


}



function get_vendors_address($vendorcode)
{

        $arr1=array();
  $email=$_SESSION['email'];
      $cmd="select address from vendordetails where code='$vendorcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $address=$row['address'];
                  }
                  return $address;


}
    function get_vendors_name($vendorcode)
   {

        $arr1=array();
  $email=$_SESSION['email'];
      $cmd="select vendor from vendordetails where code='$vendorcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $vendorname=$row['vendor'];
                  }
                  return $vendorname;


    }
			function get_pickup_phone($pickupcode)
   {


      $cmd="select phone from pickupboy where personcode='$pickupcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $phone=$row['phone'];
                  }
                  return $phone;


    }	
      function get_pickup_name($pickupcode)
   {


      $cmd="select person from pickupboy where personcode='$pickupcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $person=$row['person'];
                  }
                  return $person;


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

        function logout_panel_users()
        {



                                      unset( $_SESSION['alloteduser']);
                                      unset($_SESSION['allotedperson']);
                                        unset($_SESSION['redirectpage']);

                                                  ?>
<script>
window.location='panels.php';

</script>

<?php


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
function get_user_profile_info()
{
				$arr1=array();
	$email=$_SESSION['email'];
			$cmd="select * from customer where email='$email'";
			    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                  return $arr1;



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





function sendmessageupdated($msgborn,$phone1)
{
$ch = curl_init();
$user="hrishabhsingh175@gmail.com:remember";
$receipientno=$phone1; 
$senderID="SHOPNE"; 
$msgtxt=$msgborn; 
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; } 
curl_close($ch);


}


function invoice_generated($orderid)
{
          $cmd="select invoice_pickup from transaction where trans_id='$orderid'";

                          $result=mysql_query($cmd);
                                                                    while($row=mysql_fetch_array($result))
                                                                    {
                                                                       $invoice_pickup=$row['invoice_pickup'];
                                                    
                                                                    }
                                                                        return $invoice_pickup;






}

function get_pay_ment_info_details($orderid)
{


      $cmd="select * from transaction where trans_id='$orderid'";
                 $result=mysql_query($cmd);

                                                                    while($row=mysql_fetch_array($result))
                                                                    {
                                                                       $bill=$row['bill'];
                                                                       $phonenumber=$row['phonenumber'];
                                                                    }
                                                                        return array($bill,$phonenumber);


}
						function get_admins_phone()
					{
		
    		              		return  '8587024270';



					}











function get_service_question_details($service)
{

	     	$arr1=array();
			$cmd="select * from service_data_form where service_type='$service'";
    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
    		              		return  $arr1;


}




              function get_support_all_orders()
              {
                        $arr1=array();
                        $cmd="select * from transaction where status !='cancelled'";

                             $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                          return  $arr1;



              }



                          function get_pickup_boys_all_orders($person)
                          {

                                     $arr1=array();
                        $cmd="select * from transaction where pickupperson='$person'";

                             $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                          return  $arr1;




                          }




function signoutuser()
{


unset($_SESSION['email']);
unset($_SESSION['name']);
?>
<script>
window.location='index.php';

</script>

<?php

}

					function get_order_id($devicetype)
								{
                          if($devicetype=='mobile' || $devicetype=='tablet')
                            $code1='MB';
                          elseif($devicetype=='laptop')
                            $code1='LP';
                          else
                            $code1='DP';


                                $code2='/';




					$cmd="select * from transaction";
					$result=mysql_query($cmd);
					$rd=mysql_num_rows($result);
				      $rd=$rd+1;
          date_default_timezone_set("Asia/Calcutta");
                          $yeardetails=date('y');
                          $prevyear=$yeardetails;
                          $nextyear=$prevyear+1;
					$orderid=$code1.$prevyear.$nextyear.$rd;
					return $orderid;



								}



                  function get_invoice_number($orderid)
                {
        
          $invoice='IN'.$orderid.'.pdf';
          return $invoice;



                }


								function getallservicedetails_panel()
								{
									$arr1=array();
									$cmd="select * from pickupboy";
									$result=mysql_query($cmd);
								  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
    		              		return  $arr1;

								}





                function get_present_time()
                {
                        date_default_timezone_set("Asia/Calcutta");
                          $time=date('y-m-d h:i:s');
                          return $time;

                }

			function register_user($name,$email,$password)
			{
				date_default_timezone_set("Asia/Calcutta");
				$time=date('y-m-d h:i:s');

$cmd="insert into customer(name,email,registration_date,password,coup1)
 	values ('$name','$email','$time','$password','FIRST200')";
				$result=mysql_query($cmd);
		
				loginfirst($email,$password);
			}

					
function loginfirst($username,$password)
{



$cmd="select * from customer where (email='$username' and password='$password' )";
$result=mysql_query($cmd);
$c=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{

//$phone=$row['phone'];
$email=$row['email'];
$name=$row['name']; 
$phone=$row['phone']; 

}

if($result)
{

$_SESSION['phone']=$phone;
$_SESSION['email']=$email;
$_SESSION['name']=$name;

}
else 
  {echo 'wrong credentials .try again';}



}

                        function loginpanelppl($username,$password)
{



$cmd="select * from  panellogins where (username='$username' and password='$password' )";
$result=mysql_query($cmd);
$c=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{

//$phone=$row['phone'];
$alloteduser=$row['alloteduser'];
$allotedperson=$row['allotedperson']; 
$redirectpage=$row['redirectpage'];
$username=$row['username'];
}

if($result)
{

$_SESSION['alloteduser']=$alloteduser;
$_SESSION['allotedperson']=$allotedperson;
$_SESSION['redirectpage']=$redirectpage;
$_SESSION['personcode']=$username;
}
else 
  {echo 'wrong credentials .try again';}



}





    function  create_user_automated_profile($name,$email)
                          {


$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }

$password=$string;

register_user($name,$email,$password);

$msg_customer="Hi ".$name." welcome to the claymango family. You can sign in the next time with your username: ".$email." password: ".$password." claymango.com";
    

                          }





                          function get_serial_dates()
                          {
                          				date_default_timezone_set("Asia/Calcutta");
				$today=date('d-m-Y');

				$lastday= strtotime("+4 days", strtotime($today));
                   $lastday= date("d-m-Y", $lastday);


		
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
        $array[] = $date->format('d-m-Y'); 
    }

    return $array;
}



//========================= FIRST WEBISTE TRANSACTIONAL REWAMPING PART ============= 

function return_updated_function($table,$column)
{
    $cmd="slect $column from $table";
        $result=mysql_query($cmd);
$c=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{

    $value=$row['$column'];



}

return $value;





}


function calculate_device_cost($brandname,$modelname)
{



include_app_connection_first();

      $cmd="select costing from device_costing where model='$modelname' and brand='$brandname'";
        $result=mysql_query($cmd);
$c=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{

    $value=$row['costing'];



}

return $value;




}





    function calculate_dead_phone_costing($costing)
    {



      
if($costing<=8000)
{

  $costingstring='0-8000';
}elseif($costing>8000 && $costing<=12000)
            {
          $costingstring="8000-12000";
        }
            elseif($costing>12000 && $costing<=18000)
        {
              $costingstring='12000-18000';

        }
         elseif($costing>18000 && $costing<=25000){


           $costingstring='18000-25000';

         }elseif($costing>25000 && $costing<=32000){


           $costingstring='25000-32000';

         }elseif($costing>32000 && $costing<=40000){


           $costingstring='32000-40000';

         }
         elseif($costing>50000 && $costing<=65000){


           $costingstring='50000-65000';

         }elseif($costing>650000){


           $costingstring='65000+';

         }



include_app_connection_first();

  $cmd="select * from dead_phone_costing where pricerange='$costingstring'";
                       $result=mysql_query($cmd);

while($row=mysql_fetch_array($result))
{

    $value=$row['price'];



}


        return $value;

}
    

function get_buyback_orderid()
{
        $cmd="select * from buybackuser";
          $result=mysql_query($cmd);
          $rd=mysql_num_rows($result);
              $rd=$rd+1;
              $code1='BB';
          date_default_timezone_set("Asia/Calcutta");
                          $yeardetails=date('y');
                          $prevyear=$yeardetails;
                          $nextyear=$prevyear+1;
          $orderid=$code1.$prevyear.$nextyear.$rd;
          return $orderid;
}

      function get_depreciation_value($deviceage,$costing)
      {
          $cmd="select depreciation from device_depreciation where period='$deviceage'";
                  $result=mysql_query($cmd);
$c=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{

    $depreciationpercent=$row['depreciation'];



}

$depreciationamount=$depreciationpercent/100*$costing;

$newvalue=$costing-$depreciationamount;

return $newvalue;



      }
// function for decrementing the cosing depeniding on the accessorires heis having 


      function get_accessories_reducing($box,$charger,$invoice,$ear_phone,$costing)
      {   
        if($costing>80000)
        {
          $costingstring="More than 80000";
        }
         elseif($costing>50000 && $costing<=80000)
        {
          $costingstring="50000-80000";
        }
        elseif($costing>40000 && $costing<=50000)
        {
          $costingstring="40000-50000";
        }
           elseif($costing>32000 && $costing<=40000)
            {
          $costingstring="32000-40000";
        }
               elseif($costing>25000 && $costing<=32000)
            {
          $costingstring="25000-32000";
        }
         elseif($costing>18000 && $costing<=25000)
            {
          $costingstring="18000-25000";
        }
        elseif($costing>12000 && $costing<=18000)
            {
          $costingstring="12000-18000";
        }
            elseif($costing>8000 && $costing<12000)
            {
          $costingstring="8000-12000";
        }
            elseif($costing>0 && $costing<8000)
        {
              $costingstring='less than 8000';

        }
      

// now caluclate the costing inaccordance wth the avaailable accesorries
include_app_connection_first();
            $cmd="SELECT * FROM `accessories_depreciation` where amount_range='$costingstring'";
            $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {

                      $chargercost=$row['charger'];
                      $boxcost=$row['box'];
                      $earphonecost=$row['ear_phone'];
                      $invoicecost=$row['invoice'];




                  }


// now derement these sumogf maounts from the user costing 

$decrementsum=0;
if($box!='apply')
{

  $decrementsum+=$boxcost;

}
if($charger!='apply')
{

  $decrementsum+=$chargercost;

}
if($ear_phone!='apply')
{

  $decrementsum+=$earphonecost;

}
if($invoice!='apply')
{

  $decrementsum+=$invoicecost;

}


return $decrementsum;




      }






// *************************************************************************************************************************************************************
// newly added functions for the  android application interface starts here 

function add_app_side_vendor_allotment($vendorcode,$orderid){





list($model,$brand,$problem)=get_this_orderid_devicename($orderid);

$devicename=$brand.' '.$model;




include_app_connection_first();
$cmd="insert into process(VenderId,SRN,Problem,Modelname) values ('$vendorcode','$orderid','$problem','$devicename')";
$result=mysql_query($cmd);


echo $cmd;


}


function get_this_orderid_devicename($orderid){

$cmd="select model,brand,problem from transaction where trans_id='$orderid'";
$result=mysql_query($cmd);

echo $cmd;
while($row=mysql_fetch_array($result))
{

$model=$row['model'];
$brand=$row['brand'];
$problem=$row['problem'];
}
  
        return array($model,$brand,$problem);




}






function include_app_connection_first(){



$con=@mysql_connect("localhost","abhinavuser","pass");

mysql_select_db("abhinav_test",$con);


}
function test1()
{

include_app_connection_first();

$cmd="insert into process(VenderId,SRN,Problem,Modelname) values ('$vendorcode','$orderid','$problem','$devicename')";
$result=mysql_query($cmd);echo $cmd;




}




          
                                                                  function getallvendordetails()
                                                                  {


                                                                    // application side database required
                                                                      include_app_connection_first();
                                                                           $arr1=array();
                                        
                                                        $cmd="select * from venderuser";
                                                           $result=mysql_query($cmd);echo 'copmmand is '.$cmd;

                                                                    while($row=mysql_fetch_array($result))
                                                                    {
                                                                       array_push($arr1,$row);
                                                                    }
                                                                   return $arr1;




                                                                  }












//************************************************************************************************************
// newly added funbction for the android applicatuion ends here ===========================================

?>