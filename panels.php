<?php 
include('db.php');
include('functions.php');




				if(isset($_POST['submitlogin']))
{
	$username1=$_POST['username1'];

  $password1=$_POST['password1'];

loginpanelppl($username1,$password1);

}

        if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }


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
<body style="    background: url('img/back3.jpg');">









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
        
     



                      <li><a href="?logoutpanel=1" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;
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


<!-- =============== header ends here -=================== -->
      <center>
<div class="container" style='padding-top:12vw'>
 




<div class="" style="    background: white;
    padding-top: 79px;
    height: 174px;display:<?php 
if(!isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    border: 1px groove black;
    color: black;" id="">

You are being redirected to your accounts page .......


<a href="<?php echo $_SESSION['redirectpage'];?>">click here </a>
        


</div>





                            <!-- ============ login popup ================================== -->





<!-- =========================== for requesting a callback ================================================================= -->



                                    <div  style="    background: #CA9957;
    width: 45%;min-width:320px;
    color: black;display:<?php 
if(isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    height: auto;    opacity: 0.89;
    padding-top: 112px;
    padding-bottom: 121px;
    border-radius: 12px;">   

              <form action="#" method="post">
                                    <table>                        
                              <tr><td><label style='color:black'>YOUR USERNAME:<label></td></tr>

                               <tr><td> <input type="text" name="username1" ></td></tr>


                              <tr><td><label style='color:black'>YOUR PASSWORD:<label></td></tr>

                               <tr><td> <input type="text" name="password1" ></td></tr>
                                  <tr></tr>
                               <tr><td> <input type="submit" style="       background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
 border:none;
    color: white;
    padding: 3px;
    font-size: 12px;
    height:26px;
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left:12px;
    padding-right: 12px;'" name="submitlogin" value="LOGIN YOURSELF"> </td></tr>
                                      </div>

                                        </table>   

      <!-- //mobile -->
              </form>



<!-- ================== requersting a callback ================================================================================ -->






                            <!-- ============== login popup ends her =========================== -->


  </div>
</center>
</body>	


</html>