<?php
	session_start();
	session_destroy();
	setcookie("username");
	setcookie("password");
	//销毁后调到 login判断是否销毁
	header("Location:liuyan.html");
	

?>