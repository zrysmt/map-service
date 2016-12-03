<?php
define('AJ_REWRITE', true);
require '../common.inc.php';
defined('IN_AIJIACMS') or exit('Access Denied');
/*$username=get_cookie('username');
if(empty($username)){
  echo "您还没有登录3s后跳转登录页面!";
  header("refresh:3;url=http://sh.21changfang.com/member/login.php");
}
else{
   if($username!='admin'){
      echo "您没有访问权限！";
   }
   else{*/

$A = array();
// $result = $db->query("SELECT * FROM {$AJ_PRE}ceshimap");
$result = $db->query("SELECT * FROM {$AJ_PRE}ceshimap AS cm LEFT JOIN {$AJ_PRE}rent_setting AS rs ON cm.rent = rs.rent");
while($r = $db->fetch_array($result)) {
    $A[] = $r;
}

$distNumsArray = array();
// $result2 = $db->query('SELECT *,COUNT(*) nums FROM (select `cm`.`id` AS `id`,`cm`.`province` AS `province`,`cm`.`city` AS `city`,`cm`.`district` AS `district`,`cm`.`town` AS `town`,`cm`.`address` AS `address`,`cm`.`rent` AS `rent`,`cm`.`location` AS `location`,`cm`.`area` AS `area`,`cm`.`sellingPrice` AS `sellingPrice`,`rs`.`color` AS `color` from (`aijiacms_ceshimap` `cm` left join `aijiacms_rent_setting` `rs` on((`cm`.`rent` = `rs`.`rent`)))) as t_ceshimap_all GROUP BY district,rent');
$result2 = $db->query('SELECT *,COUNT(*) nums FROM 
(select `cm`.`id` AS `id`,`cm`.`province` AS `province`,`cm`.`city` AS `city`,`cm`.`district` AS `district`,`cm`.`town` AS `town`,`cm`.`address` AS `address`,`cm`.`rent` AS `rent`,`cm`.`location` AS `location`,`cm`.`area` AS `area`,`cm`.`sellingPrice` AS `sellingPrice`,`rs`.`color` AS `color` from (`aijiacms_ceshimap` `cm` left join `aijiacms_rent_setting` `rs` on((`cm`.`rent` = `rs`.`rent`)))) as t_ceshimap_all
LEFT JOIN aijiacms_district_loc as dl on dl.disProvince = t_ceshimap_all.province and dl.disName = t_ceshimap_all.district
GROUP BY district,rent 
ORDER BY district');
while($r2 = $db->fetch_array($result2)) {
    $distNumsArray[] = $r2;
}

$townNumsArray = array();
$result = $db->query('SELECT *,COUNT(*) nums FROM (select `cm`.`id` AS `id`,`cm`.`province` AS `province`,`cm`.`city` AS `city`,`cm`.`district` AS `district`,`cm`.`town` AS `town`,`cm`.`address` AS `address`,`cm`.`rent` AS `rent`,`cm`.`location` AS `location`,`cm`.`area` AS `area`,`cm`.`sellingPrice` AS `sellingPrice`,`rs`.`color` AS `color` from (`aijiacms_ceshimap` `cm` left join `aijiacms_rent_setting` `rs` on((`cm`.`rent` = `rs`.`rent`)))) as t_ceshimap_all
GROUP BY district,town,rent');
while($r3 = $db->fetch_array($result3)) {
    $townNumsArray[] = $r3;
}

include template('index', 'ceshimap');
/*}

}*/

 ?> 
