<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	form{width: 800px;height: 500px;margin:0 auto; border: 1px solid #ccc;text-align: center;}
	li{list-style: none;padding: 5px 15px;}
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
	$sql="select *from classes where id =$id";
	$query=$db->query($sql);
	$result=$query->fetchall();
	//dump($result);
	$r = $result[0];
	?>
	<form action="classes_edit_save.php" method="post">
	<li>类别名称：<input type="text" name="class_name" value="<?php echo $r["class_name"];?>"></li>
	<li>类别类型：<select name="type">
						<option value="" >请选择</option>
						<option value="1" <?php echo $r["type"]=='关于我们'?"selected":"";?>>关于我们</option>
						<option value="2" <?php echo $r["type"]=='关于我们'?"selected":"";?>>工程案例</option>
						<option value="3" <?php echo $r["type"]=='关于我们'?"selected":"";?>>产品中心</option>
						<option value="4" <?php echo $r["type"]=='关于我们'?"selected":"";?>>资讯中心</option>
				  </select>
	</li>
	<li><input type="hidden" name="id" value="<?php echo $id ?>" ><input type="submit" name="tijiao" value="提交"></li>
</form>
</body>
</html>