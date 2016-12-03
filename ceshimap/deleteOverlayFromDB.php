<?php 
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');

$pathId = trim($_POST["pathId"]);

if($pathId&&(int)$pathId){
	$pathId = (int)$pathId;
	$result=$db->query("DELETE FROM {$AJ_PRE}ceshimap_overlay WHERE id = $pathId"); 
	if(!$result)
		echo "0";
	else
		echo "1";
	}

 ?>