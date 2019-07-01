<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{width:800px; height: 300px; border: 1px solid #ccc; margin: 0 auto;border-collapse: collapse;}
		td{width: 120px; height:20px;text-align: center;border: 1px solid #ccc;}
		a{text-decoration: none;padding: 4px 5px; border: 1px solid #ccc;margin-right:10px;}
		a:hover{background:#eee;}
	</style>
</head>
<body>
<!--实现数据库查询功能以及页面分页并在表格中显示出来-->
	<form action="information_dels.php" method="post">
	 <table>
			<tr>
				<td>选择：</td>
				<td>名称：</td>
				<td>内容：</td>
				<td>类别ID：</td>
				<td>浏览次数：</td>
				<td>发布时间：</td>
				<td>操作：</td>
			</tr>
	
	
	<?php 
		include("./function1.php");
		$db  = conndb();
		$sql ="select count(id) as c from information";
		$query=$db->query($sql);
		$result=$query->fetchall();
		//dump($result);
		$total = $result[0]["c"];//总数
	 		   // echo $total;
	 		$pageper = 2;//每页的条数
	 		$page=isset($_GET["page"])?$_GET["page"]:1;//第几页
	 		//echo $page;
	 		$pages = ceil($total / $pageper);//总的页数
	 		   //echo $pages;
	 		$start_pos = ($page -1)*$pageper;//页面开始的位置
	 		$sql ="select * from information limit $start_pos,$pageper";
			//查询第几页的信息
			
	 		$query = $db->query($sql);//返回的是一个对象
	 		$result = $query->fetchall();//返回的是一个二维数组
	 		    //dump($result);
	
	
		$str="";
		$row="";
		foreach ($result as $row) 
			{
				$str.="<tr>";
				$id=$row["id"];
				$str.="<td><input type='checkbox' name='ids[]' value='$id'></td>";
				$str.="<td>".$row["name"]."</td>";
				$str.="<td>".$row["content"]."</td>";
				$str.="<td>".$row["class_id"]."</td>";
				$str.="<td>".$row["views"]."</td>";
				$t=date("Y-m-d H:i:s",$row["date_time"]);
				$str.="<td>".$t."</td>";
				$delurl ="information_dele.php?id=$id";
				$addurl="information.php?id=$id";
				$editlink="information_edit.php?id=$id";
				$str.="<td><a href='$addurl'>添加</a><a href='$editlink'>修改</a><a href='$delurl'>删除</a></td>";
				$str.="</tr>";	
			}
		?>
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