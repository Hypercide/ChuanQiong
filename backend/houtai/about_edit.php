<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们</title>
	<style type="text/css">
		form{width: 800px;height: 400px;margin:0 auto;border:1px solid #ccc;}
		li{list-style: none;padding-top: 15px;text-align: center;}
	</style>
</head>
<body>
	<?php 
	$id=isset($_GET['id'])?$_GET["id"]:0;
	if(!$id){

	echo "<script>alert('ID参数错误！');history.back();</script>";
	}
	include("./function1.php");
	$db=conndb();
	$sql="select *from about_us where id =$id";
	$query=$db->query($sql);
	$result=$query->fetchall();
	//dump($result);
	$r = $result[0];	
 ?>

	<form method="post" action="./aboutedit_save.php">
		<li>名称：<input type="text" name="name" maxlength="20" placeholder="请输入你的名称" value="<?php echo $r["name"];?>"></li>
		<li>内容：<textarea name="content" ><?php echo $r["content"];?></textarea></li>
		<li><input type="hidden" name="id" value="<?php echo $id ?>" ><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>