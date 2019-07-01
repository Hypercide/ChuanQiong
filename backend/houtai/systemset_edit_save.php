<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		print_r($_POST); 

		$companyname=$_POST["company_name"];
		$tel=$_POST["tel"];
		$iphone=$_POST["iphone"];
		$contacts=$_POST["contacts"];
		$qq=$_POST["qq"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$id         =$_POST["id"];
		include("./function1.php");
		$db=conndb();
		$sql="update system_set set 
					 company_name ='$companyname',
					 tel          ='$tel',
					 iphone       ='$iphone',
					 contacts     ='$contacts',
					 qq           ='$qq',
					 email        ='$email',
					 address      ='$address'
					 where id     =$id";
			echo $sql;
 			$count = $db->exec($sql);
 			//echo $count;
 			if($count){
 				echo "<script>alert('修改成功');location.href='systemset_select.php'</script>";
 			}
 			else{
 				"<script>alert('修改成功');location.href='systemset_select.php'</script>";
 			}

	?>
</body>
</html>