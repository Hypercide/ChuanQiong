<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统设置修改</title>
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
	$sql="select *from system_set where id =$id";
	$query=$db->query($sql);
	$result=$query->fetchall();
	//dump($result);
	$r = $result[0];
	?>
	<form action="systemset_edit_save.php" method="post">
			<li>公司名称:<input type="text" name="company_name" value="<?php echo $r["company_name"];?>"></li>
			<li>电话:<input type="text" name="tel" value="<?php echo $r["tel"];?>"></li>
			<li>手机:<input type="text" name="iphone" value="<?php echo $r["iphone"];?>"></li>
			<li>联系人:<input type="text" name="contacts" value="<?php echo $r["contacts"];?>"></li>
			<li>QQ:<input type="text" name="qq" value="<?php echo $r["qq"];?>"></li>
			<li>E-mail:<input type="text" name="email" value="<?php echo $r["email"];?>"></li>
			<li>住址:<input type="text" name="address" value="<?php echo $r["address"];?>"></li>
			<li><input type="hidden" name="id" value="<?php echo $id ?>" </li>
			<li><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>