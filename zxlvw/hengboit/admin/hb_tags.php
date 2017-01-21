<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$pagesize=90;
if(isset($_POST['del'])){
	$i=0;
	foreach($_POST['deltag'] as $tag){
		$sqlstr="delete from  ".$hbpre."tag_main  where tag='".$tag."'";
		mysql_query($sqlstr);
	}
  echo "<script language='javascript'>";
  echo "alert('删除成功');";
  echo "location='hb_tags.php';";
  echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>tag管理</title>
<link rel="stylesheet" href="css/common.css" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
form{ margin:0px; padding:0px;}
-->
</style></head>

<body>
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td height="22" bgcolor="#F5F5F5">当前位置 : TAG标记管理  <a href="hb_tag_xf.php">[自动TAG]</a></td>
  </tr>
</table>
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
 <table width="98%" bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
  <?php
$sqlstr="select a.*,(case when tuid is null then 0 else tuid end) as tuid,idstr,aidstr,descript,tagurl
from (select sum(tnum) as num,tag from ".$hbpre."tag_main  group by tag order by sum(tid) desc) as a left join ".$hbpre."tagurl on a.tag=".$hbpre."tagurl.tag order by num desc,tuid desc";


  $pagecount=pagecount($pagesize);
$query=mysql_query($sqlstr);
$i=1;
while($rs=mysql_fetch_array($query)){
	if($i % 2==1) echo "<tr>";
?>
      <td bgcolor="#FFFFFF"><label>
        <input name="deltag[]" type="checkbox"  value="<?php echo $rs['tag'];?>" />
      </label>
        <?php echo $rs['tag'];?>(共<?php echo $rs['num'];?>条
         <a href="hb_article_tag.php?tag=<?php echo trim(urlencode($rs['tag']));?>"  onclick=window.open('','new','width=800,scrollbars=yes') target=new>查看文章</a>) 
         <?php
		 if($rs['tuid']==0){
		 ?>
        <a href="hb_tagurl.php?kwd=<?php echo urlencode(trim($rs['tag']));?>" onclick="window.open('','naa' ,'width=800,scrollbars=yes')" target="naa"><font color="#009999">添加链接</font></a>
       <?php	 
	 }else{
		 ?>
		 
        <?php
		if(strlen($rs['tagurl'])>5){
		?>
         <a href="hb_tagurl_edit.php?edit=<?php echo $rs['tuid'];?>" onclick="window.open('','naa' ,'width=800,scrollbars=yes')" target="naa" style="color:#FF0000">修改链接</a> &nbsp;<a href="<?php echo $rs['tagurl'];?>" target="_blank">查看链接</a>
		 <?php
			}else{
		?>
         <a href="hb_tagurl_edit.php?edit=<?php echo $rs['tuid'];?>" onclick="window.open('','naa' ,'width=800,scrollbars=yes')" target="naa" style="color:#00ff00">修改专题</a> &nbsp; <a href="/tag.php?id=<?php echo $rs['tuid'];?>" target="_blank">查看专题</a>
      
        <?php
		}
		
		?>
  
        <?php
	 }
	 
	 ?></td>
    
      <?php
 if($i% 2==0) echo "</tr>";
 $i++;
}
?>
  </table>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td width="13%"><label>
        <input type="checkbox" name="checkbox" id="checkbox"  onclick="return checkall();" />
        &nbsp;
        <input type="submit" name="del" id="del" value="删除所选" />
      </label></td>
      <td width="87%" align="center"><?php echo  showpage($pagecount);?></td>
    </tr>
  </table></form>
</div>
</body>
</html>