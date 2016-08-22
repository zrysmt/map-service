<?php
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');

//出租类型设置情况查表
$A = array();
$result = $db->query("SELECT * FROM {$AJ_PRE}rent_setting");
while($r = $db->fetch_array($result)) {
    $A[] = $r;
}
include template('add', 'ceshimap');
// var_dump($A);
?>

