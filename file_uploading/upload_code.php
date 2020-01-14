<?php
require("config.php");
$fname=$_FILES['ff']['name'];
$ftype=$_FILES['ff']['type'];
$fsize=$_FILES['ff']['size'];
$about=$_POST['about'];

$fpath="uoladed_files/".rand(000000,999999)."_".$fname;

if(move_uploaded_file($_FILES['ff']['tmp_name'], $fpath)){
	$sql="INSERT INTO file (fname,ftype,fsize,fpath,about) VALUES ('$fname','$ftype','$fsize', '$fpath', '$about')";
	$res=mysqli_query($con,$sql)or die(mysqli_error($con));
	if($res==1){
		header('location:index.php?msg=File upload successful');
	}else{
		header('location:index.php?msg=File not upload');
	}

}else{
	header('location:index.php?msg=File not upload succesfully');
}


?>