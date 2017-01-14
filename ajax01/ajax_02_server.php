<?php

//var_dump($_GET);
$name=$_GET["name"];

//echo "haha";
$arr["name"]=$name;
$arr["password"]="123";
$json=json_encode($arr);
echo $json;
?>