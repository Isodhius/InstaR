<?php 
	if(isset($_GET['signout']))
	{
unset($_SESSION['adminlogged']);

?>
<script type="text/javascript">

window.location='adminlogin.php';
</script>
<?php
}

?>