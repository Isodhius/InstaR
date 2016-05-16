<?php 
include('../db.php');
include('../functions.php');
// submitting all the values from the user ebtry of buy back 
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


$cmd="insert into buybackuser(devicetype,model,brand,devicestatus,functional,accessories,deviceage,overallcondition,customer,address,phone,timings,email,shownprice) values('$devicetype','$modelname','$brandname','$devicestatus','$functionalval','$accessoriesval','$deviceage','$overallval','$customername','$customerpickup','$customerphone','$timings','$customeremail','$shownprice')";
$result=mysql_query($cmd);
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

echo $cmd;
$result=mysql_query($cmd);

        }

?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <link href="../css/bootstrap.css" rel="stylesheet">
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

  <div class="header" style='    background:black;width:100%;z-index:22'>  
  <div class="logo">
         <h1><a href="http://instarepair.in">
<img src="../img/logo1.png"  style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="../images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1" style='float:right'>
          <li><a href="#" class='phonehover' style="font-family: helvetica;"  >
          <img src="../img/phone1.gif" style='max-width:32px' >  81 00 75 75 75 
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
<div class='container' style='margin-top:12vw;border:1px groove #f4b912;padding: 0px; margin-bottom: 221px;max-width:1000px'>


<div class="sell_gadget_title_bar">
<span style='float:left'> ABOUT US  </span><strong style='    font-weight: bold;
    font-style: italic;
    text-transform: uppercase;'> Passion for excellence</strong>
</div>


<div class='row' >
<div class="col-md-12 col-sm-12 col-xs-12" style='      padding: 4%;
font-family:calibri;
    font-size: 20px;padding-left: 10%;
    text-align: left;'>

<strong>Instarepair </strong> is here to provide instant repair service at an affordable price. 
Simply buying a new phone is not always affordable or desirable. 
When faced with transferring information, reloading apps and passwords, most people would rather fix their 
current phone, as long as it can be done quickly and affordably.<br><br>
<strong>
Instarepair </strong>works to provide ultimate consumer satisfaction by keeping the costs of repair affordable than
 the rest of the industry as well as offer quality repair service experience that stands out from the rest.<br><br>
We trust in technology and innovation to delight our customers. Be it free pick-up, delivery and diagnosis Service or Free Standby Smartphone, our model is built to deliver exceptional client service.
Our service becomes reliable as we bring transparency at every step. From SMS Updates to Help Line Service number and Web Tracking, technology is integrated to give our clients unmatched service delivery.
We only employ highly trained and certified technicians to ensure that the repair service of utmost quality. Our 90 Days post repair warranty is testament to it. 
</div>


</div>
 

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
padding-left: 5%;
background: #f4b912;
    height: 58px;
vertical-align: middle;
    font-size:18px;
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




.sell_gadget_title_bar{

    font-size:22px;

  }
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


}</script>
</html>