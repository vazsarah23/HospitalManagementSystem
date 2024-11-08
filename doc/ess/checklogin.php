<?php
function check_login()
{
if(strlen($_SESSION['Licenseno'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="doctorlogin.php";
		$_SESSION["Licenseno"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>