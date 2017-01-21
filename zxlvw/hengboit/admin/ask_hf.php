<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); 
if(isset($_GET['askid'])){
	$askid=	$_GET['askid'];
}else{
	echo "<script language=\"javascript\">";
	echo "alert('参数不对');";
	echo "</script>";
	exit();
}
if(isset($_GET['hid'])){
	$hid=$_GET['hid'];
}else{
	$hid=0;
}
$sqlstr="select * from ".$hbpre."ask where askid=".$askid;
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
$asktitle=$rs['asktitle'];
$askcontent=$rs['askcontent'];
$asktime=$rs['asktime'];
$askname=$rs['askname'];
$sqlstr="select count(hid) from ".$hbpre."ask_hf where askid=".$askid." and hstate=1";
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
$hnum=$rs[0];
if(isset($_GET['dhid'])){
	$dhid=$_GET['dhid'];
	$sqlstr="update ".$hbpre."ask_hf set hstate=0 where hid=".$dhid;
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?askid=".$askid."';";
	echo "</script>";
}
if(isset($_GET['add'])){
	$hname="热心网友";
	$sqlstr="insert into ".$hbpre."ask_hf(askid,hname,hflag,htime)values($askid,'$hname',1,now())";
	mysql_query($sqlstr);
	//exit();
	echo "<script language=\"javascript\">";
	echo "location='?askid=".$askid."';";
	echo "</script>";
}
if(isset($_GET['hstate'])){
	$hstate=$_GET['hstate'];
	$sqlstr="update ".$hbpre."ask_hf set hstate=1 where hid=".$hstate;
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?askid=".$askid."';";
	echo "</script>";
}
if(isset($_GET['del'])){
	$del=$_GET['del'];
	$sqlstr="delete from  ".$hbpre."ask_hf  where hid=".$del;
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?askid=".$askid."';";
	echo "</script>";
}
if(isset($_POST['hid'])){
	$hid=$_POST['hid'];
	$hname=$_POST['hname'];
	if(strlen($hname)<3){
		$hname='热心网友';	
	}
	$hdd=$_POST['hdd'];
	$hcc=$_POST['hcc'];
	$hcontent=$_POST['hcontent'];
	$hflag=$_POST['hflag'];
	$sqlstr="update ".$hbpre."ask_hf set hname='$hname',hdd='$hdd',hcc='$hcc',hcontent='$hcontent',hflag=$hflag where hid=$hid";
		//echo $sqlstr;
	//exit();

	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?askid=".$askid."';";
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
.tt{ background:#F2FBF9}
.tt *,.hf *{ padding:0px; margin:0px;}
.hf dd{ border-top:dashed 1px #CCCCCC; padding:10px 30px;}

</style>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.configa.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="../../js/jquery-1.4.4.min.js"></script>
</head>
<body onunload="window.opener.location.reload(true);">
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>当前位置：<?php echo $asktitle;?>  &gt;&gt; 回复管理 <a href="?askid=<?php echo $askid;?>&amp;add=1">[添加回复]</a></td>
  </tr>
</table>
<dl class="tt" style="padding:20px;">
	<dt><h2>主题：<?php echo $asktitle;?></h2></dt>
    <dd>补充内容：<?php echo $askcontent;?></dd>
    <div style="height:30px; line-height:30px;"><span style="float:left">发布人：<?php echo $askname;?></span><span  style="float:right">发布时间：<?php echo $asktime;?></span>  </div>
</dl>
<dl class="hf" style="padding:0px 20px">
	<dt><h2 style="height:30px; line-height:30px; font-size:14px;">网友回复</h2></dt>
    <?php
	$sqlstr="select * from ".$hbpre."ask_hf where askid=".$askid." order by hstate desc,htime asc";
	$query=mysql_query($sqlstr);
	$i=1;
	while($rs=mysql_fetch_array($query)){
	?>
    <form id="formhf<?php echo $rs['hid'];?>"  name="fromhf<?php echo $rs['hid'];?>" action="" method="post">
    <dd class="content" id="content<?php echo $i;?>" <?php if($rs['hstate']==1){  echo "style=\"background:#D6F5FC\"";} ?>>
<div style="background:#F3F3F3; padding-top:5px; height:60px;">
    	<span style="float:left; padding-right:30px;">回复人：<input type="text" value="<?php echo $rs['hname'];?>" name="hname" /></span> 
         <span style="float:left; padding-right:30px;">回复时间 <?php echo $rs['htime'];?>
         <input name="hid" type="hidden" id="hid" value="<?php echo $rs['hid'];?>" />
         </span>    
         <span style="float:left; padding-right:30px;">审核状态:<input type="radio" name="hflag" value="0" <?php if($rs['hflag']==0){ echo "checked=checked"; }?> />未审核
          <input type="radio" name="hflag" value="1" <?php if($rs['hflag']==1){ echo "checked=checked";}?> />已审核 </span><span style="float:right;"> 
         <input type="button" value="删除回复"  onclick="location='?askid=<?php echo $askid;?>&del=<?php echo $rs['hid'];?>'" />
       <?php
		if($rs['hstate']==1){
		?>
        <input type="button" value="取消最佳答案"  onclick="location='?askid=<?php echo $askid;?>&dhid=<?php echo $rs['hid'];?>'" />
        <?php } ?>
         <?php
		if($hnum<1){
		?>
        <input type="button" value="选为最佳答案"  onclick="location='?askid=<?php echo $askid;?>&hstate=<?php echo $rs['hid'];?>'" />
        <?php } ?> <input type="button" value="修改内容"  onclick="location='?askid=<?php echo $askid;?>&hid=<?php echo $rs['hid'];?>'" /></span>
        <div style="clear:both; height:25px; padding-top:5px;">
        <span style=" float:left; ">
        	顶贴:<input type="text" id="hdd" name="hdd" value="<?php echo $rs['hdd']?>"  /> 
        </span>
         <span style=" float:left; padding-left:30px">
        	踩贴:<input type="text" id="hcc" name="hcc" value="<?php echo $rs['hcc']?>"  /> 
        </span>
       </div>
    </div>    
	<?php if($rs['hstate']==1){ ?><h3 style="color:#990000">最佳答案:</h3>  <?php } ?>
    <?php
		if($rs['hid']==$hid){
	?>
 <script id="editor"  type="text/plain" name="hcontent" style="width:800px;height:200px;"> <?php echo $rs['hcontent'];?></script>
 <div  style="text-align:center"><input type="submit" value="确认修改" /></div>
  
    <?php
		}else{
		?>
        <?php echo $rs['hcontent'];?>
        <?php
		}
		?>
	</dd>
    
    
    
    </form>
    <?php
	$i++;
	}
	?>
</dl>
<div style="text-align:right; padding:5px 40px;"><input type="button" style="width:100px; padding:5px 10px;" value="关闭当前页" onclick="window.close()" /></div>
</div>
<script type="text/javascript">
    var ue=UE.getEditor('editor');
</script>
</body>
</html>
