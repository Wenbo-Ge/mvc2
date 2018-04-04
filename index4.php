<?php
require_once('wenboShop-database.php');
//要require vendor文件夹里的autoload
require_once ('./vendor/autoload.php');
// 创建文件加载对象，并且定义了路径 
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

$db=new DBConnection();
$result=$db->getAllItemsReturnObj();


echo $twig->render('index4.html.twig', array('result'=>$result));

?>