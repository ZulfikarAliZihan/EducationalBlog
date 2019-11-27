<?php
ob_start();
session_start();
if($_SESSION['name']!='zihan')
{
	header('location: login.php');
}
?>


<?php
include("header.php");
?>

<?php
include('config1.php');
if(isset($_POST['post-editor'])) {

	try {
	
		if(empty($_POST['title'])) {
			throw new Exception('Title can not be empty');
		}
		
		if(empty($_POST['editor'])) {
			throw new Exception('Description can not be empty');
		}
		
		if(empty($_POST['category'])) {
			throw new Exception('Category can not be empty');
		}
		
		if(empty($_POST['tag'])) {
			throw new Exception('Tag can not be empty');
		}
		
		
		$post_date1 = date('Y-m-d');
		$month = substr($post_date1,5,2);
		
		$result = mysql_query("insert into tbl_post (post_title,post_description,cat_id,tag_id,date,month) values('$_POST[title]','$_POST[editor]','$_POST[category]','$_POST[tag]',$post_date1,$month) ");
		
		
		
		
		$success_message = 'Data has been inserted successfully.';
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>



<div class="newpost">

<center><h1>Add new Post</h1></center>

<?php  
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";;}
	?>


<label style="margin-left:5px;font-size:18px;">Post title</label>
<form action="" method="post">

<input type="text" class="long" name="title" autofocus><br><br>
<textarea name="editor" id="" cols="30" rows="10"></textarea>
<script type="text/javascript">
	if ( typeof CKEDITOR == 'undefined' )
	{
		document.write(
			'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
			'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
			'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
			'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
			'value (line 32).' ) ;
	}
	else
	{
		var editor = CKEDITOR.replace( 'editor' );
		//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
	}

</script>

<!--category and tag section-->
<p>Select a Category</p>
<select name="category" id="">
<option value="1">BCS</option>
<option value="2">HSC</option>
<option value="3">SSC</option>
<option value="4">JSC</option>
</select>
<br>
<p>select tag</p>
<input type="checkbox" name="tag" value="1" />Bangla
<input type="checkbox" name="tag" id="" />English
<input type="checkbox" name="tag" id="" />Math




<input type="submit" value="POST" name="post-editor">
</form>

</div>
<?php
include("footer.php");
?>