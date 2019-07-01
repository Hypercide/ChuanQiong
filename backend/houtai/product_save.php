<?php 
		header("Content-type: text/html; charset=utf-8");
		print_r($_POST);
		include("./function1.php");
		$mc=$_POST['name'];
		$content=$_POST['content'];
		$catid=$_POST['class_id'];
		$vcount=$_POST['views'];
		$files = $_FILES["files"];
		$filename = upfile($files);
		dump($files);
		$t=time();
		
		$db = conndb();
		$sql="insert into product set name     ='$mc',
							        content ='$content',
								    class_id   ='$catid',
								    views  ='$vcount',
								    thum_bnails='$filename',
								    date_time  ='$t'";
		$count=$db->exec($sql);
		echo $sql;
        
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='product.php';</script>";
	}
 ?>