<?php
include_once "../sqp.php";
$name=$_POST["username"];
$password=$_POST["password"];

$query="select * from user where name='$name' and password='$password'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1){
	$row=mysql_fetch_assoc($result);
	session_start();
	$_SESSION["userid"]=$row["userId"];
	header("location:liuyan.html");
}else{
	header("location:mesLogin.html");
}
?>