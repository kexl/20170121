<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
if(isset($_GET['edit'])){
	$tuid=$_GET['edit'];
}else{
	echo "<script language=\"javascript\">";
	echo "alert('参数不对');";
	echo "</script>";
	exit();	
}
$sqlstr="select * from ".$hbpre."tagurl where tuid=$tuid";
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
$tag=$rs['tag'];
$tagurl=$rs['tagurl'];
$idstr=$rs['idstr'];
$aidstr=$rs['aidstr'];
$descript=$rs['descript'];
if(isset($_POST['tagtitle'])){
	$tuid=$_POST['tuid'];
 $tagtitle=$_POST['tagtitle'];
 $id=$_POST['id'];
 $aid=$_POST['aid'];
 $descript=$_POST['descript'];
 $tagurl=$_POST['tagurl'];
 $sqlstr="update ".$hbpre."tagurl set tag='$tagtitle',idstr='$id',aidstr='$aid',descript='$descript',tagurl='$tagurl' where tuid=$tuid";
 mysql_query($sqlstr);
	  echo "<script language='javascript'>";
	  echo "window.opener.location.reload(true);";
	  echo "window.close();";
	  echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
      <td width="11%" align="right" nowrap="nowrap" bgcolor="#F6F6F6">关键词:</td>
      <td width="89%" bgcolor="#FFFFFF"><label>
        <?php echo $tag;?><input name="tagtitle" type="hidden" id="tagtitle" value="<?php echo $tag;?>" size="40" />
        <input name="tuid" type="hidden" id="tuid" value="<?php echo $tuid;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap" bgcolor="#F6F6F6">相关文章:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="id" type="text" id="id" size="80" value="<?php echo $idstr;?>" />
      <a href="hb_article_sz.php?sno=1&pt=id&skwd=<?php echo urlencode(trim($tag));?>" onclick=window.open('','new','width=800,height=600,scrollbars=1') target=new >选择文章</a> </label></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap" bgcolor="#F6F6F6">相关问答:</td>
      <td bgcolor="#FFFFFF"><label for="aid"></label>
      <input name="aid" type="text" id="aid" size="80" value="<?php echo $aidstr;?>" />
      <a href="ask_sz.php?sno=1&pt=aid&skwd=<?php echo urlencode(trim($tag));?>" onclick=window.open('','new','width=800,height=600,scrollbars=1') target=new >选择问题</a></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap" bgcolor="#F6F6F6">指定URL:</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="tagurl" type="text" id="tagurl" size="50" value="<?php echo $tagurl;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap" bgcolor="#F6F6F6">专题描述：</td>
      <td bgcolor="#FFFFFF"><label for="descript"></label>
      <textarea name="descript" id="descript"  cols="80" rows="5"><?php echo $descript;?></textarea></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap" bgcolor="#F6F6F6">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button2" id="button2" value="提交" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>