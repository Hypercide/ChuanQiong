<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./CSS/gaogeqiang.css">
	<title>案例详情</title>
</head>
<body>
	<div id="top">
		<div class="logo">
			<div class="left"></div>
			<div class="right">
				<p>江西区域统一售后</p>
				<li>0791-88229757</li>
			</div>
		</div>   
	</div>
	<div id="nav">
		<div class="center">
			<li><a href="./">网站首页</a></li>
			<li class="c">
			<a href="./guanyu.php">公司简介</a>
			<ul>
			<?php
				include("./houtai/function1.php");
				$db=conndb();
				$sql="select name ,id from about_us";
				$query=$db->query($sql);
				$result=$query->fetchall();
				$str="";
				foreach ($result as $row) {
					$id=$row["id"];
					$str.="<a href='guanyu.php'>".$row["name"]."</a>";
				}

				echo $str;
			?>
			</ul>
			</li>
			<li>
			<a href="./gongcheng.php">工程案例</a>
			<ul>
			<?php 
				$sql="select * from classes where type=2";
				$query=$db->query($sql);
				$result=$query->fetchall();
				$str= "";
				foreach ($result as $row) {
					$id   =$row["id"];
					$str .="<a href='gongcheng.php'>".$row["class_name"]."</a>";
				}
				echo $str;
			 ?>
			 </ul>
			</li>
			<li>
			<a href="./product.php">产品中心</a>
			<ul>
			<?php
				$sql   ="select *from classes where type=3";
				$query =$db->query($sql);
				$result=$query->fetchall();
				$str="";
				foreach ($result as $row) {
					$id = $row["id"];
					$str.="<a href='product.php'>".$row["class_name"]."</a>";
				}
				echo $str;
			?>
			</ul>
			</li>
			<li>
			<a href="./news.php">新闻中心</a>
			<ul>
			<?php
				$sql    = "select * from classes where type=4";
				$query  = $db->query($sql);
				$result = $query->fetchall();
				$str= "";
				foreach ($result as $row) {
					$id =$row["id"];
					$str.="<a href='news.php'>".$row["class_name"]."</a>";
				}
				echo $str;
			?>
			</ul>
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
	<div id="bg_2">
		<div class="bgtext"><label>Products</label><span>产品中心</span></div>
	</div>
	<div id="mid">
		<div class="left">
				<div class="list">
						<div class="product">
							<li>产品中心</li>
							<span>PRODUCTS</span>
						</div>
						<div class="ser">
							<?php
								$sql="select id,class_name from classes where type=3";
								$query=$db->query($sql);
								$result=$query->fetchall();
								$str="";
								foreach ($result as $row) {
									$str.="<li>"."》";
									$id=$row["id"];
									$str.="<a href='product.php?id=$id'>".$row["class_name"]."</a>";
									$str.="</li>";
								}
								echo $str;

							?>
							
						</div>
				</div>
		</div>
		<div class="right">
			<div class="gc">
				<div class="a">
				<?php
					$id=isset($_GET["id"])?$_GET["id"]:"";

					$sql="select class_id from product where id=$id ";
					$query=$db->query($sql);
					$result=$query->fetchall();
					$class_id =$result[0]["class_id"];

					$sql = "select class_name from classes where id=$class_id";
					$object = $db->query($sql);
					$result = $object->fetchall();
					$class_name = $result[0]["class_name"];
					echo  "<li>$class_name</li>";
				?>
				</div>
				<div class="b">
					 <li>您的位置：</li>
					 <li>首页</li>
					 <li>></li>
					 <li>工程案例</li>
				</div>
			</div>
			<div class="pic">

			<?php
					
				
					$sql="select name,thum_bnails from product where id=$id";
					
					$query  = $db->query($sql);
					$result = $query->fetchall();
					$row1=$result[0]["name"];
					$img='./upload/'.$result[0]["thum_bnails"];
					$str = "";
					echo $str .="<li>$row1</li>"."<img src='$img'>";
					

			?>

			</div>
			<div class="return"><a href="./product.php"><&nbsp&nbsp返回</a></div>
		</div>
	</div>
	
    <div id="footer">    
      	<div class="mid">
			联系人：郑经理   15079070112/0791-87915020   地址：江西省南昌市高新区紫阳大道旁艾溪湖南大道5号
			     <li>赣ICP备16011677号   Copyright© 南昌川穹家具有限公司   技术支持：<a href="">南昌雅腾</a></li>
		</div>
	</div>
	<style>
			img{max-width:650px;}
	</style>
</body>
</html>