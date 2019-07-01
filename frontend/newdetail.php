<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="CSS/gaogeqiang.css">
	<title>新闻详情</title>
</head>
<body>
<!-- 头部开始 -->
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
			<li class="c">'
			<a href="./guanyu.php">公司简介</a>
			<ul>
			<?php
				include("./houtai/function1.php");
				$db=conndb();
				$sql="select * from about_us";
				$query=$db->query($sql);
				$result=$query->fetchall();
				$str="";
				foreach($result as $row){
					$id=$row["id"];
					$str.="<a herf='guanyu.php'>".$row["name"]."</a>";
				}
				echo $str;
			?>
			</ul>
			</li>
			<li><a href="./gongcheng.php">工程案例</a>
			<ul>
				<?php
					$sql="select * from classes where type=2";
					$query=$db->query($sql);
					$result=$query->fetchall();
					$str="";
					foreach($result as $row){
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
						$sql="select * from classes where type=3";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$str="";
						foreach($result as $row){
							$id   = $row["id"];
							$str .= "<a href='product.php'>".$row["class_name"]."</a>";
						}
						echo $str;
					?>
				</ul>
			</li>
			<li><a href="./news.php">新闻中心</a>
			<ul>
				<?php
					$sql="select * from classes where type=4";
					$query=$db->query($sql);
					$result=$query->fetchall();
					$str="";
					foreach($result as $row){
						$id=$row["id"];
						$str.="<a href='news.php'>".$row['class_name']."</a>";

					}
					echo $str;

				?>
				</ul>
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
	<!-- 头部结束 -->
	<div id="bg_4">
		<div class="bgtext"><label>News</label><span>新闻中心</span></div>
	</div>
	<!-- 中间部分开始 -->
	<div id="m_new">
		<div class="left">
			 <div class="list">
						<div class="product"><li>新闻中心</li><span>NEWS</span></div>
						<div class="ser">
							<?php
								$sql="select * from classes where type=4";
								$query=$db->query($sql);
								$result=$query->fetchall();
								$str="";
								foreach($result as $row){
									$id=$row["id"];
									$str.="<li>"."》";
									$str.="<a href='news.php'>".$row["class_name"]."</a>";
									$str.="</li>";

								}
								echo $str;


							?>
							<!-- <li>》<a href=""class="ls">双玻系列</a></li>
							<li>》<a href="">活动隔墙系列</a></li>
							<li>》<a href="">门系列</a></li>
							<li>》<a href="">配件</a></li> -->
						</div>
			 </div>
		</div>
		<div class="right">
				<div class="gc">
						<div class="a">新闻中心</div>
						<div class="b">
							 <li>您的位置：</li>
							 <li>首页</li>
							 <li>></li>
							 <li>新闻中心</li>
						</div>
				</div> 
				<div class="new">
					<?php
						$id2 = isset($_GET["id2"])?$_GET["id2"]:"";
						$sql = "select name from information where id=$id2";
						
						$query  = $db->query($sql);
						$result =$query->fetchall();
						$name    =$result[0]["name"];
						echo "<h1>$name</h1>";
					?>
					<br>
					<div class="br">
					浏览次数:
					 <?php
					 		$sql="select views from information where id=$id2";
					 		$query=$db->query($sql);
					 		$result=$query->fetchall();
					 		$value=$result[0]["views"];
					 		$values=$value+1;
					 		$sql="update information set views='$values'where id=$id2";
					 		$count = $db->exec($sql);
					 		$sql="select views from information where id=$id2";
					 		$query=$db->query($sql);
					 		$result=$query->fetchall();
					 		echo $result[0]["views"];


					 ?>　
					发布时间： 
					<?php
						$sql="select * from information where id=$id2";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$t=date("Y-m-d H:i:s",$result[0]["date_time"]);
						echo $t;
					?>
					</div>
					<br>
					<?php
						$sql="select * from information where id=$id2";
						$query=$db->query($sql);
						$result=$query->fetchall();
						$class_id=$result[0]["class_id"];
						$row=$result[0]["content"];
						echo "<p>".$row."</p>";
						
						
					?>
					
					<div class="u">	
						<li>上一篇：
							<?php							
								$sql="select id,name from information where class_id='$class_id' and id>$id2 order by id desc limit 1";
								$query=$db->query($sql);
								$result=$query->fetchall();	
								if($result){
									$id1  = $result[0]["id"];	
									$name = $result[0]["name"];
									echo "<a href='newdetail.php?id=$id1'>$name</a>";
								}
								else{		
									echo "没有了";
								}

							?>
						<li>下一篇：
							<?php
								$sql="select id,name from information where class_id='$class_id' and id<$id2 order by id desc limit 1";
								$query=$db->query($sql);
								$result=$query->fetchall();
								if($result){	
									$id3  = $result[0]["id"];	
									$name = $result[0]["name"];
									echo "<a href='newdetail.php?id=$id3'>$name</a>";

								}
								else{	
									echo "没有了";
								}
							?>
						</li>
					</div>
					
				</div>
		</div>

	</div>
	<!-- 中间部分结束 -->

	<div id="footer">
	<!-- 底部开始 -->    
      	<div class="mid">
			联系人：郑经理   15079070112/0791-87915020   地址：江西省南昌市高新区紫阳大道旁艾溪湖南大道5号
			     <li>赣ICP备16011677号   Copyright© 南昌川穹家具有限公司   技术支持：<a href="">南昌雅腾</a></li>
		</div>
	<!-- 底部结束 --> 
	</div>
</body>
</html>