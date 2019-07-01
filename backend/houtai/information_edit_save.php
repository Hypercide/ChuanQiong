<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		print_r($_POST);
		$name=$_POST["name"];
		$content=$_POST["content"];
		$class_id=$_POST["class_id"];
		$views=$_POST["views"];
		$id   =$_POST["id"];
		$t=time();
		include("./function1.php");
		$db=conndb();

		$sql = "update information set
			 				name        = '$name',
			 				content     = '$content',
			 				class_id    = '$class_id',
			 				views       = '$views',
			 				date_time   ='$t'
			 				where id    = $id  ";	
			echo $sql;
 			$count = $db->exec($sql);
 			//echo $count;
 			if($count)
 			{
 				echo "<script>alert('修改成功');location.href='information_select.php'</script>";
 			}
 			
	 ?>
</body>
</html>