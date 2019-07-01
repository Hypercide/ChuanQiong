<?php 
	header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	$lbmc=$_POST['class_name'];
	$lbtype=$_POST['type'];
	include("./function1.php");
	$db=conndb();
	$sql="insert into classes set class_name='$lbmc' ,type='$lbtype'";
	echo $sql;
	
	$count=$db->exec($sql);
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='classes.php';</script>";
	}
 ?>