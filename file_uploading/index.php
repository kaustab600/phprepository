<!DOCTYPE html>
<html>
<head>
	<title>File Uploading</title>
</head>
<body>
<h2>File Uploading</h2>
<form name="frm" method="post" enctype="multipart/form-data" action="upload_code.php">
	<table cellpadding="10">
		<tr>
			<td>Select file</td>
			<td><input type="file" name="ff"></td>
		</tr>
		<tr>
			<td>About</td>
			<td><input type="text" name="about"></td>
		</tr>
		<tr>
			<td><input type="submit" name="ok" value="Upload"></td>
		</tr>
	</table>
</form>
<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>
<br>
<a href="view_img.php">View Image</a>
</body>
</html>