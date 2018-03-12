<?php
require 'includes/config.php';
if(isset($_SESSION['user']))
{
	unset($_SESSION['user']);
	session_destroy();
	header("Location:".$base_url);
}
?>