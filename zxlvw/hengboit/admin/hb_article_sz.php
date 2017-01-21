<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$pagesize=15;
if(isset($_GET['sno'])){
  $sno=$_GET['sno'];	
}else{
	 echo "<script language='javascript'>";
	 echo "alert('参数不对');";
	 echo "window.close();";
	 echo "</script>";
}
if(isset($_GET['pt'])){
  $pt=$_GET['pt'];	
}else{
  $pt="lid";	
}

 if(isset($_GET['skwd'])){
	 if(isset($_GET['ttp'])){
		$ttp=$_GET['ttp'];
	}else{
		$ttp=1;	
	}
   if($_GET['skwd']!=""){
	$skwd=$_GET['skwd'];
	$skwd=str_replace(" ",",",str_replace("，",",",$skwd));
	$kwdarr=explode(",",$skwd);
	
	foreach($kwdarr as $k=>$kwds){
	  if($k==0){
		  if($ttp==1){
			 $whr="title like '%$kwds%'"; 
		  }else{
			 $whr="content like '%$kwds%'"; 
		  }
		 }else{
		   if($ttp==1){
			  $whr.=" or title like '%$kwds%' ";
		   }else{
			  $whr.=" or content like '%$kwds%' ";
		   }
		 }
	 }
	 $whr=" and ($whr)";
	}else{
		$skwd="";
	 $whr="";	
	}
 }else{
	$skwd="";
	 $whr="";	
 }
if(isset($_POST['mysz'])){
	$i=1;
   foreach($_POST['aid'] as $id){
	  if($i==1){
		$idstr=$id; 
	  }else{
		$idstr.=",".$id ;
	  }
	$i++;
	}	
	echo "<script language='javascript'>";
	echo "aa=window.opener.document.form".$sno.".".$pt.".value;";
	echo "if(aa.length>1){";
	echo "window.opener.document.form".$sno.".".$pt.".value=aa+',".$idstr."';";
	echo "}else{";
	echo "window.opener.document.form".$sno.".".$pt.".value='".$idstr."';";
	echo "}";
	echo "window.close();";
	echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
.aa {
	color: #FFF;
}
body,td,th {
	font-size: 12px;
}
p{ margin:0px; padding:0px;}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="get" action="">
  <table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td align="center"><input name="sno" type="hidden" id="sno" value="<?php echo $sno;?>" /><input name="pt" type="hidden" value="<?php echo $pt;?>" />
        文章搜索:
      <input name="skwd" type="text" id="skwd" value="<?php echo $skwd;?>" size="40"  /> &nbsp;
      <select name="ttp" id="ttp">
        <option value="1" <?php if($ttp==1){ ?> selected="selected" <?php } ?>>搜标题</option>
        <option value="2"  <?php if($ttp==2){ ?> selected="selected" <?php } ?>>搜内容</option>
      </select>
&nbsp;
<input type="submit"  id="button" value="搜索文章" /></td>
    </tr>
  </table>
</form>
<table width="95%" border="0" align="center" bgcolor="#bbbbbb" cellpadding="5" cellspacing="1">
  <script language=javascript>
	function checkall()
	{
	   var a = document.getElementsByTagName("input");//getElementsByTagName传回指定名称的元素集合,是一种方法
	   //alert(document.getElementsByName("checkALL").checked);
	   if(myform.checkbox.checked)
	   {
		   for (var i=0; i<a.length; i++)
		   if (a[i].type == "checkbox") a[i].checked = true;
	   }
	   else
	   {
		  for (var i=0; i<a.length; i++)
		   if (a[i].type == "checkbox") a[i].checked = false;
	   }
	}

	</script>
  <form id="myform" name="myform" method="post" action="">
    <tr class="aa">
      <td width="11%" align="center" bgcolor="#006699">文章ID</td>
      <td width="42%" align="center" bgcolor="#006699">文章标题</td>
      <td width="12%" align="center" bgcolor="#006699">所属类别</td>
      <td width="11%" align="center" bgcolor="#006699">缩略图</td>
      <td width="12%" align="center" bgcolor="#006699">当前状态</td>
    </tr>
    <?php 
  $sqlstr="select ".$hbpre."article.*,ctitle from ".$hbpre."article left join ".$hbpre."class on ".$hbpre."article.cid=".$hbpre."class.cid where ".$hbpre."article.state=1 $whr order by ".$hbpre."article.sortnum asc,uptime desc";
  //echo $sqlstr;
  //exit();
  $pagecount=pagecount($pagesize);
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
    <tr>
      <td align="center" bgcolor="#FFFFFF">
        <input name="aid[]" type="checkbox"  value="<?php echo $rs['id'];?>" />
        <?php echo $rs['id'];?></td>
      <td align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;<?php echo $rs['title'];?>&nbsp;<a href="hb_article_sz.php?edit=<?php echo $rs['id'];?>">[修改]</a>&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF"><a href="#"><?php echo $rs['ctitle'];?></a></td>
      <td align="center" bgcolor="#FFFFFF"><a href="hb_article_uppic.php?id=<?php echo $rs['id'];?>" onclick=window.open('','new','width=500,scrollbars=yes') target=new>
        <?php 
	  if($rs['pic']==""){
		  echo "无";
		  }else{
		echo "<font color='#0000ff'>有图</font>";
		}
	  ?>
      </a></td>
      <td align="center" bgcolor="#FFFFFF"><?php 
	  
	  if($rs['state']==0){
		echo "不推荐";  
	  }else if($rs['state']==1){
		  echo "<font color='#0000ff'>推荐</font>";  
	 }else{
		  echo "<font color='#ff0000'>重点推荐</font>";  
		 }
	  
	  
	  ?></td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td align="center" bgcolor="#FFFFFF">
        <input type="checkbox" name="checkbox" id="checkbox" onclick="return checkall();" />
        <input type="submit" name="mysz" id="mysz" value="确定" />
        &nbsp;</td>
      <td colspan="5" align="center" bgcolor="#FFFFFF"><?php echo showpage($pagecount);?></td>
    </tr>
  </form>
</table>
</body>
</html>