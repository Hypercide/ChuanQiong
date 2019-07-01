<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们</title>
    <link rel="stylesheet" type="text/css" href="./CSS/gaogeqiang.css">
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
					$sql="select id,name from about_us";
					$query=$db->query($sql);
					$result=$query->fetchall();
					//dump($result);
					
					$str="";				
					foreach ($result as $row){
						$id  = $row["id"];
						$str.="<a href='guanyu.php?id=$id'>".$row["name"]."</a>";								
					}
					echo $str;

				 ?>
				</ul>
			</li>
			<li><a href="./gongcheng.php">工程案例</a>
				<ul>
				<?php     
					
					$sql="select *from classes where type=2";
					$query=$db->query($sql);
					$result=$query->fetchall();
					$str="";
					if($result){
					foreach ($result as $row) {
						$id=$row["id"];
						$str.="<a href='gongcheng.php?id=$id'>".$row["class_name"]."</a>";
						}
					}
					echo $str;
				 ?>
				 </ul>
				<!-- <ul>
						<a href="">双玻系列</a>	
						<a href="">活动墙系列</a>	
						<a href="">门系列</a>
						<a href="">配件</a>	
				</ul> -->
			</li>
			<li><a href="./product.php">产品中心</a>
				<ul>
				<?php 
					
					$sql="select * from classes where type=3";
					$query=$db->query($sql);
					$result=$query->fetchall();
					$str="";

					foreach ($result as $row) {
						$id   =$row["id"];
						$str .= "<a href='product.php?id=$id'>".$row["class_name"]."</a>";
					}
					//return $str;
					echo $str;

				 ?>
				 </ul>
				<!-- <ul>
						<a href="">高隔墙</a>	
						<a href="">家具</a>	
				</ul> -->
			</li>
			<li><a href="./news.php">新闻中心</a>
				<ul>
					<?php 
						
						$sql="select * from classes where type=4";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str="";
						foreach ($result as $row) {
							$id=$row["id"];
							$str .= "<a href='news.php?id=$id'>".$row["class_name"]."</a>";
						}

						echo $str;
					 ?>
			 </ul>
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
	<div id="bg">
		<div class="bgtext"><label>About Us</label><span>关于我们</span></div>
	</div>
 	<div id="center">
		<div class="left">
			<div class="list">
				<div class="product"><li>关于我们</li><span>About US</span></div>
				<div class="ser">
					<?php 
						$sql="select id, name from about_us";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str = "";
			 			$row="";
			 			if($result){
							foreach ($result as $row ){
								$str.="<li>"."》";
								$id=$row["id"];
								$str.="<a href='guanyu.php?id=$id'>".$row["name"]."</a>";
								$str.="</li>";
							}
						}
						echo $str;
					 ?>	
				</div>
			</div>
		</div>
		<div class="right">
			<div class="about">
				<div>
					<label class="a">
						<?php

						
						 	$id=isset($_GET["id"])?$_GET["id"]:"";
							if($id){
								$sql="select name from about_us where id=$id ";
								$query  =$db->query($sql);
								$result =$query->fetchall();
								$row  =$result[0]["name"];
								$str="";
								echo $str .=$row;
							}else
								{
								echo "公司简介";
							}
						
						?>
					</label>
				</div>
				<div class="b">
					<ul>
					<li>你的位置：</li>
					<li>首页</li>
					<li>></li>
					<?php

						
						 	$id=isset($_GET["id"])?$_GET["id"]:"";
							if($id){
								$sql="select name from about_us where id=$id ";
								$query  =$db->query($sql);
								$result =$query->fetchall();
								$row  =$result[0]["name"];
								$str="";
								echo $str .="<li>".$row."</li>";
							}else
								{
								echo "<li>"."公司简介"."</li>";
							}
						
					?>
					</ul>
				</div>
			</div>
			<div class="w">
		<?php 
				$id=isset($_GET['id'])?$_GET["id"]:0;
	
				if($id){
					$sql="select content from about_us where id=$id";
				}
				else{
					$sql="select content from about_us";
				}
					
					$query=$db->query($sql);
					$result=$query->fetchall();
					$str = "";
		 			$row="";
		 			if($result){
		 				foreach ($result as  $row) {			
		 					$str.="<p>".$row["content"]."</p>";
		 				}
					}
					echo $str;
				 ?>	
			</div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<div id="footer">    
      	<div class="mid">
			联系人：郑经理   15079070112/0791-87915020   地址：江西省南昌市高新区紫阳大道旁艾溪湖南大道5号
			     <li>赣ICP备16011677号   Copyright© 南昌川穹家具有限公司   技术支持：<a href="">南昌雅腾</a></li>
		</div>
	</div>
</body>
</html>

	

