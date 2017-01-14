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
$query="select state from manage where mess_id=$id and user_id=$user";
$result=mysql_query($query);
if(mysql_num_rows($result)){
	
	$row=mysql_fetch_row($result);
	if($row[0]==1){
		$arr["errorcode"]=1;
		$query="update manage set state=0 where mess_id=$id and user_id=$user and state=1";
		mysql_query($query);
	}else{
		$arr["errorcode"]=0;
		$query="update manage set state=1 where mess_id=$id and user_id=$user and state=0";
		mysql_query($query);
	}
//	echo "已顶";
}else{
	//如果不存在此用户对这条留言的操作，就把此用户id和留言的 id insert 到manage表，并且将 state 改为1
	$query="insert into manage (mess_id,user_id,state) values ($id,$user,1)";
	mysql_query($query);
	$arr["errorcode"]=0;
//	echo $count;
}
//查找整个manage 对这条评论顶的操作有多少
$query="select count(*) from manage where mess_id=$id and state=1";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
$count=$row[0];

$query="update message set mesD=$count where mesId=$id";
mysql_query($query);

$arr[]=$count;
echo json_encode($arr);
?>