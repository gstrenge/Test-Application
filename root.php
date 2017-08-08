<?php
session_start();

include("dbConnect.php");


$_SESSION['login'] = 'false';


?>
<html>
	<head>
		<title>Login</title>
	</head>
	
	<body>
	
		<form action="interpret.php" method='POST'>
		
		<p>
			Username: <input type="text" name="username">
		</p>
		<p>
			Password: <input type="text" name="password">
		</p>
		
		<p>
			<input type='submit' value ="submit">
		</p>
		
		</form>
	
	<body>

</html>
