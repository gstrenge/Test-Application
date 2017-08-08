<?php
session_start();
include('dbConnect.php');
$db = $dbh;

//$user_arr = array('admin' => '', 'sportplayer123' => 'password1','malcolmx' => 'MalX');
//$_SESSION['user_arr'] = $user_arr;

$usr = strtolower($_POST['username']);
$pwd = $_POST['password'];
$pwdHASH = hash('sha256',$pwd);
$queryCheck = $db->prepare('SELECT username,pwd FROM accounts WHERE username = ? and pwd = ?');

$queryCheck->bindParam(1,$usr);
$queryCheck->bindParam(2,$pwdHASH);
$queryCheck->execute();

while($row = $queryCheck->fetch(PDO::FETCH_ASSOC))
{
	//var_dump($row);
	$_SESSION['login'] = 'true';
	$_SESSION['user'] = $usr;
	header("Location: " . str_replace('interpret.php', 'home.php', $_SERVER['REQUEST_URI']). "");
}

	
?>

<html>
	<head>
		<title>Login Failed</title>
	</head>
	
	<body>
		<p>
			Incorrect Login Information
			<form action = 'root.php'>
				<input type = 'submit' value = 'Retry'>
			</form>
		</p>
		
		<p>
			Create an Account?
			<form action='createaccount.php'>
				<input type = 'submit' value = 'Create Account'>
			</form>
			
		</p>
	</body>
</html>
