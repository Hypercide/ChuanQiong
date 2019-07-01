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
			$name=isset($_GET["name"])?$_GET["name"]:"";
			$sql="select count(id) as c from pro_case where name like '%$name%'";
			$query = $db->query($sql);
 		    $result = $query->fetchall();
 		    $total = $result[0]["c"];//总数
 		   $pageper = 3;//每页的条数
 		   $page=isset($_GET["page"])?$_GET["page"]:1;//第几页
 		   
 		   $pages = ceil($total / $pageper);//总的页数
 		   
 		   	$start_pos = ($page -1)*$pageper;//页面开始的位置
 		  
			$sql ="select * from pro_case where name like '%$name%' limit $start_pos,$pageper";
			$query = $db->query($sql);
 		    $result = $query->fetchall();//返回的是一个二维数组
 		    $str = "";
 			$row="";
 			if($result){
 				
 		foreach ($result as $row) {
 			/*$sql    ="select id class_name from classes where type=2";
 			$query  =$db->query($sql);
 			$result =$query->fetchall();
 			if($result){
 			foreach ($result as $row) {
 				$str=$row["id"];
 				$str=$row["classname"];
 				}
 				echo $str;
 			}*/
 			$str .="<tr>";
 			$id=$row["id"];
 			$str.="<td><input type='checkbox' name='ids[]' value='$id'></td>";
 			$str .="<td>".$row["id"]."</td>";
 			$str .="<td>".$row["name"]."</td>";
 			$str .= "<td>".$row["content"]."</td>";

 			$str .="<td>".$row["class_id"]."</td>";
 			$str .="<td>".$row["views"]."</td>";	
 			$img  ='../upload/'.$row["thum_bnails"];
 			$str .="<td><img src='$img'></td>";
 			$t=date("Y-m-d H:i:s",$row["date_time"]);
 			$str .="<td>".$t."</td>";
 			$addurl="case.php?id=$id";
 			$delurl ="case_dele.php?id=$id";
 			$editurl="case_edit.php?id=$id";
 			$str.="<td><a href ='$addurl'>添加<a href ='$editurl'>修改</a><a href ='$delurl'>删除</a></td>";
 			$str .="</tr>";
 			}
 		}
 			 ?>
 			 <form action="" method="get">
				  <input type="text" name="name" placeholder="请输入查询内容：">
				  <input type="submit" name="" value="搜索">
 			 </form>
		 <form action="case_dels.php" method="post" >
		 <table border="1">
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
		<?php echo $str;?>
		<tr>
			<td colspan="9" style="text-align: center;">
				<input type="submit" value="删除" name="">
			</td>
		</tr>
		<tr>
			<td colspan="9">
				<?php 
					for($i=1;$i<=$pages;$i++){
					echo "<a href='?page=$i&name=$name'>$i</a>";
					}
				 ?>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
<style>
	
	table{max-width:800px; height: 300px; border: 1px solid #ccc; margin: 0 auto;border-collapse: collapse;}
	a{text-decoration: none; padding: 2px 3px; border: 1px solid #ccc; margin:2px 3px;}
	a:hover{background:#eee;}
	td{height:30px;text-align:center;}
	img{max-width: 100px;}
	form{height:20px; text-align: center;}
	
</style>
