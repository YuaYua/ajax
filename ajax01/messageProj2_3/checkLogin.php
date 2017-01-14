<?php
include_once "../sqp.php";
session_start();
if (!empty($_SESSION)) {
	$id = $_SESSION["userId"];
	$query="select name from user where userId=$id";
	$result=mysql_query($query);
	$row=mysql_fetch_assoc($result);
	echo $row["name"];
} else {
	echo "未登录";
}

?>
