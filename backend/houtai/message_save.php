<?php 
	header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	$uname=$_POST['name'];
	$phone=$_POST['tel'];	
	$qq=$_POST['qq'];
	$email=$_POST['email'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$t=time();
	include("./function1.php");
	$db=conndb();
	$sql = "insert into message set
 								name    ='$uname',
 								tel     ='$phone',	
 				   				qq      ='$qq',
 								email   ='$email',
 								title   ='$title',
 								content ='$content',
 								addtime ='$t'";
 			echo $sql;
	$count=$db->exec($sql);
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='message.php';</script>";
	}

 ?>