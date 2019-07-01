<?php 
function is_login(){

	session_start();
	if(!isset($_SESSION["user_name"])){
		echo "<script>alert('请先登录');location.href='./houtai/login.php';</script>";
		exit();
	}
}


//上传函数
function upfile($files){
	$filename= "";
	if($files["size"]>0)
		{
		$max = 1*1024*1024;
		if($files["size"]>$max)
		{
		echo "<script>alert('文件大小不能大于1M！');history.back();</script>";
		die();
		}
		
		function getExt($filename)
			{
				$arr=explode(".",$filename);
				$max=count($arr)-1;
				return $arr[$max];
			}
	$ext=strtolower(getExt($files["name"]));
	$arr=["gif","jpg","jpeg","png"];
	/*echo $ext;
	die();*/
	if(!in_array($ext, $arr))
	 {
		echo "<script>alert('文件类型不正确！');history.back();</script>";
		die();
	 }
		
		$filename = time().rand(100,9999).".".$ext;
		move_uploaded_file($files["tmp_name"], "../upload/".$filename);
		/*echo $filename;
		die();*/
	}
	
		return $filename;
		
	}
//得到相应的类别下拉列表
 //得到相关类别下拉列表
  //适应范围:添加/修改新闻，产品，工程案例时，调用这个函数显示相关的下拉类别操作
  function getSelectClass($type=0,$now_id=0){
		if($type){
			$sql="select * from classes where type=$type";
			$db=conndb();
			$query=$db->query($sql);
			$result=$query->fetchall();
			$str="";
			if($result){
				$str.="<select name='class_id'>";
				foreach ($result as $row){
					$id=$row["id"];
					$classname=$row["class_name"];
					if($now_id==$id){
						$str.="<option value='$id' selected>".$classname."</option>";
					}else{
						$str.="<option value='$id'>".$classname."</option>";
					}
				}
				$str.="</select>";
			}
		}
		return $str;

	}
//打印函数
function dump($str,$dump = false,$echo = true,$char = 'UTF-8')
		{
			@ob_start();
			@header("Content-Type:text/html;charset=\"$char\"");
			echo '<pre><div style="text-align:left;">';
			if($dump)var_dump($str);else print_r($str);
			echo '</div></pre>';
			$out =  ob_get_contents();
			ob_end_clean();
			if($echo)
			{
				echo $out;
			}
			else
			{
				return $out;
			}
			return NULL;
		}
		function conndb()
		{
		$dsn ="mysql:host=localhost;dbname=gaogeqiang";
 	//构造数据源 name:数据库的名称
 		$db = new PDO($dsn,'root','root');
 	//初始化——连接到数据库 的PDO对象
 		$db->exec("SET names 'utf8'");//数据库输出编码 避免出现乱码
 		return $db;

		}

 ?>
