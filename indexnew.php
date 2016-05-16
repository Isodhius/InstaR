<?php 
include('functions.php');
require('pdf/fpdf.php');



	if(isset($_GET['submit_transaction']))
{
         $problemid=$_GET['problemid'];
	$brandname2=$_GET['brandname2'];
	$model=$_GET['model'];
		$devicetype=mysql_real_escape_string($_GET['devicetype']);
	$phone2=mysql_real_escape_string($_GET['phone2']);
		$pickupaddress=mysql_real_escape_string($_GET['pickupaddress']);
			$freedate=mysql_real_escape_string($_GET['freedate']);
				$freetime=mysql_real_escape_string($_GET['freetime']);
					$name2=mysql_real_escape_string($_GET['name2']);
					$_SESSION['visitorsname']=$name2;
						$email2=mysql_real_escape_string($_GET['email2']);
				$trans_id=get_order_id($devicetype);

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype,problem) values 
('','$trans_id','$name2','$email2','$phone2','$pickupaddress','$freetime','$freedate','$brandname2','$model','$devicetype','$problemid')";

			$result=mysql_query($cmd);


$_SESSION['transaction_id']=$trans_id;


//ordre details to the insta team 

 $link="www.instarepair.in/panels.php";
$otp='2222';
$msgadmin="New order at instarepair Transaction ID: ".$trans_id." customer : ".$name2." device ".$devicetype." address : ".$pickupaddress." contact number : ".$phone2." . Confirm here : ".$link;
$phoneadmin=get_admins_phone();
sendmessage($msgadmin,$phoneadmin);

//acknowledgement sms to the customer
$msgcustomer="congratulations ".$name2." ! your order has been processed with Transaction ID : ".$trans_id." .You will be contacted soon by our executive.
";

sendmessage($msgcustomer,$phone2);





// sending the mesaage format to the customer 



		//	$customermsg="Congratulations ".." ! Your request for mobile repair has been processed . Transaction ID : %%|transactionid^{"inputtype" : "text", "maxlength" : "40"}%%, Order details : %%|devicebrand^{"inputtype" : "text", "maxlength" : "25"}%%, . Pick Up address- %%|address^{"inputtype" : "text", "maxlength" : "50"}%%, Your device will be picked up between %%|freetime^{"inputtype" : "text", "maxlength" : "40"}%% by %%|pickupboy^{"inputtype" : "text", "maxlength" : "40"}%%.";

//$customermsg="Dear ".$name2." your Order id: ".$trans_id." is placed successfully, Total bill: ".$customermsg."";
//sendmessage($customermsg,$phone2);









}

						if(isset($_POST['sendotp']))
{
	$phone=$_POST['phone2'];

	$otpcode=rand(1111,9999);
	$_SESSION['otpcode']=$otpcode;
	$msgborn="User your online verfication code is ".$otpcode." .Please enter and verify your order.";
		sendmessage($msgborn,$phone);
}




						if(isset($_POST['requestacallback']))
						{
							$phone=$_POST['phone1'];
							$caller=$_POST['caller'];
							// message to the admin
							$msgborn="Hi Instarepair a new call back request from Contact : ".$phone." and Customer : ".$caller." .Call back.";
							$adminphone=get_admins_phone();
							sendmessage($msgborn,$adminphone);

							//ACK message to the customer


						$msgborn="Dear User, we have noted your number. You will be contacted soon by Instarepair executive.";
							
							sendmessage($msgborn,$phone);




							// updating the values to the database 

							$time2=get_present_time();
	$cmd="insert into requestacallback(caller,phonenumber,time) values ('$caller','$phone','$time2')";
					$result=mysql_query($cmd);
						}


						if(isset($_POST['submitlogin']))
{
								$username=$_POST['username'];
								$password=$_POST['password'];
					loginfirst($username,$password);


}



											if(isset($_POST['submitregister']))
{
								$name1=$_POST['name1'];
								$email1=$_POST['email1'];
								$password1=$_POST['password1'];
							
								$password2=$_POST['password2'];
					register_user($name1,$email1,$password1);


}



?>






<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Admin -Instarepair</title>

    <link rel="shortcut icon" href="favicon.ico" />

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css?1422585377" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="n" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
								<script>
									$(document).ready(function () {
										//Initialize tooltips
										$('.nav-tabs > li a[title]').tooltip();
										
										//Wizard
										$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

											var $target = $(e.target);
										
											if ($target.parent().hasClass('disabled')) {
												return false;
											}
										});

										$(".next-step").click(function (e) {

											var $active = $('.wizard .nav-tabs li.active');
											$active.next().removeClass('disabled');
											nextTab($active);

										});
										$(".prev-step").click(function (e) {

											var $active = $('.wizard .nav-tabs li.active');
											prevTab($active);

										});
									});

									function nextTab(elem) {
										$(elem).next().find('a[data-toggle="tab"]').click();
									}
									function prevTab(elem) {
										$(elem).prev().find('a[data-toggle="tab"]').click();
									}
								</script>

<style type="text/css">

h4{

	margin-bottom: 24px;
}
	@media screen and (min-width:00px){




		.phone_number_hidden{



			    font-family: calibri;
    color: #C58F00;
    font-size: 21px;
    font-weight: bold;
    margin-left: -10%;
		}
.service_icons{

}


.yellow_service_title{
text-align: center;
margin-top: 12px;	background: #F4B912;
    color: black;
    font-weight: bold;
    padding: 11px;
}

.service_box{
	min-height: 300px;
    /* background: red; */
    border: 2px #F4B912 groove;
}
a.a_button:hover{

	color:white;
}
a.a_button{

	color:black;
}
.device_pic{

    width: 31%;
    max-width: 96px;
    float: left;
    min-width: 70px;

}
div#yellow_tab_outline {

border: 1px groove black;
  background:white;
    height:120px;    color: black;
    padding-top: 24px;
    font-weight: bold;
 font-size: 28px;
    border: 1px groove #FBB900;
}
div#yellow_tab_outline:hover{

    background: #F4B912;
color: white;

}div#yellow_tab {
    background: #F4B912;
    height:80px;
    padding-top: 24px;
    font-weight: bold;color: white;
    font-size: 17px;
}
div#yellow_tab:hover{
    background:black;
    		color: white;
}


.phonehover:hover{


	border-bottom: none;
}
a.a_foot_li{
    color:white;
    font-size:12px;
    font-family: helvetica;
}

.social_icons:hover{


	-webkit-transform: rotate(360deg) scale(1.0);
	-moz-transform:    rotate(360deg) scale(1.0);
	-o-transform:      rotate(360deg) scale(1.0);
	-ms-transform:     rotate(360deg) scale(1.0);
}



.panel-heading{

	background: #DCA644;
}

   .foot_list{
                                text-align: initial;

            }

a:visited{

	text-decoration: none;
}
label {
    margin: 2px;
    font-size: 13px;
    color: #fff;
}

										media="all"
.hvr-shutter-in-vertical:before {






background: black;





	}


.top_tab_buttons{

	border:2px black groove;
	background: white;
	color: black;

}
.top_tab_buttons:hover{

	    background: black;
    color: white;
    padding: 6px;
}



.top_tab_buttons:visited{

	    background: red;
    color: white;
    padding: 6px;
}
.text_fld1{

	    padding-left: 17px;
    background: transparent;
    /* background: orange; */
    width: 200px;
    height: 31px;    text-align: center;
    border: 1px groove black;
    font-size: 12px;
    color: #5F5959;
        margin-top: 24px;
    margin-bottom: 5px; 
}





				.round_circle:hover{
 
						

background: #D8D5D5;

				}
			



										img.image_devices{
    margin-top: 38px;
    width: 75px;
    margin-left: 48px;



										}





										.service_desc{
											font-family: helvetica;
    font-size: 13px;
    margin-top: 16px;
    color: #000000;
    font-weight: bold;
										}


										.service_ul{
													    font-family: helvetica;
    font-size: 13px;
    color: #717070;
    margin-top: 21px;

										}


										.repair_title{

											font-weight: bold;
											margin-bottom: 12px;
										}





		/* new set of css is here ===================== */


.service_text {
    text-transform: capitalize;
    font-size: 13px;
    text-align: center;    color: black;
    font-family: calibri;
    font-weight: 700;
    line-height: 20px;
}
		.why_insta_pics{

			    width: 75px;

		}
		div#yellow_tab {
    background: #F4B912;
    height: 55px;
    border-radius: 14px;
    margin-bottom: 16px;
padding-top: 17px;
    font-weight: bold;
    font-size: 17px;
}
div#yellow_tab_outline {
    border: 1px groove black;
    background: white;
    height: 78px;
    padding-top: 24px;
    font-weight: bold;
    font-size: 11px;margin-bottom: 13px;
    border: 1px groove #FBB900;
}
.device_pic {
    width: 24%;
    max-width: 96px;
    float: left;
    min-width: 52px;
}

.insta_pics{



}

div#insta_servicestab {
      margin-top: 61vw;
}



   }

@media (max-width: 320px){
.banner-info {
     margin-top: 112px;
}

}


										@media screen and (min-width:300px){

                                         .repairbuttonul{


												  margin-top: 30vw;
											}

	                                  			    	.top_tab_buttons{ 
                                              font-size: 12px;
                                                padding: 5px;
                                            }
											#servicecontainer{



												      padding-left: 18vw;
											}

.servicename {
    color: black;
    margin-left: 35px;
    line-height: 41px;
    margin-top: 17px;
    font-weight: bold;
}
											img.image_devices {
    margin-top: 19px;
    width: 52px;
    margin-left: 33px;
    color: black;
}


.round_circle{

	    border: 1px dotted black;
    margin-right: 13px;
    width: 120px;
    height: 120px;
    padding-top: 2px;
    margin-bottom: 17px;
    background: none;
    vertical-align: middle;
    font-size: 12px;
    border-radius: 62px;
}


.banner {
    background: url('img/boy1.gif');
    /* max-width: 650px; */
    background-position: 9% 202px;
    background-size: 75%;
    background-repeat: no-repeat;
}
.buttons ul li a {



											    background: black;
    border-radius: 3px;
    padding: 6px;
    margin-left: 38vw;
    font-size: 13px;



}


										










										}


				@media screen and (min-width:340px){
.banner-info{



	    margin-top: 112px;
}



	}




				@media screen and (min-width:500px){

.banner{

	    background-position: 9% 288px;
    background-size: 78%;
}
						div#yellow_tab_outline {


									font-size: 15px;
										    font-size: 15px;
    width: 230px;

						}


								.device_pic {
    width: 24%;
    /* max-width: 96px; */
    float: left;
    min-width: 63px;
    margin-left: 14%;
    margin-top: -9px;
}









				}






											@media screen and (min-width:800px){




												.phone_number_hidden{


													display: none;
												}

													    	.top_tab_buttons{
                                              font-size: 16px;
                                                padding: 15px;
                                            }
											#servicecontainer{



												    padding-left:0vw;
											}


											.banner{
											    background-position: 9% 336px;
                                               background-size: 77%;
											}


.buttons ul li a {


       padding: 17px;

}


										






										}

@media screen and (min-width:750px){

div#yellow_tab_outline {
    font-size: 15px;
    font-size: 15px;
    /* width: 230px; */
    height: 109px;
}

}


@media screen and (min-width:1000px){

.banner {
    background-size: 602px;
    
        background-size: 509px;
    background-position: 296px 405px;
    height: 717px;
}
.device_pic {
    width: 41%;


}


.service_text {
    text-transform: capitalize;
    font-size: 24px;

    }
.why_insta_pics {
    width: 139px;
}
div#yellow_tab_outline {
    font-size: 15px;
    font-size: 20px;
    }
div#gadget_id_container{

	height: 123px;
}
.banner-info {
    margin-top: 70px;    margin-top: 152px;
}

div#yellow_tab {
			border-radius: 0px;
	}
div#devices_id{


    width: 970px;
 
    height: 100px;
    margin-top: 23px;

}
div#insta_servicestab {
    margin-top: 1vw;
}

.banner{
  

    background-position: 296px 441px;
}
											.repairbuttonul{


												  margin-top: 40vw;
											}

.servicename {
    color: black;
    margin-left: 45px;
    font-size: 18px;
    line-height: 41px;
    margin-top: 17px;
    font-weight: bold;
}

img.image_devices {
    margin-top: 31px;
    width: 66px;
    margin-left: 46px;
    color: black;
}
													.round_circle {
	    border: 1px dotted black;
    margin-right: 13px;
    width: 160px;
    height: 160px;
    padding-top: 2px;
    margin-bottom: 17px;
    background: none;
    vertical-align: middle;
    font-size: 12px;
    border-radius: 90px;
}




.buttons ul li a {

				font-size: 19px;
       padding: 27px;

}
}


												@media screen and (min-width:1200px){

.banner {
  background-size: 676px;
    background-position: 503px 390px;
    height: 833px;
}

																div#yellow_tab {
    border-radius: 0px;
}


div#yellow_tab {
    background: #F4B912;
    height: 91px;
    border-radius:0px;
    margin-bottom: 16px;
    padding-top: 33px;
    /* font-weight: bold; */
    font-family: calibri;
    font-size: 24px;
}
}





										@media screen and (min-width:1400px){



                                         .repairbuttonul{


												  margin-top: 30vw;
											}
										}

</style>

<script type="text/javascript">



function add_problem_description()
{
	var devicetype=document.getElementById('devicetype').value;
	// getting the problem description
var problem1;
if(devicetype=='mobile')
{

	problem1=document.getElementById('mobile_tab_problems').value;
}
else if(devicetype=='desktop')
{

	problem1=document.getElementById('pc_problems').value;
}else if(devicetype=='laptop')
{

	problem1=document.getElementById('laptop_problems').value;
}else if(devicetype=='tablet')

	problem1=document.getElementById('mobile_tab_problems').value;

document.getElementById('problemid').value=problem1;


//
}





function get_problem_dropdown(a)
{

		document.getElementById('mobile_tab_problems').style.display='none';
				document.getElementById('pc_problems').style.display='none';
						document.getElementById('laptop_problems').style.display='none';


		document.getElementById(a).style.display='block';



}
</script>
<style type="text/css">

::-webkit-scrollbar {
    width:10px;
}
::-webkit-scrollbar-track {
    background-color: #eaeaea;
    border-left: 1px solid #ccc;
}
::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
::-webkit-scrollbar-thumb:hover {
    background-color:grey;
}

</style>

</head>
<body onload="">
<?php include_once("analyticstracking.php") ?>


	<!-- ======= loader gif starts here =================================================== -->

		




	<!-- ============ loader gif starts here ============================================= -->

<div class="banner" style="">
<?php 

include('header1.php');

?>
	<div class="container">


<!-- the hiddenb text -->

		<div class="banner-info" style='display:non5e'>



				<h3 style='color:black;text-transform:capitalize;font-weight:boldlfont-family: helvetica;'>Quickest way to repair your gadget 
<br>

<!-- ====== for small device hidden phone numbers -============== -->

<a href="tel:81 00 75 75 75 "  data-rel="external" style="" class='phone_number_hidden' >
					<img src="img/phone1.gif" style='max-width:32px' >	81 00 75 75 75 
</a>


<!--- =============== for small devices hidden phone numbers ========================= -->


				<span style='color:#DCA644;display:none;'>

					<strong style='color: black;
    text-transform: lowercase;'>#Go</strong>INSTAREPAIR</span>
</h3>

</div>
</div>

<!-- new option selection is here =============== -->
<div class='container' id='insta_servicestab'>

	<center>





							<div class='col-md-3'>
	<div id='yellow_tab' onmouseover="change_button_font_color_hover('a_button_repairprice')" 
    onmouseout="change_button_font_color_mouseout('a_button_repairprice')" >
				<a href="calculate-mobile-computers-repair-costing" class='a_button' id="a_button_repairprice">
		REPAIR PRICE

	</a>
	</div>
					</div>






							<div class='col-md-3'>
	<div id='yellow_tab' onmouseover="change_button_font_color_hover('a_button_repair')" 
    onmouseout="change_button_font_color_mouseout('a_button_repair')" >
<a href="#"  data-toggle="modal" id='a_button_repair'  class='a_button' data-target="#bookrepair" >
		BOOK REPAIR

	</a>
	</div>
					</div>




							<div class='col-md-3'>
	<div id='yellow_tab' onmouseover="change_button_font_color_hover('a_button_callback')" 
    onmouseout="change_button_font_color_mouseout('a_button_callback')" >

				<a data-target="#requestacallback" class='a_button' id='a_button_callback'  data-toggle="modal">
		REQUEST A CALLBACK

	</a>
	</div>
					</div>


					<div class='col-md-3'>
	<div id='yellow_tab' onmouseover="change_button_font_color_hover('a_button_sellused')" 
    onmouseout="change_button_font_color_mouseout('a_button_sellused')" >
					<a href="sell-your-mobile-laptop-gadgets-at-the-best-prices" class='a_button' id='a_button_sellused'>
		SELL USED GADGET

	</a>
	</div>
					</div>

</center>








	</div>



<!-- ===== nerw option selection is here  =========================== -->

		</div>


<!-- ======= the hidden tect ends here ============== -->






<!-- ===== the lower bannner devices profiling starts here ================= -->


<div class='container' id='gadget_id_container' style=''>

	<center>




<a href="#"  data-toggle="modal" id='a_button_repair'  class='a_button' data-target="#services_cellphone" >
				<div class='col-md-3 col-sm-12 col-xs-6'>
	<div id='yellow_tab_outline'>
			<span >
<img src="img/MOBILE-REPAIR.png" class='device_pic' style='  '>
			</span>

		MOBILE <br>REPAIR
	</div>
					</div>
				</a>






<a href="#"  data-toggle="modal" id='a_button_repair' data-target="#service_tablet" >
					<div class='col-md-3 col-sm-12 col-xs-6'>
	<div id='yellow_tab_outline'>
			<span >
<img src="img/TABLET-REPAIR.png" class='device_pic' style='  '>
			</span>

		TABLET <br>REPAIR
	</div>
					</div>
</a>


				<a href="#"  data-toggle="modal" id='a_button_repair' data-target="#services_laptop" >			
						<div class='col-md-3 col-sm-12 col-xs-6'>
	<div id='yellow_tab_outline'>
			<span >
<img src="img/LAPTOP-REPAIR.png" class='device_pic' style='  '>
			</span>

		LAPTOP <br>REPAIR
	</div>
					</div>
				</a>


					


<a href="#" id='a_button_repair'  data-toggle="modal" data-target="#services_desktop" >

							<div class='col-md-3 col-sm-12 col-xs-6'>
	<div id='yellow_tab_outline'>
			<span >
<img src="img/DESKTOP-REPAIR.png" class='device_pic' style='  '>
			</span>

		DESKTOP <br>REPAIR
	</div>
					</div>
					<a/>

</center>








	<div>



<!-- ===== nerw option selection is here  =========================== -->



<!-- ======= the hidden tect ends here ============== -->



		<div class="buttons">
			<ul style="  " class="repairbuttonul">

			
			</ul>
			
		</div>
	</div>

	</div>

<!--=== the lower baaner devices profilig ends here ===================== -->





<!--- the features of instarepair container starts here ================ -->
<div class='container' style='    min-height: 300px;
    /* background: red; */
    border: 2px #F4B912 groove;
    padding-bottom: 5vw;
    margin-bottom: 11vw;' class='service_box'>

			<div class='yellow_service_title'>

						WHY INSTAREPAIR ?


			</div>	




<!---  frirst row of features starts here ================================ -->
<div class='row'>

           <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/Warranty.png' class='why_insta_pics' style='max-width: 105px;width:80px;
    margin-bottom:20px;'>

		</span><br>

		<strong class='service_text'>3 months<br> warranty </strong>

		</div>
				</div>



		


		     <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/whyinstarepairicons/Free-pic-up.png' class='why_insta_pics'>

		</span><br>

		<strong class='service_text'>Free Pickup and drop </strong>

		</div>
				</div>



	     <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/whyinstarepairicons/Stand-by-phone.png' class='why_insta_pics'>

		</span><br>

		<strong class='service_text'>Free stand-by <br> Mobile</strong>

		</div>
				</div>


</div>

<!-- ==== first row of features ends here ================================ -->


<!---  fsecond row of features starts here ================================ -->
<div class='row' style='    margin-top: 4vw;'>

        <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/whyinstarepairicons/12-hrs-repair.png' class='why_insta_pics'>

		</span><br>

		<strong class='service_text'>12 hours <br>Repair </strong>

		</div>
				</div>



		


			     <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/whyinstarepairicons/Data-security.png' class='why_insta_pics'>

		</span><br>

		<strong class='service_text'>Data Security </strong>

		</div>
				</div>



     <div class='col-md-4 col-sm-4 col-xs-4 text-center'>

	<div class='service_overall_box'>

	<span style="" class='service_icons'>
<img src='img/whyinstarepairicons/Cash-on-delivery.png' class='why_insta_pics'>

		</span><br>

		<strong class='service_text'>Cash on <br> Delivery</strong>

		</div>
				</div>


</div>

<!-- ==== second row of features ends here ================================ -->



</div>


<!-- ==== the features for the instarepair ends here ======================= -->









<!-- ================= new footer ends here ==================================================================== -->







<?php 

include('footer2.php');

?>











<!-- =========================== for requesting a callback ================================================================= -->


<div class="modal fade" id="requestacallback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
														
													</a>
												</li>

												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
														
													</a>
												</li>
									
											</ul>
										</div>

										<span id='loaderprocess' style='display:none;font-weight:bold'>....Loading .Please wait !</span>

						<span id='enquirysent' style='display:none;font-weight:bold'>
							Congratulations ! enquiry sent .You will soon recieve a phone call by our service people . 
						</span>
										<form role="form" action='#' method='post' id='request_a_callback_form'>
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>

																<div class="mobile-right">
															<h4 style="color:black">Enter your full name</h4>
															

							<input type="text" id='caller' name="caller" style="border:1px groove black;color:black;    margin-left:8%;" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
														</div>
														<div class="mobile-right">
															<h4 style="color:black">Enter your mobile number</h4>
															

							<input type="text" id='phoneenquiry1' maxlength='10' name="phone1" style="border:1px groove black;color:black;    margin-left:8%;" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
														</div>
														
													</div>
													<ul class="list-inline">
									<li><input type="submit" id='requestacallbackid' style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step" name="requestacallback"></li>
													</ul>
												</div>
								
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== requersting a callback ================================================================================ -->






<!-- =========================== for chnagimg your delivery location if any  ================================================================= -->
<?php 

if(isset($_GET['confirmdelivery']))
{
	$orderid=$_GET['confirmdelivery'];
		$getdetails=get_order_details($orderid);



}
?>

<div class="modal fade" id="calldelivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="<?php 


?>;opacity:1">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
									



<span id='deliverysent' style='font-weight:bold;color:maroon;display:none'>
	Delivery address updated ! Your device will be successfuly delivered to your address shortly.
</span>
				<form role="form" action='#' method='post' id='delivery_change_form'>
											
<span  style='font-weight:bold'>
	Congratulations ! <?php echo $getdetails[0]['customer']; ?> .Your <?php echo $getdetails[0]['devicetype']; ?>, has been repaired properly .<br>
	Please edit or confirm below.
</span>


											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<div class="mobile-grids">
														
														<div class="mobile-right">
															<h4 style="color:black">Your Delivery address :</h4>
<input type="text" id='orderdeliveryid' style='display:none' name="orderiddelivery" value="<?php echo $_GET['confirmdelivery'];?>" >		

							<input type="text" id='addressdeliveryid' name="address1" value="<?php echo $getdetails[0]['pickupaddress'];?>" style="border:1px groove black;color:black;    margin-left:8%;" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
														</div>
														
													</div>
													<ul class="list-inline">
			<li><input type="button" name='changedeliveryaddress' onclick="change_delivery()" id='changedeliveryaddress' style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step" ></li>
													</ul>
												</div>
								
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== chnagimg your delivery location if any  ================================================================================ -->





							



<!-- =========================== track your order section starts here  ================================================================= -->


<div class="modal fade" id="trackorder1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
														
													</a>
												</li>

												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
														
													</a>
												</li>
									
											</ul>
										</div>
						
										<form role="form" action='#' method='post' id='request_a_callback_form'>
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<div class="mobile-grids">
													
														<div class="mobile-right">
															<h4 style="color:black">Enter your Transaction Id</h4>
															
           <span id='showorderstatus'></span>
							<input type="text" id='transactionorder1' style="border:1px groove black;color:black;    margin-left:8%;" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
														</div>
														
													</div>
													<ul class="list-inline">
									<li><a href='javascript:void(0)'  style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step" id="trackmyorder" onclick="trackmyorder()">TRACK</a></li>
													</ul>
												</div>
								
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================track your order section ends  here  ================================================================================ -->











<!-- =========================services mobile phone WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="services_laptop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						

<span class='repair_title'>Laptop Repair</span><br><br>
											<p style="color:black;    color: #777;font-family:roboto;font-family: roboto;
    font-size: 13px;
    color: #787878;
    font-weight: bold;
    font-size: 13px;">
			

								<span class='service_desc'>

We understand how bothered you are when you can’t edit your spreadsheet to change the budget, or play dota or give your picture that perfect tone just because your laptop is not working. At Instarepair we strive to provide best quality and affordable repair for your Laptop. Instarepair uses best quality spare parts and ensures data security and offer quality and reliable repair. Further to ensure peace of mind Instarepair is offering 3 months warranty on every repair. Be it simple problem like laptop not charging or camera not working to complex chip level repair on motherboard. Our team of expert engineers are capable of carrying out repair diligently. Further we provide you the convenience of pickup and drop of your Laptop at your preferred location and your preferred time so that your busy life doesn’t get interrupted and the best part is Pickup and Delivery is free of cost.
So just give us a chance to serve you!			



		









												</p>







								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== services mobile phone ENDS HERE ================================================================================ -->







<!-- =========================services desktop WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="services_desktop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						

<span class='repair_title'>Desktop Repair</span><br><br>
											<p style="color:black;    color: #777;font-family:roboto;font-family: roboto;
    font-size: 13px;
    color: #787878;
    font-weight: bold;
    font-size: 13px;">
			

								<span class='service_desc'>



									We understand how bothered you are when you can’t edit your spreadsheet to change the budget, or play dota or give your picture that perfect tone just because your laptop is not working. At Instarepair we strive to provide best quality and affordable repair for your Laptop. Instarepair uses best quality spare parts and ensures data security and offer quality and reliable repair. Further to ensure peace of mind Instarepair is offering 3 months warranty on every repair. Be it simple problem like laptop not charging or camera not working to complex chip level repair on motherboard. Our team of expert engineers are capable of carrying out repair diligently. Further we provide you the convenience of pickup and drop of your Laptop at your preferred location and your preferred time so that your busy life doesn’t get interrupted and the best part is Pickup and Delivery is free of cost.

So just give us a chance to serve you!
                               </span>	



		









												</p>







								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== services desktop phone ENDS HERE ================================================================================ -->










<!-- =========================services phone WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="services_cellphone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						

<span class='repair_title'>Cellphone Repair</span><br><br>
											<p style="color:black;    color: #777;font-family:roboto;font-family: roboto;
    font-size: 13px;
    color: #787878;
    font-weight: bold;
    font-size: 13px;">
			

								<span class='service_desc'>We understand how bothered you are when your friends and family are not just a call away and you cant access your favorite app as your phone is not working. At Instarepair we strive to provide best quality and affordable repair for your smartphone. Instarepair uses best quality spare parts and ensures data security and offer quality and reliable repair. Further to ensure peace of mind Instarepair is offering 3 months warranty on every repair. Be it simple problem like phone not charging or camera not working to complex chip level repair on motherboard. Our team of expert engineers are capable of carrying out repair diligently. Further we provide you the convenience of pickup and drop of your phone at your preferred location and your preferred time so that your busy life doesn’t get interrupted and the best part is Pickup and Delivery is free of cost.

So just give us a chance to serve you!
                               </span>	

												</p>







								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== services  phone ENDS HERE ================================================================================ -->








<!-- =========================services Tablet WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="service_tablet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						

<span class='repair_title'>Tablet Repair</span><br><br>
											<p style="color:black;    color: #777;font-family:roboto;font-family: roboto;
    font-size: 13px;
    color: #787878;
    font-weight: bold;
    font-size: 13px;">
			

								<span class='service_desc'>We understand how bothered you are when you can’t read your favorite e books or read your favorite blogs just because your Tablet is not working. At Instarepair we strive to provide best quality and affordable repair for your Tablets. Instarepair uses best quality spare parts and ensures data security and offer quality and reliable repair. Further to ensure peace of mind Instarepair is offering 3 months warranty on every repair. Be it simple problem like tablet not charging or camera not working to complex chip level repair on motherboard. Our team of expert engineers are capable of carrying out repair diligently. Further we provide you the convenience of pickup and drop of your Laptop at your preferred location and your preferred time so that your busy life doesn’t get interrupted and the best part is Pickup and Delivery is free of cost.

So just give us a chance to serve you!
                               </span>	








								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== services Tablet ENDS HERE ================================================================================ -->








<!-- ========================= services laptop WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="service_tablet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						

<span class='repair_title'>Tablet Repair</span><br><br>
											<p style="color:black;    color: #777;font-family:roboto;font-family: roboto;
    font-size: 13px;
    color: #787878;
    font-weight: bold;
    font-size: 13px;">
			

								<span class='service_desc'>	We understand how bothered you are when you can’t read your favorite e books or read your favorite blogs just because your Tablet is not working. At Instarepair we strive to provide best quality and affordable repair for your Tablets. Instarepair uses best quality spare parts and ensures data security and offer quality and reliable repair. Further to ensure peace of mind Instarepair is offering 3 months warranty on every repair. Be it simple problem like tablet not charging or camera not working to complex chip level repair on motherboard. Our team of expert engineers are capable of carrying out repair diligently. Further we provide you the convenience of pickup and drop of your Laptop at your preferred location and your preferred time so that your busy life doesn’t get interrupted and the best part is Pickup and Delivery is free of cost.

So just give us a chance to serve you!
                               </span>	





												</p>







								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== services laptop ENDS HERE ================================================================================ -->











<!-- =========================== THE FAQ WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						


<center style="    font-weight: bold;
    margin-bottom: 25px;
    color: black;">FREQUENTLY ASKED QUESTIONS</center>
			 <div class="panel-group">



    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">1. What is Instarepair ?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">      Instarepair has been launched with the vision of providing impeccable and instant repair experience to the India Customers, they are not used to.</div>
  
      </div>
</div>



    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">2. What does the repair price estimate include? Does it include just the labor?</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">The repair price estimate we give you includes parts and labor.</div>
  
      </div>
</div>











    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">3. Am I expected to pay for the repair before or is payment due upon receipt?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Since every kind of repair we perform is different, payment is due upon receipt.</div>
  
      </div>
</div>






    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse5">4. Can ISPL backup data on my device?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Yes!<br>
If you want to backup data stored on your device, you have come to the right place! ISPL technicians are fully capable of backing up data to ensure you don’t lose any of it.
</div>
  
      </div>
</div>





							    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse5">5. Will my repair cause data loss on my device?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Yes!<br>
Sometimes certain damage your electronic device receives may cause data loss, but nothing that the ISPL technicians do will cause loss of data.
</div>
  
      </div>
</div>
				
		
																		
							    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse6">6. If I currently have a warranty protection on my device, will any repairs you do make my warranty void?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Yes!<br>
When your item becomes damaged, your warranty protection becomes void.
</div>
  
      </div>
</div>


	



 <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse7">7. Are the repair technicians at Instarepair able to repair a water damaged phone?</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">Yes!<br>
There is  very high success rate in Instarepair technicians being able to restore electronic devices that have suffered water damage.
</div>
  
      </div>
</div>





















      </div>
</div>




								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== FAQ WINDOW ENDS HERE ================================================================================ -->




















<!-- =========================== Privacy Policy WINDOW STARTS HERE  ================================================================= -->


<div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
						
<center style="    font-weight: bold;
    margin-bottom: 25px;
    color: black;">PRIVACY POLICY</center>

			<strong>This privacy policy has been compiled to better serve those who are concerned with how their 'Personally identifiable information' (PII) is being used online. PII, as used in US privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of 
				how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.<BR>
</strong> 
The main terms of the licence incorporated into the terms and conditions are as follows.
<BR>





<!--- the panel cotent comes here ===================================================================== -->


			 <div class="panel-group">



    <div class="panel panel-default">




      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep1">What personal information do we collect from the people that visit our blog, website or app?
</a>
        </h4>
      </div>
      <div id="collapsep1" class="panel-collapse collapse">
        <div class="panel-body">
When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, phone number, Address or other details to help you with your experience.</div>
  
      </div>
</div>



    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep2">
When do we collect information?</a>
        </h4>
      </div>
      <div id="collapsep2" class="panel-collapse collapse">
        <div class="panel-body">We collect information from you when you register on our site, place an order or enter information on our site.</div>
  
      </div>
</div>






    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep3">How do we use your information?</a>
        </h4>
      </div>
      <div id="collapsep3" class="panel-collapse collapse">
        <div class="panel-body">We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:
<br>
      To personalize user's experience and to allow us to deliver the type of content and product offerings in which you are most interested.<br>
      To allow us to better service you in responding to your customer service requests.<br>
</div>
  
      </div>
</div>






    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep4">How do we protect visitor information ?</a>
        </h4>
      </div>
      <div id="collapsep4" class="panel-collapse collapse">
        <div class="panel-body">Our website is scanned on a regular basis for security holes and known vulnerabilities in order to make your visit to our site as safe as possible.

We use regular Malware Scanning.<br>

Your personal information is contained behind secured networks and is only accessible by a limited number of persons who have special access rights to such systems, and are required to keep the information confidential. In addition, all sensitive/credit information you supply is encrypted via Secure Socket Layer (SSL) technology.
<br>
We implement a variety of security measures when a user places an order to maintain the safety of your personal information.
<br>
All transactions are processed through a gateway provider and are not stored or processed on our servers.</div>
  <br>
      </div>
</div>






    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep5">

Do we use 'cookies'?</a>
        </h4>
      </div>
      <div id="collapsep5" class="panel-collapse collapse">
        <div class="panel-body">
        				Yes. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your Web browser (if you allow) that enables the site's or service provider's systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.

        </div>
  
      </div>
</div>



    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep5">

We use cookies to:</a>
        </h4>
      </div>
      <div id="collapsep5" class="panel-collapse collapse">
        <div class="panel-body">
        				      • Understand and save user's preferences for future visits.

You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) 
settings. Each browser is a little different, so look at your browser's Help menu to learn the correct way to modify your cookies.

        </div>
  
      </div>
</div>




    <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep5">


If users disable cookies in their browser:</a>
        </h4>
      </div>
      <div id="collapsep5" class="panel-collapse collapse">
        <div class="panel-body">
        				    If you disable cookies off, some features will be disabled It will turn off some of the features that make your site experience more efficient and some of our services will not function properly.

However, you can still place orders .

        </div>
  
      </div>
</div>



   <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep5">




Third Party Disclosure</a>
        </h4>
      </div>
      <div id="collapsep5" class="panel-collapse collapse">
        <div class="panel-body">
        			We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information unless we provide you with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others' rights, property, or safety. 

However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.

        </div>
  
      </div>
</div>



   <div class="panel panel-default">


      <div class="panel-heading" style="	background: #DCA644;color:white">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapsep5">




Third party links</a>
        </h4>
      </div>
      <div id="collapsep5" class="panel-collapse collapse">
        <div class="panel-body">
        			Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.
        </div>
  
      </div>
</div>

















      </div>














<!-- ================== panel content ends here ================================================== -->




<BR>


								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ================== FAQPrivacy Policy ENDS HERE ================================================================================ -->




<!-- =========================== BOOK repair section starts here  ================================================================= -->


<div class="modal fade" id="bookrepair" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard" id='form1'>
									
				

<!-- the choose device section ========================================= -->
		


<center>




			<li style='display:inline-block'>

				<a href="javascript:void(0)" id='mobiletab' style="background:black;color:white" onclick="get_problem_dropdown('mobile_tab_problems');clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='mobile'"  class="top_tab_buttons"  

					>MOBILE </a></li>


		<li style='display:inline-block'>

			<a href="javascript:void(0)" onclick="get_problem_dropdown('mobile_tab_problems');;clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='tablet'" id='tabtab'  class="top_tab_buttons"  

					>TABLET </a></li>


				




						<li style='display:inline-block'>

							<a href="javascript:void(0)" id='lappytab' onclick="get_problem_dropdown('laptop_problems');clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='laptop'" class="top_tab_buttons"  

					>LAPTOP </a></li>







						<li style='display:inline-block'>

							<a href="javascript:void(0)" id='pctab' onclick="get_problem_dropdown('pc_problems');clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='desktop'" class="top_tab_buttons"  

					>DESKTOP</a></li>



<form action='#' method="post">

   <input type='text' id='devicetype' name='devicetype' placeholder='Enter Brand e.g Nokia' value='mobile' class='text_fld1' style='display:none'><br>

<input type='text' id='problemid' name='problem1' placeholder='Entasd' value='enter problem' class='text_fld1' style='display:none'><br>
<input type='text' id='brandname' name='brandname' placeholder='Enter Brand e.g Nokia' class='text_fld1'><br>


<input type='text' name='model' id='model' style=' margin-top: 6px;' placeholder='Enter Models e.g Lumia 502' class='text_fld1'><br>


<br>


<label style='color:grey;font-weight:200;'>Problem description :</label>
<!-- ============= newley added field for the  dropdown ========================== -->
<br>


<select id="mobile_tab_problems" style='    max-width: 200px;
    height: 31px;
    font-size: 12px;
    color:grey;text-transform:uppercase;
    border: 1px groove black;
    padding-top: 4px;'>
		<option value="software">software</option>
		<option value="motherboard repair">motherboard repair</option>
		<option value="touch, screen and body">touch, screen and body</option>
		<option value="battery">battery</option>
		<option value="charger">charger</option>
		<option value="mic & speaker">mic & speaker</option>
		<option value="charging jack">charging jack</option>
			<option value="external button">external button</option>
			<option value="keypad">keypad</option>
			<option value="display sensor">display sensor</option>
			<option value="others">others</option>

</select>

<select id="laptop_problems" style='    max-width: 200px;
    height: 31px;display:none;
    font-size: 12px;
    color:grey;text-transform:uppercase;
    border: 1px groove black;
    padding-top: 4px;'>
		<option value="display">display</option>
		<option value="touchdisplay">touchdisplay</option>
		<option value="hard disk">hard disk</option>
		<option value="battery">battery</option>
		<option value="adaptor">adaptor</option>
		<option value="Ram">Ram</option>
		<option value="keyboard">keyboard</option>
		<option value="touchpad">touchpad</option>
		<option value="motherboard repair">motherboard repair</option>
		<option value="software">software</option>
		<option value="outer body">outer body</option>
		<option value="printer">printer</option>
		<option value="others">others</option>


</select>

<select id="pc_problems" style='    max-width: 200px;
    height: 31px;
    font-size: 12px;display:none;
    color:grey;text-transform:uppercase;
    border: 1px groove black;
    padding-top: 4px;'>
		<option value="monitor display">monitor display</option>
		<option value="hard disk">hard disk</option>
		<option value="RAM">RAM</option>
		<option value="keyboard">keyboard</option>
		
		<option value="motherboard repair">motherboard repair</option>
		<option value="software">software</option>
		<option value="UPS power">UPS power</option>
		<option value="power supply">power supply</option>
		<option value="printer">printer</option>
		<option value="others">others</option>
</select>









<!--=================== newly added firld for the problem description ends her er========= -->
 













<!-- to be hidden for now ================================================================================================ 
					<select id="brandname"   class="frm-field required" style='    padding-left: 17px;
    background: transparent;
    /* background: orange; */
    width: 200px;
    height: 31px;
    border: 1px groove black;
    font-size: 12px;
    color: #5F5959;' 
															 onchange="
  var sel = document.getElementById('brandname');
  var brand=sel.options[sel.selectedIndex].value;
        load_brand_phones(brand);
" required="true">
<option>Choose Brand</option>
<?php
$brandarray=array();
$brand_result = mysql_query("select DISTINCT(brand) from phone_brands WHERE type='phone'");
      while($row=mysql_fetch_array($brand_result))
                                               {
                                                                    array_push($brandarray,$row);
                                                              
                                         

                                               }  

for($i=0;$i<sizeof($brandarray);$i++)
{

?>
<option value='<?php echo $brandarray[$i]['brand']; ?>'><?php echo ucfirst($brandarray[$i]['brand']); ?></option>
<?php } ?>

</select>

<br>






<label>choose device : </label>
				

<?php 
for($p=0;$p<sizeof($brandarray);$p++)
{
?>
<select  name="phone_device" id='brand_<?php echo $brandarray[$p]['brand']; ?>'


				class="frm-field required" style='    background: orange;
    width: 200px;
    he: 23px;display:none;
    font-size: 13px;'>
																<option>Choose Device</option>
<?php

$brand=$brandarray[$p]['brand'];
$brandmodels=array();
$brand_result = mysql_query("select DISTINCT(model) from phone_brands WHERE brand='$brand'");
      while($row=mysql_fetch_array($brand_result))
                                               {
                                                                    array_push($brandmodels,$row);
                                                              
                                         

                                               }  

for($i=0;$i<sizeof($brandmodels);$i++)
{

?>
<option><?php echo ucfirst($brandmodels[$i]['model']); ?></option>
<?php } ?>
</select>

                        <?php } ?>


-->




	<ul class="list-inline">
			<li><button type="button" style='    background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
    margin-left: 5px;
    margin-top: 15px;' class="mob-btn btn btn-primary next-step"  onclick="add_problem_description();showpopup('form2');closepopup('form1')">Next</button></li>
													</ul>



</div>

<!-- ================= the choose section ends here =========================== -->







<!-- ============ otp submission and correction ==================================== -->


						<div class="wizard" id='form4' style='display:none'>




<form action="#" id='enterotp' method="post" style=''>
<center>
<span style='font-size:12px' id='otptext1'>An OTP has been sent at your phone number <strong id='phonesentotp'></strong>.Please verify.</span>


						<input type="text" id='userotp' class='text_fld1' placeholder='4-Digit OTP' name="phone2" name="phone2" ><br>		


<span id='txtHint' style='color:red'></span><br>

<img src='img/loadinggif.gif' id='loaderimg' style='display:none;    width: 51%;'>
<a href='javascript:void(0)' onclick="
document.getElementById('loaderimg').style.display='block';
document.getElementById('confirmotpandorder').style.display='none';
submitotp()" id='confirmotpandorder' style='        background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
    margin-left: 5px;
    color: white;
    padding: 3px;
    font-size: 12px;
    width: pa;
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left: 73px;
    padding-right: 73px;'>CONFIRM </a>


</form>
    </center>
    <strong id='orderiddetails'>





					</strong>






						</div>






<!-- ============ from  2 for getting all the pickup information ======================================== -->


		<div class="wizard" id='form2' style='display:none'>

				

<center style='    line-height: 15px;'>

<label style='color:black'>Enter Visiting Address </label><br>

	<input type="text" name="pickupaddress1" id="pickupaddress" style='margin-top:0px' class='text_fld1'><br>
<span id="invalid_address" style='color:red;display:none;font-size:11px;'>*Please enter a valid address</span>
<br>
						<label style='color:black'>Enter Visting Day </label><br>

<!-- ================= get the fucking serial dates from here ================================== -->
<?php

$dates_inorder=get_serial_dates();

?>

						<select name='freedate'   id='freedate' style='     max-width: 200px;
    height: 31px;
    font-size: 14px;
    color: black;
    border: 1px groove black;
    padding-top: 4px;'>

						<?php
						for($d2=0;$d2<sizeof($dates_inorder);$d2++)
						{ ?> 
									<option value="<?php echo $dates_inorder[$d2];?>"><?php echo $dates_inorder[$d2];?></option>
													<?php } ?>
						</select><br>
<br>
						<label style='color:black'>Enter Visiting Time  </label><br>
<select name="freetime" id='freetime' style='    max-width: 200px;
    height: 31px;
    font-size: 14px;
    color: black;
    border: 1px groove black;
    padding-top: 4px;'>
<option value="8 AM-10 AM">8 AM-10 AM</option>
<option value="10 AM-12 AM">10 AM-12 AM</option>
<option value="12 AM-2 PM">12 AM-2 PM</option>
<option value="2 PM-4 PM">2 PM-4 PM</option>
<option value="4 PM-6 PM">4 PM-6 PM</option>
<option value="6 PM-8 PM">6 PM-8 PM</option>
</select>		<br>

<br>

	<ul class="list-inline">
			<li><button type="button" style='    background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
    margin-left: 5px;
    margin-top: 15px;' class="mob-btn btn btn-primary next-step" onclick="check_form_pickup();">Next</button></li>
													</ul>




</center>






		</div>









<!-- ====================  from 2 for getting all the pickup information ============================== -->





<!-- ============ from  3 for getting all the pickup information ======================================== -->


		<div class="wizard" id='form3' style='display:none'>



		<form action='#' method="post"  id='beforeotpsend'	>	

<center>
<label style='color:black'>Your Name </label><br>

						<input type="text"  name="name2" id="name2" style='width:247px'>
<span id="invalid_name" style='color:red;display:none;font-size:11px;'>*Please enter your name</span>

						<br>


			

<label style='color:black'>Your Email</label><br>

						<input type="text" name="email2" id="email2" style='width:247px'>
<span id="invalid_email" style='color:red;display:none;font-size:11px;'>*Please enter a valid email</span>

						<br>







<label style='color:black'>Your Mobile No.</label><br>

					<input type="text" placeholder='10-digit mobile number' id="phone3" name="phone2" style='width:247px'><br>			

<span id="invalid_phone" style='color:red;display:none;font-size:11px;'>*Please enter a valid mobile number</span>







<a href="javascript:void(0)"  class="mob-btn btn btn-primary next-step" style='    background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
    margin-left: 5px;
    margin-top: 15px;' id='sendotpid' onclick="
    		document.getElementById('sendotpid').style.display='none';
    check_email_name_phone()" >Submit</a>



						</center>

</form>








		</div>









<!-- ====================  from 3 for getting all the pickup information ============================== -->

</form>








</center>
									
									
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->




<!-- ==================  book r4epair section starts here  ================================================================================ -->









<!-- ============ otp submission and correction ends here ================================ -->



			<!-- Dth -->
			<div class="modal fade" id="orderprocessed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="Step 6">
														<span class="round-tab">
															<i class="glyphicon glyphicon-folder-open"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step7" data-toggle="tab" aria-controls="step7" role="tab" title="Step 7">
														<span class="round-tab">
															<i class="glyphicon glyphicon-pencil"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step8" data-toggle="tab" aria-controls="step8" role="tab" title="Step 8">
														<span class="round-tab">
															<i class="glyphicon glyphicon-picture"></i>
														</span>
													</a>
												</li>
												
											</ul>
										</div>
										<form role="form">
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step6">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
														<img src="images/cell.png" alt=" " />
														</div>
												
<!-- order processed ka popup ends here =================================================================================== -->
					<strong>


Congratulations ! user your order has been processed with order ID : <?php 

echo $_SESSION['transaction_id'].'<BR>';
 ?>
<span style='font-size:12px;color:#DCA644'>Soon, you will recieve a verfication sms by Insta Team.  </span>


					</strong>











<!-- ====================== order processed ends here  ======================================================================= -->










													</div>
											
												</div>
												
												<div class="tab-pane" role="tabpanel" id="step8">
										
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //Dth -->

			
			
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>





        <script>



//load the device ka problem description 






/// load the device ka problem description
        			function showpopup(a)
        			{

        						document.getElementById(a).style.display='block';



        			}




        						function closepopup(a)
        						{


        							document.getElementById(a).style.display='none';
        						}






        $(document).ready(function(){
$("#requestacallbackid").click(function(){

var phoneenquiry1 = $("#phoneenquiry1").val();
var caller= $("#caller").val();
document.getElementById('loaderprocess').style.display='block';
document.getElementById('requestacallbackid').style.display='none';
// AJAX Code To Submit Form.

				
var dataString ='caller='+caller+'&phone1='+phoneenquiry1+'&requestacallback=1';

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "index.php",
data: dataString,
cache: false,
success: function(result){

document.getElementById('loaderprocess').style.display='none';
$('#loaderprocess').hide();
$('#enquirysent').show();



}
});

return false;
});
});


// otp sending ajax ---------------------------------




      function sendotp()
      {

$('#loadingmessage').show();
var phone2 = $("#phone3").val();


// AJAX Code To Submit Form.
var dataString = 'phone2='+phone2+'&sendotp=1';

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "index.php",
data: dataString,
cache: false,
success: function(result){


$('#enterotp').show();
$('#form3').hide();
$('#form4').show();
document.getElementById("phonesentotp").innerHTML=phone2;



// loading the otp section ka code once again  


   $('#enterotp').load('index.php #enterotp', function() {
                            
                                                                       });








}
});

return false;
}




// otp sending ajax ends here ===========================================



function load_brand_phones(brand)
{


<?php
for($i=0;$i<sizeof($brandarray);$i++)
{

?>


document.getElementById("brand_<?php echo $brandarray[$i]['brand'];?>").style.display='none';
<?php } ?>

var brandnamevar='brand_'+brand;;
document.getElementById(brandnamevar).style.display='block'

}



			// check the otp entered by the user and show the fucking oreder processed or not 

function submitotp()
{
	 document.getElementById("loaderimg").style.display='block';
var r=document.getElementById('userotp').value;
var xmlhttp;    
if (r=="")
  {
  document.getElementById("txtHint").innerHTML="write something";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    


  

    if(xmlhttp.responseText=='verified')
    {
    call_form_submission();
        	 document.getElementById("loaderimg").style.display='none';

        	 document.getElementById('confirmotpandorder').style.display='none';
    }
    else
    {
    		 document.getElementById('confirmotpandorder').style.display='none';
    	  document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
}
  }
xmlhttp.open("GET","checkotp_and_process_order.php?otp="+r,true);
xmlhttp.send();


}

//============== AJAX FOR ORDER SUBMISSION STARTS HERE 

function call_form_submission()
{
	var devicetype = $("#devicetype").val();





	 document.getElementById("loaderimg").style.display='none';

var model = $("#model").val();

var problemid = $("#problemid").val();
var brandname2= $("#brandname").val();
var pickupaddress = $("#pickupaddress").val();
var freedate = $("#freedate").val();
var freetime = $("#freetime").val();
var name2 = $("#name2").val();
var email2 = $("#email2").val();
var phone2 = $("#phone3").val();

// AJAX Code To Submit Form.
var dataString ='problemid='+problemid+'&brandname2='+brandname2+'&model='+model+'&pickupaddress='+pickupaddress+'&freedate='+freedate+'&freetime='+freetime+'&name2='+name2+'&email2='+email2+'&phone2='+phone2+'&devicetype='+devicetype+'&submit_transaction='+1;

// AJAX Code To Submit Form.
$.ajax({
type: "GET",
url: "index.php",
data: dataString,
cache: false,
success: function(result){
$('#enterotp').hide();
loadtransaction_details();


$('#otptext1').hide();

$('#userotp').hide();
$('#loaderimg').hide();



}
});

return false;

}








// function for getting the transaction id back 




//track my order

function trackmyorder()
{

var order=document.getElementById('transactionorder1').value;
var xmlhttp;    

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	
    

    document.getElementById("showorderstatus").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","checkotp_and_process_order.php?trackorder="+order,true);
xmlhttp.send();


}






// check the otp entered by the user and show the fucking oreder processed or not 

function loadtransaction_details()
{

var xmlhttp;    

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	
    

    document.getElementById("orderiddetails").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","checkotp_and_process_order.php?call_transaction_id="+1,true);
xmlhttp.send();


}

//============== AJAX FOR getting the transaction id once again


// al the testing input function comes here 


function return_email_okay()
{

        var email1 = document.getElementById("email2").value;
        filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (filter.test(email1)) {
  // Yay! valid
return 1;


}
else
return 0;

}

function checkemail() {


        var email1 = document.getElementById("email2").value;
        filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (filter.test(email1)) {
  // Yay! valid

 
 document.getElementById("invalid_email").style.display= "none";
 check_phone();
           
}
else
  {  document.getElementById("invalid_email").style.display = "block";
				check_phone();

  }        
    }
function check_phone()
{
 
 var x =document.getElementById('phone3').value;
         if(x.length<10)
         {
               document.getElementById('invalid_phone').style.display='block';
                 var error=1;
           }
           if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("Enter numeric value")
              var error=1;

           }
           if (x.length>10)
           {
                alert("enter 10 characters");
                var error=1;

           }
           if (x.charAt(0)=="+")
           {
                alert("it should not start with +");
                var error=1;
                           }
                           if(error)
                           {
                           document.getElementById('phone3').value='';
                           document.getElementById('invalid_phone').style.display='block';

                         }
                         else
                         {

                              document.getElementById('invalid_phone').style.display='none';
                              var y=return_email_okay()
                              if(y)
                                  sendotp();

                       

                         }



 
}  








function check_form_pickup()
{


var r=document.getElementById('pickupaddress').value;


if(r.length<15)
  {



	document.getElementById('invalid_address').style.display="block";
  }
  else
  {
  	document.getElementById('invalid_address').style.display="none";
  					showpopup('form3');closepopup('form2');
			}
}


   function get_back_change(el)
   {

   			 el.style.backgroundColor='black';
   			  el.style.color='white';

   }





         function clear_other_tabs()
         {
         					document.getElementById('mobiletab').style.backgroundColor='white';
         					document.getElementById('tabtab').style.backgroundColor='white';
         					document.getElementById('pctab').style.backgroundColor='white';
         					document.getElementById('lappytab').style.backgroundColor='white';

	document.getElementById('mobiletab').style.color='black';
         					document.getElementById('tabtab').style.color='black';
         					document.getElementById('pctab').style.color='black';
         					document.getElementById('lappytab').style.color='black';

         }

function check_email_name_phone()
{
		
var name=document.getElementById('name2').value;
if(name.length<1)
document.getElementById('invalid_name').style.display='block';
else
document.getElementById('invalid_name').style.display='none';
		checkemail();





}






      							// change delivery address 
      
function change_delivery()
{


   var addressdeliveryid=$("#addressdeliveryid").val();
    var orderdeliveryid=$("#orderdeliveryid").val()




// AJAX Code To Submit Form.
var dataString ='address1='+addressdeliveryid+'&orderiddelivery='+orderdeliveryid+'&changedeliveryaddress='+1;
// AJAX Code To Submit Form.

$.ajax({
type: "GET",
url: "index.php",
data: dataString,
cache: false,
success: function(result){

$('#delivery_change_form').hide();
$('#deliverysent').show();


}
});

return false;

}








</script>


<script type="text/javascript">
function change_button_font_color_hover(a)
{

document.getElementById(a).style.color='white';



}

function change_button_font_color_mouseout(a)
{

document.getElementById(a).style.color='black';



}









function onallload()
{
<?php 

if(isset($_GET['confirmdelivery']))
{ ?>
document.getElementById('requestdelivery').click();
<?php } ?>
}


</script>


<script type="text/javascript">
$(document).ready(function () {
    $(".banner").css("background-image", "url(img/laptop_drop.gif?"+ Math.random(12,88) + ")" );
});
</script>
<!-- //for bootstrap working -->
</body>
</html>