<?php 
		header("Content-type: text/html; charset=utf-8");
		print_r($_POST);
		include("./function1.php");
		$mc=$_POST['name'];
		$content=$_POST['content'];
		$class_id=$_POST['class_id'];
		$vcount=$_POST['views'];
		$files = $_FILES["files"];
		$filename = upfile($files);
		dump($files);
		$t=time();
		$db = conndb();
		$sql="insert into pro_case set  name         ='$mc',
								        content      ='$content',
									    class_id     ='$class_id',
									    views        ='$vcount',
									    thum_bnails  ='$filename',
									    date_time    ='$t'";
		$count=$db->exec($sql);
		echo $sql;
        echo $count;
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='case.php';</script>";
	}
 ?>