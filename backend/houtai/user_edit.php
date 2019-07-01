<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		form{width: 800px; height: 450px; border:solid 1px #CCC;color:black; margin: 15px auto; }
		li{list-style: none;padding: 5px 15px; text-align: center;}
		input{ text-align: left; }
	</style>
	<title>用户注册</title>
</head>

<?php 
	$id=isset($_GET['id'])?$_GET["id"]:0;
	if(!$id){

	echo "<script>alert('ID参数错误！');history.back();</script>";
	}
	include("./function1.php");
	$db=conndb();
	$sql="select *from user where id =$id";
	$query=$db->query($sql);
	$result=$query->fetchall();
	//dump($result);
	$r = $result[0];	
 ?>
	<form method="post" action="useredit_save.php">
		<li>
			用&nbsp户&nbsp名：<input type="text" name="user_name" maxlength="15" value="<?php echo $r["user_name"];?>">
		</li>
		<li>
			密&nbsp&nbsp码&nbsp：<input type="password" name="pwd" maxlength="18" placeholder="请输入密码:" value="<?php echo $r["pwd"];?>">
		</li>
		<li>
			真实姓名: <input type="text" name="name"  maxlength="25" value="<?php echo $r["name"];?>">
		</li>
		<li><input type="hidden" name="id" value="<?php echo $id ?>" ><li><input type="submit" name="tijiao" value="提交"></li>
	</form>

</html>