<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); 
$pagesize=10;
if(isset($_GET['page'])){
   $page=$_GET['page'];
}else{
   $page=1;	
}

if(isset($_GET['tag'])){
  $tag=	trim(urlencode($_GET['tag']));
  $taga=$_GET['tag'];
}else{
  echo "<script language='javascript'>";
  echo "alert('参数不对');";
  echo "location='n_tags.php';";
  echo "</script>";
  exit();
}
require_once('hengboit_editor/fckeditor.php'); 
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "hb_article" ) )."/hengboit_editor/" ;

$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath = $sBasePath ;

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/' . preg_replace("/[^a-z0-9]/i", "", "office2003") . '/' ;

if(isset($_POST['id'])){
   $id=$_POST['id'];  
    $title=$_POST['title'];
  $cid=$_POST['cid'];

   if(isset($_POST['content'])){
	   $content=$_POST['content'];
  	$content=str_replace("'","\'",$content);
 }else{
	 $content="";  
	}
   $cid=$_POST['cid'];
   if(isset($_POST['seotitle'])){
	   $seotitle=$_POST['seotitle'];
		$kwd=$_POST['kwd'];
   }else{
	   $seotitle="";
	   $kwd="";
	}
   if(isset($_POST['descript'])){
		$descript=$_POST['descript'];
   }else{
	  $descript="";
	  }
   if(isset($_POST['url'])){
   $url=$_POST['url'];
   }else{
   $url="";
	  }
    $sortnum=$_POST['sortnum'];
   $state=$_POST['state'];

   $sqlstr="update ".$hbpre."article set title='$title',content='$content',seotitle='$seotitle',descript='$descript',kwd='$kwd',url='$url',sortnum=$sortnum,state=$state,uptime=now(),cid=$cid where id=$id";
   mysql_query($sqlstr);
   echo "<script language='javascript'>"; 
   echo "location='hb_article_tag.php?tag=".$tag."';";
   echo "</script>";
}
if(isset($_POST['mydel'])){
	$cid=$_POST['cid'];
 if(isset($_POST['aid'])){
	   foreach($_POST['aid'] as $v){
		$sqlstr="delete from ".$hbpre."article where id=".$v;
		mysql_query($sqlstr);
	  }	
 }
   echo "<script language='javascript'>";
   echo "location='hb_article_tag.php?tag=".$tag."';";
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
<body>
<div id="man_zone">
<table width="98%" border="0" align="center"  cellpadding="5" cellspacing="0">
  <tr>
    <td>当前位置：TAG文章管理</td>
    <td>&nbsp;</td>
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
   <form name="myform" action="" id="myform" method="post">
 <tr>
    <th width="61%" bgcolor="#EEEEEE">标题</th>
    <th width="19%" bgcolor="#EEEEEE">当前状态</th>
    <th width="20%" bgcolor="#EEEEEE">缩略图</th>
  </tr>
  
  <input name="cid" type="hidden" value="<?php echo $cid;?>" />
  <?php
  $sqlstr="select * from ".$hbpre."article where id in(select id from ".$hbpre."tag where tag='$taga')  order by sortnum asc, id desc";
  //echo $sqlstr;
  //exit();
  $pagecount=pagecount($pagesize);	
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="hb_article_tag.php?tag=<?php echo $tag;?>&amp;edit=<?php echo $rs['id'];?>"><?php echo $rs['title'];?></a></td>
    <td align="center" bgcolor="#FFFFFF">
    <?php
	 if($rs['state']==0){
	   echo "<font color='#666666'>不显示</font>";	 
	 }else if($rs['state']==1){
		echo "显示"; 
	 }else{
	   echo "<font color='#00ff00'>优先显示</font>";	 
	 }
	?>
    
    </td>
    <td align="center" bgcolor="#FFFFFF">
    <a href="hb_article_uppic.php?id=<?php echo $rs['id'];?>" onclick=window.open('','new','width=500') target=new>
	<?php
	 if($rs['pic']==''){
	  echo "无图";	 
	 }else{
	  echo "有图";
	 }
	?>
    </a>
    
    </td>
  </tr>
  <?php
  }
  ?>
  <tr>
  	<td colspan="5" bgcolor="#FFFFFF"><div style="text-align:center"><?php echo showpage($pagecount);?></div></td>
  	</tr>
  </form>
</table>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center"><input type="button" name="button3" onclick="window.opener.location.reload(true);window.close()" id="button3" value=" 关 闭 当 前 页 " /></td>
  </tr>
</table>
<?php
}
?>
<?php
if(isset($_GET['edit'])){
  $edit=$_GET['edit'];
  $sqlstr="select ".$hbpre."article.*,mx from ".$hbpre."article join ".$hbpre."class on ".$hbpre."article.cid=".$hbpre."class.cid where id=$edit";
  $query=mysql_query($sqlstr);
  $rs=mysql_fetch_array($query);
?>
<table width="98%"  bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
  <form id="form2" name="form2" method="post" action="">
  <tr>
      <td width="15%" align="right" bgcolor="#F3F3F3">文章标题：</td>
      <td width="85%" bgcolor="#FFFFFF"><label>
        <input name="title" type="text" id="title" size="70" value="<?php echo $rs['title'];?>" />
        <input name="cid" type="hidden" id="cid" value="<?php echo $rs['cid'];?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $edit;?>" />
      权重：
      <input name="sortnum" type="text" id="sortnum" value="<?php echo $rs['sortnum'];?>" size="5" />
权重越小，排序越靠前</label></td>
    </tr>
     <tr>
       <td align="right" bgcolor="#F3F3F3">当前状态：</td>
       <td bgcolor="#FFFFFF"><label>
         <input type="radio" name="state" value="0" id="state_1"  <?php if($rs['state']==0){ ?> checked="checked" <?php } ?>/>
         不显示</label>
         <label> </label>
         <label>
           <input name="state" type="radio" id="state_2" value="1" <?php if($rs['state']==1){ ?> checked="checked" <?php } ?> />
           显示</label>
         <label>
           <input type="radio" name="state" value="2" id="state_3"  <?php if($rs['state']==2){ ?> checked="checked" <?php } ?> />
       优先显示</label></td>
     </tr>
 	<?php
	if(substr($rs['mx'],4,1)==1){
	?>
    <tr>
      <td align="right" bgcolor="#F3F3F3">跳转URL地址：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="url" type="text" id="url" size="60" value="<?php echo $rs['url'];?>" />
      (如：http://www.cycf.org.cn/index.html
      )</label></td>
    </tr>
	<?php
	}
	if(substr($rs['mx'],1,1)==1){
	?>
     <tr>
      <td align="right" bgcolor="#F3F3F3">seo标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="seotitle" type="text" id="seotitle" size="70"  value="<?php echo $rs['seotitle'];?>" />
      </label></td>
    </tr>

    <tr>
      <td align="right" bgcolor="#F3F3F3">关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kwd" type="text" id="kwd" size="70"  value="<?php echo $rs['kwd'];?>" />
      </label></td>
    </tr>
    <?php
	}
	?> 
  <?php
	if(substr($rs['mx'],2,1)==1){
	?>
 
      <tr>
      <td align="right" bgcolor="#F3F3F3">描&nbsp;&nbsp;&nbsp;述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="descript" id="descript" cols="68" rows="4"><?php echo $rs['descript'];?></textarea>
        <input type="submit" name="button4" id="button4" value="提交" />
      </label></td>
    </tr>
    <?php
	}
	?> 
  <?php
	if(substr($rs['mx'],3,1)==1){
	?>
    <tr>
      <td align="right" bgcolor="#F3F3F3">文章内容：</td>
      <td bgcolor="#FFFFFF"><label>

 <?php
$oFCKeditor->Value = $rs['content'] ;
$oFCKeditor->Create() ;
?>
      </label></td>
    <?php
	}
	?> 
    </tr>
    <tr>
      <td align="right" bgcolor="#F3F3F3">&nbsp;</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="submit" name="button" id="button" value="提交" />
      &nbsp;
      <input type="reset" name="button2" id="button2" value="重置" />
      </label></td>
    </tr>
</form>
  </table>
<?php
}
?>
</div>
</body>
</html>