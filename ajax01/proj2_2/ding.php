<?php
include_once "../sqp.php";
session_start();
$userid=$_SESSION["userid"];
$liuyanId=$_GET["id"];

$query="select * from manage where user_id=$userid and mess_id=$liuyanId";
$result=mysql_query($query);
if(mysql_num_rows($result)==1){
	$row=mysql_fetch_assoc($result);
	$state=0;
	if($row["state"]==2){
		//$row["state"]==2代表踩
		
		$str='{"msg":"请取消踩之后再来顶"}';
		echo $str;
		//exit:退出，结束整个文件
		exit();
	}else if($row["state"]==0){
		//没操作
		$state=1;
	}
	$maId=$row["manageId"];
	$query="update manage set state=$state where manageId=$maId";
	mysql_query($query);
	if(mysql_affected_rows()==1){
		$query="select count(*) from manage where mess_id=$liuyanId and state=1";
		$result=mysql_query($query);
		if(mysql_num_rows($result)==1){
			$row=mysql_fetch_row($result);
			$count=$row[0];
			$query="update message set mesD=$count where mesId =$liuyanId";
			mysql_query($query);
			if(mysql_affected_rows()==1){
				echo '{"errorcode":0,"count":"'.$count.'"}';
			}
		}
	}
}else{
	$query="insert into manage (user_id,mess_id,state) values($userid,$liuyanId,1)";
	mysql_query($query);
	if(mysql_affected_rows()==1){ 
		$query="select count(*) from manage where mess_id=$liuyanId and state=1";
		$result=mysql_query($query);
		if(mysql_num_rows($result)==1){
			$row=mysql_fetch_row($result);
			$count=$row[0];
			$query="update message set mesD=$count where mesId =$liuyanId";
			mysql_query($query);
			if(mysql_affected_rows()==1){
				echo '{"errorcode":0,"count":"'.$count.'"}';
			}
		}
	}
}
?>