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
	<?php 
		$id=isset($_GET['id'])?$_GET["id"]:0;
		if(!$id){

		echo "<script>alert('ID参数错误！');history.back();</script>";
		}
		include("./function1.php");
		$db=conndb();
		$sql="select *from information where id =$id";
		$query=$db->query($sql);
		$result=$query->fetchall();
		//dump($result);
		$r = $result[0];	
	 ?>
	<form action="information_edit_save.php" method="post">
		<li>名称:<input type="text" name="name" value="<?php echo $r["name"];?>"></li>
		<li>内容:<textarea name="content" value="<?php echo $r["content"];?>"></textarea></li>
		<li>类别ID:
					<?php echo getSelectClass(4,4) ;?>
		</li>
		<li>浏览次数：<input type="text" name="views" value="<?php echo $r["views"];?>"></li>
		<li> <input type="hidden" name="id" value="<?php echo $id ?>" > 
			 <input type="submit" name="tijiao" value="提交">
		</li>
	</form>
</body>
</html>