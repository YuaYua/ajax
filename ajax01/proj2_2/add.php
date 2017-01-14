<?php
include_once "../sqp.php";

$content=$_GET["content"];
$time=time();//获取插入的时间戳
$query="insert into message (mesCon,mesTime) values('$content','$time')";
$result=mysql_query($query);
if(mysql_affected_rows()==1){
	$id=mysql_insert_id();//获取插入语句的主键
	$query="select * from message where mesId=$id";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row=mysql_fetch_assoc($result);
//		$arr[]=$row;
		$query="select count(*) from message where deleted=0";
		$result=mysql_query($query);
		$count=mysql_fetch_row($result);
		$pages=ceil($count[0]/$pagesize);
		$row["page"]=$pages;
//		$arr["pages"]=$pages;
		$json=json_encode($row);
		echo $json;
	}
}
?>