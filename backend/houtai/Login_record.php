<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录记录</title>
<style>
	a{text-decoration:none; padding:5px 8px; border: 1px solid #ccc; margin-right:10px;}
	a:hover{background:#eee;}
	td{text-align: center;}
</style>
</head>
<body>
	 <table border="1" style=" width:800px; height:300px; margin: 0px auto;border-collapse: collapse;">
		<tr>
			<th>用户名</th>
			<th>用户ID</th>
			<th>登录时间</th>
		</tr>
	<?php 
		header("Content-type: text/html; charset=utf-8");
		include("./function1.php");
		$db=conndb();
			$sql="select count(id) as c from time";
			$query = $db->query($sql);//返回的是一个对象
 		    $result = $query->fetchall();//返回的是一个二维数组
 		    //dump($result);
 		    $total = $result[0]["c"];  //总数
 		    //echo $total;
 		   //die();
 		   $pageper = 2;//每页的条数
 		   $page=isset($_GET["page"])?$_GET["page"]:1;//第几页
 		  // echo $page;
 		   $pages = ceil($total / $pageper);//总的页数
 		   //echo $pages;
 		   	$start_pos = ($page -1)*$pageper;//页面开始的位置
 		   //	$sql ="select * from user 
			$sql ="select * from time limit $start_pos,$pageper";//查询第几页的信息
			$query = $db->query($sql);//返回的是一个对象
 		    $result = $query->fetchall();
 		    $str = "";
 			$row="";
 			if($result){
 				foreach ($result as $row) 
 				{
 					$str .="<tr>";
 					$id=$row["id"];
 					$str.="<td>".$row["uname"]."</td>";
 					$str .="<td>".$row["uid"]."</td>";
 					$t    =date("Y-m-d H:i:s",$row["logintime"]);
 					$str .="<td>".$t."</td>";
 					$str .="</tr>";
 				}
 			}
 ?>
 <?php echo $str; ?>
 
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
</body>
</html>
