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
<body>
	<form method="post" action="user_save.php">
		<li>
			用&nbsp户&nbsp名：<input type="text" name="user_name" maxlength="15">
		</li>
		<li>
			密&nbsp&nbsp码&nbsp：<input type="password" name="pwd" maxlength="18" placeholder="请输入密码：">
		</li>
		<li>
			真实姓名:<input type="text" name="name"  maxlength="25">
		</li>
		<li><input type="submit" name="" value="提交"></li>
	</form>
</body>
</html>