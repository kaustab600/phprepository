<!DOCTYPE html>
<html>
<head>
	<title>file update</title>
</head>
<body>
	<h2>Update</h2>
	<?php
	require("config.php");
	$fid=$_GET['fid'];
	$fpath_old=$_GET['fpath'];
	$src="SELECT * FROM file WHERE fid='$fid'";
	$rs=mysqli_query($con,$src)or die(mysqli_error($con));
	$rec=mysqli_fetch_assoc($rs);
	?>
<form name="frm" method="post" enctype="multipart/form-data">
	<table cellpadding="10">
		<tr>
			<td>Select file</td>
			<td><input type="file" name="ff"><br><img src="<?php echo $fpath_old ?>" width="50"></td>
		</tr>
		<tr>
			<td>About</td>
			<td><input type="text" name="about" value="<?php echo $rec['about'] ?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="ok" value="Update"></td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['ok'])){
	$fname=$_FILES['ff']['name'];
	$ftype=$_FILES['ff']['type'];
	$fsize=$_FILES['ff']['size'];
	$about=$_POST['about'];
	if(empty($fname)){
		$upd="UPDATE file SET about='$about' WHERE fid='$fid'";
		$res=mysqli_query($con,$upd)or die(mysqli_error($con));
		if($res==1){
			header('location:view_img.php?msg=File update successfull');
		}else{
			header('location:view_img.php?msg=Sorry file not update');
		}
	}else{

		$fpath="uoladed_files/".rand(000000,999999)."_".$fname;

		if(move_uploaded_file($_FILES['ff']['tmp_name'], $fpath)){
			$sql="UPDATE file SET fname='$fname', fsize='$fsize', ftype='$ftype', fpath='$fpath', about='$about' WHERE fid='$fid'";
			$res=mysqli_query($con,$sql)or die(mysqli_error($con));
			if($res==1){
				unlink($fpath_old);
				header('location:view_img.php?msg=File update successful');
			}else{
				header('location:view_img.php?msg=File not update');
			}

		}else{
			header('location:view_img.php?msg=File not upload succesfully');
		}
	}
}

?>
</body>
</html>