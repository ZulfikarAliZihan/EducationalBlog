<!--

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Online exam Blog</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	
	
	
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
  <li><a href="#news">Online exam</a></li>
  <li><a href="#contact">Login</a></li>
  <li><a href="#about">About</a></li>
</ul>
	
	</div>
	
	<div class="search">
	<form action="">
	<input type="text" name=search placeholder="search everything"/>
	<input type="submit" value="GO" />
	</form>
	</div>
	</div>
	</header>
	
	
	<section> 
	
	-->
	
	<?php
	ob_start();
	session_start();
	if($_SESSION['name']!='zihan')
	{
		header('location: login.php');
	
	}
	?>
	
	<?php
	if(!isset($_REQUEST['id']))
	
		header('location: index.php')
		
	
	?>
	
	<?php
	include('config.php');
	$coment_no=0;
		$statement = $db->prepare("SELECT * FROM tbl_post where post_id=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				$coment_no=$row['total_comment'];
				
			}
	
	?>
	
	<?php
include('config.php');
if(isset($_POST['make-comment'])) {

	try {
	
		if(empty($_POST['comment'])) {
			throw new Exception('Comment can not be empty');
		}
		
		
		
		
		$post_date1 = date('Y-m-d');
		$month = substr($post_date1,5,2);
		
		$statement = $db->prepare("INSERT INTO tbl_comment (post_id,c_message,c_date) VALUES (?,?,?)");
		$statement->execute(array($_REQUEST['id'],$_POST['comment'],$post_date1));
		
		$coment_no=$coment_no+1;
		
		$statement = $db->prepare("update tbl_post set total_comment=? where post_id=?");
		$statement->execute(array($coment_no,$_REQUEST['id']));
		
		
		
		
		
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>


	
	
	
	
	<?php
	include('header.php'); //Use footer.php or we have to use below comment code section 
	?>
		
	<?php
			include('config.php');
			$statement = $db->prepare("SELECT * FROM tbl_post where post_id=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row)
			{
				
				?>
	
		
	<div class="item">
	

	
	<div class="item-post">
	<h1><?php echo $row['post_title']?></h1>
	<div class="">Author name:</div>
	Date:<?php //echo $row['time'];
	$date=$row['time'];
	$date = substr($date,0,10);
	echo $date;
	?>
	
	<div class="short-details">
	 <?php echo $row['post_description']?>
	</div>
	
	<div class="comment-main">
	
	
	
	<?php
	$statement = $db->prepare("SELECT * FROM tbl_comment where post_id=? ORDER BY c_id ASC");
	$statement->execute(array($_REQUEST['id']));
	$result11 = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result11 as $row11)
	{
		?>
		
		<div class="commentblock">
		<div class="comment-image"> 
		<img src="image/item1.jpg" width="80px" height="80px" alt="profile-pic" />
		Author name<br> <?php echo $row11['c_date']?>
		</div>
		<div class="comment-content">
		
		<?php echo $row11['c_message'] ?>
		</div>
		</div>
		<?php
	}
	?>
	
	
	
	
	
	
	<div class="make-comment">
	
	<div class="comment-image"> 
	<img src="image/item1.jpg" width="80px" height="80px" alt="profile-pic" />
	Author name<br> 22.12.2017
	</div>
	
	<div class="comment-content">
	<form action="" method="post">
		<textarea name="comment" id="" cols="60" rows="6">
		</textarea>
		<input type="submit"  value="comment"  name="make-comment">
	</form>
	</div>
	
	</div>
	
	</div>
	
	</div>
	
</div>


<?php
			}
?>

<?php
include('footer.php'); //Use footer.php or we have to use below comment code section 
?>

<!--
	</section>
	
	<nav>
	<div class="category">
	<table>
		<tr>
			<th>Category</th>
			
		</tr>
		<tr>
			<td><a href="">BCS</a><br></td>
		</tr>
		<tr>
			<td><a href="">HSC</a><br></td>
			
		</tr>
		<tr> 
			<td><a href="">SSC</a><br></td>
			
		</tr>
		<tr> 
			<td><a href="">SSC</a><br></td>
		</tr>
		<tr>
			<td><a href="">JSC</a><br></td>
		</tr>
	</table>
	
	</div>
	
	<div class="recent_post">
	<h1>Recent post</h1>
	<p>title1</p>
	<p>title2</p>
	<p>title3</p>
	<p>title4</p>
	</div>
	
	</nav>
	
	<footer>
	<p style="text-align:center;">All right removed@Online Exam Blog</p>
	</footer>
	
</body>
</html>

-->