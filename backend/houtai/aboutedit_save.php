<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	--数据库增加信息页面-->
	<?php 
		include ("./function1.php");
		$db = conndb();
		Print_r($_POST);
		$mc=$_POST["name"];
		$content=$_POST["content"];
		/*$title=$_POST["title"];
		$content=$_POST["content"];
		$newtype=$_POST["newtype"];
		$viewcount=$_POST["viewcount"];*/
		$id=$_POST["id"];
		//$t = time();
	     		$sql="update about_us set
 						name   ='$mc',
 						content  ='$content'						
 						where id= $id ";
 	echo $sql;//查错时先输出命令行，再把输出的sql语言在数据库中执行
 	$count=$db->exec($sql);//返回影响的行数
 	//echo $count;
 	if($count){

 			echo "<script>alert('修改成功');location.href='about_select.php';</script>";

 	}
	 ?>
</body>
</html>