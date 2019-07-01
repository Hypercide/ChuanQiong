<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页面</title>
	<style type="text/css">
			body{margin:0;padding: 0}
			form{width: 300px; height: 100px;margin:0 auto; border: 1px solid #000;}
			li{list-style: none; text-align: center;padding:5px 15px;}
	</style>
</head>
<body>
	<form action="login_check.php" method="post">
		<li>用户名:<input type="text" name="user_name"></li>
		<li>密  码:<input type="password" name="upwd"></li>
	<li><input type="submit" name="login" value="登录"></li>
		
	</form>
</body>
</html>