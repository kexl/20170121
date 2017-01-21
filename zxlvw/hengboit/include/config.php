<?php
header("Content-type:text/html;charset=utf-8");
define("INC",dirname(__FILE__));
define("FUNCSYS",INC."/func_sys/");
define("FUNUSER",INC."/func_user/");
if(file_exists("../../install")&& !file_exists("../../install/lock.txt")){
	  echo "<script language='javascript'>";
	  echo "location='/install/index.php';";
	  echo "</script>";
}
if(file_exists("install")&& !file_exists("install/lock.txt")){
	  echo "<script language='javascript'>";
	  echo "location='/install/index.php';";
	  echo "</script>";
}
include(INC."/common.php");
 $conn=@mysql_connect($hbhost,$hbuname,$hbupwd)or die("数据库服务器死了");
 $db=mysql_select_db($hbdatabase)or die("数据库不存在");
mysql_query("set names 'utf8'");
$sqlsys="select * from ".$hbpre."system where wid=1";
$querysys=mysql_query($sqlsys);
$rssys=mysql_fetch_array($querysys);
$wseotitle=$rssys['wseotitle'];
$wtitle=$rssys['wtitle'];
$wcompany=$rssys['wcompany'];
$wlogo=$rssys['wlogo'];
$wkwd=$rssys['wkwd'];
$wdescript=$rssys['wdescript'];
$wswitch=$rssys['wswitch'];
$wcopyright=$rssys['wcopyright'];
$wkfclose=$rssys['wkfclose'];
$wurl=$rssys['wurl'];
$wauth=$rssys['wauth'];
$webself=$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$wlogin="http://".$webself;
$dp=opendir(FUNCSYS);
while($flist=readdir($dp)){ 
if(!is_dir($flist)&&$flist!="_notes"){
	include(FUNCSYS.$flist);
	}
}
closedir($dp);
$udp=opendir(FUNUSER);
while($ulist=readdir($udp)){ 
	if(!is_dir($ulist)&&$ulist!="_notes"){ 
		include(FUNUSER.$ulist);
	}
}
closedir($udp);
?>