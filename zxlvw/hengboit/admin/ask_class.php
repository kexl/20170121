<?php require_once('../include/config.php'); ?>
<?php require_once('adminqx.php'); ?>
<?php
if(isset($_GET['kbid'])){
	$kbid=$_GET['kbid'];	
}else{
	$kbid=0;	
}
if($kbid==0){
$bkcpagename="";	
$bkctitle="顶级版块管理";
}else{
$sqlstr="select * from ".$hbpre."ask_kclass where kcid=$kbid";
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
$bkcpagename=$rs['kcpagename'];
$bkctitle=$rs['kctitle'];
}
if(isset($_POST['tpp'])){
	$kctitle=$_POST['kctitle'];
	$kbid=$_POST['kbid'];
	$kcseotitle=$_POST['kcseotitle'];
	$kcflag=$_POST['kcflag'];
	$kckwd=$_POST['kckwd'];
	$kcdescript=$_POST['kcdescript'];
	$kcsortnum=$_POST['kcsortnum'];
	$kcpagename=$_POST['kcpagename'];
	if(isset($_POST['kcmx1'])){
		$kcmx1=1;	
	}else{
		$kcmx1=0;	
	}
	$kcmx=$kcmx1."00000000";
	$sqlstr="insert into ".$hbpre."ask_kclass(kcsortnum,kctitle,kcseotitle,kckwd,kcdescript,kbid,kcflag,kcmx,kcpagename)values($kcsortnum,'$kctitle','$kcseotitle','$kckwd','$kcdescript',$kbid,$kcflag,'$kcmx','$kcpagename')";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);

	echo "<script language=\"javascript\">";
	echo "parent.leftFrame.location.reload();";
	echo "location='?kbid=".$kbid."';";
	echo "</script>";
}
if(isset($_POST['kcid'])){
	$kcid=$_POST['kcid'];
	$kcpagename=$_POST['kcpagename'];
	$kctitle=$_POST['kctitle'];
	$kbid=$_POST['kbid'];
	$kcseotitle=$_POST['kcseotitle'];
	$kcflag=$_POST['kcflag'];
	$kckwd=$_POST['kckwd'];
	$kcdescript=$_POST['kcdescript'];
	$kcsortnum=$_POST['kcsortnum'];
	if(isset($_POST['kcmx1'])){
		$kcmx1=1;	
	}else{
		$kcmx1=0;	
	}
	$kcmx=$kcmx1."00000000";
	$sqlstr="update ".$hbpre."ask_kclass set kctitle='$kctitle',kcseotitle='$kcseotitle',kcpagename='$kcpagename',kckwd='$kckwd',kcdescript='$kcdescript',kcflag=$kcflag,kcsortnum=$kcsortnum,kcmx='$kcmx' where kcid=$kcid ";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "parent.leftFrame.location.reload();";
	echo "location='?kbid=".$kbid."';";
	echo "</script>";
}
if(isset($_GET['del'])){
	$del=$_GET['del'];
	$sqlstr="delete from ".$hbpre."ask_kclass where kcid=$del";
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "parent.leftFrame.location.reload();";
	echo "location='?kbid=".$kbid."';";
	echo "</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
</head>
<body>
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>当前位置：在线交流 >> 版块管理 &gt;&gt;<?php echo $bkctitle;?> <a href="?kbid=<?php echo $kbid;?>&amp;add=1">[增加新版块]</a></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <th width="10%" bgcolor="#EEEEEE">类别编号</th>
    <th width="47%" bgcolor="#EEEEEE">版块名称</th>
    <th width="13%" bgcolor="#EEEEEE">页面</th>
    <th width="23%" bgcolor="#EEEEEE">下级管理</th>
    <th width="7%" bgcolor="#EEEEEE">操作</th>
  </tr>
  <?php
  $sqlstr="select * from ".$hbpre."ask_kclass where kbid=$kbid order by kcsortnum asc,kcid asc";
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center"><?php echo $rs['kcid'];?></td>
    <td align="center"><?php echo $rs['kctitle'];?></td>
    <td align="center"><?php echo $rs['kcpagename'];?></td>
    <td align="center"> <?php
	if($rs['kcflag']==0 || $rs['kcflag']==2){
	?>
    <a href="ask_article.php?kcid=<?php echo $rs['kcid'];?>">贴子管理 </a>
    <?php
	}
	?>
     &nbsp;
    <?php
	if($rs['kcflag']==1 || $rs['kcflag']==2){
	?>
     <a href="?kbid=<?php echo $rs['kcid'];?>">版块管理</a><?php
	}
	?>
</td>
    <td align="center"><a href="?kbid=<?php echo $kbid;?>&edit=<?php echo $rs['kcid'];?>">修改 </a>&nbsp; <a href="?kbid=<?php echo $kbid;?>&del=<?php echo $rs['kcid'];?>">删除</a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    </tr>
</table>
<?php
if(isset($_GET['add'])){
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" bgcolor="#CCCCCC" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目排序:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kcsortnum" type="text" id="csortnum" value="100" size="5" />
        (越小，越排在前面)
      </label></td>
    </tr>
    <tr>
      <td width="19%" align="right" bgcolor="#F7F7F7">版块名称：</td>
      <td width="81%" bgcolor="#FFFFFF"><label>
        <input name="kctitle" type="text" id="kctitle" size="60" />
        <input name="tpp" type="hidden" id="tpp" value="1" />
        <input name="kbid" type="hidden" id="kbid" value="<?php echo $kbid;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">SEO标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kcseotitle" type="text" id="kcseotitle" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">下级类型：</td>
      <td bgcolor="#FFFFFF">
        <label>
          <input name="kcflag" type="radio" id="cflag_0" value="0" checked="checked" />
          只有帖子</label>
        <label>
          <input type="radio" name="kcflag" value="1" id="cflag_1" />
          只有类别</label>
        <label>
          <input type="radio" name="kcflag" value="2" id="cflag_2" />
          两者都有</label>
        <?php
		  if($_SESSION['uflag']==9){
			  echo " <input name=kcmx1 type=checkbox id=kcmx1 value=1 />左侧显示小类管理";
		  }
		  ?>
      </td>
    </tr>

    <tr>
      <td align="right" bgcolor="#F7F7F7">页面参数：</td>
      <td bgcolor="#FFFFFF"><label for="kcpagename"></label>
      <?php
	  if($kbid!=0){
	  ?>
        <input type="text" name="kcpagename" id="kcpagename"  value="<?php echo $bkcpagename;?>"/>
        <?php
	  }else{
		?>
        <input type="text" name="kcpagename" id="kcpagename" required="required"  />
       <?php
	  }
	  ?>
        (主要是用来定义前台页面名称及参数)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kckwd" type="text" id="kckwd" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">版块描述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="kcdescript" id="kcdescript" cols="58" rows="5"></textarea>
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value="提交" />
        <input type="reset" name="button2" id="button2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>
<?php
if(isset($_GET['edit'])){
	$edit=$_GET['edit'];
	$sqlstr="select * from ".$hbpre."ask_kclass where kcid=".$edit;
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" bgcolor="#CCCCCC" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目排序:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kcsortnum" type="text" id="kcsortnum" value="<?php echo $rs['kcsortnum'];?>" size="5" />
        (越小，越排在前面)
      </label></td>
    </tr>
    <tr>
      <td width="19%" align="right" bgcolor="#F7F7F7">版块名称：</td>
      <td width="81%" bgcolor="#FFFFFF"><label>
        <input name="kctitle" type="text" id="kctitle" value="<?php echo $rs['kctitle'];?>" size="60" />
        <input name="kcid" type="hidden" id="kcid" value="<?php echo $edit;?>" />
        <input name="kbid" type="hidden" id="kbid" value="<?php echo $rs['kbid'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">SEO标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kcseotitle" type="text" id="kcseotitle" value="<?php echo $rs['kcseotitle'];?>" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">下级类型：</td>
      <td bgcolor="#FFFFFF">
        <label>
          <input name="kcflag" type="radio" id="cflag_0" value="0" <?php if($rs['kcflag']==0){ ?> checked="checked" <?php } ?>/>
          只有帖子</label>
        <label>
          <input type="radio" name="kcflag" value="1" id="cflag_1"  <?php if($rs['kcflag']==1){ ?> checked="checked" <?php } ?> />
          只有类别</label>
        <label>
          <input type="radio" name="kcflag" value="2" id="cflag_2"  <?php if($rs['kcflag']==2){ ?> checked="checked" <?php } ?> />
          两者都有</label>
        <?php
		  if($_SESSION['uflag']==9){
			  echo " <input name=kcmx1 type=checkbox id=kcmx1 value=1";
			  if(substr($rs['kcmx'],0,1)==1){ 
			  echo " checked=checked";
			  }
			echo " />左侧显示小类管理";
		  }
		  ?>
      </td>
    </tr>

    <tr>
      <td align="right" bgcolor="#F7F7F7">页面参数：</td>
      <td bgcolor="#FFFFFF"><label for="kcpagename"></label>
      <?php
	  if($kbid!=0){
	  ?>
        <input type="text" name="kcpagename" id="kcpagename"  value="<?php echo $rs['kcpagename'];?>"/>
        <?php
	  }else{
		?>
        <input type="text" name="kcpagename" id="kcpagename" required="required" value="<?php echo $rs['kcpagename'];?>"  />
       <?php
	  }
	  ?>
        (主要是用来定义前台页面名称及参数)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kckwd" type="text" id="kckwd" size="60" value="<?php echo $rs['kckwd'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">版块描述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="kcdescript" id="kcdescript" cols="58" rows="5"><?php echo $rs['kcdescript'];?></textarea>
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value="提交" />
        <input type="reset" name="button2" id="button2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>
</div>
</body>
</html>
