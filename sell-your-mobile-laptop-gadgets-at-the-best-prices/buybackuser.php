<?php 
include('db.php');
include('functions.php');
// submitting all the values from the user ebtry of buy back 



if(isset($_POST['submit_offline_buyback']))
{


$customername=$_POST['customername'];

$customerphone=$_POST['customerphone'];
$orderid='buyback_offline';
$devicename='unk22nown';
$customerpickup='unkn22own';
$shownprice='unkno22wn';
$msgadmin="Hii instarepair ! Orderid: ".$orderid." .A new buy back request from ".$customername." , phone : ".$customerphone." , device : ".$devicename." ,Address : ".$customerpickup." , price ".$shownprice." .Reply soon";
echo $msgadmin;
$phoneadmin=get_admins_phone();
sendmessage($msgadmin,$phoneadmin);



$cmd="insert into buybackuser(orderid,devicetype,model,brand,devicestatus,functional,accessories,deviceage,overallcondition,customer,address,phone,timings,email,shownprice) values('$orderid','$devicetype','$modelname','$brandname','$devicestatus','$functionalval','$accessoriesval','$deviceage','$overallval','$customername','$customerpickup','$customerphone','$timings','$customeremail','$shownprice')";
$result=mysql_query($cmd);


$showsuccess=1;
}

if(isset($_POST['submit_entire_form']))
{
$brandname=$_POST['brandname'];
$modelname=$_POST['modelname'];
$switchon=$_POST['switchon'];
$shownprice=$_POST['shownprice'];
$customername=$_POST['customername'];
$customeremail=$_POST['customeremail'];
$customerphone=$_POST['customerphone'];
$customerpickup=$_POST['customerpickup'];
$allaccessories_id=$_POST['allaccessories_id'];
$timings=$_POST['freetime'].'_'.$_POST['freedate'];
if(!empty($_POST['functional'])) {
    foreach($_POST['functional'] as $functional) {
      $functionalval.=','.$functional;

    }
  }

  if(!empty($_POST['accessories'])) {
    foreach($_POST['accessories'] as $accessories) {
      $accessoriesval.=','.$accessories;

    }
  }



  if(!empty($_POST['overall'])) {
    foreach($_POST['overall'] as $overall) {
      $overallval.=$overall;

    }
  }
$orderid=get_buyback_orderid();
$deviceage=$_POST['age'];
$cmd="insert into buybackuser(orderid,devicetype,model,brand,devicestatus,functional,accessories,deviceage,overallcondition,customer,address,phone,timings,email,shownprice) values('$orderid','$devicetype','$modelname','$brandname','$devicestatus','$functionalval','$accessoriesval','$deviceage','$overallval','$customername','$customerpickup','$customerphone','$timings','$customeremail','$shownprice')";
$result=mysql_query($cmd);

$devicename=$brandname.'-'.$modelname;

// send customer message 


$msgcustomer="Congratulations ".$customername." ! You have been registered for buy back device ".$devicename." . Order Id : ".$orderid." ,you will be contacted soon by our team.";

sendmessage($msgcustomer,$customerphone);


$phoneadmin=get_admins_phone();

$msgadmin="Hii instarepair ! Orderid: ".$orderid." .A new buy back request from ".$customername." , phone : ".$customerphone." , device : ".$devicename." ,Address : ".$customerpickup." , price ".$shownprice." .Reply soon";


sendmessage($msgadmin,$phoneadmin);
$showsuccess=1;



}


if(isset($_POST['submit_buyback']))
{

 
$brandname=$_POST['brandname'];
$modelname=$_POST['modelname'];
$switchon=$_POST['switchon'];
$allaccessories_id=$_POST['allaccessories_id'];

$deviceage=$_POST['age'];


if(!empty($_POST['functional'])) {
    foreach($_POST['functional'] as $functional) {
      $functionalval.=','.$functional;

    }
  }

// now calculate the price over here ==========


// first calculate the cost of this model+brands 
$costing=calulate_device_cost($brandname,$modelname);
        // =========== apply the depreciation value formaula here ====


get_depreciation_value($deviceage,$costing);
}





				if(isset($_POST['submitorder']))
				{



	$brand='Off';
		$model='Off';
		$devicetype=$_GET['devicetype2'];
	$phone2=$_POST['phone2'];
		$pickupaddress=$_POST['pickupaddress2'];
			$freedate=$_POST['freedate2'];
				$freetime=$_POST['freetime2'];
					$name2=$_POST['name2'];
						$email2=$_POST['email2'];
				$trans_id=get_order_id();

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype) values 
('','$trans_id','$name2','$email2','$phone2','$pickupaddress2','$freetime2','$freedate2','$brand','$model','$devicetype2')";


$result=mysql_query($cmd);

				}

?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="../css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body >


<!-- -======== modal class for price calculator ========================= -->



<!-- =========================== for requesting a callback ================================================================= -->


<div class="modal fade" id="showpricecalculated" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
          
<!-- ==== the body part is here ===== -->
<center>
<strong>YOUR DEVICE ESTIMATED COST :</strong>
<br><br>
<span id='oldhandcost' style='     color: #A09C9C;
    font-family: calibri;
    font-size: 57px;'></span>
<br><br>
<button  class='submit2'  type="button" class="close" data-dismiss="modal" onclick="document.getElementById('formshow1').style.display='none';
document.getElementById('showpricecalculated').style.display='none';
document.getElementById('formshow2').style.display='block';" >SUBMIT</button> 
     <button class='submit1' type="button" class="close" data-dismiss="modal" onclick=''>CANCEL</button>

</center>
<!-- -==== the body part ends here ======= -->





            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== requersting a callback ================================================================================ -->





<!-- ==========================      send enquiry for other device ka popup================================================================= -->


<div class="modal fade" id="showothertab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
          
<!-- ==== the body part is here ===== -->
<center>
<strong>Please enter your details to send an enquiry :</strong>
<br><br>
<span id='oldhandcost' style='     color: #A09C9C;
    font-family: calibri;
    font-size: 57px;'></span>
<br><br>
<button  class='submit2'  type="button" class="close" data-dismiss="modal" onclick="document.getElementById('formshow1').style.display='none';
document.getElementById('showpricecalculated').style.display='none';
document.getElementById('formshow2').style.display='block';" >SUBMIT</button> 
     <button class='submit1' type="button" class="close" data-dismiss="modal" onclick=''>CANCEL</button>

</center>
<!-- -==== the body part ends here ======= -->





            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ==============      send enquiry for other device ka popup================================================================================ -->





<!-- =========== modal price for calculator ========================================-->


  <div class="header" style='    background:black'> 
  <div class="logo">
         <h1><a href="http://instarepair.in">
<img src="img/logo1.png"  style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1" style='float:right'>
          <li><a href="#" class='phonehover' style="font-family: helvetica;"  >
          <img src="img/phone1.gif" style='max-width:32px' >  81 00 75 75 75 
          </a></li>
        <li><a href="#" style="    font-family: helvetica;
    background: #F4B912;
    padding: 12px;
    color: black;
    font-weight: bold;" data-toggle="modal" id="top_menu_self" data-target="#trackorder1">Track Order</a></li>
        
  

        <li style='display:none'><a href="#" id='requestdelivery' style="font-family: helvetica;" data-toggle="modal" style="display:none;
" data-target="#calldelivery">Request delivery</a></li>

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

<!-- =============== header ends here -=================== -->
      <center>
<div class='container' style='margin-top:12vw;border:1px groove #f4b912;padding: 0px; '>


<div class="sell_gadget_title_bar">
<span style='float:left'> <img src='img/SALE-icon.png' style='    margin-right: 34px;'>SELL USED GADGET </span>
</div>


<div class='row' >
<div class="col-md-6 col-sm-6 col-xs-12" style='      padding: 4%;
    font-weight: bold;
    font-size: 20px;
    text-align: left;'>
Trade-in your used or broken devices for cash

Buy back - Get instant cash 
</div>

<div class="col-md-6 col-sm-6 col-xs-12" style='     padding: 4%;
    margin-top: -28px;
    max-height: 169px;
    margin-bottom: 19px;'>
<img src='img/buyback.png' style='width:120px'>


</div>
</div>
 

</div>

<!-- ====== select device id =============================================== -->


<!-- ===== the lower bannner devices profiling starts here ================= -->


<div class='container' id='gadget_id_container' style=''>

  <center>





        <div class='col-md-3 col-sm-6 col-xs-12'>
  <a href='javascript:void(0)' style='color:black' onclick="document.getElementById('devicetype').value='mobile'"> <div id='yellow_tab_outline'>
      <span >
<img src="img/MOBILE-REPAIR.png" class='device_pic' style='  '>
      </span>

    MOBILE 
  </div></a>
          </div>






          <div class='col-md-3 col-sm-6 col-xs-12'>
    <a href='javascript:void(0)'  style='color:black'onclick="document.getElementById('devicetype').value='tablet'"> <div id='yellow_tab_outline'>
      <span >
<img src="img/TABLET-REPAIR.png" class='device_pic' style='  '>
      </span>

    TABLET 
  </div><a/>
          </div>



              
            <div class='col-md-3 col-sm-6 col-xs-12'>
                <a href='javascript:void(0)'  style='color:black'onclick="document.getElementById('devicetype').value='laptop'"> 
  <div id='yellow_tab_outline'>
      <span >
<img src="img/LAPTOP-REPAIR.png" class='device_pic' style='  '>
      </span>

    LAPTOP
  </div><a/>
          </div>


          
              <div class='col-md-3 col-sm-6 col-xs-12'>
                  <a href='javascript:void(0)'  style='color:black'onclick="document.getElementById('devicetype').value='desktop'"> 
  <div id='yellow_tab_outline'>
      <span >
<img src="img/DESKTOP-REPAIR.png" class='device_pic' style='  '>
      </span>

    DESKTOP 
  </div></a>
          </div>

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


</center>


<!-- ========= entire div pasrt befor congratulations =========================================================== -->

<!-- === the form  part ====================== -->

<div class='container' id='gadget_id_container' style='display:<?php 
if($showsuccess)
  echo 'none';
?>'>
<a href="#" style="font-family: helvetica;" data-toggle="modal" style="background: white;
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
    padding-right: 12px;" data-target="#showpricecalculated" id='showhiddenpop'></a>







    <!-- ===  data heref forthe others devcie tab =============== -->
<a href="#" style="font-family: helvetica;" data-toggle="modal" style="background: white;
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
    padding-right: 12px;" data-target="#showothertab" id='showhiddenpop2'></a>




    <!-- ===== dataa href for the others device tab =============== -->
  <center>

<div class='col-md-3'>

<img src="img/TABLET-REPAIR.png" width='100%' style='   max-width: 132px;
'>

</div>

<div class="col-md-9">
    <form method='post' action='#' style='    text-align: left;
    color: grey;
    font-size: 12px;' >



<!-- ======= here comes the entire div for auto search loader for the models/brands == -->
<script type="text/javascript">
function fill(Value)
{
$('#brandname').val(Value);
$('#display1').hide();
}

$(document).ready(function(){
$("#brandname").keyup(function() {
var name = $('#brandname').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax.php",
data: "name="+ name ,
success: function(html){
$("#display1").html(html).show();
}
});
}
});
});

// ========================= model =================


function fill2(Value)
{
$('#modelname').val(Value);
$('#display2').hide();
}

$(document).ready(function(){
$("#modelname").keyup(function() {
var name = $('#modelname').val();



var makeselected=$('#brandname').val();
if(name=="")
{
$("#display2").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax.php",
data: "modelname="+ name+"&makeselected="+makeselected ,
success: function(html){
$("#display2").html(html).show();
}
});
}
});
});
</script>


<div id="content">

<div id='formshow1' style='display:non8e'>
<form method="post" action="#" id=''>

 <input type="text" name="devicetype" style='display:none' placeholder='Enter device' class='input1' id="devicetype" autocomplete="off"
value="">


 <input type="text" name="brandname" placeholder='Enter brand' class='input1' id="brandname" autocomplete="off"
value="<?php echo $val;?>">
<br><br>

<input type="text" name="modelname"  placeholder='Enter model'class='input1' id="modelname" autocomplete="off"
value="<?php echo $val;?>">
<br><br>



<div id="display1" style='    background: white;
    width: 69%;
    position: absolute;
    margin-top: 49px;
    max-width: 548px;    margin-top: -79px;
    text-align: center;
    font-size: 18px;
    text-transform: capitalize;display:none'></div>


    <div id="display2" style='    background: white;
    width: 69%;
    margin-top: -18px;
    text-align: center;
    font-size: 18px;
    text-transform: capitalize;display:none'></div>



<!-- ====== here comes the entire div for auto search loadre for the models/brands ==-->





<label>Does the mobile switch on </label><br><br>

<input type="radio" value='yes' checked id='switchon1' onclick="document.getElementById('switchon').value='yes'" name='switchon'>YES
<input type="radio" value='no'  id='switchon1' onclick="document.getElementById('switchon').value='no'"name='switchon'>NO 

<input type='text' id='switchon' style='display:none' value='yes'>
<br><br>

<label>Functional or Physical Problems </label><br><br>

<input type="checkbox" value="Screen Broken/Touchpad Or any Display Issue" name='functional[]'>Screen Broken/Touchpad Or any Display Issue<br>
<input type="checkbox" value="Front Or Back Camera Not Working Or Faulty" name='functional[]'>Front Or Back Camera Not Working Or Faulty<br>
<input type="checkbox" value="Volume Button not working" name='functional[]'>Volume Button not working<br>
<input type="checkbox" value="Wifi Or GPS Not Working" name='functional[]'>Wifi Or GPS Not Working<br>
<input type="checkbox" value="Charging Defect; unable to charge the phone" name='functional[]'>Charging Defect; unable to charge the phone<br>
<input type="checkbox" value="Battery Faulty or Very Low Battery Back up" name='functional[]'>Battery Faulty or Very Low Battery Back up<br>
<br><br>


<label>Do you have the following? </label><br><br>

<input type="checkbox" name='accessories[]' id='checkbox_charger' onclick="add_accessories('charger')"value='Original Charger'> Original Charger<br>
<input type="checkbox" name='accessories[]' id='checkbox_ear_phone' onclick="add_accessories('ear_phone')"value='Earphone'> Earphone<br>
<input type="checkbox" name='accessories[]' id='checkbox_box' onclick="add_accessories('box')"value='Box'> Box<br>
<input type="checkbox" name='accessories[]' id='checkbox_invoice' onclick="add_accessories('invoice')"value='Valid Bill (Indian Purchase Only'>Valid Bill (Indian Purchase Only)<br><br>



<label>Mobile Age ? </label><br><br>

<select name='age' id='age' class='input1'style='font-size:13px'>
    <option value='0-3'>Below 3</option>
  <option value='3-6'>3-6 months</option>
<option value='6-9'>6-9 months</option>
<option value='9-12'>9-12 months</option>
<option value='12-18'>12-18 months</option>
</select>

<br><br>



<label>Phone overall condition  </label><br><br>

<input type="radio" name='overallphone[]' value='Flawless'>Flawless<br>
<input type="radio" name='overallphone[]' value='Good'> Good<br>
<input type="radio" name='overallphone[]' value='Average'>Average<br>
<input type="radio" name='overallphone[]' value='Below Average'>Below Average<br><br>

<br><br>


<input type='text' name='shownprice' id='shownprice' style='display:none'>
<input type="button" onclick='show_costing_popup()' value='calculate price' class='submit1' name='submit_buyback'>
<input type="submit" value='SCHEDULE TRANSACTION' style='display:none' name="get_rate" class='submit2'>


<textarea id='allaccessories_id' style='display:none'></textarea>



          </div>


    <!-- ============ the form part 2 comes here ============================ -->


<div id='formshow2' style='display:none'>
<br><Br>
  <label>Please enter your name</label><br><Br>
<input type='text' class='input1'  placeholder='Enter name ' name='customername'><br><Br>
  <label>Please enter your contact number</label><br><Br>
<input type='text' class='input1'  placeholder='Enter contact number ' name='customerphone'><br><Br>



  <label>Please enter your email id</label><br><Br>
<input type='text' class='input1'  placeholder='Enter email Id' name='customeremail'><br><Br>

  <label>Your pickup address</label><br><Br>
<input type='text' class='input1'  placeholder='Enter pickup address ' name='customerpickup'><br><Br>










  <label style='color:black'>Enter Visting Day </label><br>

<!-- ================= get the serial dates from here ================================== -->
<?php

$dates_inorder=get_serial_dates();

?>

            <select name='freedate'   id='freedate'  class='input1'style='font-size:13px'>

            <?php
            for($d2=0;$d2<sizeof($dates_inorder);$d2++)
            { ?> 
                  <option value="<?php echo $dates_inorder[$d2];?>"><?php echo $dates_inorder[$d2];?></option>
                          <?php } ?>
            </select><br>
<br>
            <label style='color:black'>Enter Visiting Time  </label><br>
<select name="freetime" id='freetime'  class='input1'style='font-size:13px'>
<option value="8 AM-10 AM">8 AM-10 AM</option>
<option value="10 AM-12 AM">10 AM-12 AM</option>
<option value="12 AM-2 PM">12 AM-2 PM</option>
<option value="2 PM-4 PM">2 PM-4 PM</option>
<option value="4 PM-6 PM">4 PM-6 PM</option>
<option value="6 PM-8 PM">6 PM-8 PM</option>
</select>   <br>

<br>






</span>



<input type="submit"  class='submit1' name='submit_entire_form'>

</div>
</form>
</div>
    <!-- ============ the form 2 comes here ================================ -->






<!-- =-=============================== success messag ecomes here ==================================== -->


    <!-- ============ the form part 3 comes here ============================ -->


<div id='formshow3' style='display:none'>
<br><Br>

<form action='#' method='post'>
  <label>Please enter your name</label><br><Br>
<input type='text' class='input1'  placeholder='Enter name ' name='customername'><br><Br>
  <label>Please enter your contact number</label><br><Br>
<input type='text' class='input1'  placeholder='Enter contact number ' name='customerphone'><br><Br>














<input type="submit"  class='submit1' name='submit_offline_buyback'>

</div>
</form>
</div>
    <!-- ============ the form 3 comes here ================================ -->


<!-- ====  3rd form for others tab ============================================================ -->




</div>
<!-- =-=============================== success messag ecomes here ==================================== -->




<!-- ===========  3rd others tab ================================================================= -->











<!-- ======== success message ends here ============================================================-->

</div>

</div>






<div id='success_message' style='    color: black;display:none;
<?php 
if(isset($showsuccess))
  echo 'display:block';
?>;
    font-size: 38px;     font-size: 25px;
    /* background: black; */
    color: black;
    padding-top: 12vw;
    padding: 6vw;
    padding-bottom: 12vw;'>
      <strong>
You have been registered for buy back. Our technician will contact you soon with estimated price. 
</strong>





</div>
  </center>


</div>

<?php 

include('footer2.php');

?>



<!-- ===== the form part starts here ================== -->
</body>	

<style type="text/css">

/* -------------------------media queries startt here ------------------------------- */

          @media screen and (min-width:00px){



.submit1{
      font-size:16px;
    width: 200px;
    border: none;
    background: #F4B912;
    height: 48px;
    color: black;
    text-transform: uppercase;
}


.submit2{
padding:3px;
      font-size:15px;
    width: 200px;
    border: none;
    background:black;
    height: 48px;
    color:white;
    text-transform: uppercase;
}
label{

     color: black;
    font-family: calibri;
    font-size: 17px;
}
.input1 {
    border: 1px groove white;
    margin-left: 0px;
    width: 88%;
    height: 45px;

    font-size: 20px;
    color: black;
    text-align: center;
  }
div#yellow_tab_outline {

    border: 2px groove black;
    background: white;
    height: 120px;
    padding-top: 24px;
    font-weight: bold;
    font-size: 28px;
    border-radius: 15px;
    padding: 17px;
    margin-top: 12px;
    height: 125px;
    border: 3px groove #000000;
}



div#yellow_tab_outline:hover{

    background: #F4B912;


}div#yellow_tab {
 
    height:80px;
    padding-top: 24px;
    font-weight: bold;
    font-size: 17px;
}
div#yellow_tab:hover{
    background:black;
        color: white;
}

.sell_gadget_title_bar{

background: #f4b912;
    height: 58px;
vertical-align: middle;
    font-size: 29px;
    font-family: calibri;
}
.gadget_id_container{

      border: 2px groove #F4B912;
    margin-top: 44px;

        border: 1px groove #F4B912;
    margin-top: 23px;
    padding: 18px;
}

.device_pic{

    width: 31%;
    max-width: 96px;
    float: left;
    min-width: 70px;

}

div#gadget_id_container{

  border: 2px groove #F4B912;
    margin-top: 27px;
    padding: 16px;
}

div#formshow1{


      padding-left: 26px;
      font-size: 13px;
}


}
          @media screen and (min-width:1000px){
div#yellow_tab_outline {
     border: 3px groove black;
    height: 91px;
    padding-top: 11px;
    font-weight: bold;
    font-size: 18px;
    }


.input1{
      width: 68%;
}

  }
/* ============== media queries ends here ====================================== */


</style>
<script type="text/javascript">

function show_costing_popup()
{




var brandname = $("#brandname").val();
var modelname= $("#modelname").val();
var switchon= $("#switchon").val();

brandname=brandname.replace(/\s+/g, '');


var age= $("#age").val();
var allaccessories_id=$("#allaccessories_id").val();
// AJAX Code To Submit Form.
modelname=encodeURIComponent(modelname);

var dataString ='brandname='+brandname+'&modelname='+modelname+'&switchon='+switchon+'&age='+age+'&allaccessories_id'+allaccessories_id+'&submit_buyback=1';

// AJAX Code To Submit Form.
$.ajax({
type: "GET",

data: dataString,
cache: false,
success: function(result){


$('#showhiddenpop').click();
       $('#oldhandcost').load('cost_calculator.php?brandname='+brandname+'&modelname='+modelname+'&switchon='+switchon+'&age='+age+'&acc='+allaccessories_id+'&submit_buyback=1', function() {

// loading the buy back price once again here =======
document.getElementById('shownprice').value=document.getElementById('shownpriceajax').innerHTML;
var t=document.getElementById('shownpriceajax').innerHTML;



       });


}


});

return false;







}


function add_accessories(a)
{


if(document.getElementById('checkbox_'+a).checked === false ) {
      var removestring=a+',';
    document.getElementById("allaccessories_id").value=document.getElementById("allaccessories_id").value.replace(removestring,'');
}else{

     var newt=document.getElementById('allaccessories_id').value+=a+',';
          document.getElementById('allaccessories_id').value=newt;

              }


}


function show_popup_others_tab()
{
$('#formshow1').hide();
$('#formshow3').show();



}

</script>
</html>