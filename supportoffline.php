<?php 
include('functions.php');
require('pdf/fpdf.php');
						if(isset($_GET['logout']))
{
				signoutuser();
		


	


}


	if(isset($_GET['submit_transaction']))
{

	$brand=$_GET['brandname'];
		$devicetype=$_GET['devicetype'];
	$phone2=$_GET['phone2'];
		$pickupaddress=$_GET['pickupaddress'];
			$freedate=$_GET['freedate'];
				$freetime=$_GET['freetime'];
					$name2=$_GET['name2'];
						$email2=$_GET['email2'];
				$trans_id=get_order_id();

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype) values 
('','$trans_id','$name2','$email2','$phone2','$pickupaddress','$freetime','$freedate','$brand','$model','$devicetype')";

			$result=mysql_query($cmd);


$_SESSION['transaction_id']=$trans_id;



 $link="www.instarepair.in/service.php?id=".$trans_id;
$otp='2222';
$msgadmin="New order at instarepair Transaction ID: ".$trans_id." customer : ".$name2." device ".$devicetype." address : ".$pickupaddress." contact number : ".$phone2." . Confirm here : ".$link;
$phoneadmin=get_admins_phone();
sendmessage($msgadmin,$phoneadmin);

//acknowledgement sms to the customer
$msgcustomer="congratulations ".$name2." ! your order has been processed with Transaction ID : ".$trans_id." .You will be contacted soon by our executive.
";

sendmessage($msgcustomer,$phone2);












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

							// message to the admin
							$msgborn="Hi Instarepair a new call back request from contact number : ".$phone." .";
							$adminphone=get_admins_phone();
							sendmessage($msgborn,$adminphone);

							//ACK message to the customer


						$msgborn="Dear User, we have noted your number. You will be contacted soon by Instarepair executive.";
							
							sendmessage($msgborn,$phone);
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


							        if(isset($_GET['logoutpanel']))
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
<title>Insta Repair</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Recharge Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
a.a_foot_li{
    color: #000000;
    font-size:10px;
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





										@media screen and (min-width:300px){

                                         .repairbuttonul{


												  margin-top: 30vw;
											}

	                                  			    	.top_tab_buttons{ 
                                              font-size: 12px;
                                                padding: 5px;
                                            }
											#servicecontainer{



												    padding-left: 14vw;
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


.banner{


	  background:white;

}
.buttons ul li a {



											    background: black;
    border-radius: 3px;
    padding: 6px;
    margin-left: 38vw;
    font-size: 13px;



}


										










										}





											@media screen and (min-width:800px){

													    	.top_tab_buttons{
                                              font-size: 16px;
                                                padding: 15px;
                                            }
											#servicecontainer{



												    padding-left:0vw;
											}


.buttons ul li a {


       padding: 17px;

}


										










										}


										@media screen and (min-width:1000px){





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

																.banner{

																	min-height: 923px;
																}
}





										@media screen and (min-width:1400px){




.banner{


	      background-size: 76%;
    background-repeat: no-repeat;
}
                                         .repairbuttonul{


												  margin-top: 30vw;
											}
										}

</style>




</head>
<body>

<div class="banner" style="">
	<div class="header" style='    background:black'>	
			<div class="logo">
			   <h1><a href="index.html">
<img src="images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



			   </a></h1>
			</div>
			<div class="top-nav" style="    margin: 7px 0 0 80%;" >
				<span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
				<ul class="nav1">
					<li><a href="#" style="font-family: helvetica;"  id="top_menu_self" >
					<img src="img/phone1.gif" style='max-width:32px' >	81 00 75 75 75 
					</a></li>
					<li><a href="#" style="font-family: helvetica;" data-toggle="modal" id="top_menu_self" data-target="#myModal2">Track Order</a></li>
				
						<li><a href="#" style="font-family: helvetica;" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;
    font-size: 15px;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" data-target="#requestacallback">Request call back</a></li>



				</ul>
						<!-- script-for-menu -->
						 <script>
						   $( "span.menu" ).click(function() {
							 $( "ul.nav1" ).slideToggle( 300, function() {
							 // Animation complete.
							  });
							 });
						</script>
						<!-- /script-for-menu -->
			</div>
		
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) ); 
						</script>
				<!-- //search-scripts -->
				
			
			<div class="clearfix"> </div>
	</div>
	<div class="container">


<!-- the hiddenb text -->

		<div class="banner-info" style='max-height:350px'>
			<h3 style='color:black;text-transform:capitalize;font-weight:boldlfont-family: helvetica;'>Book Offline
<br>
				<span style='color:#DCA644;'>

					<strong style='color: black;
    text-transform: lowercase;'>#Go</strong>INSTAREPAIR</span>
</h3>
		</div>


<!-- ======= the hidden tect ends here ============== -->



		<div class="buttons" style="    margin-top: -20vw;" >
			<ul style="  " class="repairbuttonul" >

				<li><a class="bookbutton" href="#" data-toggle="modal" data-target="#bookrepair" 

					>BOOK A REPAIR </a></li>
			
			</ul>
			
		</div>
	</div>
</div>








                      <!-- Footer -->
               <footer style='     background: #FFF;; padding-top:3vw;'>
                <div class="container">
                    <div class="row text-center">
                  <div class="col-sm-4 grid_4">
         <h4 style="       color: black;
    float: left;">CONTACT</h4><br>
        <ul type="none" class='foot_list'>
              <li><a href="javascript:void(0);" class="a_foot_li">

    

 Gurgaon Office : V 25/8 ,<br>
DLF Phase-3  <br>
Noida Office : B 42, sector 23 ,<br>
Noida <br>



 Email:support@instarepair.in<br>


              </a></li>
             

        </ul>   

        </div>
       
        <div class="col-sm-4 grid_4">
             <h4 style="        color: black;
    float: left;">QUICK LINKS </H4><br>
                 <ul type="none" class='foot_list'>
            <li><a href="javascript:void(0);"  class="a_foot_li"  data-toggle="modal" data-target="#faq">FAQ</a></li>
               <li><a href="javascript:void(0);" class="a_foot_li" data-toggle="modal" data-target="#privacy">Privacy Policy</a></li>
            
                
               </ul>
        </div>
        <div class="col-sm-4 grid_4">
        <h4 style="       color: black;
    float: left;">FIND US ON</H4><br>
          <ul type="none" class='foot_list'>
<li style="display:inline-block"><a href="#"><img src="img/facebook.png"  class="social_icons"  style='margin-left:11px' width='28'></a></li>
<li style="display:inline-block"><a href="#"><img src="img/twitter.png" class="social_icons"  style='margin-left:11px'  width='28'></</a></li>

          <li style="display:inline-block"><a href="#"><img src="img/linkedin1.png"   class="social_icons" style='margin-left:11px' width='28'></</a></li>

          </ul>

       


        </div>



                    </div><!-- /.row -->

       
    <span style='color: white;
    margin-left: 27%;
    margin-top: 20px;font-family:roboto;font-size:13px'>  &copy; Instarepair Solutions Pvt Ltd.  All rights reserved.</span>
                </div><!-- /.container -->

        


            </footer><!-- /.footer -->














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
			

								<span class='service_desc'>	A “Laptop” in Non-Working condition is equal to the “User” in “Cannot Work” condition, 
										Gadget Samyak helps you restore the gadget at your doorstep in time. No More “Waiting” at Service Centers &Retailers.
										 We bring the Service Center to your home & get the job done. The Issues we can help you with
                               </span>	



				<span style='float:right'>
							<img src='img/service1.jpg' width='152'>




				</span>


				<ul type="disc" class="service_ul">						 
<li>Laptop Crash Down</li>
<li>Screen Replacement</li>
<li>Hardware Support</li>
<li>.Software Support</li>
<li>Charging/Battery Problem</li>
<li>AMC</li>
<li>Water Spillage Repair</li>
<li>System Tune Up</li>

We provide Doorstep Repair service for all Brand of Laptops.
Parts Cost Will be Extra as applicable.
	






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
			

								<span class='service_desc'>	Does your desktop break down’s too often, does it hang while you are working on your important assignment. 
									Give a call to Gadget Samyak& let the professionals take care of it. We not only provide repair services but 
									AMC for your beloved assets so you can focus on your job while we take care of your asset.
									 We provide a wide range of services(Not Limited To):
                               </span>	



				<span style='float:right'>
							<img src='images/desktop-repair-in-gurgaon-instarepair.jpg' width='152'>




				</span>


				<ul type="disc" class="service_ul">						 
<li>Frequent Restarts</li>
<li>Slow Processing</li>
<li>Hardware Support</li>
<li>Software Support</li>
<li>Connectivity Issues</li>
<li>Upgrading</li>
<li>Remote Desktop Connectivity</li>
<li>Water Spillage Repairs</li>
<li>Chip Level Repair By Certified Engineers</li>







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
			

								<span class='service_desc'>“A Man’s best friend is his Dog& best reliable device is his Smartphone”. Gadget Samyak has 
									developed Gurgaon’s first In House “Under One Roof” repair center for all Branded Smartphones. Through our Game Changing Technology 
									&experienced technicians we provide the Timely repair you desire & deserve. We provide a wide range of 
									services(Not Limited To):
                               </span>	



				<span style='float:right'>
							<img src='images/cellphone-repair-in-gurgaon.jpg' width='152'>




				</span>


				<ul type="disc" class="service_ul">						 
<li>Broken Screen Replacement</li>
<li>Power On/Off Switch Replacement</li>
<li>Charging/Battery Problem</li>
<li>Software Support/Updates</li>
<li>Water Damage</li>
<li>Board Repair/Replacement</li>
<li>Data Backup/Data Cleansing</li>
<li>App Installations/Updates</li>
<li>Connectivity Issues</li>
<li>Connectivity Problem/E-Mail ConfigurationTrouble Shooting/Account Sync Up</li>
<li>Unresponsive Screen</li>
</ul>



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
			

								<span class='service_desc'>	In today’s Technology driven World it important to have a synchronization in
								 between your gadgets also. Our Engineers will sync your Tablets with your smartphones, updating your Tablet 
								 with the latest software, configuring your contacts your e-mails as per your need, 
									personalizing the security features as per your requirement at your doorstep. We provide a wide range of services(Not Limited To):
                               </span>	



				<span style='float:right'>
							<img src='images/tablets-repair-in-gurgaon-instarepair.jpg' width='152'>




				</span>


				<ul type="disc" class="service_ul">						 
<li>Connectivity Problem/E-Mail Configuration</li>
<li>Broken Glass Panel/LCD Replacement</li>
<li>Charging/Battery Problem</li>
<li>Hardware Support</li>
<li>Software Support</li>
<li>Power On/Off Switch Problem</li>
<li>RAM Updating</li>
<li>Water Damage Repair</li>
<li>Board Repair/Replacement</li>
<li>Trouble Shooting</li>
<li>Accounts Sync</li>
<li>Data Backups</li>

We provide Doorstep Repair service for all Brand of Laptops.
Parts Cost Will be Extra as applicable.
	






												</p>







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
			

								<span class='service_desc'>	In today’s Technology driven World it important to have a synchronization in
								 between your gadgets also. Our Engineers will sync your Tablets with your smartphones, updating your Tablet 
								 with the latest software, configuring your contacts your e-mails as per your need, 
									personalizing the security features as per your requirement at your doorstep. We provide a wide range of services(Not Limited To):
                               </span>	



				<span style='float:right'>
							<img src='images/tablets-repair-in-gurgaon-instarepair.jpg' width='152'>




				</span>


				<ul type="disc" class="service_ul">						 
<li>Connectivity Problem/E-Mail Configuration</li>
<li>Broken Glass Panel/LCD Replacement</li>
<li>Charging/Battery Problem</li>
<li>Hardware Support</li>
<li>Software Support</li>
<li>Power On/Off Switch Problem</li>
<li>RAM Updating</li>
<li>Water Damage Repair</li>
<li>Board Repair/Replacement</li>
<li>Trouble Shooting</li>
<li>Accounts Sync</li>
<li>Data Backups</li>

We provide Doorstep Repair service for all Brand of Laptops.
Parts Cost Will be Extra as applicable.
	






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
          <a data-toggle="collapse" href="#collapse3">Do we need to register on the site ?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">why the fuck .you want to register here , enter OTP  and fuck off ! dont dare to ask the question again !</div>
  
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

				<a href="javascript:void(0)" id='mobiletab' onclick="clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='mobile'"  class="top_tab_buttons"  

					>MOBILE </a></li>


		<li style='display:inline-block'>

			<a href="javascript:void(0)" onclick="clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='tablet'" id='tabtab'  class="top_tab_buttons"  

					>TABLET </a></li>


				




						<li style='display:inline-block'>

							<a href="javascript:void(0)" id='lappytab' onclick="clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='laptop'" class="top_tab_buttons"  

					>LAPTOP </a></li>







						<li style='display:inline-block'>

							<a href="javascript:void(0)" id='pctab' onclick="clear_other_tabs();get_back_change(this);document.getElementById('devicetype').value='desktop'" class="top_tab_buttons"  

					>DESKTOP</a></li>



<form action='#' method="post">

   <input type='text' id='devicetype' name='devicetype' placeholder='Enter Brand e.g Nokia' class='text_fld1' style='display:none'><br>


<input type='text' id='brandname' name='brandname' placeholder='Enter Brand e.g Nokia' class='text_fld1'><br>


<input type='text' name='model' id='model' style=' margin-top: 6px;' placeholder='Enter Models e.g Lumia 502' class='text_fld1'><br>

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
    margin-top: 15px;' class="mob-btn btn btn-primary next-step"  onclick="showpopup('form2');closepopup('form1')">Next</button></li>
													</ul>



</div>

<!-- ================= the choose section ends here =========================== -->







<!-- ============ otp submission and correction ==================================== -->


						<div class="wizard" id='form4' style='display:none'>




<form action="#" id='enterotp' method="post" style=''>
<center>
<span style='font-size:12px'>Please enter the password alloted to you <strong id='phonesentotp'></strong></span>


						<input type="text" id='userotp' class='text_fld1' placeholder='4-Digit OTP' name="phone2" name="phone2" ><br>		


<span id='txtHint' style='color:red'></span><br>

<img src='http://javascript.sheridanc.on.ca/images/loading.gif' id='loaderimg' style='display:none;    width: 51%;'>
<a href='javascript:void(0)' onclick='submitotp()' id='confirmotpandorder' style='        background: black;
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
    margin-top: 15px;' id='sendotp22222' onclick="check_email_name_phone()" >Submit</a>



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

$('#loadingmessage').show();
var phoneenquiry1 = $("#phoneenquiry1").val();



// AJAX Code To Submit Form.
var dataString = 'phone1='+phoneenquiry1+'&requestacallback=1';

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "index.php",
data: dataString,
cache: false,
success: function(result){

$('#loadingmessage').hide();
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
var dataString ='sendotp=1';

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


   $('#enterotp').load('supportoffline.php #enterotp', function() {
                            
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
xmlhttp.open("GET","checkotp_and_process_order_offline.php?otp="+r,true);
xmlhttp.send();


}

//============== AJAX FOR ORDER SUBMISSION STARTS HERE 

function call_form_submission()
{

	 document.getElementById("loaderimg").style.display='none';

var model = $("#model").val();
var devicetype = $("#devicetype").val();
var brandname = $("#brandname").val();
var pickupaddress = $("#pickupaddress").val();
var freedate = $("#freedate").val();
var freetime = $("#freetime").val();
var name2 = $("#name2").val();
var email2 = $("#email2").val();
var phone2 = $("#phone3").val();

// AJAX Code To Submit Form.
var dataString ='brandname='+brandname+'&model='+model+'&pickupaddress='+pickupaddress+'&freedate='+freedate+'&freetime='+freetime+'&name2='+name2+'&email2='+email2+'&phone2='+phone2+'&devicetype='+devicetype+'&submit_transaction='+1;

// AJAX Code To Submit Form.
$.ajax({
type: "GET",
url: "index.php",
data: dataString,
cache: false,
success: function(result){
$('#enterotp').hide();
loadtransaction_details();









}
});

return false;

}








// function for getting the transaction id back 


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
    	
    	 document.getElementById("loaderimg").style.display='block';

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

</script>
<!-- //for bootstrap working -->
</body>
</html>