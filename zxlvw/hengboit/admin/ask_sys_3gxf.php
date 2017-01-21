<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$sqlstr="select * from ".$hbpre."ask_kclass order by kcid desc";
$query=mysql_query($sqlstr);
while($rs=mysql_fetch_array($query)){
	$kcpagename=$rs['kcpagename'];
	if(file_exists("../../wap/ask/".$kcpagename.".php")){
	unlink("../../wap/ask/".$kcpagename.".php");
	}
	copy("../ask/ask3g.php","../../wap/ask/".$kcpagename.".php");
	echo "<script language=\"javascript\">";
	echo "document.write('版块:".$rs['kctitle']."--修复完成<br>');";
	echo "</script>";
}

?>