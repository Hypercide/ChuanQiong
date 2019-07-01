<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<!-- 数据库单个删除功能 -->
	<?php 
		include("function1.php");

		$db = conndb();
		$id = $_GET["id"];
		$sql ="delete from about_us where id=$id";
		$count=$db->exec($sql);//返回影响的行数
		//echo $count;
		if($count){

			echo "<script>alert('删除成功');location.href='about_select.php';</script>";
		}
	 ?>
</body>
</html>