<?php 
$db = mysqli_connect('localhost', 'root', '');
$sql="insert into tbl_users(name,email,city) values('$_POST[name]','$_POST[email]','$_POST[city]')";
mysql_query($aql,$db);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	
</head>
<body>
	<div >
		<h2>Register</h2>
	</div>
	
	<form method="post" action="test.php">

		

		<div class="input-group">
			<label>name</label>
			<input type="text" name="name" >
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<label> city</label>
			<input type="text" name="city">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>