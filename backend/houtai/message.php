<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言</title>
	<style type="text/css">
			form{width: 800px; height: 500px;margin:0 auto;}
			li{list-style: none; text-align: center;padding:5px 15px;}
	</style>
</head>
<body>
		<form action="message_save.php" method="post">
			<li>姓名<input type="text" name="name"></li>
			<li>电话<input type="text" name="tel"></li>
			<li>QQ<input type="text" name="qq"></li>
			<li>E-mail<input type="text" name="email"></li>
			<li>标题<input type="text" name="title"></li>
			<li>内容<textarea name="content"></textarea></li>
			<li><input type="submit" name="tijiao" value="提交"></li>
		</form>
</body>
</html>