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





<!-- =========== modal price for calculator ========================================-->

  <div class="header" style='    background:black;width:100%;z-index:22'>  
  <div class="logo">
         <h1><a href="http://instarepair.in">
<img src="../img/logo1.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="../images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1" style="float: right;">
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
<div class='container' style='margin-top:12vw;border:1px groove #f4b912;padding: 0px; margin-bottom: 221px;max-width:1300px'>


<div class="sell_gadget_title_bar">
<span style='float:left'> PRIVACY POLICY </span><strong style='    font-weight: bold;
    font-style: italic;
    text-transform: uppercase;'> </strong>
</div>
<!-- ================= the body part starts here ========================================== -->

<div class="content" style="    text-align: left;
    padding-left: 4%;">
  
        <!-- ===== the privacy policy contenet comes here ============================= -->


<br>
This privacy policy ("Privacy Policy") sets forth a full and complete statement of the privacy related practices and procedures adopted by Instarepair Solutions Private Limited for its services. This Policy is effective as of the date set forth above, and will remain in effect and updated as this Policy provides.


<br><br>


<strong class='orange_font' style='color:black'>
DEFINITIONS</strong><br><br>
All terms initially capitalized shall have the meaning set forth in the Terms and Conditions, of which this Privacy Policy is an integral part.




<br><br>

<strong class='orange_font' style='color:black'>
APPLICATION</strong><br><br>
Instarepair aims at resolving/providing onsite & online solutions to different queries/problems that users of personal computers and peripherals may encounter while using it. The users of this service while creating their profile on the Portal for this purpose may be parting with their personal details/information. This Policy is to communicate that we respect your privacy, and we assure you that we will maintain and use this information responsibly. This Policy does not apply to persons employed by Instarepair. We agree not to process personal information in a way that is incompatible with the purposes for which it has been collected or authorized by the users.




<br><br>

<strong class='orange_font' style='color:black'>
FORM OF INFORMATION</strong><br><br>
This Policy applies to information that is obtained by Instarepair whether through electronic or print communications. Instarepair respects your privacy and is committed to protect the personal information that you share with us. Instarepair requests certain Personal Information as identified herein. Do not provide Instarepair with additional Personal Information unless you are requested to do so.




<br><br>

<strong class='orange_font' style='color:black'>
PERSONAL INFORMATION</strong><br><br>
"Personal information" means any information relating to an identified natural person, or a natural person that can be identified directly or indirectly, by reference to an identification number, or one or more factors relating to physical, psychological, mental, economic, or social identity.




<br><br>

<strong class='orange_font' style='color:black'>
HOW DOES INSTAREPAIR GATHER PERSONAL INFORMATION? </strong><br><br>
General Browsing: Instarepair gathers navigational information about where you go on our Web site. This information allows us to see which areas of our website are most visited. This helps us improve the quality of visitor's online experience by recognizing and delivering more of the features, services and products our visitors prefer. Additional non-personally identifiable information (i.e. domain type, browser version, service provider and IP address) may be collected which will provide information regarding your use of our Web site (such as the time of your last visit to a page on our site).
Registration and Transactions: Any information you provide to us at this site when you establish or update an account or request information (i.e. name, address, e-mail address and telephone number), is maintained in private files on our secure Web server and our internal systems. This information is used to enable Instarepair to deliver services to you. Instarepair and its employees do not entertain the credit card information in any form of communication on any of the media (website, chat, testimonial, email and voice). Instarepair neither stores nor publishes your credit card number on any of the media form on its server.
System information: Instarepair do not access any personal information (such as the contents of personal documents or web browsing history) stored on a PC. The data collected from the PC includes items such as:
System board, BIOS, CPU, video, and memory configuration;
Disk drives, disk controllers, and installed hardware;
System name & IP, Windows version, and browser type;
System status such as CPU load and available disk space;
Programs running during testing.
Use of Cookies: Instarepair uses a browser feature known as a cookie, which assigns a unique identification to your computer. Cookies also allow Instarepair to make our site more responsive to your needs, by delivering a better and more personalized experience to you. The cookies are typically stored on your computer's hard drive and are used by Instarepair to help track your clicks as you go through the pages within Instarepair web site. In addition, Instarepair uses cookies to help keep track of support requests and to tell us whether you have previously visited Instarepair. This allows registered users to avoid re-entering information upon every new visit to our site.




<br><br>

<strong class='orange_font' style='color:black'>
DOES INSTAREPAIR DISCLOSE YOUR PERSONAL IDENTIFIABLE INFORMATION?</strong><br><br>
You should be aware that we may disclose specific information about you if necessary to do so by law or based on our good faith belief that it is necessary to conform or comply with the law or is necessary to protect the users of our Web site, the site or the public. Instarepair does not sell, rent or trade your e-mail address to third parties. We may, however, use third parties to help us provide services to you, such as fulfilling orders, processing payments, monitoring site activity, conducting surveys, and administering e-mails. If personally identifiable information (i.e. name, address, e-mail address, telephone number) is provided to any of these third parties, we will require that such information be maintained by them in strictest confidence.




<br><br>

<strong class='orange_font' style='color:black'>
WHAT ARE MY RESPONSIBILITIES IN PROTECTING MY PERSONAL INFORMATION?</strong><br><br>
Member account, password and security: If any of the Services requires you to open an account, you must complete the registration process by providing us with current, complete and accurate information as prompted by the applicable registration form. You also will choose a password and a user name. You are entirely responsible for maintaining the confidentiality of your password and account. Furthermore, you are entirely responsible for any and all activities that occur under your account. You agree to notify Instarepair immediately of any unauthorized use of your account or any other breach of security. Instarepair will not be liable for any loss that you may incur as a result of someone else using your password or account, either with or without your knowledge. However, you could be held liable for losses incurred by Instarepair or another party due to someone else using your account or password. You may not use anyone else's account at any time, without the permission of the account holder.

We prefer to keep your personal information accurate and up-to-date. To do this, we provide you with the opportunity to update or modify your personal information including billing and shipping information by logging into your account.

When you create or change your account, we will send a message to the email address confirming the changes made and options you have chosen. Instarepair periodically distributes an e-mail newsletter, and you choose whether you want to receive a newsletter from us when you create your account. If you later decide not to receive the newsletter, you can remove yourself from the mailing list at any time.
Forgotten, Lost or Stolen Information: If you have forgotten your password, we provide a mechanism that e-mails your password to you. Since the "forgot my password" feature sends your password to the email address that you used for registration, do not use an email address that can be accessed by others that you would not want to see or change your Instarepair account information.

Always use caution when giving out any personally identifiable information about yourself or your children in any Communication Services. Instarepair does not control or endorse the content, messages or information found in any Communication Services and, therefore, Instarepair specifically disclaims any liability with regard to the Communication Services and any actions resulting from your participation in any Communication Services. Managers and hosts are not authorized Instarepair spokespersons, and their views do not necessarily reflect those of Instarepair.




<br><br>

<strong class='orange_font' style='color:black'>
WHAT ARE THE OTHER KEY ELEMENTS OF Instarepair PRIVACY POLICY?</strong><br><br>
Onward Transfer: Instarepair may transfer your Personal Information to a third party that is acting as Instarepair's agent, where it makes sure that the third party provide at least the same level of privacy protection as is required by the relevant principles or applicable law.
Access: Instarepair provides individuals with access to the Personal Information about them that Instarepair holds. Instarepair agrees that individuals may correct, amend, or delete that information where it is inaccurate, except where the burden or expense of providing access would be disproportionate to the risks to the individual's privacy in the case in question, or where the rights of persons other than the individual would be violated.
Security: Instarepair takes reasonable precautions to protect Personal Information from loss, misuse and unauthorized access, disclosure, alteration and destruction. Instarepair's website has safeguards in place to protect the loss, misuse and alteration of the data you provide to us with physical, electronic, and managerial procedures. While Instarepair strives to protect your Personal Information, Instarepair cannot guarantee the security of the Personal Information, so Instarepair urges you to take every precaution to protect your personal data when you are on the Internet. Change your passwords often, use a combination of letters and numbers, and make sure you use a secure browser. Within Instarepair, data is stored in controlled servers with limited access by authorized personnel...
Data Integrity: Instarepair will collect Personal information that is relevant for the purposes for which it is to be used. Instarepair takes reasonable steps to ensure that data is reliable for its intended use, accurate, complete, and current.
Third Party Sites: Instarepair's website contains links to other sites operated or maintained by third parties. We are not responsible for the privacy practices or the content of such website. We will not share your personal information with third parties websites. We encourage you to learn about the privacy policies of third party or co-branded websites.
Contact Us: If you have any questions about this Privacy Policy or this website, or wish to review or update your Personal Information, then please email us at support@Instarepair.in.
Enforcement: Instarepair periodically verifies that the policy is accurate, comprehensive for the information intended to be covered, prominently displayed, completely implemented, and in conformity with applicable privacy laws. We encourage interested persons to raise any concerns with us using the contact information above. We will investigate and attempt to resolve complaints and disputes regarding use and disclosure of Personal Information in accordance with the principles contained in this Policy. As an initial matter, Instarepair shall address each individual complaint regarding Instarepair compliance with this Policy.
Data Integrity: Instarepair will collect Personal information that is relevant for the purposes for which it is to be used. Instarepair takes reasonable steps to ensure that data is reliable for its intended use, accurate, complete, and current.
Changes to This Policy.
Instarepair reserves the right to change this Policy, and any of its policies or procedures concerning the treatment of information collected through the Website, without prior notice. Any changes to the Policy will become effective upon posting of the revised Policy on the Website. Use of the Website following such changes constitutes your acceptance of the revised Policy, then in effect. Instarepair encourages you to bookmark this page and to periodically review it to ensure familiarity with the most current version of the Policy.
This Policy represents the sole, authorized statement of Instarepair’s practices with respect to the collection of Personal Information through the Website and the manner of use of such information by INSTAREPAIR. Any summaries of this Policy generated by third party software or otherwise (for example, in connection with the Platform for Privacy Preferences or "P3P") shall have no legal effect, shall not be binding on INSTAREPAIR, shall not be relied upon in substitute for this Policy, and neither supersede nor modify this Policy.





<br><br>

<strong class='orange_font' style='color:black'>
Consent Amendments.</strong><br><br>
By using this Website, you consent to the terms of this Policy and to the use and management of Personal Information and Payment Information, if collected, by INSTAREPAIR for the purposes and in the manner herein provided. Should this Policy change, INSTAREPAIR intends to take every reasonable step to ensure that these changes are brought to your attention by posting the updated Policy on the Website. Your visit and any dispute over privacy are subject to this Policy. The said Policy shall be governed by and construed in accordance with the laws of the Republic of India. Further, it is irrevocably and unconditionally agreed that the courts of Delhi, India shall have exclusive jurisdiction to entertain any proceedings in relation to any disputes arising out of the same.














        <!-- ========== the privacy policy ends here =================================== -->
      
  
      </div>
</div>


      </div>












      </div>






<!-- =========== the bo0dy part ends here ================================================= -->


</div>
 




<?php 

include('footer2.php');

?>



<!-- ===== the form part starts here ================== -->
</body> 

<style type="text/css">

/* -------------------------media queries startt here ------------------------------- */

          @media screen and (min-width:00px){

.panel-heading {
    text-align: left;

  }
.underline_font{


  font-style: italic;
    color: #131010;
    border-bottom: 1px groove black;
}

.orange_font{
    color: #F4B912;
    font-family: helvetica;
    /* font-style: italic; */
    font-weight: normal;
    float: left;margin-left: 0px;
    border-bottom: 1px groove black;
    font-size: 19px;
    margin-left: 30px;
    font-weight: bold;
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