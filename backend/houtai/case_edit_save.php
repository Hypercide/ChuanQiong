<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php 
		print_r($_POST);
		$name     = $_POST["name"];
		$content 	= $_POST["content"];
		$class_id   = $_POST["class_id"];
		$views      = $_POST["views"];
		$id         =$_POST["id"];	
		$t=time();
		include("./function1.php");
		$files = $_FILES["files"];
		$filename = upfile($files);
		$db = conndb();
		if($filename){
			$sql = "update pro_case set
		 				name        = '$name',
		 				content     = '$content',
		 				class_id    = '$class_id',
		 				thum_bnails ='$filename'
		 				where id    = $id  ";
		}
		else{
			$sql = "update pro_case set
		 				name        = '$name',
		 				content     = '$content',
		 				class_id    = '$class_id',
		 				thum_bnails ='$filename'
		 				where id    = $id  ";
		}
 		
 			echo $sql;
 			$count = $db->exec($sql);
 		
 			if($count){
 				echo "<script>alert('修改成功');location.href='case_select.php'</script>";
 			}
 			else{
 				echo "添加失败！";
 			}
 			
 		   	 ?>
 	
</body>
</html>