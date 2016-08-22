<?php
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');
$address=trim($_POST["address"]);
$rent=trim($_POST["rent"]);
$location=trim($_POST["location"]);
$province=trim($_POST["province"]);
$city=trim($_POST["city"]);
$district=trim($_POST["district"]);
$town=trim($_POST["town"]);
$area=trim($_POST["area"]);
$sellingPrice=trim($_POST["sellingPrice"]);
$result=$db->query("INSERT INTO {$AJ_PRE}ceshimap (address,rent,location,province,city,district,town,area,sellingPrice) VALUES ('$address','$rent','$location','$province','$city','$district','$town','$area','$sellingPrice')"); 
if(!$result)
echo "添加失败！";
else
echo "添加成功！";
?>