<?php require_once('../include/config.php'); ?>
<?php
$pagesize=15;
if(isset($_POST['lid'])){
	$ltitle=$_POST['ltitle']; 
	$lname=$_POST['lname'];
	$lsex=$_POST['lsex'];
	$lmail=$_POST['lmail'];
	$lcontent=$_POST['lcontent'];
	$lid=$_POST['lid'];
	$lflag=$_POST['lflag'];
	$lreply=$_POST['lreply'];
	$sqlstr="update ".$hbpre."lyb set ltitle='$ltitle',lname='$lname',lsex='$lsex',lmail='$lmail',lflag='$lflag',lreply='$lreply',lcontent='$lcontent' where lid=$lid";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);
	 echo "<script language='javascript'>";
	 echo "alert('修改成功');";
	 echo "location='lyb.php';";
	 echo "</script>";
}

if(isset($_GET['del'])){
  $del=$_GET['del'];
  $sqlstr="delete from ".$hbpre."lyb where lid=$del";
  mysql_query($sqlstr);
	 echo "<script language='javascript'>";
	 echo "location='lyb.php';";
	 echo "</script>";
}
if(isset($_POST['l_id'])){
	foreach($_POST['l_id'] as $vv){
		$sqlstr="delete from ".$hbpre."lyb where lid=".$vv;
		mysql_query($sqlstr);
	}
	 echo "<script language='javascript'>";
	 echo "location='lyb.php';";
	 echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京恒博教育网站培训基地-留言板管理</title>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
</head>
<body>
<div id="man_zone">
<?php
if(!isset($_GET['edit'])){
?>
<table width="98%" border="0" align="center"  cellpadding="3" cellspacing="1" bgcolor="#999999">
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
<form id="form2" name="form2" method="post" action="">
  <tr>
    <th width="8%" bgcolor="#EEEEEE">ID</th>
    <th width="41%" bgcolor="#EEEEEE">留言主题</th>
    <th width="18%" bgcolor="#EEEEEE">留言人</th>
    <th width="10%" bgcolor="#EEEEEE">当前状态</th>
    <th width="10%" bgcolor="#EEEEEE">审核状态</th>
    <th width="13%" bgcolor="#EEEEEE">操作</th>
  </tr>
  <?php
  $sqlstr="select * from ".$hbpre."lyb order by lid desc";
  $pagecount=pagecount($pagesize);
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><label>
      <input type="checkbox" name="l_id[]" id="l_id" value="<?php echo $rs['lid'];?>" />
    </label>      <?php echo $rs['lid'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['ltitle'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['lname'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php 
	if($rs['lstate']==0){
	  echo "<font color=\"#ff0000\">未读</font>";	
	}else{
		echo "已读";
	}
	?></td>
    <td align="center" bgcolor="#FFFFFF"><?php 
	if($rs['lflag']==0){
	  echo "<font color=\"#ff0000\">未通过</font>";	
	}else{
		echo "已审";
	}
	?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="lyb.php?edit=<?php echo $rs['lid'];?>">修改</a> | <a href="lyb.php?del=<?php echo $rs['lid'];?>">删除</a></td>
  </tr>

  <?php
  }
  ?>
    <tr>
    <td align="center" bgcolor="#FFFFFF"><label>
      <input type="checkbox" name="ckall" id="ckall"  onclick="checkall()" />
    </label>      <input type="submit" name="button4" id="button4" value="删除" /></td>
    <td colspan="5" align="center" bgcolor="#FFFFFF"><?php echo showpage($pagecount);?></td>
    </tr>
  </form>
</table>
<?php
}
?>
<?php
if(isset($_GET['edit'])){
	
	$edit=$_GET['edit'];
	$sqlstr="update ".$hbpre."lyb set lstate=1 where lid=".$edit;
	mysql_query($sqlstr);
  $sqlstr="select * from ".$hbpre."lyb where lid=".$edit;
  $query=mysql_query($sqlstr);
  $rs=mysql_fetch_array($query);
?>
<form id="form1" name="form1" method="post" action=""><table width="98%" border="0" align="center"  cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="18%" align="right" bgcolor="#F7F7F7">留言主题：</td>
      <td width="82%" bgcolor="#FFFFFF"><label>
        <input name="ltitle" type="text" id="ltitle" size="62"  value="<?php echo $rs['ltitle'];?>"/>
        <input name="lid" type="hidden" id="lid" value="<?php echo  $edit;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">你的大名：</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="text" name="lname" id="lname"  value="<?php echo $rs['lname'];?>"/>
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">您的称呼：</td>
      <td bgcolor="#FFFFFF"><p>
        <label>
          <input name="lsex" type="radio" id="lsex_0" value="男" <?php if($rs['lsex']=='男'){ ?> checked="checked" <?php } ?> />
          先生</label>
        <label>
          <input type="radio" name="lsex" value="女" id="lsex_1"  <?php if($rs['lsex']=='女'){ ?> checked="checked" <?php } ?> />
          女士</label>
        <label>
          <input type="radio" name="lsex" value="其它" id="lsex_2"  <?php if($rs['lsex']=='其它'){ ?> checked="checked" <?php } ?> />
          其它</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">联系方式：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="lmail" type="text" id="lmail" size="62" value="<?php echo $rs['lmail'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">留言内容：</td>
      <td bgcolor="#FFFFFF"><table width="77%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="55%"><textarea name="lcontent" id="lcontent" cols="60" rows="8"><?php echo $rs['lcontent']; ?></textarea></td>
       
          <td >&nbsp;</td>
        </tr>
      </table></td>
    
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">管理员回复：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="lreply" id="lreply" cols="60" rows="5"></textarea>
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">审核情况 ：</td>
      <td bgcolor="#FFFFFF"><p>
        <label>
          <input name="lflag" type="radio" id="lflag_0" value="1" <?php if($rs['lflag']==1){ ?> checked="checked" <?php } ?> />
          通过审核</label>
        <label>
          <input type="radio" name="lflag" value="0" id="lflag_1" <?php if($rs['lflag']==0){ ?> checked="checked" <?php } ?>  />
          不审核</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value="提交" />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="button2" id="button2" value="重置" />
      &nbsp;&nbsp;
      <input type="button" name="button3" id="button3" value="删除该条信息" onclick="location='lyb.php?del=<?php echo $edit;?>'" />
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