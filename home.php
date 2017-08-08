<?php
session_start();
?>

<html>

<?php
if(isset($_SESSION['login']))
{
	if ($_SESSION['login'] && isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
	
?>

	<head>
		<title>Login</title>
		<center><?php  echo "Hello $user"; ?></center>
	</head>
	
	<body>
	
		<p>
			Welcome
		</p>

	</body>
<?php
	}
}
if(!isset($_SESSION['login']))
{
	echo "You are not logged in!";
	?>
	
	<head>
		<title>(Not Logged in)</title>
	</head>
	
	<body>
		<p>
			Incorrect Login Information
			<form action = 'root.php'>
				<input type = 'submit' value = 'Retry'>
			</form>
		</p>
	</body>
<?php
}
?>
</html>