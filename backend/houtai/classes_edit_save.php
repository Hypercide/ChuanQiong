<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

		print_r($_POST);
		$class_name=$_POST["class_name"];
		$class_style=$_POST["type"];
		$id         =$_POST["id"];
		include("./function1.php");
		$db=conndb();

		$sql = "update classes set
			 				class_name    = '$class_name',
			 				type          = '$class_style'
			 				where id      = $id  ";	
		echo $sql;
		$count = $db->exec($sql);
 			//echo $count;
 			if($count){
 				echo "<script>alert('修改成功');location.href='classes_select.php'</script>";
 			}	
 	   	
	 ?>

</body>
</html>