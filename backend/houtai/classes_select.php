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
			/*$sql="select count(id) as c from about";
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
 		   	
			$sql ="select * from about limit $start_pos,$pageper";//查询第几页的信息*/
			$sql ="select * from classes ";
			$query = $db->query($sql);//返回的是一个对象
 		    $result =$query->fetchall();//返回的是一个二维数组
 		   // dump($result);
 		    $str = "";
 			$row="";

 			if($result){

 		foreach ($result as $row) {
 			$str .="<tr>";
 			$id=$row["id"];
 			$str.="<td><input type='checkbox' name='ids[]' value='$id'></td>";
 			$str .= "<td>".$row["id"]."</td>";
 			$str .="<td>".$row["class_name"]."</td>";
 			if($row["type"]==1){
 				$str.="<td>" ."关于我们"."</td>";
 				
 			}else if($row["type"]==2){
 				 $str.="<td>" ."工程案例"."</td>";
 				
 			}else if($row["type"]==3) {
 				 $str.="<td>" ."产品中心"."</td>";

 			}else if($row["type"]==4){
 			 $str.="<td>" ."资讯中心"."</td>";
 			 }

 			
 			$addurl="classes.php?id=$id";
 			$delurl ="classes_dele.php?id=$id";
 			$editurl="classes_edit.php?id=$id";
 			$str.="<td><a href='$addurl'>添加</a><a href ='$editurl'>修改</a><a href ='$delurl'>删除</a></td>";
 			$str .="</tr>";
 			}

 		}

 			 ?>
		 <form action="classes_dels.php" method="post" >
		 <table border="1" style=" width:800px; height:100px; margin: 0px auto;border-collapse: collapse;">
		<tr>
			<th>选择</th>
			<th>ID:</th>
			<th>类别名称：</th>
			<th>类别类型：</th>
			<th>操作</th>
		</tr>
		<?php echo $str; ?>
		<tr>
			<td colspan="15" style="text-align: center;">
				<input type="submit" value="删除" name="" >
			</td>
		</tr>
		
	</table>
	</form>
</body>
</html>
<style>
	
	a{text-decoration: none; padding: 2px 5px; border: 1px solid #ccc; margin-right: 10px;}
	a:hover{background:#eee;}
	td{text-align: center; width: 1000px; height:80px;}
	
	
</style>