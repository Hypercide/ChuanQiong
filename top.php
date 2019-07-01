<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		body{margin:0;padding: 0px;}
		h3{height:25px;font-size: 25px;color: #000;font-weight: bold;text-align: center;}
	</style>
</head>
<body>
<?php 
	include("./houtai/function1.php");
	is_login();
 ?>
	<h3>你好:<?php echo $_SESSION['user_name'] ;?> 欢迎进入高隔墙后台</h3>
</body>
</html>