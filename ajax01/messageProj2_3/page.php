<?php
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
echo json_encode($arr);
?>