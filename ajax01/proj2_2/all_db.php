<?php
//查询数据库所有数据输出到列表中
include_once "../sqp.php";
$pagesize=5;
$page=$_GET["page"];

$query="select count(*) from message where deleted=0";
$result=mysql_query($query);
if(mysql_num_rows($result)==1){
	$row=mysql_fetch_row($result);
	$size=$row[0];
}
$pages=ceil($size/$pagesize);
$arr["page"]=$pages;

$query="select * from message where deleted=0 order by mesTime desc limit ".$pagesize*$page.",".$pagesize;
$result=mysql_query($query);
if(mysql_num_rows($result)){
	while($row=mysql_fetch_assoc($result)){
		$arr[]=$row;
	}
}
$json=json_encode($arr);
echo $json;

//echo "in";
?>