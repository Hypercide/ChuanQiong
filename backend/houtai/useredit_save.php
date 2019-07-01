<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		include ("./function1.php");
		$db = conndb();
		Print_r($_POST);
		$username=$_POST["user_name"];
		$password=$_POST["pwd"];
		$name=$_POST["name"];
		$id=$_POST["id"];
		
	     		$sql="update user set
	 						user_name ='$username',
	 						pwd       ='$password',
	 						name     ='$name'
	 						where id  = $id ";
 	echo $sql;//查错时先输出命令行，再把输出的sql语言在数据库中执行
 	$count=$db->exec($sql);//返回影响的行数
 	//echo $count;
 	if($count){

 			echo "<script>alert('修改成功');location.href='user_select.php';</script>";

 	}
	 ?>
 	
</body>
</html>