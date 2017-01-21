<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$pagesize=10;
if(isset($_GET['bid'])){
	$bid=$_GET['bid'];
	
}else{
	$bid=0;
}
if($bid==0){
  	$btitle="顶级栏目管理";//如果bid是0为顶级类管理
	$bmx="111101";
}else{
   $sqlstr="select * from ".$hbpre."class where cid=$bid"; //查询当前大类的名称	
   $query=mysql_query($sqlstr);
   $rs=mysql_fetch_array($query);
   $btitle=$rs['ctitle'];
   $bbid=$rs['bid'];
   $bpagename=$rs['pagename'];
   $bmx=$rs['mx'];
}
if(isset($_POST['tpp'])){
   $ctitle=$_POST['ctitle'];
   $cflag=$_POST['cflag'];
   $bid=$_POST['bid'];
   $csortnum=$_POST['csortnum'];
   $cseotitle=$_POST['cseotitle'];
   $ckwd=$_POST['ckwd'];
   $pagename=$_POST['pagename'];
   $cdescript=$_POST['cdescript'];
   if(isset($_POST['cidxs'])){
	$cidxs=1;   
	}else{
	$cidxs=0;	
	}
	if($_SESSION['uflag']==9){
	   if(isset($_POST['mx1'])){
		  $mx1=0;  
		 }else{
		   $mx1=1; 
		}
	   if(isset($_POST['mx2'])){
		  $mx2=0;  
		 }else{
		   $mx2=1; 
		}
	   if(isset($_POST['mx3'])){
		  $mx3=0;  
		 }else{
		   $mx3=1; 
		}
	   if(isset($_POST['mx4'])){
		  $mx4=0;  
		 }else{
		   $mx4=1; 
		}
	   if(isset($_POST['mx5'])){
		  $mx5=0;  
		 }else{
		   $mx5=1; 
		}
	   if(isset($_POST['mx6'])){
		  $mx6=0;  
		 }else{
		   $mx6=1; 
		}
		$mx=$mx1.$mx2.$mx3.$mx4.$mx5.$mx6;
	}else{
		$mx=$bmx;	
	}
	
   $sqlstr="insert into ".$hbpre."class(ctitle,cflag,bid,csortnum,cseotitle,ckwd,cdescript,mx,cidxs,pagename)values('$ctitle',$cflag,$bid,$csortnum,'$cseotitle','$ckwd','$cdescript','$mx',$cidxs,'$pagename')";
   mysql_query($sqlstr);
   echo "<script language='javascript'>";
	echo "parent.leftFrame.location.reload();";
	echo "location='hb_class.php?bid=".$bid."';";
   echo "</script>";
}
if(isset($_POST['cid'])){
	$cid=$_POST['cid'];
	$cidstr=getcidstr($cid,1);
	$pagename=$_POST['pagename'];
	$sqlstr="update hb_class set pagename='$pagename' where cid in(".$cidstr.")";
	mysql_query($sqlstr);
   $ctitle=$_POST['ctitle'];
   $cflag=$_POST['cflag'];
    $csortnum=$_POST['csortnum'];
  $bid=$_POST['bid'];
     if(isset($_POST['cidxs'])){
	$cidxs=1;   
	}else{
	$cidxs=0;	
	}

    $cseotitle=$_POST['cseotitle'];
   $ckwd=$_POST['ckwd'];
   $cdescript=$_POST['cdescript'];
      if(isset($_POST['mx1'])){
	  $mx1=0;  
	 }else{
	   $mx1=1; 
	}
   if(isset($_POST['mx2'])){
	  $mx2=0;  
	 }else{
	   $mx2=1; 
	}
   if(isset($_POST['mx3'])){
	  $mx3=0;  
	 }else{
	   $mx3=1; 
	}
   if(isset($_POST['mx4'])){
	  $mx4=0;  
	 }else{
	   $mx4=1; 
	}
   if(isset($_POST['mx5'])){
	  $mx5=0;  
	 }else{
	   $mx5=1; 
	}
   if(isset($_POST['mx6'])){
	  $mx6=0;  
	 }else{
	   $mx6=1; 
	}
	$mx=$mx1.$mx2.$mx3.$mx4.$mx5.$mx6;

  $sqlstr="update ".$hbpre."class set ctitle='$ctitle',cseotitle='$cseotitle',mx='$mx',cidxs=$cidxs,pagename='$pagename',ckwd='$ckwd',cdescript='$cdescript',csortnum=$csortnum,cflag=$cflag,bid=$bid where cid=".$cid;
   mysql_query($sqlstr);
   echo "<script language='javascript'>";
	echo "parent.leftFrame.location.reload();";
   echo "location='hb_class.php?bid=".$bid."';";
   echo "</script>";
}
if(isset($_POST['cdel'])){
	$bid=$_POST['bid'];
	$i=0;
	if(isset($_POST['c_id'])){
		foreach($_POST['c_id'] as $v){
		  $sqlv="select cid from ".$hbpre."class where bid=".$v." union select id from ".$hbpre."article where cid=".$v;
		  //echo $sqlstr;
		  //echo "<br>";
		  $query=mysql_query($sqlv);
		  $num=mysql_num_rows($query);
			  if($num>0){
				  $i++;
			  }else{
				  $sqlstr="delete from ".$hbpre."class where cid=".$v;
				  mysql_query($sqlstr);
			  }
		}
	  echo "<script language='javascript'>";
	  if($i>0){
	  echo "alert('共有".$i."条没有删除，可能下级还有内容，请先删除下级内容后再试');";
	  }
	  echo "location='hb_class.php?bid=".$bid."';";
	  echo "</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style type="text/css">
   body{ font-size:12px; margin:0px; padding:0px;}
</style>
</head>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<body>
<div id="man_zone">
<table width="98%" border="0" align="center"  cellpadding="5" cellspacing="0">
  <tr>
    <td>当前位置：<?php echo $btitle;?> &nbsp;<a href="?bid=<?php echo $bid;?>&add=1">添加新栏目</a>
</td>
  </tr>
</table>
<?php
if(!isset($_GET['add'])&&!isset($_GET['edit'])){
?>

<table width="98%" border="0" align="center"  cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
<script language="javascript">
  function checkall(){
	var a= document.getElementsByTagName("input");
	if(document.myform.all.checked){
	  for(var i=0 ;i<a.length;i++){
		if(a[i].type=="checkbox") a[i].checked=true;	
	  }	
	}else{
	  for(var i=0 ;i<a.length;i++){
		if(a[i].type=="checkbox") a[i].checked=false;	
	  }	
	 }
 }

</script>
 <form id="myform" name="myform" method="post" action="">
  <tr>
    <th width="12%" bgcolor="#EEEEEE">栏目编号
        <input type="hidden" name="cdel" id="cdel" value="aa" />
        <input name="bid" type="hidden" id="bid" value="<?php echo $bid;?>" />
    </th>
    <th width="36%" bgcolor="#EEEEEE">栏目名称</th>
    <th width="25%" bgcolor="#EEEEEE">下级管理</th>
    <th width="14%" bgcolor="#EEEEEE">栏目图片</th>
    <th width="13%" bgcolor="#EEEEEE">操作</th>
  </tr>
  <?php
  $sqlstr="select * from ".$hbpre."class where bid=$bid order by csortnum asc,cid asc";
  $pagecount=pagecount($pagesize);
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF">
      <input type="checkbox" name="c_id[]"  value="<?php echo $rs['cid'];?>" />
          <?php echo $rs['cid'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['ctitle'];?></td>
    <td align="center" bgcolor="#FFFFFF">
    <?php
	if($rs['cflag']==0 || $rs['cflag']==2){
	?>
    <a href="hb_article.php?cid=<?php echo $rs['cid'];?>">文章管理 </a>
    <?php
	}
	?>
     &nbsp;
    <?php
	if($rs['cflag']==1 || $rs['cflag']==2){
	?>
     <a href="?bid=<?php echo $rs['cid'];?>">下级栏目管理</a><?php
	}
	?>
    
    </td>
    <td align="center" bgcolor="#FFFFFF"><a href="hb_class_uppic.php?cid=<?php echo $rs['cid'];?>" onclick=window.open('','new','width=500') target=new>
    <?php if(strlen($rs['cpic'])<5){
		echo "无图";
	}else{
     	echo "<font color='#00ff99'>有</font>";
	}
	?>
    </a></td>
    <td align="center" bgcolor="#FFFFFF"><a href="?bid=<?php echo $bid;?>&edit=<?php echo $rs['cid'];?>">修改</a></td>
  </tr>
  <?php
  }
  ?>
 <tr>
   <td align="center" bgcolor="#FFFFFF">
         	  <input type="checkbox" name="all" id="all" onclick="checkall()" />&nbsp;

       <input type="submit" name="button3" id="button3" value=" 删除所选 " />
    </td>
   <td colspan="4" align="center" bgcolor="#FFFFFF"><?php echo showpage($pagecount);?></td>
   </tr>
    </form>
</table>
<?php
}
?>
<?php
if(isset($_GET['add'])){
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" bgcolor="#CCCCCC" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目排序:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="csortnum" type="text" id="csortnum" value="50" size="5" />
        (越小，越排在前面)
      </label></td>
    </tr>
    <tr>
      <td width="19%" align="right" bgcolor="#F7F7F7">栏目名称：</td>
      <td width="81%" bgcolor="#FFFFFF"><label>
        <input name="ctitle" type="text" id="ctitle" size="60" />
        <input name="tpp" type="hidden" id="tpp" value="1" />
        <input name="bid" type="hidden" id="bid" value="<?php echo $bid;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目SEO标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="cseotitle" type="text" id="cseotitle" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">下级类型：</td>
      <td bgcolor="#FFFFFF">
        <label>
          <input name="cflag" type="radio" id="cflag_0" value="0" checked="checked" />
          只有文章</label>
        <label>
          <input type="radio" name="cflag" value="1" id="cflag_1" />
          只有类别</label>
        <label>
          <input type="radio" name="cflag" value="2" id="cflag_2" />
          两者都有</label>
        <?php
		  if($_SESSION['uflag']==9){
			  echo " <input name=cidxs type=checkbox id=cidxs value=1 />左侧显示小类管理";
		  }
		  ?>
      </td>
    </tr>
    <?php
	if($_SESSION['uflag']==9){
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">文章模型：</td>
      <td bgcolor="#FFFFFF">
        <input type="checkbox" name="mx1" id="mx1" value="0" <?php if(substr($bmx,0,1)==0){ ?> checked="checked" <?php } ?> />
        禁止增删
        <input type="checkbox" name="mx2" id="mx2" value="0" <?php if(substr($bmx,1,1)==0){ ?> checked="checked" <?php } ?> />      禁用seo标题  
        <input type="checkbox" name="mx3" id="mx3" value="0" <?php if(substr($bmx,2,1)==0){ ?> checked="checked" <?php } ?> />   禁用简介
        <input type="checkbox" name="mx4" id="mx4" value="0"  <?php if(substr($bmx,3,1)==0){ ?> checked="checked" <?php } ?>/>   禁用详细内容
         <input name="mx5" type="checkbox" id="mx5" value="0" <?php if(substr($bmx,4,1)==0){ ?> checked="checked" <?php } ?>/>   禁用URL
           <input type="checkbox" name="mx6" id="mx6" value="0" <?php if(substr($bmx,5,1)==0){ ?> checked="checked" <?php } ?>/>   禁用缩略图
      </td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">页面参数：</td>
      <td bgcolor="#FFFFFF"><label for="pagename"></label>
      <?php
	  if($bid!=0){
	  ?>
        <input type="text" name="pagename" id="pagename" readonly="readonly"  value="<?php echo $bpagename;?>"/>
        <?php
	  }else{
		?>
        <input type="text" name="pagename" id="pagename" required="required"  />
       <?php
	  }
	  ?>
        (主要是用来定义前台页面名称中参数)</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="ckwd" type="text" id="ckwd" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目描述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="cdescript" id="cdescript" cols="58" rows="5"></textarea>
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
	$sqlstr="select * from ".$hbpre."class where cid=".$edit;
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
?>
<form id="form2" name="form2" method="post" action="">
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1"  bgcolor="#CCCCCC">
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目排序：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="csortnum" type="text" id="csortnum" size="5" value="<?php echo $rs['csortnum'];?>" />
      </label></td>
    </tr>
    <tr>
      <td width="19%" align="right" bgcolor="#F7F7F7">栏目名称：</td>
      <td width="81%" bgcolor="#FFFFFF"><label>
        <input name="ctitle" type="text" id="ctitle" value="<?php echo $rs['ctitle'];?>" size="60" />
        <input name="cid" type="hidden" id="cid" value="<?php echo $edit;?>" /><input name="bid" type="hidden" id="bid" value="<?php echo $rs['bid'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目SEO标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="cseotitle" type="text" id="cseotitle" size="60" value="<?php echo $rs['cseotitle'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">下级类型：</td>
      <td bgcolor="#FFFFFF">
        <label>
          <input name="cflag" type="radio" id="cflag_0" value="0" <?php if($rs['cflag']==0){ ?> checked="checked" <?php } ?> />
          只有文章</label>
        <label>
          <input type="radio" name="cflag" value="1" id="cflag_1" <?php if($rs['cflag']==1){ ?> checked="checked" <?php } ?>  />
          只有类别</label>
        <label>
          <input type="radio" name="cflag" value="2" id="cflag_2" <?php if($rs['cflag']==2){ ?> checked="checked" <?php } ?>  />
          两者都有</label>
          <?php
		  if($_SESSION['uflag']==9){
			  echo " <input name=cidxs type=checkbox id=cidxs value=1";
			  if($rs['cidxs']==1){ 
			  echo " checked=checked";
			  }
			echo " />左侧显示小类管理";
		  }
		  ?>
      </td>
    </tr>
    <?php
	if($_SESSION['uflag']==9){
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">文章模型：</td>
      <td bgcolor="#FFFFFF">
        <input type="checkbox" name="mx1" id="mx1" value="0" <?php if(substr($rs['mx'],0,1)==0){ ?> checked="checked" <?php } ?> />
        禁止增删
        <input type="checkbox" name="mx2" id="mx2" value="0" <?php if(substr($rs['mx'],1,1)==0){ ?> checked="checked" <?php } ?> />      禁用seo标题  
        <input type="checkbox" name="mx3" id="mx3" value="0" <?php if(substr($rs['mx'],2,1)==0){ ?> checked="checked" <?php } ?>  />   禁用简介
        <input type="checkbox" name="mx4" id="mx4" value="0"  <?php if(substr($rs['mx'],3,1)==0){ ?> checked="checked" <?php } ?> />   禁用详细内容
         <input type="checkbox" name="mx5" id="mx5" value="0" <?php if(substr($rs['mx'],4,1)==0){ ?> checked="checked" <?php } ?>  />   禁用URL
           <input type="checkbox" name="mx6" id="mx6" value="0"  <?php if(substr($rs['mx'],5,1)==0){ ?> checked="checked" <?php } ?> />   禁用缩略图
      </td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td align="right" bgcolor="#F7F7F7">页面参数：</td>
      <td bgcolor="#FFFFFF"><label for="pagename2"></label>
      <?php
	  if($bid!=0){
	  ?>
        <input type="text" name="pagename" id="pagename"  value="<?php echo $rs['pagename'];?>" readonly="readonly" />
        <?php
	  }else{
	?>
        <input type="text" name="pagename" id="pagename"  value="<?php echo $rs['pagename'];?>" />
    <?php
	  }
	  ?>
	
        </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="ckwd" type="text" id="ckwd" value="<?php echo $rs['ckwd'];?>" size="60" />
      </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#F7F7F7">栏目描述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="cdescript" id="cdescript" cols="58" rows="5"><?php echo $rs['cdescript'];?></textarea>
        
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
</div></body>
</html>