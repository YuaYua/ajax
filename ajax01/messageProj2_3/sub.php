<?php
date_default_timezone_set('PRC');
$time=date("Y年m月j日 H:i:s",time());
$arr[]=$_GET["text"];
$arr[]=$time;
$ding=0;
$cai=0;
$arr[]=$ding;
$arr[]=$cai;
echo json_encode($arr);
include_once "../sqp.php";
$query="insert into message(mesCon,mesTime,mesD,mesC) values('$arr[0]','$arr[1]','$arr[2]','$arr[3]')";
//echo $query;
$result=mysql_query($query);

//var_dump($_GET);

?>