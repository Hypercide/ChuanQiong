<?php 
	header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	include("./function1.php");
	$uname=$_POST['user_name'];
	$upwd =$_POST['pwd'];
	$upwd =md5($upwd);
	$name =$_POST['name'];
	$t=time();
	if(empty($uname)||empty($upwd))
	{
		echo "<script>alert('用户名或密码不能为空!');history.back();</script>";
		die();
	}
	$db = conndb();
	$sql="select id from user where user_name='$uname'";
	$query=$db->query($sql);
	$result=$query->fetchall();
	dump($result);
	if($result){
		echo "<script>alert('用户名已存在!');history.back();</script>";
		die();
	}
	$sql="insert into user set user_name='$uname',pwd='$upwd',name='$name',addtime='$t'";
	$count=$db->exec($sql);
	echo $sql;
	//echo $count;
	if($count)
	{
		echo "<script>alert('注册成功!');location.href='user.php';</script>";
	}

 ?>