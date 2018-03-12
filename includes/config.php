<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"frangile");

$base_url = "http://localhost/frangile/";
?>