<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<title>新闻中心</title>
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
			<li class="c"><a href="./guanyu.php">公司简介</a>
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
							$str.="<a href='?id=$id'>".$row["name"]."</a>";								
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
				<!-- <ul>
						<a href="">行业资讯</a>	
						<a href="">公司新闻</a>	
				</ul> -->
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
	<div id="bg_3">
		 <div class="bgtext"><label>NEWs</label><span>新闻中心</span></div> -->
	</div>
	 <div id="mid_1">
		<div class="left">
				<div class="list">
						<div class="product">
					
						<li>新闻中心</li>
						<span>NEWS</span>

						</div>
						<div class="ser">
						<?php
							$sql="select * from classes where type=4";
							$query=$db->query($sql);
							$result=$query->fetchall();
							$str="";
							foreach($result as $row){
									$str.="<li>"."》";
									$id=$row["id"];
									$str.="<a href='news.php?id=$id'>".$row["class_name"]."</a>";
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
						if($id){
						$sql="select class_name from classes where id=$id ";
						$query  =$db->query($sql);
						$result =$query->fetchall();
						$row  =$result[0]["class_name"];
						$str="";
						$str .=$row;
						}else{
							$str="新闻中心";
						}
						echo $str;
						
					?>

					</div>
					<div class="b">
						 <li>您的位置：</li>
						 <li>首页</li>
						 <li>></li>
						 <?php
						 	$id=isset($_GET["id"])?$_GET["id"]:"";
							if($id){
								$sql="select class_name from classes where id=$id ";
								$query  =$db->query($sql);
								$result =$query->fetchall();
								$row  =$result[0]["class_name"];
								$str="";
								echo $str .="<li>".$row."</li>";
							}else
								{
								echo "<li>"."新闻中心"."</li>";
							}
						

						 ?>
						 
					</div>
				</div>
				<div class="news">
					<?php
						$id=isset($_GET["id"])?$_GET["id"]:"";

						 $search = "";
						 $str    = "";
						 if($id){
						 	$sql ="select count(id) as c from information where class_id=$id ";
						 }
						 else
						 {
						 	$sql ="select count(id) as c from information";
						 }
						 	$query   = $db->query($sql);
						 	$result  = $query->fetchall();
						 	$total   = $result[0]["c"];
						 	$page    = isset($_GET["page"])?$_GET["page"]:1;
						 	$pageper =4;
						 	$pages   = ceil($total / $pageper);
						 	$start_pos = ($page-1)*$pageper;
						if($id){
							$sql ="select * from information where class_id=$id order  by id desc limit $start_pos,$pageper";

						}
						else{
							$sql ="select * from information order by id desc  limit $start_pos,$pageper";
						}
					
						$query=$db->query($sql);
						$result=$query->fetchall();
						
						$str="";
						foreach($result as $row){
							$str .="<li>";
							$id=$row["id"];
							$str.="<a href='newdetail.php?id2=$id'>".$row["name"]."</a>";
							$t=date("Y-m-d H:i:s",$row["date_time"]);
							$str.="<span>".$t."</span>";
							$str .="</li>";
						}
						echo $str;
					?>
				</div>
				<div class="page">
					<?php

							$current = isset($_GET["page"])?$_GET["page"]:1;
							$str  = "";
							if($current > 1){
								$pre = $current - 1;
								
								$str .= "<a href='?page=$pre$search'>"."<"."</a>";
								
							} 
							for($i=1;$i <= $pages; $i++){
								
								$str .= "<a href='?page=$i$search'>$i</a>";
								
							}
							
							if($current < $pages){
								$next = $current + 1;
								
								$str .= "<a href='?page=$next$search'>".">"."</a>";
								
								
							}
							echo $str;
						?>
					
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