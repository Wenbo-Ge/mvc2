<?php


$v1 = "hello";
$v2 = "world";


echo "nihao $v2";

//双引号能使用变量，
//单引号不能使用里面的变量

$jacob = '{"name":"jacob","hobby":["first","second"]}';
$jacob_array = json_encode($jacob, true);
echo $jacob_array['name'];
);





