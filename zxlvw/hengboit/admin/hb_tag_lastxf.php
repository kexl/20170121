<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
header("Content-type: text/html; charset=utf-8");
$sqlstr="TRUNCATE ".$hbpre."tag_main";
mysql_query($sqlstr);
$sqlstr="insert into ".$hbpre."tag_main(cid,tag,tflag,tnum)(select cid,tag,tflag,count(tid) from ".$hbpre."tag group by cid,tag,tflag)";
mysql_query($sqlstr);
 	 echo "<script language=\"javascript\">";
	  echo "document.write('tag标记全部修复完成');";
	 echo "</script>";

?>