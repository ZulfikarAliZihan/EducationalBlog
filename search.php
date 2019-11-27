<?php
ob_start();
session_start();
if($_SESSION['name']!='zihan')
{
	header('location: login.php');
}
?>

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
  <li><a href="#contact">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
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
	if(!isset($_POST['search']))
	
		header('location: index.php')
		
	
	?>

<?php
include('header.php'); //Use footer.php or we have to use below comment code section 
$emp=0;
?>


<?php
include('config.php');

			$statement = $db->prepare("SELECT * FROM tbl_post where post_title like %?%");
			$statement->execute(array($_POST['search']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
							
			
			foreach($result as $row)
			{
				
				?>
				
				
				<?php
				if($row['post_title']>0){
					$emp++;
				}
				?>

				<div class="item">
	
	<div class="item-image">
	
	<img src="image/item1.jpg" width="160px" height="120px"  alt="Image" />
	</div>
	
	<div class="item-details">
	<h1><?php echo $row['post_title']?></h1>
	<div class="short_details">
	
	 <?php 
			//show some word from post_description
			/* 
				$pieces = explode(" ", $row['post_description']);
				$final_words = implode(" ", array_splice($pieces, 0, 30));
				$final_words = $final_words.' ...';
			
	 
	 echo $final_words; */
		
		$row['post_description']
	 ?>
	
	</div>
	
	<div class="comment">
	<span class="comment">Author name</span>
	<span class="comment">comment-6</span>
	<button class="button"><span><a style="text-decoration:none;color:white;" href="post.php?id=<?php echo $row['post_id']?>">continue</a></span></button>
	</div>
	
	</div>
	
</div>
				
				
				
				
				
				
			<?php
				
			}
			
		
          ?>

	

<?php if($emp==0)
echo "<h1>This category has no post yet.<h1>"	
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