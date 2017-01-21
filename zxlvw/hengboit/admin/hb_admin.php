<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
header("Content-type: text/html; charset=utf-8"); 
if(isset($_POST['dddd'])){
	if(strlen($_POST['u_pwd'])<5){
	  echo "<script language='javascript'>";
	  echo "alert('密码太短');";
	  echo "history.back(-1);";
	  echo "</script>";
	}
	if($_POST['u_pwd']!=$_POST['u_pwd2']){
	  echo "<script language='javascript'>";
	  echo "alert('两次输入的密码不一致，请重新输入');";
	  echo "history.back(-1);";
	  echo "</script>";
	  exit();
	}
	$uname=$_POST['u_name'];
	$upwd=$_POST['u_pwd'];
	$ustate=$_POST['ustate'];
	$uloginauth=$_POST['uloginauth'];
	$upwd=md5("hengbo8".$upwd."_bo");
	$sqlstr="insert into ".$hbpre."admin(uname,upwd,ustate,uloginauth)values('$uname','$upwd',$ustate,'$uloginauth')";
	mysql_query($sqlstr);
	  echo "<script language='javascript'>";
	  echo "location='hb_admin.php';";
	  echo "</script>";
}
if(isset($_POST['uid'])){
	if($_POST['u_pwd']!=$_POST['u_pwd2']){
	  echo "<script language='javascript'>";
	  echo "alert('两次输入的密码不一致，请重新输入');";
	  echo "history.back(-1);";
	  echo "</script>";
	  exit();
	}
   $uid=$_POST['uid'];
   $uname=$_POST['u_name'];
   $ustate=$_POST['ustate'];
   $sql=" uname='".$uname."',ustate=".$ustate;
   if(isset($_POST['uloginauth'])){
	   $uloginauth=$_POST['uloginauth'];
	   $sql.=",uloginauth='".$uloginauth."'";
	}
   if($_POST['u_pwd']!=""){
	$upwd=$_POST['u_pwd'];  
	$upwd=md5("hengbo8".$upwd."_bo");
	$sql.=",upwd='".$upwd."' ";
  }
 	$sqlstr="update ".$hbpre."admin set  ".$sql." where uid=$uid";   
  mysql_query($sqlstr);
	  echo "<script language='javascript'>";
	  echo "alert('修改成功');";
	  echo "location='hb_admin.php';";
	  echo "</script>";
   
}
if(isset($_GET['del'])){
 $del=$_GET['del'];
 $sqlstr="delete from ".$hbpre."admin where uid=$del";
 mysql_query($sqlstr);
	  echo "<script language='javascript'>";
	  echo "alert('删除成功');";
	  echo "location='hb_admin.php';";
	  echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
</head>
</head>

<body>
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td>当前位置：管理员管理 &nbsp;&nbsp;<?php if($_SESSION['uflag']==9){ ?><a href="hb_admin.php?add=1">[ 添加新用户 ]</a><?php } ?></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <th width="16%" bgcolor="#F7F7F7">用户编号</th>
    <th width="41%" bgcolor="#F7F7F7">用户名</th>
    <th width="26%" bgcolor="#F7F7F7">当前状态</th>
    <th width="17%" bgcolor="#F7F7F7">操作</th>
  </tr>
  <?php
  $sqlstr="select * from ".$hbpre."admin order by uid asc";
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
	  if($rs['uflag']>1){
	    if($_SESSION['uflag']==9){	  
    ?>
   <tr>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['uid'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['uname'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php 
	if($rs['ustate']==1){
		 echo "有效";
		}else{
	    echo "无效";
	}
		?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="hb_admin.php?edit=<?php echo $rs['uid'];?>">修改</a> &nbsp;&nbsp;&nbsp;&nbsp;
    <?php 
	if($rs['uid']>1){
	?>
    <a href="hb_admin.php?del=<?php echo $rs['uid'];?>">删除</a>
	<?php
	}
	?>
    </td>
  </tr>
  <?php
		}
		} else{
?>
 <tr>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['uid'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['uname'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php 
	if($rs['ustate']==1){
		 echo "有效";
		}else{
	    echo "无效";
	}
		?></td>
    <td align="center" bgcolor="#FFFFFF">
    <?php
	  if($_SESSION['uname']==$rs['uname']|| $_SESSION['uflag']==9){
	?>
    <a href="hb_admin.php?edit=<?php echo $rs['uid'];?>">修改</a> 
    <?php
	  }else{
		echo "无权限";  
	  }
	 ?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <?php
	if($_SESSION['uflag']==9){
	?>
    <a href="hb_admin.php?del=<?php echo $rs['uid'];?>">删除</a>
    <?php
	}
	?>
    </td>
  </tr>
  <?php
		}
  }
  ?>
</table>
<?php
if(isset($_GET['add'])){
?>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td width="22%" align="right" bgcolor="#F7F7F7">用户名： &nbsp;</td>
      <td width="78%" bgcolor="#FFFFFF"><label>
        <input name="u_name" type="text" id="u_name" size="30" maxlength="30" />
        <input name="dddd" type="hidden" id="dddd" value="1" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">密&nbsp;&nbsp;&nbsp;&nbsp;码： &nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="u_pwd" type="password" id="u_pwd" size="30" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">重复密码： &nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="u_pwd2" type="password" id="u_pwd2" size="30" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">登录认证码：&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="text" name="uloginauth" id="uloginauth" />
      (认证码一旦输入就不能修改)</label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">用户状态：&nbsp;&nbsp;</td>
      <td bgcolor="#FFFFFF"><p>
        <label>
          <input name="ustate" type="radio" id="ustate_0" value="0" checked="CHECKED" />
          无
          效&nbsp;</label>
        <label>
          <input name="ustate" type="radio" id="ustate_1" value="1" />
          有效</label><br />
      </p></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value=" 提 交 " />
      &nbsp;
      <input type="reset" name="button2" id="button2" value=" 重 置 " />
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
	$sqlstr="select * from ".$hbpre."admin where uid=".$edit;
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	
?>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
<table width="95%" bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td width="22%" align="right" bgcolor="#F7F7F7">用户名： &nbsp;</td>
      <td width="78%" bgcolor="#FFFFFF"><label>
        <input name="u_name" type="text" id="u_name" value="<?php echo $rs['uname'];?>" size="30" maxlength="30" />
        <input name="uid" type="hidden" id="uid" value="<?php echo $rs['uid'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">密&nbsp;&nbsp;&nbsp;&nbsp;码： &nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="u_pwd" type="password" id="u_pwd" size="30" maxlength="30" />
        (如果不修改密码请留空)
        </label></td>
    </tr>
       <tr>
      <td align="right" bgcolor="#F7F7F7">重复密码： &nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="u_pwd2" type="password" id="u_pwd2" size="30" maxlength="30" />
        </label></td>
    </tr>
 <?php
	if($_SESSION['uflag']==9){
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">登录认证码：&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="text" name="uloginauth" id="uloginauth" value="<?php echo $rs['uloginauth'];?>" />
        (认证码一旦输入就不能修改)</label></td>
    </tr>
   <?php
	}
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">用户状态：&nbsp;&nbsp;</td>
      <td bgcolor="#FFFFFF"><p>
        <label>
          <input name="ustate" type="radio" id="ustate_0" value="0" <?php if($rs['ustate']==0){ ?> checked="checked" <?php } ?>/>
          无
          效&nbsp;</label>
        <label>
          <input name="ustate" type="radio" id="ustate_1" value="1"  <?php if($rs['ustate']==1){ ?> checked="checked" <?php } ?>/>
          有效</label><br />
      </p></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value=" 提 交 " />
      &nbsp;
      <input type="reset" name="button2" id="button2" value=" 重 置 " />
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