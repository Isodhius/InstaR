<?php 

include "header.php"

?>


<script>
		$(document).ready(function() {  
		
		 $("#exit").click(function(){
        $("#window").hide();
	
    });
	
	
		$("#show").click(function(){
        $("#window").show();
		 });
		 
		 
		 $("#sell").click(function(){
        $("#window").show();
		 });
		 
		 $("#modify").click(function(){
        $("#window").show();
		 });
		 
		
    
})();
	
	
	</script>
	
	<script>

	function getValue(btn)
  {
	  
	  
	  
	 var newprice;
	 var newqty;
	  
	  
	var oldprice = document.getElementById("pricetxtbx").value;
	
	
	
	var oldqty = document.getElementById("qtnytxtbx").value;
	
	
	switch(btn) {
    case 'plus_price':
	
        newprice = Number(oldprice) + 1;
		document.getElementById("pricetxtbx").value = newprice;
		
        break;
    case 'minus_price':
	
        
		if(oldprice < 1)
		{
			alert("value Can not be less than 0");
			document.getElementById("pricetxtbx").value = 0;
		
		}
		else{
		newprice = Number(oldprice) - 1;
		document.getElementById("pricetxtbx").value = newprice;
		}
		
		
       break;
	case 'plus_qty':
        newqty = Number(oldqty) + 1;
		document.getElementById('qtnytxtbx').value = newqty;
        break;	
	
	
	case 'minus_qty':
	
	if(oldqty < 1){
		
		alert("Value Cannot be less than 0");
		document.getElementById('qtnytxtbx').value = 0;
	
	
	}else{
		
		newqty = Number(oldqty) - 1;
		document.getElementById('qtnytxtbx').value = newqty;
		
	}
        
        break;	
   
}		
	document.getElementById("pricetxtbx").value.changed();

		
		
			
	
  }
	
	
	
	
	
	</script>
	


     
    
        
    
     
    
   <div class="seperator"></div>
    

<div class="container" >
    
    <div class="row" >
        <div class="col-sm-3" style="color:#4BAE4F;" >


            <div class="btn-block btn top" style="border:3px solid #4BAE4F;text-align:center;"><h3>WHEAT</h3>
              
               <div> Grade A</div>
        </div>
      </div>

        <div class="col-sm-1">
            <div class="btn bottom " >
                <a href="#" class="change-link"><u>Change</u></a>
             
            </div>
            
     
        </div>

        <div class="col-xs-4"></div>


        <div class="col-sm-4" >
            <div class="btn-block btn font-color ">

                <h3>
                   
                    <span> 21 JANUARY 2016</span>
                    <br />

                    <span>9:46:54 &nbsp;AM </span>



                </h3>

            </div>




        </div>
      

    </div>

<div class="seperator bottom"></div>

<div class="container-fluid ">
        <div class="seperator"></div>
	<div class="row">
	
	<div class="col-sm-12 ">
           


           
             <div class="font-color tableheader">
                    Statistics
                    

                </div>
             <table class="table">
                <tbody>
                     <tr><td>Last Trade Price(Rs)</td>
                         <td>1150</td>
						 <td>Last Trade Quantity(MT)</td>
						 <td>34</td>


                     </tr>
                     <tr><td>Total Bid Quantity(MT)</td>
                         <td>123</td>
						 <td>Total Offer Quantity(MT)</td>
						 <td>190</td>
						 
                     </tr>
                     <tr><td>Days High(Rs)</td>
                         <td>1150</td>
						 <td>Days Low (Rs)</td>
                        <td>1120</td>
                     </tr>
                    
                    
                    


                </tbody>


            </table>


       </div>
	
	
	</div>	
	
</div>
 


    <div class="container-fluid">
        <div class="seperator"></div>
    <div class="row">
        
        <div class="col-sm-6 ">
              <div class="font-color tableheader">
                    BUY
                    

                </div>
            <table class="table">
               
                  <tbody>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>


                     </tr>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>
                     </tr>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>
                     </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>


                </tbody>


            </table>


        </div>
        <div class="col-sm-6 ">
              <div class="font-color tableheader">
                    SELL
                    

                </div>
            <table class="table">
              
                   <tbody>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>


                     </tr>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>
                     </tr>
                     <tr><td>adfadf</td>
                         <td>adfadf</td>
                     </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>
                    <tr><td>adfadf</td>
                        <td>adfadf</td>
                    </tr>


                </tbody>


            </table>

        </div>

    </div>
    </div>

   



 <div class="seperator bottom"></div>


    <div class="container-fluid ">
    <div class="row">


        <div class="col-md-3">
          
             <div class="buy-ribbon">
                 <div class="ribbon">BUY</div>
             </div>
                 
             <div class="ribbon-content">
                   BID ID
                 <div style="font-size:12px;font-weight:300;">Fc45345</div>
                 <div>
                     <span style="margin-right:17px;">PRICE</span>
                     <span>QUANTITY</span>
                 </div>
                  <div style="color:#4BAE4F;">
                     <span style="margin-right:17px;">RS.1145</span>
                     <span>45 MT</span>
                 </div>
                 <div style="border-top:2px solid #4BAE4F;">
                     <div class="btn btn-sm btn-block" id="modify"  >MODIFY</div>
                     
                 </div>

                </div>
         <div class="seperator"></div>
             
              

        </div>
     
        <div class="col-md-3 ">
            
            <div class="buy-ribbon">  <div class="ribbon">BUY</div> </div>
                 
                  <div class="ribbon-content">
                   BID ID
                 <div style="font-size:12px;font-weight:300;">Fc45345</div>
                 <div>
                     <span style="margin-right:17px;">PRICE</span>
                     <span>QUANTITY</span>
                 </div>
                  <div style="color:#4BAE4F;">
                     <span style="margin-right:17px;">RS.1145</span>
                     <span>45 MT</span>
                 </div>
                 <div style="border-top:2px solid #4BAE4F;">
                     <div class="btn-sm btn-block">MODIFY</div>
                     
                 </div>

                </div>
            <div class="seperator"></div>

             
                   
        </div>
       
        <div class="col-md-3">
            <div class="buy-ribbon">  <div class="ribbon">BUY</div> </div>
                 
                  <div class="ribbon-content">
                   BID ID
                 <div style="font-size:12px;font-weight:300;">Fc45345</div>
                 <div>
                     <span style="margin-right:17px;">PRICE</span>
                     <span>QUANTITY</span>
                 </div>
                 <div style="color:#4BAE4F;">
                     <span style="margin-right:17px;">RS.1145</span>
                     <span>45 MT</span>
                 </div>
                 <div style="border-top:2px solid #4BAE4F;">
                     <div class="btn-sm btn-block">MODIFY</div>
                     
                 </div>

                </div>

             

        </div>
        <div class="col-sm-offset-1"></div>
        <div class="col-md-2">
            <div style="margin-top:90px;">
            <div style="border:1px solid #4BAE4F;height:20px;width:200px;"><div style="text-align:center;">

                <div style="color:green;float:right;margin-right:50px;font-weight:500;margin-left:30px;">ADD BID</div>
                 <div style="font-size:16px;font-weight:600;color:#fff;background-color:#4BAE4F;width:30px;height:19px">+</div>
               
            </div>
                

            </div>

            </div>
        </div>

    </div>
    </div>


</div>

    <div class="seperator"></div>
	
	
		<div class="popup-container-b " id="window">
	 
        <div class="col-md-12 ">
            
            <div class="buy-ribbon"><div class="ribbon">BUY</div>  
			</div>
                 
                  <div class="ribbon-content" style="width:100%;height:314px;">
				  <div class="pull-right" ><div  class="close" id="exit"  ><img  src="images/close.png" height="30px"  /></div></div>
                   BID ID
                 <div style="font-size:12px;font-weight:300;">Fc45345</div>

                      <div>
                          <h4>Wheat-a</h4>

                      </div>


                 <div class="row">
                     <span class="col-xs-6">PRICE (Rs)</span>
                     <span class="col-xs-6">QUANTITY(MT)</span>
                 </div>
				 
				 
				 
                  <div style="color:#4BAE4F;" class="row">
                    <div style="col-xs-12">
                            <div class="col-xs-6">
							<div>
							<span>
							<input type="button" value="+" onclick="getValue('plus_price')" style="height:23px;width:10%;background-color:#4BAE4F;color:#FAFBFA;border:none;" />
							</span>
							<span>
							<input type="text" id="pricetxtbx" style="height:23px;border:2px solid #4BAE4F;margin-left:-6px;margin-right:-7px;text-align:center;" />
							</span>
							<span>
							<input type="button" value="-" onclick="getValue('minus_price')" style="height:23px;width:10%;background-color:#4BAE4F;color:#FAFBFA;border:none;" />
							</span>
							</div>
                        

                            </div>
							
							
                            <div class="col-xs-6">
                            <div>
						    <span>
						    <input type="button" id="plus" value="+" onclick="getValue('plus_qty')" style="height:23px;width:10%;background-color:#4BAE4F;color:#FAFBFA;border:none;" />
						    </span><input type="text" id="qtnytxtbx" style="height:23px;border:2px solid #4BAE4F;margin-left:-6px;margin-right:-7px;text-align:center;" /><span>
						    <input type="button" id="minus" value="-" onclick="getValue('minus_qty')" style="height:23px;width:10%;background-color:#4BAE4F;color:#FAFBFA;border:none;" />
						    </span>
						    </div>
                        

                        </div>
                       <div class="row col-xs-12" >

                      <input type="submit" value="SUBMIT" style="background-color:#4BAE4F;color:#FAFBFA;font-weight:600;margin-top:40px;"/>
					  </div>
                      <div class="seperator"></div>
                 </div>
                      
                 
                     
                 </div>

             

    </div>
			</div>
	</div>


<?php 

include "footer.php"

?>
