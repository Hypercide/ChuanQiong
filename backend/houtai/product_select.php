<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
		<?php 
			include("function1.php");
			$db=conndb();
			$sql="select count(id) as c from product";
			$query = $db->query($sql);//返回的是一个对象
 		    $result = $query->fetchall();//返回的是一个二维数组
 		    //dump($result);
 		    $total = $result[0]["c"];  //总数
 		    //echo $total;
 		   //die();
 		   $pageper = 2;//每页的条数
 		   $page=isset($_GET["page"])?$_GET["page"]:1;//第几页
 		   //echo $page;
 		   $pages = ceil($total / $pageper);//总的页数
 		   //echo $pages;
 		   	$start_pos = ($page -1)*$pageper;//页面开始的位置
 		   //	$sql ="select * from user 
			$sql ="select * from product limit $start_pos,$pageper";//查询第几页的信息
			$query = $db->query($sql);//返回的是一个对象
 		    $result = $query->fetchall();//返回的是一个二维数组
 		    //dump($result);
 		    $str = "";
 			$row="";
 			if($result){
 		foreach ($result as $row) {
 			$str .="<tr>";
 			$id=$row["id"];
 			$str.="<td><input type='checkbox' name='ids[]' value='$id'></td>";
 			$str .= "<td>".$row["id"]."</td>";
 			$str .="<td>".$row["name"]."</td>";
 			$str .= "<td>".$row["content"]."</td>";
 			$str .="<td>".$row["class_id"]."</td>";
 			$str .="<td>".$row["views"]."</td>";
 			$img  ='../upload/'.$row["thum_bnails"];
 			$str .="<td><img src='$img'></td>";
 			$t=date("Y-m-d H:i:s",$row["date_time"]);
 			$str .="<td>".$t."</td>";
 			$addurl="product.php?id=$id";
 			$delurl ="product_dele.php?id=$id";
 			$editurl="product_edit.php?id=$id";
 			$str.="<td><a href='$addurl'>添加</a><a href ='$editurl'>修改</a><a href ='$delurl'>删除</a></td>";
 			$str .="</tr>";
 			}
 		}
 			 ?>
		 <form action="product_dels.php" method="post" >
		 <table border="1" style=" width:800px; height:50px; margin: 0px auto;border-collapse: collapse;">
		<tr>
			<th>选择</th>
			<th>ID</th>
			<th>名称</th>
			<th>内容</th>
			<th>类别ID</th>
			<th>浏览次数</th>
			<th>上传小图</th>			
			<th>添加时间</th>
			<th>操作</th>
		</tr>
		<?php echo $str; ?>
		<tr>
			<td colspan="10" style="text-align: center;">
				<input type="submit" value="删除" name="">
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<?php 
					for($i=1;$i<=$pages;$i++){
					echo "<a href='?page=$i'>$i</a>";
					}
				 ?>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
<style>	
	a{text-decoration: none; padding: 2px 5px; border: 1px solid #ccc; margin-right: 10px;}
	a:hover{background:#eee;}
	td{text-align: center;  height:40px;}
	img{max-width: 100px;}
</style>
</body>
</html>