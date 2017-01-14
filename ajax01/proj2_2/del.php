<?php
include_once "../sqp.php";
$page=$_GET["page"];
$liuyanId=$_GET["id"];

$row="";
$query="select * from message where deleted=0 order by mesTime desc limit ".($page+1)*$pagesize.",1";
$result=mysql_query($query);
if(mysql_num_rows($result)==1){
	$row=mysql_fetch_assoc($result);
}

$query="update message set deleted=1 where mesId=$liuyanId";
mysql_query($query);
if(mysql_affected_rows()==1){
	$query="select count(*) from message where deleted=0";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row1=mysql_fetch_row($result);
		$size=$row1[0];
		$pages=ceil($size/$pagesize);
		$arr["page"]=$pages;
	}
	if($row){
		$arr[]=$row;
		$arr["errorcode"]=0;
		
		
	}else{
		$arr["errorcode"]=1;
//		$arr["page"]=1;
	}
	echo json_encode($arr);
}

?>