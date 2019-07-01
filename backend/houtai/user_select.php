<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{width: 900px; height: 300px; border: 1px solid #ccc; margin: 0 auto;border-collapse: collapse;}
		th{height:20px; border: 1px solid #ccc;}
		td{ height:20px;text-align: center;border: 1px solid #ccc;}
		a{text-decoration: none;padding: 5px 8px; border: 1px solid #ccc;margin-right: 10px;}
		a:hover{background:#eee;}
		form{height:50px;text-align:center;}
	</style>
</head>
<body>
<form action="" method="get">
	
				<input type="text" name="user_name">
				<input type="text" name="name" placeholder="请输入姓名：">
				<input type="submit" value="搜索">
	
</form>
<!--实现数据库查询功能以及页面分页并在表格中显示出来-->
	<form action="user_dels.php" method="post">
	 <table>
			<tr>
				<th>选择：</th>
				<th>用户名：</th>
				<th>密码：</th>
				<th>真实姓名：</th>
				<th>添加时间：</th>
				<th>操作：</th>
			</tr>
	
	
	<?php 
		include("./function1.php");
		$db  = conndb();
		$uname=isset($_GET["user_name"])?$_GET["user_name"]:"";
		$name=isset($_GET["name"])?$_GET["name"]:"";
		$search = "";
		$q="";
		if($uname){
			$search .="and user_name like '%$uname%'";
			$q .= "&user_name =$uname";
		}
		if($name){
			$search .= "and name like '%$name%'";
			$q .="&name =$name";
		}
		if($search){
			$search = "where".substr($search, 3);//截取字符串函数 从第四个位置开始截取剩下的
		}
		//echo $search;
		
		$sql ="select count(id) as c from user $search";
		//模糊搜索
		
		
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
	 	
	 		$sql ="select * from user $search limit $start_pos,$pageper";
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
				$str.="<td>".$row["user_name"]."</td>";
				$str.="<td>".$row["pwd"]."</td>";
				$str.="<td>".$row["name"]."</td>";
				$t=date("Y-m-d H:i:s",$row["addtime"]);
				$str.="<td>".$t."</td>";
				$delurl ="user_del.php?id=$id";
				$editlink="user_edit.php?id=$id";
				$addurl="user.php?id=$id";
				$str.="<td><a href='$addurl'>添加</a><a href='$editlink'>修改</a><a href='$delurl'>删除</a></td>";
				$str.="</tr>";	
			}
		?>
		<?php echo $str; ?>
		<tr>
			<td colspan="10" style="text-align: center;">
				<input type="submit" value="删除" name="delete">
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<?php 
					for($i=1;$i<=$pages;$i++){
						echo "<a href='?page=$i$q'>$i</a>";
					}
				 ?>
			</td>
		</tr>
	  </table> 
	  </form>
</body>
</html>