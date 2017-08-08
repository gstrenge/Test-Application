<?php
session_start();

include('dbConnect.php');

if (isset($_POST["usernameCreate"]) && !empty($_POST["usernameCreate"]))
{
	$queryCheck = $dbh->prepare('SELECT username FROM accounts WHERE username = ?');
	$queryCheck->bindParam(1,$_POST['usernameCreate']);
	$queryCheck->execute();
	
	$row = $queryCheck->fetch(PDO::FETCH_ASSOC);
	if(!empty($row))
	{
		echo "Username Taken<br>";
		$_POST['passwordCreate'] = NULL;
	}
	
	if (isset($_POST["passwordCreate"]) && !empty($_POST["passwordCreate"]))
	{
		$pwdHASH = hash('sha256',$_POST['passwordCreate']);
		
		$addToDB = $dbh->prepare('INSERT INTO accounts (username,pwd) VALUES (?,?)');
		$addToDB->bindParam(1,$_POST['usernameCreate']);
		$addToDB->bindParam(2,$pwdHASH);
		$addToDB->execute();
		$exec = true;
		
	}else
	{
		$exec=false;
	}
}else
{
	$exec=false;
}

?>


<html>
	<head>
		<title>Create Account</title>
	</head>
	
	<body>
	<?php
		if(!$exec){
	?>
		Create Account
		<form action="createaccount.php" method='POST'>
		
		<p>
			Username: <input type="text" name="usernameCreate">
		</p>
		<p>
			Password: <input type="text" name="passwordCreate">
		</p>
		
		<p>
			<input type='submit' value ="submit">
		</p>
		
		</form>
	<?php    }
	else{
	?>
		
		Successfully Created Account
		<form action="root.php" method='POST'>
		
		<p>
			<input type='submit' value ="Go Login">
		</p>
		
		</form>
		
	<?php  }  ?>
	
	</body>

</html>