<?php 
	if(!isset($_SESSION['username']))
	{
		echo "<script>";
		echo "alert('还未登录，请前往登录');";
		echo "window.open('http://localhost/jingsai/register.php')";
		echo "</script>";
		exit();
	}
 ?>