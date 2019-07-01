<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>工程案例后台</title>
	<style type="text/css">
	form{width: 800px;height: 500px;margin:0 auto; border: 1px solid #ccc;text-align: center;}
	li{list-style: none;padding: 5px 15px;}
	
	</style>
</head>
<body>

	<form method="post" action="product_save.php" enctype="multipart/form-data">
		<li>名称：<input type="text" name="name"></li>
		<li>内容：<textarea name="content"></textarea></li>
		<li>上传图片：<input type="file" name="files"></li>
		<li>类别ID:
					<?php  
						include("./function1.php");
						echo getSelectClass(3,3);
					?>  
		</li>
		<li>浏览次数:<input type="text" name="views"></li>
		<li><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>