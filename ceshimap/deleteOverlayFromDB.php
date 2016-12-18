<?php 
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');
header("Content-Type: text/html; charset=UTF-8");

$type = trim($_POST["type"]);
$byField = trim($_POST["byField"]);

if($type=="path"){//多边形
	if($pathId&&(int)$pathId){
		$pathId = (int)$pathId;
		$result=$db->query("DELETE FROM {$AJ_PRE}ceshimap_overlay WHERE id = $pathId"); 
	}
}elseif($type=="marker"){//点
	global $byField;
	var_dump("$byField");
	$lugLat = explode(",",$byField);
	var_dump("$lugLat");
	// $byField = json_decode('"'.$byField.'"',true);
	$byFieldX = '"'.$lugLat[0].'%"';
	$byFieldY = '"'.$lugLat[1].'%"';
	echo "$byFieldX";
	echo "$byFieldY";
	$result=$db->query("DELETE FROM {$AJ_PRE}ceshimap_overlay WHERE geoJson like $byFieldX or geoJson like $byFieldY limit 1"); 
}

	if(!$result)
		echo "0";
	else
		echo "1";
?>