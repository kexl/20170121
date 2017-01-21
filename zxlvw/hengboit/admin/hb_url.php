<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
if(isset($_GET['ucid'])){
	$ucid=$_GET['ucid'];
}else{
	$ucid=0;
	}
if($ucid==0){
  $umx="00001";	
  $uctitle="内链管理";
}else{
	$sqlstr="select * from ".$hbpre."uclass where ucid=$ucid";
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	$umx=$rs['umx'];
	$uctitle=$rs['uctitle'];
}
if(isset($_POST['uadd'])){
	$usortnum=$_POST['usortnum'];
	$utitle=$_POST['utitle'];
	$url=$_POST['url'];
	$ustate=$_POST['ustate'];
	if(isset($_POST['ulxr'])){
	  $ulxr=$_POST['ulxr'];	
	}else{
		$ulxr="";
	}
	if(isset($_POST['ulxfs'])){
		$ulxfs=	$_POST['ulxfs'];
	}else{
		$ulxfs="";	
	}
	if(isset($_POST['ucid'])){
		$ucid=	$_POST['ucid'];
	}else{
		$ucid=0;	
	}
	if(isset($_POST['upic'])){
		$upic=$_POST['upic'];	
	}else{
		$upic="";	
	}
	if(isset($_POST['ucontent'])){
		$ucontent=$_POST['ucontent'];
	}else{
		$ucontent="";
	}
	$sqlstr="insert into ".$hbpre."url(ucid,utitle,url,ustate,upic,ulxr,ulxfs,utime,ucontent,usortnum)values($ucid,'$utitle','$url',$ustate,'$upic','$ulxr','$ulxfs',now(),'$ucontent',$usortnum)";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);
	echo "<script language='javascript'>";
	echo "location='hb_url.php?ucid=".$ucid."';";
	echo "</script>";
}

if(isset($_POST['uedit'])){
	$usortnum=$_POST['usortnum'];
	$uid=$_POST['uid'];
	$utitle=$_POST['utitle'];
	$url=$_POST['url'];
	$ustate=$_POST['ustate'];
	if(isset($_POST['ulxr'])){
	  $ulxr=$_POST['ulxr'];	
	}else{
		$ulxr="";
	}
	if(isset($_POST['ulxfs'])){
		$ulxfs=	$_POST['ulxfs'];
	}else{
		$ulxfs="";	
	}
	if(isset($_POST['ucid'])){
		$ucid=	$_POST['ucid'];
	}else{
		$ucid=0;	
	}
	if(isset($_POST['upic'])){
		$upic=$_POST['upic'];	
	}else{
		$upic="";	
	}
	if(isset($_POST['ucontent'])){
		$ucontent=$_POST['ucontent'];
	}else{
		$ucontent="";
	}
	$sqlstr="update ".$hbpre."url set utitle='$utitle',url='$url',usortnum=".$usortnum.",ustate=$ustate,upic='$upic',ucontent='$ucontent',ulxr='$ulxr',ulxfs='$ulxfs' where uid=$uid";
	mysql_query($sqlstr);
	echo "<script language='javascript'>";
	echo "location='hb_url.php?ucid=".$ucid."';";
	echo "</script>";
}
if(isset($_POST['del'])){
	$ucid=$_POST['ucid'];
	if(isset($_POST['uid'])){
	   foreach($_POST['uid'] as $vv){
		$sqlstr="delete from ".$hbpre."url where uid=".$vv;
		mysql_query($sqlstr);
 		}
	}
   echo "<script language='javascript'>";
  echo "location='hb_url.php?ucid=".$ucid."';";
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
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td>当前位置： <?php echo $uctitle;?>&nbsp;       
	  <?php
	  if(substr($umx,4,1)==1||$_SESSION['uflag']==9){
	  ?>
<a href="hb_url.php?ucid=<?php echo $ucid;?>&amp;add=1"> [添加]</a>
<?php
	  }
?>
</td>
    </tr>
  </table>
    <?php
  if(!isset($_GET['add']) && !isset($_GET['edit'])){
  ?>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
  <script language="javascript">
  function checkall(){
	var a= document.getElementsByTagName("input");
	if(document.myform.all.checked){
	  for(var i=0 ;i<a.length;i++){
		if(a[i].type=="checkbox"){
		  a[i].checked=true;	
		}  
	  }	
	}else{
	  for(var i=0 ;i<a.length;i++){
		if(a[i].type=="checkbox"){
		  a[i].checked=false;	
		}  
	  }	
	 }
 }
</script>
  <form id="myform" name="myform" method="post" action="hb_url.php?ucid=<?php echo $ucid;?>">
 <tr>
      <th width="11%" bgcolor="#F5F5F5">编号
        <input name="ucid" type="hidden" id="ucid" value="<?php echo $ucid;?>" />
        <input name="del" type="hidden" id="del" value="1" /></th>
      <th width="26%" bgcolor="#F5F5F5">关键词</th>
      <th width="32%" bgcolor="#F5F5F5">内链页面</th>
      <th width="7%" bgcolor="#F5F5F5">状态</th>
       <?php
	   if(substr($umx,1,1)){
	   ?>
         <th width="9%" bgcolor="#F5F5F5">联系人</th>
        <?php
	   }
	   if(substr($umx,0,1)){
	   ?>
       <th width="8%" bgcolor="#F5F5F5">图片</th>
       <?php
	   }
	   ?>
   <th width="7%" bgcolor="#F5F5F5">操作</th>
    </tr>
    <?php
	$sqlstr="select * from ".$hbpre."url where ucid=".$ucid." order by usortnum,uid desc";
	$query=mysql_query($sqlstr);
	while($rs=mysql_fetch_array($query)){
	?>
    <tr>
      <td align="center"> 
      <?php
	  if(substr($umx,4,1)==1||$_SESSION['uflag']==9){
	  ?>
      <input type="checkbox" name="uid[]"  value="<?php echo $rs['uid'];?>" />
	  <?php
	  }
	  ?>
	  <?php echo $rs['uid'];?></td>
      <td align="center"><?php echo $rs['utitle'];?></td>
      <td align="center"><?php echo $rs['url'];?></td>
      <td align="center"><?php 
	  if($rs['ustate']==0){
		 echo "<font color='#666666'>不可用</font>"; 
		 }else{
		  echo "正常";	 
		}
	  
	  ?></td>
      <?php
	   if(substr($umx,1,1)){
	   ?>
       <td align="center"><?php echo $rs['ulxr'];?></td>
       <?php
	   }
	   ?>
        <?php
	   if(substr($umx,0,1)){
	   ?>
   <td align="center"><a href="hb_url_uppic.php?uid=<?php echo $rs['uid'];?>" onclick=window.open('','new','width=500') target=new>
   <?php
   if($rs['upic']!=""){
		echo "<font color='#0000ff'>有图</a>";
	}else{
	?>
    无图
    <?php	   
	}
	  ?></a></td>
      <?php
	   }
	   ?>
      <td align="center"><a href="hb_url.php?ucid=<?php echo $ucid;?>&amp;edit=<?php echo $rs['uid'];?>">修改</a></td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td width="11%" align="center" nowrap="nowrap" bgcolor="#FFFFFF">
    <?php
	  if(substr($umx,4,1)==1||$_SESSION['uflag']==9){
	  ?>
 <input type="checkbox" name="all" id="all" onclick="checkall()" />
        	  <label>
        	    <input type="submit" name="mydel" id="mydel" value=" 删除 " />
      	    </label>
       <?php
	  }
	  ?>
          </td>
      <td colspan="6" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </form>
  </table>
  <?php
  }
  if(isset($_GET['add'])){
  ?>
    <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
   <form id="form1" name="form1" method="post" action="">
     <tr>
       <td align="center">排&nbsp;&nbsp;序</td>
       <td align="left"><label>
         <input name="usortnum" type="text" id="usortnum" value="50" size="6" />
         (值越小，排序越靠前)
       </label></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
        <td width="29%" align="center">关 键 词：</td>
        <td width="59%" align="left"><input name="utitle" type="text" id="utitle" size="40" />
        <input name="uadd" type="hidden" id="uadd" value="1" />
        <input name="ucid" type="hidden" id="ucid" value="<?php echo $ucid;?>" /></td>
        <td width="12%">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">链接地址：</td>
        <td align="left"><label>
          <input name="url" type="text" id="url" size="50" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">使用状态：</td>
        <td align="left">
            <input type="radio" name="ustate" value="0" id="ustate_0" />
            禁用
            <input name="ustate" type="radio" id="ustate_1" value="1" checked="checked" />
        正常</td>
        <td>&nbsp;</td>
      </tr>

        <?php

		  if(substr($umx,1,1)){
	  ?>
      <tr>
        <td align="center">联 系 人：</td>
        <td align="left"><label>
          <input type="text" name="ulxr" id="ulxr" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
		  }
		if(substr($umx,2,1)){
	  ?>
       
      <tr>
        <td align="center">联系方式：</td>
        <td align="left"><label>
          <input type="text" name="ulxfs" id="ulxfs" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  }
	  if(substr($umx,3,1)){
	  ?>
      
      <tr>
        <td align="center">简介</td>
        <td align="left"><label>
          <textarea name="ucontent" id="ucontent" cols="45" rows="5"></textarea>
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  }
	  ?>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left"><label>
          <input type="submit" name="button" id="button" value=" 提 交 " />
          &nbsp;&nbsp;
          <input type="reset" name="button2" id="button2" value=" 重 置 " />
        </label></td>
        <td>&nbsp;</td>
      </tr>
   </form>
   </table>
  <?php } 
  if(isset($_GET['edit'])){
	  $edit=$_GET['edit'];
	  $sqlstr="select * from ".$hbpre."url where uid=$edit";
	  $query=mysql_query($sqlstr);
	  $rs=mysql_fetch_array($query);
  ?>
  
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
   <form id="form1" name="form1" method="post" action="">
     <tr>
       <td align="center">排&nbsp;&nbsp;序：</td>
       <td align="left"><label>
         <input name="usortnum" type="text" id="usortnum" value="<?php echo $rs['usortnum'];?>" size="6" />
       (值越小，排序越靠前)
       </label></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
        <td width="29%" align="center">关 键 词：</td>
        <td width="59%" align="left"><input name="utitle" type="text" id="utitle" size="40" value="<?php echo $rs['utitle'];?>" />
        <input name="uid" type="hidden" id="uid" value="<?php echo $rs['uid'];?>" />
        <input name="ucid" type="hidden" id="ucid" value="<?php echo $ucid;?>" />
        <input name="uedit" type="hidden" id="uedit" value="1" /></td>
        <td width="12%">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">链接地址：</td>
        <td align="left"><label>
          <input name="url" type="text" id="url" size="50" value="<?php echo $rs['url'];?>" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">使用状态：</td>
        <td align="left">
            <input type="radio" name="ustate" value="0" id="ustate_0" <?php if($rs['ustate']==0){ ?> checked="checked" <?php } ?>  />
            禁用
            <input name="ustate" type="radio" id="ustate_1" value="1" <?php if($rs['ustate']==1){ ?> checked="checked" <?php } ?> />
        正常</td>
        <td>&nbsp;</td>
      </tr>

        <?php

		  if(substr($umx,1,1)){
	  ?>
    <tr>
        <td align="center">联 系 人：</td>
        <td align="left"><label>
          <input type="text" name="ulxr" id="ulxr" value="<?php echo $rs['ulxr'];?>" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
        <?php
		  }
		if(substr($umx,2,1)){
	  ?>
    <tr>
        <td align="center">联系方式：</td>
        <td align="left"><label>
          <input type="text" name="ulxfs" id="ulxfs"  value="<?php echo $rs['ulxfs'];?>"/>
        </label></td>
        <td>&nbsp;</td>
      </tr>
        <?php
		  }
		if(substr($umx,3,1)){
	  ?>
       <tr>
        <td align="center">简介</td>
        <td align="left"><label>
          <textarea name="ucontent" id="ucontent" cols="45" rows="5"><?php echo $rs['ucontent'];?></textarea>
        </label></td>
        <td>&nbsp;</td>
      </tr>
   <?php
	  }
	  ?>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left"><label>
          <input type="submit" name="button" id="button" value=" 提 交 " />
          &nbsp;&nbsp;
          <input type="reset" name="button2" id="button2" value=" 重 置 " />
        </label></td>
        <td>&nbsp;</td>
      </tr>
   </form>
   </table>
   <?php
   }
   ?>
</div>
</body>
</html>
