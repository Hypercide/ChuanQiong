<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php 
		print_r($_POST);
		$names      = $_POST["names"];
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
			$sql = "update product set
			 				name        = '$names',
			 				content     = '$content',
			 				class_id    = '$class_id',
			 				views       = '$views',
			 				thum_bnails	='$filename',
			 				date_time   ='$t'
			 				where id    = $id  ";
		}
		else{
			$sql = "update product set
				 				name        = '$names',
				 				content     = '$content',
				 				class_id    = '$class_id',
				 				views       = '$views',
				 				thum_bnails	='$filename',
				 				date_time   ='$t'
				 				where id    = $id  ";
		}
 		
 			echo $sql;
 			$count = $db->exec($sql);
 			//echo $count;
 			if($count){
 				echo "<script>alert('修改成功');location.href='product_select.php'</script>";
 			}else{
 				echo "<script>alert('修改失败');location.href='product_select.php'</script>";
 			}
 			
 		   	 ?>
 	
</body>
</html>