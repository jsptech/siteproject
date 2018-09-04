<?php 
function confirm_login()
{
	if(!isset($_SESSION['username']))
	{
		header("Location:login");
	}
}
?>