<?php 
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');
header("Content-Type: text/html; charset=UTF-8");

$value = trim($_POST["value"]);
$byField = trim($_POST["byField"]);
var_dump($value);
var_dump($byField);


var_dump("$byField");
$lugLat = explode(",",$byField);
var_dump("$lugLat");
// $byField = json_decode('"'.$byField.'"',true);
$byFieldX = '"'.$lugLat[0].'%"';
$byFieldY = '"'.$lugLat[1].'%"';
echo "$byFieldX";
echo "$byFieldY";
$result=$db->query("UPDATE {$AJ_PRE}ceshimap_overlay SET remark ='$value' WHERE geoJson like $byFieldX or geoJson like $byFieldY limit 1"); 

if(!$result)
	echo "0";
else
	echo "1";
?>