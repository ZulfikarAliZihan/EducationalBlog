<?php
include('header.php'); //Use footer.php or we have to use below comment code section 

?>

<?php
ob_start();
session_start();
if($_SESSION['name']!='zihan')
{
	header('location: login.php');
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