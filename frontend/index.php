<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link href="CSS/gaogeqiang.css" rel="stylesheet" type="text/css">
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
			<li class="c"><a href="./guanyu.php">关于我们</a>
				<ul>
					<?php
						include ("./houtai/function1.php");
						$db=conndb();
						$sql="select id , name from about_us";
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
			<li><a href="./gongcheng.php">工程案例</a>
				<ul>
					<?php
						$sql="select id, class_name from classes where type=2";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str="";
						foreach ($result as $row) {
							$id=$row["id"];
							$str.="<a href='gongcheng.php'>".$row["class_name"]."</a>";
						}
						echo $str;
					?>
						
				</ul>
			</li>
			<li><a href="./product.php">产品中心</a>
				<ul>	
					<?php
						$sql="select class_name from classes where type=3";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str1="";
						foreach ($result as $row) {
							$str1 .= "<a href='product.php'>".$row["class_name"]."</a>";
						}
						echo $str1;

					?>
				</ul>
			</li>
			<li><a href="./news.php">新闻中心</a>
				<ul>
					<?php
						$sql="select id,class_name from classes where type=4";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str="";
						foreach ($result as $row) {
							$id=$row["id"];
							$str.="<a href='news.php?id=$id'>".$row["class_name"]."</a>";
						}
						echo $str;

					?>
				</ul>
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
	<div id="banner"></div>	
	<div id="main">
		<div class="up">
			<div class="nvshow">
				<a href=""><span style="color:black;border-bottom:3px solid #E72E2A;">双玻系列</span></a>
				<a href="">活动隔墙系列</a>
				<a href="">门系列</a>
				<a href="">配件</a>
			</div>
			<div class="pic">
				<li><a href=""><img src="./images/01.jpg"><br>青年广场</a></li>
				<li><a href=""><img src="./images/02.jpg"><br>梦时代商务大厦</a></li>
				<li><a href=""><img src="./images/03.jpg"><br>双子塔大厦</a></li>
				<li><a href=""><img src="./images/04.jpg"><br>正辉科技</a></li>
				<li><a href=""><img src="./images/05.jpg"><br>海欣工作室</a></li>
				<li><a href=""><img src="./images/06.jpg"><br>悦动大厦</a></li>
			</div>
			<div class="more"><a href="">MORE+</a></div>
		</div>
		<div class="down">
			<div class="tupian">
				 <img src="./images/tupian.jpg">
				 <div class="d"></div>
				 <div class="news">
						<ul>
							<li class="ns">NEW</li>
							<li class="cn">新闻中心</li>
						</ul>
						<div class="ms"><a href="" style="color:#000;">MORE+</a></div>
				 </div>
			</div>
			<div class="content">
				 
					<h1>热烈欢迎川穹高隔墙网站正式上线</h1>
					<li>2017-05-08</li>
					<p>专业从事高隔间制作安装并销售各种新型室内高隔间、活动隔断、活动隔墙、高隔间墙体材料的企业。它吸取了国内外最新设计理念，并结合中国国情而研制的新一代高隔间墙产品</p>
				<ul>
					<li class="r"><span>2017-05-10</span><a href="">川穹高隔墙，关爱员工免费体检送健康</a></li>
					<li class="r"><span>2017-05-08</span><a href="">中国高隔墙企业的竞争市场在哪</a></li>
					<li class="r"><span>2017-04-16</span><a href="">热烈欢迎川穹高隔墙公司网站正式上线</a></li>
					<li class="r"><span>2017-03-25</span><a href="">中国高隔墙企业的竞争市场在哪</a></li>
					<li class="r"><span>2017-03-19</span><a href="">热烈欢迎川穹高隔墙公司网站正式上线</a></li>
					<li class="r"><span>2017-03-10</span><a href="">川穹高隔墙，关爱员工免费体检送健康</a></li>
					<li class="r"><span>2017-02-02</span><a href="">中国高隔墙企业的竞争市场在哪</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer">    
      	<div class="mid">
			联系人：郑经理   15079070112/0791-87915020   地址：江西省南昌市高新区紫阳大道旁艾溪湖南大道5号
			     <li>赣ICP备16011677号   Copyright© 南昌川穹家具有限公司   技术支持：<a href="">南昌雅腾</a></li>
		</div>
	</div>
</body>
</html>