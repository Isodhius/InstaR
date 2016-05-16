<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.css" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<span style='float:left'> WARRANTY POLICY </span>
</div>


<div class='row' >
<div class="col-md-12 col-sm-12 col-xs-12" style='      padding: 4%;
font-family:calibri;
    font-size: 20px;padding-left: 10%;
    text-align: left;'>

Every repair carried out at Instarepair comes with a statement of support to promote customer confidence: our warranty. The support we provides is in the form of replacement parts or repairs done for qualified failures specifically associated with repairs carried out at our repair centers and/or defects in material or spare parts used to carryout repair and/or workmanship.
A post-repair warranty is not necessarily an implication of a Gadgets life expectancy or performance level but is limited to the functioning of specific parts of said gadget.  After all, at Instarepair, quality is the way of life. For the convenience of customers, a copy of the policy is published and can be accessed right here from our website.




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


.underline_font{


  font-style: italic;
    color: #131010;
    border-bottom: 1px groove black;
}

.orange_font{

      color: #F4B912;
    font-family: helvetica;
    font-style: italic;
    font-weight: normal;
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
strong{


  text-transform: capitalize;
}

.input1{
      width: 68%;
}

  }
/* ============== media queries ends here ====================================== */


</style>

</html>