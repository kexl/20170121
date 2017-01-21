<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); 
$pagesize=10;
if(isset($_POST['uadd'])){
	$uctitle=$_POST['uctitle'];
	$usortnum=$_POST['usortnum'];
	if(isset($_POST['umx1'])){
		$umx1=1;	
	}else{
		$umx1=0;
		}
	if(isset($_POST['umx2'])){
		$umx2=1;	
	}else{
		$umx2=0;
		}
	if(isset($_POST['umx3'])){
		$umx3=1;	
	}else{
		$umx3=0;
		}
	if(isset($_POST['umx4'])){
		$umx4=1;	
	}else{
		$umx4=0;
		}
	if(isset($_POST['umx5'])){
		$umx5=0;	
	}else{
		$umx5=1;
		}
	$umx=$umx1.$umx2.$umx3.$umx4.$umx5;
	$sqlstr="insert into ".$hbpre."uclass(uctitle,usortnum,umx)values('$uctitle',$usortnum,'$umx')";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);
	echo "<script language='javascript'>";
	echo "location='hb_uclass.php';";
	echo "</script>";
}

if(isset($_POST['ucid'])){
	$ucid=$_POST['ucid'];
	$uctitle=$_POST['uctitle'];
	$usortnum=$_POST['usortnum'];
	if(isset($_POST['umx1'])){
		$umx1=1;	
	}else{
		$umx1=0;
		}
	if(isset($_POST['umx2'])){
		$umx2=1;	
	}else{
		$umx2=0;
		}
	if(isset($_POST['umx3'])){
		$umx3=1;	
	}else{
		$umx3=0;
		}
	if(isset($_POST['umx4'])){
		$umx4=1;	
	}else{
		$umx4=0;
		}
	if(isset($_POST['umx5'])){
		$umx5=0;	
	}else{
		$umx5=1;
		}
	$umx=$umx1.$umx2.$umx3.$umx4.$umx5;
	$sqlstr="update ".$hbpre."uclass set uctitle='$uctitle',usortnum=$usortnum,umx='$umx' where ucid=$ucid";
	//echo $sqlstr;
	//exit();
	mysql_query($sqlstr);
	echo "<script language='javascript'>";
	echo "location='hb_uclass.php';";
	echo "</script>";
}
if(isset($_POST['mydel'])){
	if(isset($_POST['u_cid'])){
	   foreach($_POST['u_cid'] as $vv){
		   $sqlstr="delete from ".$hbpre."url where ucid=".$vv;
		   $query=mysql_query($sqlstr);
		$sqlstr="delete from ".$hbpre."uclass where ucid=".$vv;
		mysql_query($sqlstr);
 		}
   echo "<script language='javascript'>";
  echo "location='hb_uclass.php;";
  echo "</script>";
	}
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
      <td>当前位置： 链接分类管理&nbsp; 【<a href="hb_uclass.php?add=1">添加新类</a>】</td>
    </tr>
  </table>
 <?php
  if(!isset($_GET['add']) && !isset($_GET['edit'])){
  ?>
  
  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
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
  <form id="myform" name="myform" method="post" action="">
    <tr>
      <th width="24%" bgcolor="#F5F5F5">编号（ucid）</th>
      <th width="52%" bgcolor="#F5F5F5">类别名称(uclass)</th>
      <th width="24%" bgcolor="#F5F5F5">操作</th>
    </tr>
    <?php
	$sqlstr="select * from ".$hbpre."uclass  order by usortnum asc";
	$pagecount=pagecount($pagesize);
	$query=mysql_query($sqlstr);
	while($rs=mysql_fetch_array($query)){
	?>
    <tr>
      <td align="center">   <?php if($rs['ucid']>2){ ?>   <input type="checkbox" name="u_cid[]"  value="<?php echo $rs['ucid'];?>" /><?php } ?> 
<?php echo $rs['ucid'];?></td>
      <td align="center"><?php echo $rs['uctitle'];?></td>
      <td align="center"><a href="hb_uclass.php?edit=<?php echo $rs['ucid'];?>">修改</a></td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td align="center">     <input type="checkbox" name="all" id="all" onclick="checkall()" />
        	  <label>
        	    <input type="submit" name="mydel" id="mydel" value=" 删除 " />
      	    </label></td>
	<td colspan="3" align="center">
    <?php echo showpage($pagecount);?>
    </td>
    </tr>
    </form>
  </table>
  <?php
  }
  if(isset($_GET['add'])){
  ?>
  <form id="form1" name="form1" method="post" action="">
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
      <tr>
        <td width="29%" align="center">排&nbsp;&nbsp;&nbsp;&nbsp;序：</td>
        <td width="45%"><label>
          <input name="usortnum" type="text" id="usortnum" value="50" size="6" />
        (值越小,排列越靠前)</label></td>
        <td width="26%">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">类别名称：</td>
        <td><label>
          <input type="text" name="uctitle" id="uctitle" />
          <input name="uadd" type="hidden" id="uadd" value="1" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
       <?php
	  if($_SESSION['uflag']==9){
	  ?>
     <tr>
        <td align="center">链接模型：</td>
        <td><label>
          <input name="umx1" type="checkbox" id="umx1" value="1" checked="checked" />
        含图片广告 
         &nbsp;
        <input name="umx2" type="checkbox" id="umx2" value="1" />
        含联系人 
        <input name="umx3" type="checkbox" id="umx3" value="1" />
        含联系方式
        <input name="umx4" type="checkbox" id="umx4" value="1" />含简介
        <input name="umx5" type="checkbox" id="umx5" value="0" />禁止增删
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  }
	  ?>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left"><input type="submit" name="button" id="button" value="提交" />
&nbsp;&nbsp;
<input type="reset" name="button2" id="button2" value="重置" /></td>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
  </form>
  <?php
  }
 if(isset($_GET['edit'])){
	 $edit=$_GET['edit'];
	 $sqlstr="select * from ".$hbpre."uclass where ucid=$edit";
	 $query=mysql_query($sqlstr);
	 $rs=mysql_fetch_array($query);
  ?>
  
<form id="forma" name="forma" method="post" action="">
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
      <tr>
        <td width="29%" align="center">排&nbsp;&nbsp;&nbsp;&nbsp;序：</td>
        <td width="45%"><label>
          <input name="usortnum" type="text" id="usortnum" size="6" value="<?php echo $rs['usortnum'];?>" />
        (值越小,排列越靠前)</label></td>
        <td width="26%">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">类别名称：</td>
        <td><label>
          <input type="text" name="uctitle" id="uctitle" value="<?php echo $rs['uctitle'];?>" />
          <input name="ucid" type="hidden" id="ucid" value="<?php echo $rs['ucid'];?>" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  if($_SESSION['uflag']==9){
	  ?>
      <tr>
        <td align="center">链接模型：</td>
        <td><label>
          <input name="umx1" type="checkbox" id="umx1" <?php if(substr($rs['umx'],0,1)==1){ ?> checked="checked" <?php } ?> />
        含图片 
         &nbsp;
        <input type="checkbox" name="umx2" id="umx2" <?php if(substr($rs['umx'],1,1)==1){ ?> checked="checked" <?php } ?> />
        含联系人 
        <input type="checkbox" name="umx3" id="umx3" <?php if(substr($rs['umx'],2,1)==1){ ?> checked="checked" <?php } ?> />
        含联系方式
        <input type="checkbox" name="umx4" id="umx4" <?php if(substr($rs['umx'],3,1)==1){ ?> checked="checked" <?php } ?> />含简介
        <input name="umx5" type="checkbox" id="umx5" value="0" <?php if(substr($rs['umx'],4,1)==1){ ?> checked="checked" <?php } ?> />禁止增删
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  }
	  ?>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left"><input type="submit" name="button" id="button" value="提交" />
&nbsp;&nbsp;
<input type="reset" name="button2" id="button2" value="重置" /></td>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
  </form>
 <?php
 }
 ?>
</div>
</body>
</html>
