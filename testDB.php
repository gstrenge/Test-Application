<?php

include('dbConnect.php');
$db = $dbh;
$user_arr = array('admin' => '', 'sportplayer123' => 'password1','malcolmx' => 'MalX');

foreach($user_arr as $user => $pwd)
{
	$stmt = $db->prepare("INSERT INTO accounts (username,pwd) VALUES (?,?)");
	
	$stmt->bindValue(1,$user);
	$stmt->bindValue(2,$pwd);
	$stmt->execute();
}
?>