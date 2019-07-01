<?php 
	header("Content-type: text/html; charset=utf-8");
	print_r($_POST);
	$gsmc=$_POST['company_name'];
	$call=$_POST['tel'];
	$tel=$_POST['iphone'];
	$lname=$_POST['contacts'];
	$qq=$_POST['qq'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	include("./function1.php");
	$db=conndb();
	$sql = "insert into system_set set
 				        company_name    ='$gsmc',
 				        tel    			='$call',
 			 			iphone    	    ='$tel',
 						contacts        ='$lname',
 						qq      		='$qq',
 						email   		='$email',
 						address 		='$address'";
 			echo $sql;
	$count=$db->exec($sql);
	if($count)
	{
		echo "<script>alert('保存成功!');location.href='systemset.php';</script>";
	}

 ?>