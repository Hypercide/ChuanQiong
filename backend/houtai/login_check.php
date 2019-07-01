<?php 
	header("Content-type: text/html; charset=utf-8");
	include("./function1.php");
	$uname=$_POST["user_name"];
	$password=$_POST["upwd"];
	$password=md5($password);
	if (empty($uname)||empty($password)) {
		echo "<script>alert('账号或密码不能为空');history.back;</script>";
		die();
	}
	$sql="select * from user where user_name='$uname'and pwd='$password'";
	$db=conndb();
	$query=$db->query($sql);
	$result=$query->fetchall();
	$logid=$result[0]["id"];
	if($result){
		session_start();
		$_SESSION["user_name"]=$uname;	
		echo "<script>alert('登录成功');location.href='../frameset.php'</script>";
		$t=time();
		$sql="insert into time set logintime ='$t',uid='$logid',uname='$uname'";
		$count=$db->exec($sql);
		echo $count;
	}else{
		echo "<script>alert('用户名或密码错误');history.back();</script>";
		die();
	}

 ?>