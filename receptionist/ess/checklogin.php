<?php
function check_login()
{
if(strlen($_SESSION['rid'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="receplogin.php";
		$_SESSION["rid"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>