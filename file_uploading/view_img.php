<?php require("config.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>view image</title>
</head>
<body>
<?php
$src="SELECT * FROM file";
$rs=mysqli_query($con,$src)or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
 ?>
 <table>
 	<tr>
 		<?php
 		while ($rec=mysqli_fetch_assoc($rs)) {
 			?>
 			<td><img src="<?php echo $rec['fpath']?>" width="250"><br>
 				<a href="update_img.php?fid=<?php echo $rec['fid'] ?>&fpath=<?php echo $rec['fpath']?>">Update</a>
 				<a href="delete_img.php?fid=<?php echo $rec['fid'] ?>&fpath=<?php echo $rec['fpath']?>">Delete</a></td>
 			<?php
 		}
 		?>
 	</tr>
 </table>
 <?php
}else{
	echo "Sorry no file found";
}
?>

<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>
</body>
</html>