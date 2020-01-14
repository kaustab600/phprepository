<?php
require("config.php");
$fid=$_GET['fid'];
$fpath=$_GET['fpath'];
if(unlink($fpath)){
	$del="DELETE FROM file WHERE fid='$fid'";
	$res=mysqli_query($con,$del)or die(mysqli_error($con));
	if($res==1){
		header('location:view_img.php?msg=File deleted successfully');
	}else{
		header('location:view_img.php?msg=File not delete');
	}
}else{
	header('location:view_img.php?msg=Please try again later');
}
?>