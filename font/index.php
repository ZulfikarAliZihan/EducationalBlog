<?php
ob_start();
session_start();
if($_SESSION['name']!='zihan')
{
	header('location: login.php');
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<p >welcome</p>
	<a href="logout.php">Logout</a>
</body>
</html>