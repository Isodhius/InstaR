<?php 
include('../db.php');
include_once('functionstats.php');
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panga Cricket</title>
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />




    <!-- ======  the css styling party start  here -= ============================ -->
<style type="text/css">
div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
div#top_covers:hover{


  zoom:1.2;
}

.navbar {
    border-radius: 0px;
    background: black;
}


.edit_small{

    margin-top: 10px;
    margin-right: 94px;
float: right;
      color: white;
    background: #21A0C5;
    font-size: 13px;
    font-size: 11px;
    padding: 7px;
    border-radius: 5px;

}

</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>


<!-- -=============== update order ka notifications starts here ================================= -->

    <div class="col-md-4 col-sm-4" id='performed_op' style='  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>' >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                    <?php echo $optitle;?>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $opbody;?></p>
                        <div class="panel-footer">
                         <a href='javascript:void(0)' onclick="document.getElementById('performed_op').style.display='none'"> close it</a>
                        </div>
                    </div>
                </div>
</div>

<!-- ================ updaTE ORDER KA NOTIFICARIONS ENDS HERE ==================================== -->





          <div id='show_notify' class="choose_captain" style=';    margin-top: 122px;
    display: block;
    background: #E5EBF2;
    max-width: 500px;
    z-index: 333;
    position: fixed;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;display:none' >
                         
                          <span id="success_notify_text" style='color:red;display:none'>MESSAGE HAS BEEN POSTED SUCCESSFULLY </span>

                          <form action="#" method="post" >
                        <input type="text" name='useremail' style='border:none'  class="textbar_popup" id='notify_email' readonly><br><br>

                      <textarea name="usermessage" id='usermessage' class="textbar_popup" style="width:320px;height:120px;">

                          </textarea><br><br>

                          <a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="submit_personal_notification()">
                              POST TO USER DASHBOARD</a>
                              </form>



                         </div>
    <div id="wrapper" style='background:black'>
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style='    background: black;'>
<img src="../images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" width='200px'>



                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                   choose service here
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('devliveredorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> ALL delivered orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>

                                    <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('inprogressorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> In Progress Orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>




                        <li class="divider"></li>
       
               
                     
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
     
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
            <?php
          include('assets/left_sidenavbar.php');

       ?>



        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">



              <!-- =================== ADDING THE GRAPHIOCAL STAT5S AT THE TOP =========================================================== -->




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







<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   <script type="text/javascript">


                      function closeallpopup()
{

   document.getElementById('allorders').style.display='none';
    document.getElementById('devliveredorders').style.display='none';
    document.getElementById('inprogressorders').style.display='none';

}

   </script>
</body>
</html>
