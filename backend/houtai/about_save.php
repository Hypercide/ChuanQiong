<?php 
		Print_r($_POST);
		header("Content-type: text/html; charset=utf-8");
		$mc=$_POST['name'];
		$content=$_POST['content'];
		include("./function1.php");
		$db = conndb();
		$sql="insert into about_us set name='$mc',content='$content'";
	$count=$db->exec($sql);
	echo $sql;
	//echo $count;
	if($count)
	{
		echo "<script>alert('添加成功!');location.href='about_us.php';</script>";
	}
 ?>

 