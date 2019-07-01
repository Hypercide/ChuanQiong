<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们</title>
	<style type="text/css">
		form{width: 800px;height: 300px;margin:0 auto;border:1px solid #ccc;}
		li{list-style: none;padding-top: 15px;text-align: center;}
	</style>
</head>
<body>
	<form method="post" action="./about_save.php">
		<li>名称：<input type="text" name="name" maxlength="20" placeholder="请输入你的名称">	</li>
		<li>内容：<textarea name="content"></textarea></li>
		<li><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>