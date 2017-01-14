<?php
	include_once "../ajax01/sqp.php";
	$cb=$_GET["cb"];
	$wd=$_GET["wd"];
//	=>$cb="success"
	$users='{"msg":"没有这个人"}';
	$query="select * from user where name like '%$wd%'";
	$result=mysql_query($query);
	
	if(mysql_num_rows($result)>0){
		while ($row=mysql_fetch_assoc($result)) {
			$arr[]=$row["name"];
		}
		$users=json_encode($arr);
	}
//	$json=json_encode($_GET);
//	$json1='{"msg":"我就跟你说"}';
	echo $cb."(".$users.")";
?>