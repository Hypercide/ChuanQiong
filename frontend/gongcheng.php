<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>工程案例</title>
	 <link rel="stylesheet" type="text/css" href="./CSS/gaogeqiang.css">

</head>
<style type="text/css">
img{width: 230px;height: 160px;}
</style>
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
						$str.="<a href='gongcheng.php?id=$id'>".$row["name"]."</a>";								
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
			</li>
			<li><a href="">客户留言</a></li>
			<li><a href="">联系我们</a></li>
		</div>
	</div>
 <div id="bg_1">
	<div class="bgtext"><label>CASE</label><span>工程案例</span></div>
 </div>
 <div id="mains">
	   <div class="left">
			 <div class="list">
				  <div class="product"><li>工程案例</li><span>Project Case</span></div>
				  <div class="ser">
				  	<?php 
				  		$sql="select * from classes where type=2";
				  		$query=$db->query($sql);
				  		$result=$query->fetchall();
				  		$str="";
				  		if($result){
				  			foreach($result as $row){
				  				$id    = $row["id"];
				  				$str .= "<li>"."》";
				  				$str .= "<a href='gongcheng.php?id=$id'>".$row["class_name"]."</a>";
				  				$str .= "</li>";
				  			}
				  		}
				  		echo $str;
				  	?>
						
				  </div>
			 </div>
		</div>
		<div class="right">
			 <div class="case">
					<div class="a">
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
								echo "<li>"."工程案例"."</li>";
							}
						
					    ?>
					</div>
					<div class="b">
						<li>你的位置：</li>
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
								echo "<li>"."工程案例"."</li>";
							}
						
					?>
						
					</div>
			 </div>
			 <div class="pic">
			 		<?php
						$id = isset($_GET["id"])?$_GET["id"]:"";
						$search = "";
						if($id){
							$sql="select count(id) as c from pro_case where class_id=$id";
							//查询总的记录数
							$search .= "&id=$id";
						}
						else{
							$sql="select count(id) as c from pro_case";
						}
						$query   = $db->query($sql);
						$result  = $query->fetchall();
						$total   = $result[0]["c"];
						$pageper = 9;//每页的条数
						$page    = isset($_GET["page"])?$_GET["page"]:1;
						$pages = ceil($total / $pageper);
						$start_pos = ($page-1)*$pageper;

						if($id){
							$sql="select * from pro_case where class_id=$id limit $start_pos,$pageper";
						}
			 			else{
			 				$sql="select * from pro_case limit $start_pos,$pageper";
			 			}
			 			$query=$db->query($sql);
				 		$result=$query->fetchall();
				 		$str="";	
			 			foreach($result as $row){
			 					$str .="<li>";
			 					$id=$row["id"];
			 					$img  ='./upload/'.$row["thum_bnails"];
 								$str .="<a href='./procase_detail.php?id=$id'>"."<br/>"."<img src='$img'>"."</a>";
 								$str .="<a href='./procase_detail.php?id=$id'>"."<br/>".$row['name']."</a>";
			 					$str .="</li>";
			 				
			 			}
			 				echo $str;
			 		 ?>
					
			</div>
			<div class="page">
					<div class="y">
						
						<?php

							$current = isset($_GET["page"])?$_GET["page"]:1;
							$str  = "";
							if($current > 1){
								$pre = $current - 1;
								$str .= "<li>";
								$str .= "<a href='gongcheng.php?page=$pre$search'>"."<"."</a>";
								$str .= "</li>";
							} 
							for($i=1;$i <= $pages; $i++){
								$str .= "<li>";
								$str .= "<a href='?page=$i$search'>$i</a>";
								$str .= "</li>";
							}
							
							if($current < $pages){
								$next = $current + 1;
								$str .="<li>";
								$str .= "<a href='gongcheng.php?page=$next$search'>".">"."</a>";
								$str .="</li>";
								
							}
							echo $str;
						?>
					</div>			
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


