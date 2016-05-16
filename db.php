<?php
//Give your mysql username password and database name

$con=@mysql_connect("localhost","need_junction_us","pass");

mysql_select_db("need_junction",$con);
session_start();


?>
