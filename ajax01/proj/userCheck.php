<?php
//	var_dump($_GET);
	include_once "../sqp.php";
	if(!empty($_GET)){
		if(!empty($_GET["username"])){
			$name=$_GET["username"];
			$query="select name from user where name='$name'";
			$result=mysql_query($query);
			if(mysql_affected_rows()==0){
				echo "用户名可以使用";
			}else{
				echo "用户名已被使用";
			}
		}else{
			echo "用户名不能为空";
		}
	}
?>