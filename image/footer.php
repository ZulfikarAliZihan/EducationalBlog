<?php
include('config.php');
?>
	
	</section>
	
	<nav>
	<div class="category">
	<table>
		<tr>
			<th>Category</th>
			
		</tr>
		<tr>
			<td><a href="category.php?cat=1">BCS</a><br></td>
		</tr>
		<tr>
			<td><a href="category.php?cat=2">HSC</a><br></td>
			
		</tr>
		<tr> 
			<td><a href="category.php?cat=3">SSC</a><br></td>
			
		</tr>
		
		<tr>
			<td><a href="category.php?cat=4">JSC</a><br></td>
		</tr>
	</table>
	
	</div>
	
	<div class="recent_post">
	<h1>Recent post</h1>
		<?php
	

			$statement = $db->prepare("SELECT * FROM tbl_post");
			$statement->execute();
			$total_pages = $statement->rowCount();
			foreach($result as $row)
			{
				?>
				
				
	<a href="post.php?id=<?php echo $row['post_id']?>"><p><?php echo $row['post_title']?></p></a>
		
	
					
				<?php
			}
	?>
	
	</div>
	
	</nav>
	
	<footer>
	<p style="text-align:center;">All right removed@Online Exam Blog</p>
	</footer>
	
</body>
</html>