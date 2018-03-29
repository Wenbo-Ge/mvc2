<?php

$a = $_POST['a']; //抓前端的a
$b =$_POST['b'];	//抓前端的b
$c = $_GET['c']; //抓前端的c

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=UTF-8');

echo json_encode(array(
	'a'=>$a,
	'b'=>$b,
	'c'=>$c
));


?>