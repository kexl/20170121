<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); 
require_once('hengboit_editor/fckeditor.php'); 
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "hb_article" ) )."/hengboit_editor/" ;

$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->BasePath = $sBasePath ;

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/' . preg_replace("/[^a-z0-9]/i", "", "office2003") . '/' ;
?>
<?php
$pagesize=10;
if(isset($_GET['cid'])){
	$cid=$_GET['cid'];
}else{
	$cid=4;	
}
$sqlstr="select * from ".$hbpre."class where cid=$cid";
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
 $ctitle=$rs['ctitle'];
 $bid=$rs['bid'];
 $mx=$rs['mx'];


if(isset($_POST['ddd'])){
   $title=$_POST['title'];
   if(isset($_POST['content'])){
	   $content=$_POST['content'];
   }else{
	 $content="";  
	}
	$content=str_replace("'","\'",$content);
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
	   $price=$_POST['price'];
	   $danwei=$_POST['danwei'];
   }else{
	   $url="";
	   $price=0;
	   $danwei="";
	}
   if(isset($_POST['likeart'])){
	  $likeart=$_POST['likeart'];  
	}else{
		$likeart="";
	 }
   $sortnum=$_POST['sortnum'];
   $state=$_POST['state'];
   $sqlstr="insert into ".$hbpre."article(cid,title,content,ctime,uptime,seotitle,descript,kwd,url,price,danwei,sortnum,state,likeart)values($cid,'$title','$content',now(),now(),'$seotitle','$descript','$kwd','$url',$price,'$danwei',$sortnum,$state,'$likeart')";
   mysql_query($sqlstr);
   echo "<script language='javascript'>";
   echo "location='hb_article.php?cid=".$cid."';";
   echo "</script>";
}
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
	   $price=$_POST['price'];
	   $danwei=$_POST['danwei'];
   }else{
	   $url="";
	   $price=0;
	   $danwei="";
	}
   if(isset($_POST['likeart'])){
	  $likeart=$_POST['likeart'];  
	}else{
		$likeart="";
	 }
    $sortnum=$_POST['sortnum'];
   $state=$_POST['state'];

   $sqlstr="update ".$hbpre."article set title='$title',content='$content',seotitle='$seotitle',likeart='$likeart',descript='$descript',kwd='$kwd',url='$url',price=$price,danwei='$danwei',sortnum=$sortnum,state=$state,uptime=now(),cid=$cid where id=$id";
   mysql_query($sqlstr);
   echo "<script language='javascript'>"; 
   echo "location='hb_article.php?cid=".$cid."';";
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
   echo "location='hb_article.php?cid=".$cid."';";
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
<script language="javascript" src="hengboit_editor/ToolTip.js"></script>
<div id="man_zone">
<table width="98%" border="0" align="center"  cellpadding="5" cellspacing="0">
  <tr>
    <td>当前位置： <?php echo $ctitle;?> 文章管理
    <?php
	if(substr($mx,0,1)==1||  $_SESSION['uflag']==9){
	?>
     <a href="?cid=<?php echo $cid;?>&add=1">&nbsp;[添加文章]</a>
     <?php
	}
	?></td>
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
    function likart(){
	 kwd=document.form1.kwd.value; 
	window.open("n_article_sz.php?sno=1&pt=likeart&skwd="+kwd,'new','width=800,scrollbars=yes');
	 }
</script>
   <form name="myform" action="" id="myform" method="post">
 <tr>
    <th width="10%" bgcolor="#EEEEEE">文章编号
    <th width="47%" bgcolor="#EEEEEE">标题</th>
    <th width="10%" bgcolor="#EEEEEE">当前状态</th>
    <?php
	if(substr($mx,5,1)==1){
	?>
    <th width="11%" bgcolor="#EEEEEE">缩略图</th>
    <th width="7%" bgcolor="#EEEEEE">大图</th>
    <?php
	}
	?>
    <th width="15%" bgcolor="#EEEEEE">操作</th>
  </tr>
  
  <input name="cid" type="hidden" value="<?php echo $cid;?>" />
  <?php
  $sqlstr="select * from ".$hbpre."article where cid=$cid order by sortnum asc, id desc";
  $pagecount=pagecount($pagesize);	
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF">
    <?php
	if(substr($mx,0,1)==1 ||  $_SESSION['uflag']==9){
	?>
      <input type="checkbox" name="aid[]"  value="<?php echo $rs['id'];?>" />
    <?php
	}
	?>
	<?php echo $rs['id'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $rs['title'];?></td>
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
        <?php
	if(substr($mx,5,1)==1){
	?>

    <td align="center" bgcolor="#FFFFFF"
    <?php
	if($rs['pic']!=""){
	?>
     onMouseOver="toolTip('<img src=<?php echo $rs['pic'];?> width=100 >');"  onMouseOut="toolTip();"
     <?php } ?>
     >
    <a href="hb_article_uppic.php?id=<?php echo $rs['id'];?>" onclick=window.open('','new','width=500') target=new>
	<?php
	 if($rs['pic']==''){
	  echo "无图";	 
	 }else{
     	echo "<img src=\"".$rs['pic']."\" height='40'>";
	 }
	?>
    </a>
    
    </td>
    <td align="center">
	    <a href="hb_article_uppic2.php?id=<?php echo $rs['id'];?>" onclick=window.open('','new','width=500') target=new>
<?php
	 if($rs['pic2']==''){
	  echo "无图";	 
	 }else{
     	echo "<img src=\"".$rs['pic2']."\" height='40'>";
	 }
	?>
        </a>

    </td>
    <?php
	}
	?>
    <td align="center" bgcolor="#FFFFFF"><a href="?cid=<?php echo $cid;?>&amp;edit=<?php echo $rs['id'];?>">修改</a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
  	<td bgcolor="#FFFFFF"><label>
        <?php
	if(substr($mx,0,1)==1 || $_SESSION['uflag']==9){
	?>
  	  <input type="checkbox" name="all" id="all" onclick="checkall()" />
  	  <input name="mydel" type="submit" id="mydel" value=" 删除所选 " />
      <?php
	}
	?>
  	</label></td>
  	<td colspan="5" bgcolor="#FFFFFF"><div style="text-align:center"><?php echo showpage($pagecount);?></div></td>
  	</tr>
  </form>
</table>
<?php
}
?>
<?php
if(isset($_GET['add'])){
?>

  <table width="98%"  bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
  <script language="javascript">
      function likart(){
	 kwd=document.form1.kwd.value; 
	window.open("hb_article_sz.php?sno=1&pt=likeart&skwd="+kwd,'new','width=800,scrollbars=yes');
	 }
  </script>
 <form id="form1" name="form1" method="post" action="">
   <tr>
      <td width="14%" align="center" bgcolor="#F3F3F3">文章标题：</td>
      <td width="86%" bgcolor="#FFFFFF"><label>
        <input name="title" type="text" id="title" size="70" />
        <input name="cid" type="hidden" id="cid" value="<?php echo $cid;?>" />
        <input name="ddd" type="hidden" id="ddd" value="1" />
      权重：
      <input name="sortnum" type="text" id="sortnum" value="50" size="5" />
      权重越小，排序越靠前</label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">文章状态：</td>
      <td bgcolor="#FFFFFF">
          <input type="radio" name="state" value="0" id="state_1" />
不显示
          <input name="state" type="radio" id="state_0" value="1" checked="checked" />
          显示
          <input type="radio" name="state" value="2" id="state_2" />
          优先显示
     </td>
    </tr>
       <?php
	if(substr($mx,4,1)==1){
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">产品网店网址：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="url" type="text" id="url" size="60" />
      (如：http://www.cycf.org.cn/index.html
      )</label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">产品单价：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="price" type="text" id="price" size="10" />
        &nbsp;/</label>
        <select name="danwei" id="danwei">
        <option value="箱" selected="selected">箱</option>
        <option value="kg">kg</option>
        <option value="吨">吨</option>
        <option value="袋">袋</option>
    </select>
        (
<label for="danwei"></label>如：23.02元)</td>
    </tr>    <?php
	}
	?>
    <?php
	if(substr($mx,1,1)==1){
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">seo标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="seotitle" type="text" id="seotitle" size="70" />
      </label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">关键词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kwd" type="text" id="kwd" size="70" />
      </label></td>
    </tr>
    <?php
	}
	?>
    <?php
	if(substr($mx,1,1)==1){
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">描&nbsp;&nbsp;&nbsp;述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="descript" id="descript" cols="68" rows="3"></textarea>
        <input type="submit" name="button3" id="button3" value="提交" />
      </label></td>
    </tr>
    <?php
	}
	?>
    <?php
	if(substr($mx,3,1)==1){
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">相关文章： </td>
      <td bgcolor="#FFFFFF"><input name="likeart" type="text" id="likeart" size="80" />
        <input type="button" name="button5" id="button5" style="height:25px; line-height:20px;"  onclick="likart();" value="选择文章" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">文章内容：</td>
      <td bgcolor="#FFFFFF">
<?php
$oFCKeditor->Value = '' ;
$oFCKeditor->Create() ;
?>
     </td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">&nbsp;</td>
      <td bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="42%" align="center"><input type="submit" name="button7" id="button7" value="提交" />
&nbsp;
<input type="reset" name="button7" id="button8" value="重置" /></td>
          <td width="58%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
</form>
  </table>
<p>
  <?php
}
?>
</p>
<?php
if(isset($_GET['edit'])){
  $edit=$_GET['edit'];
  $sqlstr="select * from ".$hbpre."article where id=$edit";
  $query=mysql_query($sqlstr);
  $rs=mysql_fetch_array($query);
?>

<table width="98%"  bgcolor="#CCCCCC" border="0" align="center" cellpadding="5" cellspacing="1">
<script language="javascript">
    function likart(){
	 kwd=document.form2.kwd.value; 
	window.open("hb_article_sz.php?sno=2&pt=likeart&skwd="+kwd,'new','width=800,scrollbars=yes');
	 }

</script>
  <form id="form2" name="form2" method="post" action="">
  <tr>
      <td width="15%" align="center" bgcolor="#F3F3F3">文章标题：</td>
      <td width="85%" bgcolor="#FFFFFF"><label>
        <input name="title" type="text" id="title" size="70" value="<?php echo $rs['title'];?>" />
        <input name="cid" type="hidden" id="cid" value="<?php echo $rs['cid'];?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $edit;?>" />
      权重：
      <input name="sortnum" type="text" id="sortnum" value="<?php echo $rs['sortnum'];?>" size="5" />
权重越小，排序越靠前</label></td>
    </tr>
     <tr>
       <td align="center" bgcolor="#F3F3F3">当前状态：</td>
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
	if(substr($mx,4,1)==1){
	?>
     <tr>
      <td align="center" bgcolor="#F3F3F3">产品网店网址：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="url" type="text" id="url" size="60" value="<?php echo $rs['url'];?>" />
      (如：http://www.cycf.org.cn/index.html
      )</label></td>
    </tr>
        <tr>
      <td align="center" bgcolor="#F3F3F3">产品单价：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="price" type="text" id="price" size="10" value="<?php echo $rs['price'];?>" />
        &nbsp;/</label>
        <select name="danwei" id="danwei">
        <option value="箱" <?php if($rs['danwei']=='箱') echo "selected=\"selected\"";?>>箱</option>
        <option value="kg"  <?php if($rs['danwei']=='kg') echo "selected=\"selected\"";?>>kg</option>
        <option value="吨  <?php if($rs['danwei']=='吨') echo "selected=\"selected\"";?>">吨</option>
        <option value="袋"  <?php if($rs['danwei']=='袋') echo "selected=\"selected\"";?>>袋</option>
    </select>
        (
<label for="danwei"></label>如：23.02元)</td>
    </tr>
    <?php
	}
	?>
    <?php
	if(substr($mx,1,1)==1){
	?>

     <tr>
      <td align="center" bgcolor="#F3F3F3">seo标题：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="seotitle" type="text" id="seotitle" size="70"  value="<?php echo $rs['seotitle'];?>" />
      </label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">关 键 词：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="kwd" type="text" id="kwd" size="70"  value="<?php echo $rs['kwd'];?>" />
      </label></td>
    </tr>
    <?php
	}
	?>
       <?php
	if(substr($mx,2,1)==1){
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">描&nbsp;&nbsp;&nbsp;述：</td>
      <td bgcolor="#FFFFFF"><label>
        <textarea name="descript" id="descript" cols="68" rows="3"><?php echo $rs['descript'];?></textarea>
        <input type="submit" name="button4" id="button4" value="提交" />
      </label></td>
    </tr>
	<?php
	}
	?>
       <?php
	if(substr($mx,3,1)==1){
	?>
      <tr>
         <td align="center" bgcolor="#F3F3F3">相关文章： </td>
        <td bgcolor="#FFFFFF"><input name="likeart" type="text" id="likeart" value="<?php echo $rs['likeart'];?>" size="80" />
        <input type="button" name="button6" id="button6" value="选择文章"  onclick="likart();" /></td>
      </tr>
      <tr>
      <td align="center" bgcolor="#F3F3F3">文章内容：</td>
      <td bgcolor="#FFFFFF"><label>
 <?php
$oFCKeditor->Value = $rs['content'] ;
$oFCKeditor->Create() ;
?>
      </label></td>
    </tr>
    <?php
	}
	?>
    <tr>
      <td align="center" bgcolor="#F3F3F3">&nbsp;</td>
      <td bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="41%" align="center"><input type="submit" name="button" id="button" value="提交" />
            &nbsp;
            <input type="reset" name="button" id="button2" value="重置" /></td>
          <td width="59%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
</form>
  </table>
<?php
}
?>
</div>
</body>
</html>