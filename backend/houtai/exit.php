<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>退出界面</title>
</head>
<body>
	<?php 
			include("./function1.php");
			is_login();
			
			unset($_SESSION['user_name']);
			echo "<script>alert('已退出成功！');location.href='./login.php';</script>";
			exit();
	 ?>
</body>
</html>