<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');


if(isset($_GET['send_delivery_sms']))
{

      $orderid=$_GET['send_delivery_sms'];

      list($a,$b)=get_pay_ment_info_details($orderid);

$link='instarepair.in/';
          $link.=invoice_generated($orderid);


       $msg="Thanks for the payment. we have received the payment of Rs. ".$a." . Bill has been sent on your mail or you may refer link for the same ".$link.". Thanks for choosing Instarepair.";

     sendmessage($msg,$b);

    $smssent=1;
}


        if(isset($_POST['submitinvoicedata'])){
                $trans_id=$_POST['trans_id'];
              $name=$_POST['customer'];

              $address=$_POST['address'];
              $devicetype=$_POST['devicetype'];
              $model=$_POST['model'];
              $contact=$_POST['contact'];
              $problem1=$_POST['problem1'];
              $charge1=$_POST['charge1'];
                  $problem2=$_POST['problem2'];
                       $email=$_POST['email'];
              $charge2=$_POST['charge2'];
              $charge3=$_POST['charge3'];
                $problem3=$_POST['problem3'];
              $charge4=$_POST['charge4'];
               $problem4=$_POST['problem4'];
              $charge5=$_POST['charge5'];
               $problem5=$_POST['problem5'];
            // ============== ==============================
$total=$charge1+$charge2+$charge3+$charge4+$charge5;




// creating the invoice here 



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(75);
$pdf->SetFont("Arial","",15);
$time2=get_present_time();

// Title
        $pdf->SetFont("helvetica","",10,'');
    





// the header par of pdf =======================================================================================================





    // To be implemented in your own inherited class
date_default_timezone_set("Asia/Calcutta");
                          $time2=date('y-m-d');
                   
  $pdf->Image('ss.png',10,6,30);
  $pdf->Ln(20);
$pdf->SetFont("Arial","",15);
$pdf->SetY(5);
$pdf->SetX(122);
  $pdf->Cell(0,2,"INSTAREPAIR SOLUTIONS PVT LTD.","0","1",C);
    $pdf->Ln(4);
    $pdf->SetX(122);
   
$pdf->Ln(2.8);
$pdf->Cell(0,2,"-------------------------------------------------------------------------------------------------------------------------------","0","1",C);
$pdf->SetY(85);
$pdf->SetX(122);
$pdf->SetFont("Arial","B",8);


// left side details ===============================
    $pdf->Ln(4);
        $pdf->Ln(4);$pdf->SetX(-322);
$pdf->SetFont("Arial","",17);


    $pdf->Ln(4);
      $pdf->Cell(0,2,"","",11);
$pdf->SetFont("Arial","B",11);
    $pdf->Cell(0,2,"BILLING DETAILS :","",11);  $pdf->Ln(4);  $pdf->Ln(4);
    $pdf->SetFont("Arial","",9);
  $pdf->Cell(0,2,"{$name}","0","1");
    $pdf->Ln(4);
  $pdf->Cell(0,2,"{$address}","0","1");
    $pdf->Ln(4);
  $pdf->Cell(0,2,"{$email}","0","1");
      $pdf->Ln(4);
  $pdf->Cell(0,2,"{$contact}","0","1");
 
// left side detailsends here ================================

  // right side detailos starts here ========================================================

$pdf->SetY(35);
      $pdf->SetX(0);              $pdf->Ln(4);
              $pdf->Cell(0,2,"","0","1",C);
              $pdf->SetFont("Arial","B",14);
        $pdf->Cell(0,2,"Invoice number: IN{$trans_id}","0","1",C);
              $pdf->Ln(4);
  $pdf->Cell(0,2,"Date :{$time2}","0","1",C);
      $pdf->Ln(4);


  // right side details will ends here =========================================================================







 $pdf->SetFont("Arial","",10);

$pdf->SetY(135);



  //$pdf->SetX(-52);


$pdf->Cell(145,10,"Device Type : {$devicetype}","1","1");


if($problem1!='')
{
$pdf->Cell(145,10," {$problem1}   INR {$charge1}","1","1");
}
if($problem2!='')
{
$pdf->Cell(145,10," {$problem2}   INR {$charge2}","1","1");
}
if($problem3!='')
{
$pdf->Cell(145,10," {$problem3}   INR {$charge3}","1","1");
}
if($problem4!='')
{
$pdf->Cell(145,10," {$problem4}   INR {$charge4}","1","1");
}

if($problem5!='')
{
$pdf->Cell(145,10," {$problem5}   INR {$charge5}","1","1");
}

$pdf->Cell(145,10," OVERALL CHARGES:   INR {$total}","1","1");


// =========================== new pdf examples ================================================= 






//============================= new pdf examples ends hre



//$pdf->output();
$invoicename='invoices/IN'.$trans_id.'.pdf';
$content = $pdf->Output($invoicename,'F');



$cmd="update transaction set invoice_pickup='$invoicename',trackstatus='delivered' where trans_id='$trans_id'";
      $result=mysql_query($cmd);


if($result)
{

  $createdpdf=1;
}


        }



if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }




if(isset($_GET['forward_id']))
{
  $order=array();
  $sl=$_GET['forward_id'];
    $cmd="select * from transaction where trans_id='$sl'";
    $result=mysql_query($cmd);
                  while($row=mysql_fetch_array($result))
                  {
                     array_push($order,$row);
                  }
                     

}

 if(!isset($_SESSION['alloteduser']))
    {

?>

<script>
window.location='panels.php';

</script>


<?php


    }




if(isset($_POST['allot_vendor']))
{
      $orderid=$_POST['orderid'];
      $vendorcode=$_POST['vendorcode'];
  $arr4=get_order_details($orderid);

  //================================== get pcikup boy name  ==============
$vendorname=get_vendors_name($vendorcode);
$address=get_vendors_address($vendorcode);
$merchant=$arr4[0]['pickupperson'];
            $cmd="select * from pickupboy where personcode='$merchant'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                     $pickupphone=$row['phone'];
                  }
  
  $msg="Dear ".$pickupboyname." your vendor for transaction id : ".$orderid." is ".$vendorname." location : ".$address;
sendmessage($msg,$pickupphone);


$cmd="Update transaction set vendor_alloted='$vendorcode' where trans_id='$orderid'";
$result=mysql_query($cmd);


echo $cmd;
}
// ========================= alloting the vendor to pickup boy =============================
 
?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>





<!-- =========================== add a new person  ================================================================= -->


<div class="modal fade" id="addnewpickupboy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='opacity:1'>
        <div class="modal-dialog" role="document" style='    margin-top: 22vw;'>
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <!-- modal body -->
            <div class="modal-body">
                <center>
                <form action="#" method='post'>

                        <input type="text" name='person' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='address' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='phone' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                    

                              <input type="submit" name="newpickupsubmit" value="ADD TO SERVICE" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" ><BR>

                        </form>



                              </center>


                </form>   
              



                      </div>
           <!-- modal body ends here -->
          
          </div>
        </div>
      </div>
      <!-- //mobile -->


<!-- ===================== header class starts here ====================================================== -->
<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="javascript:void(0)">
<img src="img/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
  <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
      
                <li STYLE="color:white">TECHNICAL PANELS </li>
        
     



                      <li><a href="?logoutpanel=1" data-toggle="modal" style="
    /* padding: 5px; */
    border-radius: 0px;
    
    font-size: 15px;display:<?php 
if(!isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,14); ?> ( SIGNOUT )</a></li>


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


<!-- =============== header ends here -===================================================== -->





<?php

if(isset($_GET['deliverid']))
        $arr1=get_order_details($_GET['deliverid']);




?>




  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw;display:<?php 
if(!$createdpdf)
  echo 'block';
else
  echo 'none';
?>;display:<?php 
      if(isset($smssent))
        echo 'none';


?>'>

  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
CREATE FINAL INVOICE 
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>

                <form action="#" method="post">
      <?php 
                  for($t=0;$t<sizeof($arr1);$t++)
                  {
      ?>

      <input type="text" value="<?php echo $_GET['deliverid'];?>" style='display:none'  name="trans_id"    >
             <tr><td>CUSTOMER NAME :</td><td><input type="text" name="customer" value="<?php echo $arr1[0]['customer']?>"></td></td></tr>
       <tr><td>ADDRESS :</td><td><input type="text" name="address" value="<?php echo $arr1[0]['pickupaddress']?>"></td></tr>
              <tr><td>EMAIL :</td><td><input type="text" name="email" value="<?php echo $arr1[0]['email']?>"></td></tr>
            <tr><td>DEVICE TYPE :</td><td><input type="text" name="devicetype" value="<?php echo $arr1[0]['devicetype']?>"></td></tr>
             <tr><td> MODEL :</td><td><input type="text" name="model" value="<?php echo $arr1[0]['model']?>"></td></tr>
                <tr><td> CONTACT NO :</td><td><input type="text" name="contact" value="<?php echo $arr1[0]['phonenumber']?>"></td></tr>
                  <tr><td> PROBLEM DESCRIPTION 1 :</td><td><input type="text" name="problem1" value="<?php echo $arr1[0]['problem']?>"></td></tr>
                      <tr><td> CHARGES 1 :</td><td><input type="text" name="charge1" value="<?php echo $arr1[0]['']?>"></td></tr>
                        <tr><td> PROBLEM DESCRIPTION 2 :</td><td><input type="text" name="problem2" value="<?php echo $arr1[0]['']?>"></td></tr>
                      <tr><td> CHARGES 2 :</td><td><input type="text" name="charge2" value="<?php echo $arr1[0]['']?>"></td></tr>
                        <tr><td> PROBLEM DESCRIPTION 3 :</td><td><input type="text" name="problem3" value="<?php echo $arr1[0]['']?>"></td></tr>
                      <tr><td> CHARGES 3 :</td><td><input type="text" name="charge3" value="<?php echo $arr1[0]['']?>"></td></tr>
                        <tr><td> PROBLEM DESCRIPTION 4 :</td><td><input type="text" name="problem4" value="<?php echo $arr1[0]['']?>"></td></tr>
                      <tr><td> CHARGES 4 :</td><td><input type="text" name="charge4" value="<?php echo $arr1[0]['']?>"></td></tr>

                        <tr><td> PROBLEM DESCRIPTION 5 :</td><td><input type="text" name="problem5" value="<?php echo $arr1[0]['']?>"></td></tr>
                      <tr><td> CHARGES 5 :</td><td><input type="text" name="charge5" value="<?php echo $arr1[0]['']?>"></td></tr>



                      <?php } ?>
        
        <tr></tr>

            <tr><td>
        <input type="submit" class="btn btn-default"  style='background:orange' name="submitinvoicedata">
              </td></tr>
                        </form>
    </thead>
              

      
    </tbody>
  </table>


  </div>
</div>

</div>
</div>










  <!-- =================================== send vendor details ends here ============================================= -->
<div class="container" style='padding-top:12vw;<?php 
if($createdpdf)
  echo 'block';
else
  echo 'none';
?>;<?php 
if(isset($smssent))
  echo "display:none";


?>'>

<center>


  <span>Congratulations ! Invoice is generated .Click below to download and forward it to the customer.</span>
  <br><br><a class='black_button' style='color: white;
    border-radius: 3px;display:inline-block;
    padding: 13px;
    background: green;'  target='_blank' class='black_button' href="<?php echo $invoicename; ?>">

View/download Invoice
</a>

<a class='black_button' style='color: white;display:inline-block;
    border-radius: 3px;
    padding: 13px;
    background:#A7750C'  target='_blank' class='black_button' href="?send_delivery_sms=<?php echo $_GET['deliverid']; ?>">
Send invoice
</a>


</center>
</div>





<div class="container" style='padding-top:12vw;<?php 
if(!isset($smssent))
  echo "display:none";
else
  echo "display:block";


?>'>

          <center>

Your sms was successfully sent to the custoerm at his registered mobile number.visit <a href="supporthome.php">home</a>.



          </center>



</div>
</body>	


</html>