<?php 
include('db.php');
include('functions.php');
// submitting all the values from the user ebtry of buy back 



if(isset($_POST['get_rate']))
{
        $brandname=$_POST['brandname'];
        $modelname=$_POST['modelname'];
        $repairtype=$_POST['repair_type'];


$arr1=array();
$cmd="select * from `repair_costing2` where `make`='$brandname' and `model`='$modelname' and `repairingitem` like '%$repairtype%'";
        $result=mysql_query($cmd);
                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }

// now sorting the array on the basis of the repairt type selected by the user






                  $showrepairlist=1;
          


}


?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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





<!-- =========== modal price for calculator ========================================-->
<div class="header" style='    background:black;width:100%;z-index:22'>  
      <div class="logo">
         <h1><a href="http://instarepair.in">
<img src="img/logo1.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1" style='    float: right;'>
          <li><a href="#" class='phonehover' style="font-family: helvetica;"  >
          <img src="img/phone1.gif" style='max-width:32px' >  81 00 75 75 75 
          </a></li>
        <li><a href="#" class='track_button' data-toggle="modal" id="top_menu_self1" data-target="#trackorder1">Track Order</a></li>
        
  

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
  <style type="text/css">
a#top_menu_self1{


   font-family: helvetica;
    background: #F4B912;
    padding: 12px;
    color: black;
    font-weight: bold;
}

a#top_menu_self1:hover{

color: white;
}

  </style>
<!-- =============== header ends here -=================== -->
      <center>


<!-- ====== select device id =============================================== -->


<!-- ===== the lower bannner devices profiling starts here ================= -->


<div class='container' id='gadget_id_container' style=''>

  <center>





        <div class='col-md-3 col-sm-6 col-xs-12'>
  <a href='javascript:void(0)' onclick="document.getElementById('devicetype').value='mobile'"> <div id='yellow_tab_outline'>
      <span >
<img src="img/MOBILE-REPAIR.png" class='device_pic' >
      </span>

    <strong class'device_text'>MOBILE</strong> 
  </div></a>
          </div>






          <div class='col-md-3 col-sm-6 col-xs-12'>
    <a href='javascript:void(0)' onclick="document.getElementById('devicetype').value='tablet'"> <div id='yellow_tab_outline'>
      <span >
<img src="img/TABLET-REPAIR.png" class='device_pic' style='  '>
      </span>

    <strong class'device_text'>TABLET</strong> 
  </div><a/>
          </div>



              
            <div class='col-md-3 col-sm-6 col-xs-12'>
                <a href='javascript:void(0)' onclick="document.getElementById('devicetype').value='laptop'"> 
  <div id='yellow_tab_outline'>
      <span >
<img src="img/LAPTOP-REPAIR.png" class='device_pic' style='  '>
      </span>

    <strong class'device_text'>LAPTOP</strong>
  </div><a/>
          </div>


          
              <div class='col-md-3 col-sm-6 col-xs-12'>
                  <a href='javascript:void(0)' onclick="document.getElementById('devicetype').value='desktop'"> 
  <div id='yellow_tab_outline'>
      <span >
<img src="img/DESKTOP-REPAIR.png" class='device_pic' style='  '>
      </span>

    <strong class'device_text'>DESKTOP</strong>
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

<!-- widget panel starts here ================================================================= -->


<div class='container' style='margin-top:5vw;border:1px groove #f4b912;padding: 0px;display:<?php 
if(isset($showrepairlist))
  echo 'none';
?> ;min-height: 20vw;    max-width: 850px;margin-bottom: 20vw;' id='choosedevice'>


<div class="sell_gadget_title_bar">
<span style='    font-weight: bold;
    font-family: calibri;'> SELECT DEVICE BRAND AND MODEL  </span>
</div>

<!-- ======== select the device and model =================================== -->


<form method="post" action="#" id='' style='    margin-top: 55px;'>

 <input type="text" name="devicetype" style='display:none' placeholder='Enter device' class='input1' id="devicetype" autocomplete="off"
value="">


 <input type="text" name="brandname" placeholder='Enter brand' class='input1' id="brandname" autocomplete="off"
value="<?php echo $val;?>">
<br><br>

<input type="text" name="modelname"  placeholder='Enter model'class='input1' id="modelname" autocomplete="off"
value="<?php echo $val;?>">
<br><br>

<select  name="repair_type_last" style="    width: 70%;    margin-bottom: 33px;
    color: black;font-size:12px;display:none;
    border: 1px groove black;">
<option value="screen">screen</option>
<option value="battery">battery</option>
<option value="speaker">speaker</option>
</select>



<!-- ==== adidng the repair type for thsi deviuce ====== -->


<input type="text" name="repair_type" placeholder='Enter device repair e.g screen,speaker,lcd etc' 
class='input1' id="brandname" >



<!-- ==== repair type ends here ============================= -->



<br>

<br>


<div id="display1" style='    background: white;

    text-align: center;
    font-size: 18px;
    text-transform: capitalize;'></div>

<div id="display2" style='    background: white;

    text-align: center;
    font-size: 18px;
    text-transform: capitalize;'></div>
<input type="submit" value='GET PRICING' name="get_rate" class='submit2'>


</form>


<!-- ============== select the device and model here ========================== -->

 

</div>






<!-- ===== the repairing list starts here =============================================== -->

<div class='container' id='gadget_id_container'  style="display:<?php 
      if(isset($showrepairlist))
        echo 'block';
            else
              echo 'none';

?>;min-height: 26vw;
" >


<?php 

if(sizeof($arr1)<1)
{
  echo 'No matches found ';
}

        for($r=0;$r<sizeof($arr1);$r++)
        {
?><ul type='none'>
      <li class='repair_box' style='
    '><span class='repair_item_name'><?php echo $arr1[$r]['repairingitem'];?></span><strong style='    float: right;
    text-align: left;
    font-size: 18px;'><img src="img/rupee-symbol.png"  style='       margin-top: -11px;
    width: 29px;'><?php echo $arr1[$r]['cost'];?></strong></li>

</ul>  

<?php } ?>


  


</div>
<!-- ================= the repair list end shere =======================================   -->



</center>





</div>


<!-- ===== the form part starts here ================== -->




<?php 

include('footer2.php');

?>




</body>	

<style type="text/css">

/* -------------------------media queries startt here ------------------------------- */

          @media screen and (min-width:00px){


.repair_item_name{

  font-size: 13px;
    font-weight: bold;float: left;
    font-family: calibri;
}
.repair_box{

      border: 1px groove black;
    margin-bottom: 7px;
    padding: 2%;
    padding-top: 13px;
    padding-bottom: 34px;
}
.repair_box:hover{

  background:black;
color: white;
}
            .device_text{
                  position: absolute;
    margin-top: 7px;
    margin-left: -15%;
            }
ul.phone_listing{
    background: rgb(243, 179, 0);
    width: 64%;
    max-width: 383px;
    margin-left: 22%;
    max-height: 154px;
    overflow-y: scroll;
    position: absolute;
}


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
    border: 2px #F4B912 groove;
    width: 68%;
    height: 45px;
    margin-left: 5%;
    font-size: 20px;
    color: black;
    text-align: center;
  }
div#yellow_tab_outline {

 border:2px groove black;
  background:white;
    height:120px;
    padding-top: 24px;
    font-weight: bold;
 font-size: 28px;
color: black;
    border-radius: 15px;
    padding: 17px;margin-top: 12px;
    height: 125px;

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

.sell_gadget_title_bar {
    background: #f4b912;
    height: 58px;
    padding-top: 12px;
    vertical-align: middle;
    font-size: 18px;
    font-family: calibri;

}
.gadget_id_container{

 border: 2px groove #F4B912;
    margin-top: 27px;
    padding: 16px;
    max-width: 818px;
    height: 122px;
}

.device_pic {
    width: 39%;
    max-width: 99px;
    float: left; margin-top: -22px;
    min-width: 70px;
}

div#gadget_id_container{

  border: 2px groove #F4B912;
    margin-top: 27px;
    padding: 16px;
}

div#formshow1{


      padding-left: 26px;
    font-size: 18px;
}


}
          @media screen and (min-width:1000px){

.repair_item_name{

  font-size: 16px;
    font-weight: bold;float: left;
    font-family: calibri;
}


     .sell_gadget_title_bar {
    background: #f4b912;
    height: 58px;
    padding-top: 10px;
    vertical-align: middle;
    font-size: 24px;
    font-family: calibri;
}
div#yellow_tab_outline {
    border: 3px groove black;

 height: 96px;
    padding-top: 24px;
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
var age= $("#age").val();
var allaccessories_id=$("#allaccessories_id").val();
// AJAX Code To Submit Form.


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

     var newt=document.getElementById('allaccessories_id').value+','+a;
          document.getElementById('allaccessories_id').value=newt;


}</script>


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
$("#display1").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax2.php",
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
// addding the user selected bran here 


var makeselected=$('#brandname').val();



if(name=="")
{
$("#display2").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax2.php",
data: "modelname="+ name+"&makeselected="+makeselected ,
success: function(html){
$("#display2").html(html).show();
}
});
}
});
});
</script>

</html>