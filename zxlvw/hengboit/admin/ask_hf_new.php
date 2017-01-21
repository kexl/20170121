<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); 
if(isset($_GET['del'])){
	$del=$_GET['del'];
	$sqlstr="delete from  ".$hbpre."ask_hf  where hid=".$del;
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?';";
	echo "</script>";
}
if(isset($_GET['hflag'])){
  $hflag=$_GET['hflag'];
  $hid=$_GET['hid'];
  $sqlstr="update ".$hbpre."ask_hf set hflag=$hflag where hid=$hid ";
  mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?';";
	echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
<style type="text/css">
body *{ font-size:12px; line-height:25px; padding:0px; margin:0px;}
.tt{ background:#F2FBF9}
.tt *,.hf *{ padding:0px; margin:0px;}
.hf dd{ border-top:dashed 1px #CCCCCC; padding:10px;}

</style>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.configa.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="../../js/jquery-1.4.4.min.js"></script>
</head>
<body>
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>当前位置：最新回复</td>
  </tr>
</table>
<?php
if(isset($_GET['askid'])){
	$askid=$_GET['askid'];
	$sqlstr="select ".$hbpre."ask_hf.*,kcid,asktitle,asktime from ".$hbpre."ask_hf left join ".$hbpre."ask on ".$hbpre."ask_hf.askid=".$hbpre."ask.askid where ".$hbpre."ask_hf.askid=".$askid." order by htime desc";
}else{
	$sqlstr="select ".$hbpre."ask_hf.*,kcid,asktitle,asktime from ".$hbpre."ask_hf left join ".$hbpre."ask on ".$hbpre."ask_hf.askid=".$hbpre."ask.askid order by htime desc";
}
$query=mysql_query($sqlstr);
while($rs=mysql_fetch_array($query)){
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td colspan="5" bgcolor="#F3F3F3" style="padding-left:20px;">贴子主题：<a href="?askid=<?php echo $rs['askid'];?>" target="_blank"><?php echo $rs['asktitle'];?></a></td>
    </tr>
  <tr>
    <td width="13%" height="74" align="center" valign="middle">回复人：<?php echo $rs['hname'];?></td>
    <td width="55%" style="padding:10px;"><?php echo $rs['hcontent'];?></td>
    <td width="13%" align="center">回复时间<br />
<?php echo $rs['htime'];?></td>
    <td width="10%" align="center"><?php 
	if($rs['hflag']==0){
		echo "目前未通过审核<br>";
	?>
		<input type="button" style="width:80px" value="通过审核" onclick="location='?hid=<?php echo $rs['hid']; ?>&hflag=1'">	
    <?php
	}else{
		echo "目前通过审核<br>";
	?>
		<input type="button" style="width:80px" value="取消审核" onclick="location='?hid=<?php echo $rs['hid']; ?>&hflag=0'">	
    <?php
	}
	?></td>
    <td width="9%" align="center">
    <div><a href="?del=<?php echo $rs['hid'] ?>">删除该回复</a></div>
    <div><a href="ask_hf.php?kcid=<?php echo $rs['kcid']; ?>&askid=<?php echo $rs['askid'] ?>" target="new">修改</a></div>
    </td>
  </tr>
</table>
<div style="height:5px;"></div>
<?php } ?>
</div>
</body>
</html>
