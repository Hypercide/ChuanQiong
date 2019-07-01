<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>类别</title>
	<style type="text/css">
			form{width: 800px; height: 500px;margin:0 auto;}
			li{list-style: none; text-align: center;padding:5px 15px;}
	</style>
</head>
<body>
<form action="classes_save.php" method="post">
	<li>类别名称：<input type="text" name="class_name"></li>
	<li>类别类型：<select name="type">
						<option value="">请选择</option>
						<option value="1">关于我们</option>
						<option value="2">工程案例</option>
						<option value="3">产品中心</option>
						<option value="4">资讯中心</option>
				  </select>
	</li>
	<li><input type="submit" name="tijiao" value="提交"></li>
</form>
</body>
</html>