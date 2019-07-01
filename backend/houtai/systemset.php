<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统设置</title>
	<style type="text/css">
			form{width: 800px; height: 500px;margin:0 auto;}
			li{list-style: none; text-align: center;padding:5px 15px;}
	</style>
</head>
<body>
		<form action="systemset_save.php" method="post">
			<li>公司名称<input type="text" name="company_name"></li>
			<li>电话<input type="text" name="tel"></li>
			<li>手机<input type="text" name="iphone"></li>
			<li>联系人<input type="text" name="contacts"></li>
			<li>QQ<input type="text" name="qq"></li>
			<li>E-mail<input type="text" name="email"></li>
			<li>住址<input type="text" name="address"></li>
			<li><input type="submit" name="tijiao" value="提交"></li>
		</form>
</body>
</html>