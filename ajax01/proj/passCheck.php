<?php
//var_dump($_GET);
include_once "../sqp.php";
if(!empty($_GET)){
	if(empty($_GET["password"])){
		echo "密码不能为空";
	}
}
?>