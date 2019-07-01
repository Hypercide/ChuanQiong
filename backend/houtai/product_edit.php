<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>产品中心后台</title>
	<style type="text/css">
	form{width: 800px;height: 500px;margin:0 auto; border: 1px solid #ccc;text-align: center;}
	li{list-style: none;padding: 5px 15px;}
	img{max-width: 100px;}
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
	$sql="select *from product where id =$id";
	$query=$db->query($sql);
	$result=$query->fetchall();
	//dump($result);
	$r = $result[0];
	$filename=$r["thum_bnails"]?"../upload/".$r["thum_bnails"]:"";	
 ?>
	<form method="post" action="product_edit_save.php" enctype="multipart/form-data">
		<li>名称：<input type="text" name="names" value="<?php echo $r["name"];?>"></li>
		<li>内容：<textarea name="content" value="<?php echo $r["content"];?>"></textarea></li>
		
		<li>上传图片：<input type="file" name="files"></li>
		<li>
				<?php echo $filename?"<img src ='$filename'>" :"未上传图片"?>
		</li>
		<li>类别ID:
				<?php echo getSelectClass(3,3); ?>
		</li>
		<li>浏览次数:<input type="text" name="views" value="<?php echo $r["views"];?>"></li>
		<li>
		<input type="hidden" name="id" value="<?php echo $id ?>" 
		
		</li>
		<li><input type="submit" name="tijiao" value="提交"></li>
	</form>
</body>
</html>