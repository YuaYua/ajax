<?php
include_once "sqp.php";
define('PAGESIZE', 6);
//页面初始化第0页
$page=0;
//根据传送过来的值改变page
if(isset($_POST["page"])){
	$page=$_POST["page"];
}
$query="select count(bookId) from book";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
//书本数
$count=$row[0];//32
//分页数
$pages=ceil($count/PAGESIZE);
$arr=[];
$query="select * from book limit ".$page*PAGESIZE.",".PAGESIZE;
$result=mysql_query($query);
if(mysql_num_rows($result)){
	while ($row=mysql_fetch_assoc($result)) {
		$arr[]=$row;
	}
}
echo json_encode($arr);
//echo $page;

?>