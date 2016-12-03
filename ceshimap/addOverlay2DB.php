<?php 
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');

$drawingType = trim($_POST['drawingType']);
$geoJson = trim($_POST['geoJson']);

$result=$db->query("INSERT INTO {$AJ_PRE}ceshimap_overlay (drawingType,geoJson) VALUES ('$drawingType','$geoJson')"); 
if(!$result)
echo "0";
else
echo "1";

 ?>