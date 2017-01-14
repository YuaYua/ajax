<?php
	$cb=$_GET["callback"];
	$json=json_encode($_GET);
	$json1='{"msg":"我就跟你说"}';
	echo $cb."(".$json1.")";
?>