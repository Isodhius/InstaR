<?php 
include('functionapp.php');



if(isset($_POST['submitmodel']))
{

$brandname=$_POST['brandname'];
$devicetype=$_POST['devicetype'];

$modelname=$_POST['modelname'];
$cmd="insert into modelname(BrandName,CatageryId,Name) values ('$brandname','$devicetype','$modelname')";
$result=mysql_query($cmd);

}



if(isset($_POST['submitbrands']))
{

$brandname=$_POST['brandname'];
$devicetype=$_POST['devicetype'];
$cmd="insert into brand(brandName,catageryId) values ('$brandname','$devicetype')";echo $cmd;
$result=mysql_query($cmd);

}
if(isset($_GET['deletebrand']))
{

$brandname=$_GET['deletebrand'];

$cmd="delete from brand where brandName='$brandname'";
$result=mysql_query($cmd);

$showmessage="Last row deleted is for brand:".$brandname;


}

if(isset($_GET['deletemodel']))
{

$id=$_GET['deletemodel'];
$brandname=get_device_model_name_bysl($id);
$cmd="delete from modelname where Id='$id'";
$result=mysql_query($cmd);

$showmessage="Last row deleted is for Device :".$brandname;


}



?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<style type="text/css" >


.a_button{


  background: #F5F3F3;
    float: right;
    color: black;
    margin-top: -21px;
    padding: 5px;
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


a.black_button{
          background: black;
    color: white;
    /* padding-right: 79px; */
    /* padding-left: 12px; */
    padding: 6px;
    padding-left: 25px;
    text-transform: uppercase;
    padding-right: 25px;
}
a.black_button:hover{

background: white;
color:black;

}
</style>


</head>
<body style="    background: url('img/back3.jpg');">

<!-- =========================== enter new moodel comes here ================================================================= -->


<div class="modal fade" id="addnewmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                <section>
                  <div class="wizard">
             
            
           
                      <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          <div class="mobile-grids">
                          
                    <center>
<form action="#" method='post' >

<!-- ====== the firdt form comes here for sslectin g the current staus ogff the order id =======  -->
<label style='color:black'>Enter the Brand Name :</label><br>
 <input type="text" name='brandname'><br>
                           
<label style='color:black'>Enter the Model Name :</label><br>
 <input type="text" name='modelname'><br>

   <select name='devicetype'  style='color:black;width:230px;
                             height:54px;font-size:15px;' onchange="get_status_and_load_form()">
                                        <option>Choose Your device type</option>
                                       <option value='1'>Mobile </option>
                                  
                                          <option value='2'>Tablet</option>
                                            <option value='3'>Desktop</option>
                                                  <option value='4'>PC</option>

                                    </select> 


                                    <input type='submit' class="btn btn-default" 
      style="background-color:red;color:white;opacity:0.78" name='submitmodel' >
</form>
                             <br>

<!-- =========================== first and second case  form comes here ========================= -->
             
                            

          </div>

                    
                        <div class="clearfix"></div>
                      </div>
      
                  </div>
                </section>
            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== enter new moodel comes here  ================================================================================ -->




<!-- =========================== enter new brand comes here ================================================================= -->


<div class="modal fade" id="addnewbrands" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                <section>
                  <div class="wizard">
             
            
           
                      <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          <div class="mobile-grids">
                          
                    <center>
<form action="#" method='post' >

<!-- ====== the firdt form comes here for sslectin g the current staus ogff the order id =======  -->
<label style='color:black'>Enter new Brand Name :</label><br>
 <input type="text" name='brandname'><br>
                             <br>


   <select name='devicetype'  style='color:black;width:230px;
                             height:54px;font-size:15px;' onchange="get_status_and_load_form()">
                                        <option>Choose Your device type</option>
                                       <option value='1'>Mobile </option>
                                  
                                          <option value='2'>Tablet</option>
                                            <option value='3'>Desktop</option>
                                                  <option value='4'>PC</option>

                                    </select> 


                                    <input type='submit' class="btn btn-default" 
      style="background-color:red;color:white;opacity:0.78" name='submitbrands' >
</form>
                             <br>

<!-- =========================== first and second case  form comes here ========================= -->
             
                            

          </div>

                    
                        <div class="clearfix"></div>
                      </div>
      
                  </div>
                </section>
            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== enter new brand comes here  ================================================================================ -->





<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="javascript:void(0)">
<img src="../img/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
  <div class="top-nav" style="    margin: 7px 0 0 80%;" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
      
          
        
       <li STYLE="color:white"><a href="../index.php" >INSTAREPAIR HOME </a></li>


               <li STYLE="color:white"><a href="callback.php" >CALLBACK DATA </a></li>
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
    padding-right: 12px;" >Hello , <?php echo substr($_SESSION['allotedperson'],0,10); ?> ( SIGNOUT )</a></li>


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


<div class="container" style='background: white;
    margin-top: 12vw;
    height: auto;'>


<?php 
if(isset($showmessage))
  echo $showmessage;

?>

 
 <div class="panel-heading" id='brandmenu' style='    background: black;
    height: 55px;
    width: 100%;
    padding-top: 20px;'>
        <h4 class="panel-title" style='color:white'>
VIEW -> DELETE -> all existing brandnames 
          </h4>




          <a href="#"  data-toggle="modal" id='a_button_repair'  class='a_button' data-target="#addnewbrands" >
ADD NEW

  </a>
        </div>




<!-- ======== all orders will come here ============================================================================= -->
          <div class="table-responsive" id='allorders'>          
  <table class="table" style='font-size: 11px;'>






<?php 

        $arr1=get_all_brandnames();


?>

    <thead>
      <tr>
        <th style='font-size:17px;'>S.NO</th>
        <th style='font-size:17px;'>Category</th>
          <th style='font-size:17px;'>Brand</th>
        <th style='font-size:17px;'>is active</th>
          
        <th style='font-size:17px;'>is delete</th>
    


        <th style='font-size:17px;'></th>
        
      </tr>
    </thead>

    <tbody>
      <?php 
          for($r=0;$r<sizeof($arr1);$r++)
                    {
      ?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">




<td><?php echo $r+1;?></td>
<td><?php echo get_device_type_by_category($arr1[$r]['catageryId']);?></td>
<td><?php echo $arr1[$r]['brandName'];?></td>
<td><?php echo $arr1[$r]['isActive'];?></td>

<td><?php echo $arr1[$r]['isDelete'];?></td>



         </tr>
<!-- ========================== in case of assigned process change ========================== -->
  

<tr>

    <td><a href="?deletebrand=<?php echo $arr1[$r]['brandName'];?>" onclick="
      " class="btn btn-default" 
      style="background-color:red;color:white;opacity:0.78">DELETE THIS</a></td>


        

  
</tr>   



      <?php } ?>







      
    </tbody>
  </table>
  </div>




















<!-- ================== all orders will come here ========================================================================== -->


<!-- ====== model name details starts here ============================== -->

 <div class="panel-heading" id='brandmenu' style='    background: black;
    height: 55px;
    width: 100%;
    padding-top: 20px;'>
        <h4 class="panel-title" style='color:white'>
VIEW -> DELETE -> all existing modelnames
          </h4>



          <a href="#"  data-toggle="modal" id='a_button_repair'  class='a_button' data-target="#addnewmodel" >
ADD NEW

  </a>
        </div>




<!-- ======== all orders will come here ============================================================================= -->
          <div class="table-responsive" id='allorders'>          
  <table class="table" style='font-size: 11px;'>






<?php 

        $arr1=get_all_modelnames();


?>

    <thead>
      <tr>
        <th style='font-size:17px;'>S.NO</th>
        <th style='font-size:17px;'>BrandName </th>
        <th style='font-size:17px;'>category</th>
          
        <th style='font-size:17px;'>is active</th>
    
     <th style='font-size:17px;'>is delete</th>

        
      </tr>
    </thead>

    <tbody>
      <?php 
          for($r=0;$r<sizeof($arr1);$r++)
                    {
      ?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">




<td><?php echo $r+1;?></td>
<td><?php echo $arr1[$r]['BrandName'].' '.$arr1[$r]['Name'];?></td>
<td><?php echo get_device_type_by_category($arr1[$r]['CatageryId']);?></td>
<td><?php echo $arr1[$r]['IsActive'];?></td>

<td><?php echo $arr1[$r]['IsDelete'];?></td>



         </tr>
<!-- ========================== in case of assigned process change ========================== -->
  

<tr>

    <td><a href="?deletemodel=<?php echo $arr1[$r]['Id'];?>" onclick="
      " class="btn btn-default" 
      style="background-color:red;color:white;opacity:0.78">DELETE THIS</a></td>


        

  
</tr>   



      <?php } ?>







      
    </tbody>
  </table>
  </div>


<!--- ================ model name ends hgere ============================== -->













  </div>
</center>




<script type="text/javascript">
   
// loading he custoemnr reapir colmplete function over here 




// loading the customer detiails after repair is completed 

          
function create_preview_invoice(orderid)
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
      


    document.getElementById("secondform").innerHTML=xmlhttp.responseText;

    }

  }
xmlhttp.open("GET","allloads.php?generate_invoice="+orderid+"&transidchange="+transidchange,true);
xmlhttp.send();


}



</script>
</body>	


</html>