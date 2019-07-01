<?php 
		header("Content-type: text/html; charset=utf-8");
		print_r($_POST);
		$mc=$_POST['name'];
		$content=$_POST['content'];
		$catid=$_POST['class_id'];
		$vcount=$_POST['views'];
		$t    = time();
		include("function1.php");
		$db=conndb();
		$sql= "insert into information set
									name     ='$mc',
									content = '$content',
									class_id ='$catid',
									views='$vcount',
									date_time='$t'";
			echo $sql;
			$count=$db->exec($sql);
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='information.php';</script>";
	}
 ?>