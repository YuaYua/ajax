<?php
	include_once "../sqp.php";
	//从 form 表单获取用户名和密码
	//如果不是第一次登录，就从 cookie 里获取
	if(isset($_POST["username"])){
		$name = $_POST["username"];
	}else{
		$name=$_COOKIE["username"];
	}
	if(isset($_POST["password"])){
		$pass = $_POST["password"];
	}else{
		$pass=$_COOKIE["password"];
	}
	
	
//	var_dump($_POST);
	//是否是免登陆
//	$unlogin="";
//	if(isset($_POST["unLogin"])){
//		$unlogin = $_POST["unLogin"];
//	}
//	var_dump($_POST);
//打开session
	
	if ($name == "" || $pass == "") {
		echo "用户名和密码都不能为空";
	} else {
		//从数据库查找用户
		$query = "select * from user where name='$name' and password='$pass'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 1) {
			$query = "select userId from user where name='$name' and password='$pass'";
			$result = mysql_query($query);
			$row=mysql_fetch_array($result);
			session_start();
//			echo $unlogin;
			$_SESSION["userId"]=$row[0];
//			$_SESSION["password"]=$pass;
			if(isset($_POST["unLogin"])){//是否选择了免登陆
				echo "cookie";
				setcookie("username", $name, time() + 120);
				setcookie("password",$pass,time()+120);
			}
			header("location:liuyan.html");
		}else if(mysql_num_rows($result) == 0) {
			echo "用户名或密码错误";
		}
	}

//	echo $name;

//	echo "首页";
?>