<?php

//MySQLにログインするための情報を入力
$dbc=mysql_connect("localhost","user","password") or die("MySQL接続失敗: ".mysql_error());

$db_selected=mysql_select_db("yc2013",$dbc);
if(!$db_selected){
	die('データベース選択失敗: '.mysql_error());
}
mysql_query("set names utf8");


if($_POST['side'] == 'left'){
	$sql="INSERT INTO l_locate (latitude,longtitude) VALUES (".$_POST['latitude'].",".$_POST['longtitude'].");";
}else{
	$sql="INSERT INTO r_locate (latitude,longtitude) VALUES (".$_POST['latitude'].",".$_POST['longtitude'].");";
}

$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());

require_once 'update_master.php';
?>