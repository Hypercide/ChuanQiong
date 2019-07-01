<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>资讯表</title>
	<style type="text/css">
			form{width: 800px; height: 500px;margin:0 auto;}
			li{list-style: none; text-align: center;padding:5px 15px;}

	</style>
</head>
<body>
	<form action="information_save.php" method="post">
		<li>名称:<input type="text" name="name"></li>
		<li>内容:<textarea name="content"></textarea></li>
		<li>类别ID:
				<?php 
					include("./function1.php");
					echo getSelectClass(4,4);
				 ?>
		</li>
		<li>浏览次数：<input type="text" name="views"></li>
		<li><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>