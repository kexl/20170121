<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$sqlstr="select * from ".$hbpre."ask_kclass order by kcid desc";
$query=mysql_query($sqlstr);
while($rs=mysql_fetch_array($query)){
	$kcpagename=$rs['kcpagename'];
	if(file_exists("../../ask/".$kcpagename.".php")){
	unlink("../../ask/".$kcpagename.".php");
	}
	if(file_exists("../../ask/".$kcpagename."_j.php")){
	unlink("../../ask/".$kcpagename."_j.php");
	}
	if(file_exists("../../ask/".$kcpagename."_w.php")){
	unlink("../../ask/".$kcpagename."_w.php");
	}
	copy("../ask/ask.php","../../ask/".$kcpagename.".php");
	copy("../ask/ask_j.php","../../ask/".$kcpagename."_j.php");
	copy("../ask/ask_w.php","../../ask/".$kcpagename."_w.php");
	echo "<script language=\"javascript\">";
	echo "document.write('版块:".$rs['kctitle']."--修复完成<br>');";
	echo "</script>";
}

?>