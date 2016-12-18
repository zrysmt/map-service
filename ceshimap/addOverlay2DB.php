<?php 
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');

$drawingType = trim($_POST['drawingType']);
$geoJson = trim($_POST['geoJson']);
$styleOptions = trim($_POST['styleOptions']);
$date = date('y-m-d h:i:s',time());

echo $_POST['styleOptions'];
echo "<br>";

$result=$db->query("INSERT INTO {$AJ_PRE}ceshimap_overlay (drawingType,geoJson,styleOptions,date) VALUES ('$drawingType','$geoJson','$styleOptions','$date')"); 
if(!$result)
	echo "0";
else
	echo "1";

 ?>