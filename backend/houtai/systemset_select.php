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
		$sql="select * from system_set";
		$query=$db->query($sql);
		$result=$query->fetchall();
		
		if($result){
			$row="";
			$str="";
						foreach ($result as $row) {
							$str.="<tr>";
							$id=$row["id"];
							$str.="<td><input type='checkbox' name='ids[]' value='$id'></td>";
							$str .="<td>".$row["id"]."</td>";
							$str.="<td>".$row["company_name"]."</td>";
							$str.="<td>".$row["tel"]."</td>";
							$str.="<td>".$row["iphone"]."</td>";
							$str.="<td>".$row["contacts"]."</td>";
							$str.="<td>".$row["qq"]."</td>";
							$str.="<td>".$row["email"]."</td>";
							$str.="<td>".$row["address"]."</td>";
							$addurl="system.php?id=$id";
							$editurl="systemedit.php?id=$id";
							$str.="<td><a href ='$editurl'>编辑</a></td>";
							$str.="</tr>";
						}
				}
	 ?>
	 <form >
		 <table border="1" style=" width:800px; height:50px; margin: 0px auto;border-collapse: collapse;">
		<tr>
			<th>选择</th>
			<th>ID</th>
			<th>公司名称</th>
			<th>联系电话</th>
			<th>手机</th>
			<th>联系人</th>
			<th>QQ</th>
			<th>Email</th>
			<th>地址</th>
			<th>操作</th>
		</tr>
		<?php echo $str; ?>
		
		
	</table>
	</form>
</body>
</html>
<style>
	
	a{text-decoration: none; padding: 2px 5px; border: 1px solid #ccc; margin-right: 10px;}
	a:hover{background:#eee;}
	td{text-align: center;height:50px;}
	
</style>
