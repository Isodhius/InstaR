<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');
      
if(isset($_GET['senddeliveryaction']))
{
$orderid=$_GET['senddeliveryaction'];

$action=$_GET['transidchange'];


if($action=='Repaired')
{
$customerarr=get_order_details($orderid);

$linkcreated="www.instarepair.in/confirmdelivery=<?php echo $orderid?>";
?>
<center>
<form action='#' method='post' >
                            

              <span>Bill Amount

              </span>   


<input type="text" name='trackid' style='display:none' value="<?php echo $orderid; ?>">
     
        <input type='text' class='text_fld1' placeholder=''  style='display:none' 
        value="<?php echo $customerarr[0]['customer']?>" name='customername'>
         <input type='text' class='text_fld1' placeholder='' name='bill'>. 
         <input type='text' class='text_fld1' style='display:none'  placeholder='' 
         value="<?php echo $linkcreated;?>" name='link'> <br>
       

          

<br><br>



         <input type="submit" name='senddeliveryaction' style="background: black;
    border-radius: 2px;    margin-left: 12vw;
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step">
           


                        </form>

</center>



<?php }else if($action=='Delivered') {


?>



          <form action='#' method='post' >
                            

              <span>If your are confirmed of the Delivery of the product at customer address.Enter below details to genrate the invoice
                    

              </span>   
                  <br>

                  <br>
                  <ul class='nav1'>

      <li><a target='_blank' href="finalinvoice.php?deliverid=<?php echo $orderid; ?>"   class='black_button'
        style="font-family: helvetica;"  >
     Genrate Invoice 
          </a></li>

 


        </ul>




                        </form>










<?php







}else if($action=='Assigned'){


?>



                            

            ?<form action='#' method='post'>

                     <input type='submit' style="background: black;
    border-radius: 2px;   
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step" name='assignedsubmit'>


            </form> 
                  <br>

                  <br>
            


        Assigned to the pickup person successfully !










<?php







} 
else if($action=='Under Diagnose'){


?>



                            

              <span>
                Please provide a detailed description for the Diagnose Report below.
                    

              </span>   
                  <br>

                  <br>
            


          <form action='#' method='post' >

              <textarea name='report' style='width:320px;height:200px'></textarea>
              
<input type="text" name='trackid'  style='display:none' value="<?php echo $orderid; ?>">
<br>
<br>
                <input type='submit' style="background: black;
    border-radius: 2px;   
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step" name='diagonosereportsubmit'>

                        </form>










<?php







}else if($action=='Under Repair'){


?>



                 <center>           

              <span>
                Please provide a detailed description for under repair details.
                    

              </span>   
                  <br>

                  <br>
            


        
     <form  action='#' method='post' style=''>



    <label>Please enter the user track information </label><br>
                 <textarea name='report' style='    width: 300px;
    height: 120px;
    color: black;
    margin-top: 46px;' placeholder='Exact text will be copied to the user tracking'></textarea><br>




    <label style='color:black;display:none;'>Please enter the exact problem description to be shown in the Invoice</label><br>


                <textarea name='problem1' style='    width: 300px;
    height: 120px;;display:none;
    color: black;
    margin-top: 46px;' placeholder='Exact Problem description here'></textarea><br>
                   
                   <input type="text" style='display:none'  name='trackid' value="<?php echo $orderid; ?>" id='transidchange2'>         
                <br><br>
         <input type="submit" name='underrepairchangesubmit' style="background: black;
    border-radius: 2px;   
    background: black;
    border-radius: 2px;
    width: 180px;" class="mob-btn btn btn-primary next-step">
         


                 </form>

</center>







<?php







}


} ?>




<?php 


// generating the final invoice of user over here ============================

if(isset($_GET['generate_invoice']))
{

$orderid=$_GET['generate_invoice'];
$arr5=get_order_details($orderid);
// getting the values of transaction details from the databse 


     $email2=$arr5[0]['email'];
 $customer2=$arr5[0]['customer'];
 $pickupaddress2=$arr5[0]['pickupaddress'];
 $devicetype2=$arr5[0]['devicetype'];
 $phonenumber2=$arr5[0]['phonenumber'];
 $bill2=$arr5[0]['bill'];
 $problem2=$arr5[0]['problem'];


// creating the invoice here 

   

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(75);
$pdf->SetFont("Arial","",15);
$time2=get_present_time();

// Title
        $pdf->SetFont("helvetica","",10,'');
    



  //$pdf->SetX(-52);

        $pdf->Cell(85,10," INVOICE NUMBER : {$orderid}","0","1",C);
$pdf->Cell(85,10," Customer Name : {$name2}","0","1",C);
$pdf->Cell(85,10,"Email : {$email2}","0","1",C);
$pdf->Cell(85,10,"Phone : {$phone2}","0","1",C);
$pdf->Cell(85,10,"Address :{$pickupaddress2}","0","1",C);

$pdf->Cell(85,10,"Device Type:{$devicetype2}","0","1",C);
$pdf->Cell(85,10,"Device brand :{$brand2}","0","1",C);
$pdf->Cell(85,10,"Problem Description :{$problem2}","0","1",C);
$pdf->Cell(85,10,"Overall Charges : Rs. { $bill2}","0","1",C);






//$pdf->output();
$invoicename=get_invoice_number($orderid);
$content = $pdf->Output('invoices/'.$invoicename,'F');



$cmd="update transaction set invoice_pickup='$invoicename' where trans_id='$trans_id'";
      $result=mysql_query($cmd);


?>
<span>Invoice generated view and send the invoice at his mail id :<?php echo $mail2; ?></span>
<br><br>

<a class='black_button'  style='display:inline-block'  class='black_button' href="invoices/<?php echo $invoicename; ?>">

Send Invoice
</a>

<?php
}
            if(isset($_GET['changedeliveryaddress']))
{

  $orderid=$_GET['orderiddelivery'];
  $address1=$_GET['address1'];

    
$cmd="update transaction set deliveryaddress='$address1' where trans_id='$orderid'";
$result=mysql_query($cmd);



}

?> 