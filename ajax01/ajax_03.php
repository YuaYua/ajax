<?php
	include_once "sqp.php";
//	$id=$_GET["id"];
	$query="select * from user";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		while ($row=mysql_fetch_assoc($result)) {
			$arr[]=$row;
		}
		echo json_encode($arr);
	}
?>