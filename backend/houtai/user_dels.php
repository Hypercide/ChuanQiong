<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- 数据库批量删除功能 -->
	<?php 
		include("function1.php");
		$db=conndb();
		$ids = isset($_POST["ids"])?$_POST["ids"]:0;
		/*dump($ids);
		die();*/
		//dump($ids);
		if($ids){
				$sum=count($ids);
				$count=0;

			foreach ($ids as $id)
			 {
				$sql ="delete from user where id=$id";
				$num = $db->exec($sql);//返回影响的行数
				$count +=$num;
			}
			if($sum==$count){
				echo "<script>alert('删除成功');location.href='user_select.php';</script>";
			}
		}
	 ?>	
</body>
</html>