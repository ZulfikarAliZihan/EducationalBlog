 
<?php

if(isset($_REQUEST['iid'])){
		

$user=$_REQUEST['user'];
$iid=$_REQUEST['iid'];
//echo $user;
//echo $iid;

if($iid>0){
	header("location:index.php");
}

}
//echo $user;
//echo $iid;
//exit;
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Online exam Blog</title>
	
	<link rel="stylesheet" type="text/css" href="css/style1.css"/>
	
	<!-- CKEditor Start -->
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<!-- // CKEditor End -->
	
</head>
<body>
	<header>
	
	<div class="logo">
	Logo
	</div>
	
	<div class="banner">banner</div>
	<div class="menu_and_search">
	<div class="menu">
	
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="../yakin/index.php">Online exam</a></li>
  <li><a href="add-post.php">Admin</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
	
	</div>
	
	<div class="search">
	<form action="search.php" method="post">
	<input type="search" class="medium" name=search placeholder="search everything"/>
	<input type="submit" value="GO" />
	</form>
	</div>
	</div>
	</header>
	
	
	<section>