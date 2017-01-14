<?php

	include_once "../sqp.php";
//	var_dump($_POST);
	if(!empty($_GET)){
		if(!empty($_GET["username"])){
			$name=$_GET["username"];
		}else{
			echo "用户名不能为空";
		}
		if(!empty($_GET["password"])){
			$pass=$_GET["password"];
		}else{
			echo "密码不能为空";
		}
		if(!empty($_GET["username"])&&!empty($_GET["password"])){
			$query="select name from user where name='$name'";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$querys="insert into user(name,password) values ('$name','$pass')";
				$results=mysql_query($querys);
//				echo "sdhio";
				if(mysql_affected_rows()){
					echo "注册成功";
//					header("location:login.php");
				}
			}else{
				echo "用户名已被使用";
			}
		}

	}
?>