<?php
include('config1.php');
if(isset($_POST['form2'])) {

	try {
	
		if(empty($_POST['name'])) {
			throw new Exception('Name can not be empty');
		}
		
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
		
		
		
		
		$result = mysql_query("insert into tbl_users (name,email,city,designation,interested_field) values('$_POST[name]','$_POST[email]','$_POST[city]','$_POST[designation]','$_POST[inter_field]') ");
		$result1 = mysql_query("insert into tbl_login (email,password) values('$_POST[email]','$_POST[password]') ");
		
		
		
		$success_message = 'Data has been inserted successfully.';
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Registation</title>
	<link rel="stylesheet" href="css/admin.css" />
</head>
<body>
	<div class="header">
	<h1>Registation</h1>
	</div>
	
	<form action="register.php" method="post" id=>
	<div class="input-group">
	
	<?php  
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";;}
	?>
	
	<label>Name</label>
	<input type="text" name="name" >
	
	<label>Email</label>
	<input type="email" name="email">
	
	<label>Password</label>
	<input type="password" name="password">
	
	<label>City</label>
	<input type="text" name="city">
	
	<label>Designation</label>
	<select name="designation">
    <option value="student" selected>Student</option>
    <option value="teacher">Teacher</option>
    <option value="other" >Other</option>
  </select>
  
  <label>Interested Section</label>
 
  <select name="inter_field">
    <option value="1" selected>BCS</option>
    <option value="2">HSC</option>
    <option value="3" >SSC</option>
    <option value="4" >JSC</option>
  </select>
 
  <button type="submit" name="form2" class="btn">Register</button>
	</div>
	<p>
		Already a member?<a href="login.php">Login</a>
	</p>
	</form>
</body>
</html>