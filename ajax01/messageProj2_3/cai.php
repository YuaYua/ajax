<?php
include_once "../sqp.php";
//从session 中取出 userId
session_start();
$user=$_SESSION["userId"];
//得到当前留言的mesId
$id=$_GET["mesId"];
//echo $user;
//查找留言管理数据库
//如果存在此用户对这条留言的操作，将 state 改为0
$query="select caiState from cai where mess_id=$id and user_id=$user";
$result=mysql_query($query);
if(mysql_num_rows($result)){
	
	$row=mysql_fetch_row($result);
	if($row[0]==1){
		$arr["errorcode"]=1;
		$query="update cai set caiState=0 where mess_id=$id and user_id=$user and caiState=1";
		mysql_query($query);
	}else{
		$arr["errorcode"]=0;
		$query="update cai set caiState=1 where mess_id=$id and user_id=$user and caiState=0";
		mysql_query($query);
	}
	
	
//	echo "已顶";
}else{
	//如果不存在此用户对这条留言的操作，就把此用户id和留言的 id insert 到cai表，并且将 state 改为1
	$query="insert into cai (mess_id,user_id) values ($id,$user)";
	mysql_query($query);
	$maId=mysql_insert_id();
	$query="update cai set caiState=1 where caiId=$maId";
	mysql_query($query);
	$arr["errorcode"]=0;
//	echo $count;
}
//查找整个cai 对这条评论顶的操作有多少
$query="select count(*) from cai where mess_id=$id and caiState=1";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
$count=$row[0];

$query="update message set mesC=$count where mesId=$id";
mysql_query($query);

$arr[]=$count;
echo json_encode($arr);
?>