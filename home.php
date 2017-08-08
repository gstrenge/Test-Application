<?php
session_start();


if($_SESSION['login'])
{
	$user = $_SESSION['user'];
	echo "Hello $user";
}



?>