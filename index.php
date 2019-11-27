<?php
include('header.php'); //Use footer.php or we have to use below comment code section 
//echo $user;
?>

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
include('config.php');

		
		
		
		
			/* ===================== Pagination Code Starts ================== */
			$adjacents = 7;
										
					
			
			
			$statement = $db->prepare("SELECT * FROM tbl_post ORDER BY post_id DESC");
			$statement->execute();
			$total_pages = $statement->rowCount();
							
			
			$targetpage = $_SERVER['PHP_SELF'];   //your file name  (the name of this file)
			$limit = 5;                                 //how many items to show per page
			$page = @$_GET['page'];
			if($page) 
				$start = ($page - 1) * $limit;          //first item to display on this page
			else
				$start = 0;
			
						
			$statement = $db->prepare("SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT $start, $limit");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			
			if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
			$prev = $page - 1;                          //previous page is page - 1
			$next = $page + 1;                          //next page is page + 1
			$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;   
			$pagination = "";
			if($lastpage > 1)
			{   
				$pagination .= "<div class=\"pagination\">";
				if ($page > 1) 
					$pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
				else
					$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
				if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
				{   
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
				{
					if($page < 1 + ($adjacents * 2))        
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
					}
					else
					{
						$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
					}
				}
				if ($page < $counter - 1) 
					$pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
				else
					$pagination.= "<span class=\"disabled\">next &#187;</span>";
				$pagination.= "</div>\n";       
			}
			/* ===================== Pagination Code Ends ================== */	
			foreach($result as $row)
			{
				
				?>
				
				
				

				<div class="item">
	
	<div class="item-image">
	
	<img src="image/item1.jpg" width="160px" height="120px"  alt="Image" />
	</div>
	
	<div class="item-details">
	<h1><?php echo $row['post_title']?></h1>
	<span class="comment">Author name</span>
	<div>
	Date:<?php //echo $row['time'];
	$date=$row['time'];
	$date = substr($date,0,10);
	echo $date;
	?>
	</div>
	<div class="short_details">
	
	 <?php 
			//show some word from post_description
			
				$pieces = explode(" ", $row['post_description']);
				$final_words = implode(" ", array_splice($pieces, 0, 60));
				$final_words = $final_words.' ...';
			
	 
	 echo $final_words;

	 ?>
	
	</div>
	
	<div class="comment">
	 <!--<span class="comment">Author name</span> -->
	
	<?php ?>
	
	
	<?php
			include('config.php');
			
			$statement1 = $db->prepare("SELECT * FROM tbl_post where post_id=?");
			$statement1->execute(array($row['post_id']));
			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
			foreach($result1 as $row)
			{
				?>
				<span class="comment"><?php echo $row['total_comment'];?>-comment</span>
				<?php
			}
				?>
	
	
	
	
	
	
	<button class="button"><span><a style="text-decoration:none;color:white;" href="post.php?id=<?php echo $row['post_id']?>">continue</a></span></button>
	</div>
	
	</div>
	
</div>
				
				
				
				
				
				
			<?php
				
			}
			
		
          ?>

	


	



	


<div class="pagination">
<?php 
echo $pagination; 
?>
</div> 

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