<?php 
	header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	include("./function1.php");
	$db=conndb();
	$uname=$_POST['uname'];
	$upwd =$_POST['upwd'];
	$upwd =md5($upwd);
	if(empty($uname)||empty($upwd))
	{
		echo "<script>alert('用户名或密码不能为空!');history.back();</script>";
		die();
	}
	$sql="select id from admin where loginname='$uname'";
	$query=$db->query($sql);
	$result=$query->fetchall();
	dump($result);
	if($result){
		echo "<script>alert('用户名已存在!');history.back();</script>";
		die();
	}
	$sql="insert into admin set loginname='$uname',pwd='$upwd'";
	$count=$db->exec($sql);
	echo $sql;
	//echo $count;
	if($count)
	{
		echo "<script>alert('注册成功!');location.href='register.php';</script>";
	}
 ?>
