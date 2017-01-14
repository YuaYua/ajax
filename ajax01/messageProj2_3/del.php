<?php
//var_dump($_GET);
include_once "../sqp.php";
$id=$_GET["id"];
$lastid=$_GET["lastid"];
$query="update message set deleted=1 where mesId=$id";
$result=mysql_query($query);
if(mysql_affected_rows()){
	//页数
	$pagesize=5;
	$query="select count(*) from message where deleted=0";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row=mysql_fetch_row($result);
		$size=$row[0];
	}
	$pages=ceil($size/$pagesize);
	$arr["page"]=$pages;
//	echo "删除成功";
	//添加后面一条数据
	$query="select * from message where mesId<$lastid and deleted=0 order by mesId DESC limit 0,1";
	$result=mysql_query($query);
	$arr["li"]="";
	if(mysql_num_rows($result)){
		$row=mysql_fetch_assoc($result);
		$row["count"]=0;
		$arr["li"]=$row;
	}else{
		//当 UI 为空时，添加 lastid前五条数据
		$query="select * from message where mesId>$lastid and deleted=0 limit 0,5";
		$result=mysql_query($query);
		if(mysql_num_rows($result)){
			while($row=mysql_fetch_assoc($result)){
				$row["count"]=0;
				$arr[]=$row;
			}
		}
	}
	$json=json_encode($arr);
	echo $json;
}
//echo $query;
?>