<?php
if(isset($_POST['login1'])) 
{
	
	try {
	
		
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
	
		
		$password = $_POST['password']; // admin
		//$password = md5($password);
	
	$email=$_POST['email'];
	
		include('config.php');
		$num=0;
				
		$statement = $db->prepare("select * from tbl_login where email=? and password=?");
		$statement->execute(array($_POST['email'],$password));		
		
		$num = $statement->rowCount();
		
		
			$statement1 = $db->prepare("SELECT name FROM tbl_users where email=?");
			$statement1->execute(array($_REQUEST['email']));
			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
			foreach($result1 as $row)
			{
				$user=$row['name'];
				
				
				
				
			}
			 
			
			
		
				if($num>0)
				{
					session_start();
					//$_SESSION['name'] ="zihan";
					$_SESSION['name'] =$user;
					/* echo $_SESSION['name'] ;
					exit; */
					
					//header("location: index.php?user=$user");
					header("location: header.php?user=$user & iid=1");
				}
				else
				{
					throw new Exception('Invalid Username and/or password');
				}	
	
	
	
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
	<h1>Login</h1>
	</div>
	
	
	
	<form action="" method="post" id="form11">
	<div class="input-group">
	
	<?php
	if(isset($error_message))
	{
		echo"<b>";	echo "<div class='error'>".$error_message."</div>"; echo"</b>";
	}
	?>
	
	<label>Email</label>
	<input type="email" name="email">
	
	<label>Password</label>
	<input type="password" name="password">                  
 
  <button type="submit" name="login1" class="btn">Login</button>
	</div>
	<p>
		Not a member? <a href="register.php">Register now</a>
	</p>
	</form>
	
	
	
</body>
</html>