<?php
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');

//出租类型设置情况查表
$A = array();
$result = $db->query("SELECT * FROM {$AJ_PRE}rent_setting");
while($r = $db->fetch_array($result)) {
    $A[] = $r;
}
//加载所有的标记点
$markers = array();
$allMarkers = $db->query("SELECT * FROM {$AJ_PRE}ceshimap");
while($marker = $db->fetch_array($allMarkers)){
	$markers[] = $marker;
}

//绘制的ovrlay
$overlays = array();
$allOverlay = $db->query("SELECT * FROM {$AJ_PRE}ceshimap_overlay");
while($overlay = $db->fetch_array($allOverlay)){
	$overlays[] = $overlay;
}

include template('add', 'ceshimap');
// var_dump($A);
?>

