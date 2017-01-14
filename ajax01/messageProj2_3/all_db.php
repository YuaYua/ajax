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
//$query="select * from message where deleted=0 order by mesTime desc limit 0,5";

$query="select * from message where deleted=0 order by mesTime desc limit ".$pagesize*$page.",".$pagesize;
$result=mysql_query($query);
if(mysql_num_rows($result)){
	while($row=mysql_fetch_assoc($result)){
//		$num = $row["mesId"];
//		//查找整个manage 对这条评论顶的操作有多少
//		$query1="select count(*) from manage where mess_id=$num and state=1";
//		$result1=mysql_query($query1);
//		if(mysql_num_rows($result1)){
//			$row1=mysql_fetch_row($result1);
//			$count1=$row1[0];
//		}else{
//			$count1=0;
//		}
//		
//		//查找整个cai 对这条评论顶的操作有多少
//		$query2="select count(*) from cai where mess_id=$num and caiState=1";
//		$result2=mysql_query($query2);
//		if(mysql_num_rows($result2)){
//			$row2=mysql_fetch_row($result2);
//			$count2=$row2[0];
//		}else{
//			$count2=0;
//		}
//		$row["Dcount"]=$count1;
//		$row["Ccount"]=$count2;
		
		$arr[]=$row;
	}
	$json=json_encode($arr);
	echo $json;
}

//echo "in";
?>