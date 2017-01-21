<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
if(isset($_POST['wid'])){
  foreach($_POST as $k=>$v){
	$$k=$v;  
  }	
$str="wseotitle='$wseotitle',wtitle='$wtitle',wcompany='$wcompany',wlogo='$wlogo',wkwd='$wkwd',wdescript='$wdescript'";
if(isset($_POST['wswitch'])){$str.=",wswitch='$wswitch'";}
if(isset($_POST['wkfclose'])){$str.=",wkfclose='$wkfclose'";}
if(isset($_POST['wauth'])){$str.=",wauth='$wauth'";}
$str.=",wcopyright='$wcopyright',wurl='$wurl'";
 $sqlstr="update ".$hbpre."system set ".$str." where wid=$wid";
 mysql_query($sqlstr);
   echo "<script language='javascript'>";
   echo "location='hb_system.php';";
   echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<style type="text/css">
  #systt input,#systt textarea{ color:#666;}
</style>
</head>

<body>
<div id="man_zone">
<?php
if(!isset($_GET['edit'])){
?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <th bgcolor="#F2F2F2">网站名称</th>
    <th bgcolor="#F2F2F2">网站网址</th>
    <?php 
	if(md5($_SESSION['uname'])=="0c95315889c8c6a6acd4c7cfb723e2f1"&&$_SESSION['uflag']==9){
	  	echo "<th bgcolor=#F2F2F2>当前状态</th>";
     }
	if($_SESSION['uflag']==9){
		 echo "<th bgcolor=#F2F2F2>客服开关</th>";
		 }
	 ?>
    <th bgcolor="#F2F2F2">操作</th>
  </tr>
  <?php	

  $sqlstr="select * from ".$hbpre."system order by wid asc";
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){  
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['wtitle'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['wurl'];?></td>
    <?php 
	if(md5($_SESSION['uname'])=="0c95315889c8c6a6acd4c7cfb723e2f1"&&$_SESSION['uflag']==9){
	   echo "<td align=\"center\" bgcolor=\"#FFFFFF\">"	;
	   if($rs['wswitch']==0){ echo "关闭中";}else{ echo "正常运行中"; }
	   echo "</td>";}
	  if($_SESSION['uflag']==9){
     echo "<td align=center bgcolor=#FFFFFF>";
	  if($rs['wkfclose']==0){
		echo "关";  
	  }else{
		echo "开";  
	  }
	  echo "</td>";
	  }
	 ?>
    
    <td align="center" bgcolor="#FFFFFF"><a href="hb_system.php?edit=<?php echo $rs['wid'];?>">修改</a></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
}
if(isset($_GET['edit'])){
	$edit=$_GET['edit'];
	$sqlstr="select * from ".$hbpre."system where wid=$edit";
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	
?>
<form id="form1" name="form1" method="post" action="">
  <div id="systt">
    <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td align="left" bgcolor="#F2F2F2">公司名称：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="wcompany" type="text" id="wcompany" value="<?php echo $rs['wcompany'];?>" size="50" />
        <input name="wid" type="hidden" id="wid" value="<?php echo $rs['wid'];?>" />
      </label></td>
      <td bgcolor="#FFFFFF">$wcompany</td>
    </tr>
    <tr>
      <td width="22%" align="left" bgcolor="#F2F2F2">网站名称：</td>
      <td width="51%" bgcolor="#FFFFFF"><label>
        <input name="wtitle" type="text" id="wtitle" value="<?php echo $rs['wtitle'];?>" size="50" />
      </label></td>
      <td width="27%" bgcolor="#FFFFFF">$wtitle</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#F2F2F2">本站网址：</td>
      <td bgcolor="#FFFFFF"><input name="wurl" type="text" id="wurl" value="<?php echo $rs['wurl'];?>" size="50" /></td>
      <td bgcolor="#FFFFFF">$wurl</td>
    </tr>
    <?php
    if($_SESSION['uflag']==9){
		echo "<tr><td align=\"left\"  bgcolor=\"#F2F2F2\">认证码开关：</td>";
		echo  "<td bgcolor=\"#FFFFFF\"><p>";
		echo "<input name=\"wauth\" type=\"radio\" id=\"wauth_0\" value=\"1\"";
		if($rs['wauth']==1){
			echo "checked=\"checked\"";
		}
		echo ">开启";
			echo "<input name=\"wauth\" type=\"radio\" id=\"wauth_1\" value=\"0\"";
		if($rs['wauth']==0){
			echo "checked=\"checked\"";
		}
		echo ">关闭";
		echo "</td><td bgcolor=\"#FFFFFF\"><font color=\"#666666\">开启认证码更安全</font></td></tr>";
	}
	if($_SESSION['uflag']==9){
    echo "<tr><td align=left bgcolor=#F2F2F2>在线客服开关：</td><td bgcolor=#FFFFFF><input type=radio name=wkfclose value=1 id=wkfclose_0";
	  if($rs['wkfclose']==1) echo " checked=checked";
	echo "/>启用在线客服<input name=wkfclose type=radio id=wkfclose_1 value=0";
	  if($rs['wkfclose']==0) echo " checked=checked";
	echo "/>禁用在线客服</td><td bgcolor=#FFFFFF>\$wkfclose</td></tr>";
	}
    ?>
    <tr>
      <td align="left" bgcolor="#F2F2F2">网站logo: </td>
      <td bgcolor="#FFFFFF"><label>
        <input name="wlogo" type="text" id="wlogo" value="<?php echo $rs['wlogo'];?>" size="50" />
        <a href="#">
        <input type="button" style="background:#CCC; border: solid 1px #999; " name="button3" id="button3" value=" 上 传 " onclick=window.open('hb_system_uppic.php','new','width=500,scrollbars=yes') />
        </a></label></td>
      <td bgcolor="#FFFFFF">$wlogo</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#F2F2F2">首页SEO标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="wseotitle" type="text" id="wseotitle" value="<?php echo $rs['wseotitle'];?>" size="70" />
      </label></td>
      <td bgcolor="#FFFFFF">$wseotitle</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#F2F2F2">网站关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="wkwd" type="text" id="wkwd" value="<?php echo $rs['wkwd'];?>" size="70" />
      </label></td>
      <td bgcolor="#FFFFFF">$wkwd</td>
    </tr>
    <tr>
      <td align="left" bgcolor="#F2F2F2">网站描述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="wdescript" id="wdescript" cols="68" rows="3"><?php echo $rs['wdescript'];?></textarea>
      </label></td>
      <td bgcolor="#FFFFFF">$wdescript</td>
    </tr>
    <?php
	if(md5($_SESSION['uname'])=="0c95315889c8c6a6acd4c7cfb723e2f1"&&$_SESSION['uflag']==9){
      echo "<tr><td align=\"right\" bgcolor=\"#F2F2F2\">网站开关：</td><td bgcolor=\"#FFFFFF\"><input name=\"wswitch\" type=\"radio\" id=\"wswitch_0\" value=\"1\"";
	  if($rs['wswitch']==1){ echo " checked=checked";}
	echo "/>运行网站<input type=radio name=wswitch value=\"0\" id=wswitch_1";
	  if($rs['wswitch']==0){ echo " checked=checked";}
	echo "/>关闭网站</td> <td bgcolor=#FFFFFF>\$wswitch</td></tr>";
	}
	?>
    <tr>
      <td align="left" bgcolor="#F2F2F2">版权信息：</td>
      <td bgcolor="#FFFFFF"><textarea name="wcopyright" id="wcopyright" cols="68" rows="5"><?php echo $rs['wcopyright'];?></textarea></td>
      <td bgcolor="#FFFFFF">$wcopyright</td>
    </tr>
    <tr>
      <td colspan="3" align="center" bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value=" 提 交 " />
        &nbsp;&nbsp;
        <input type="reset" name="button2" id="button2" value=" 重 置 " />
      </label></td>
      </tr>
  </table>
  </div>
</form>
<?php
}
?>
</div>
</body>
</html>