<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$pagesize=30;
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
  $pt="aid";	
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
			 $whr="asktitle like '%$kwds%'"; 
		  }else{
			 $whr="askcontent like '%$kwds%'"; 
		  }
		 }else{
		   if($ttp==1){
			  $whr.=" or asktitle like '%$kwds%' ";
		   }else{
			  $whr.=" or askcontent like '%$kwds%' ";
		   }
		 }
	 }
	 $whr=" and ($whr)";
	}else{
		$skwd="";
	    $whr="";	
	}
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
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
</head>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<div id="man_zone">
<form id="form1" name="form1" method="get" action="">
  <table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td align="center"><input name="pt" type="hidden" value="<?php echo $pt;?>" />
       <input name="sno" type="hidden" id="sno" value="<?php echo $sno;?>" /> 问答搜索:
          <input name="skwd" type="text" id="skwd" value="<?php echo $skwd;?>" size="40"   /> 
      &nbsp;

      <label>

&nbsp;      </label>
      <select name="ttp" id="ttp">
      <option value="1" <?php if($ttp==1){ ?> selected="selected" <?php } ?>>搜标题</option>
        <option value="2"  <?php if($ttp==2){ ?> selected="selected" <?php } ?>>搜内容</option>
      </select>
&nbsp;

<input type="submit"  id="button" value="搜索文章" /></td>
    </tr>
  </table>
</form>
<script language="javascript">
  function checkall(){
	var a= document.getElementsByTagName("input");
	if(document.myform.ckall.checked){
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
 
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <th width="7%" bgcolor="#eeeeee">编号</th>
    <th width="34%" bgcolor="#eeeeee">贴子主题</th>
    <th width="7%" bgcolor="#eeeeee">所属版块</th>
    <th width="5%" bgcolor="#eeeeee">预览</th>
    <th width="7%" bgcolor="#eeeeee">发贴时间</th>
    <th width="7%" bgcolor="#eeeeee">回复时间</th>
    <th width="7%" bgcolor="#eeeeee">回复数量</th>
    <th width="6%" bgcolor="#eeeeee">最佳答案</th>
    <th width="7%" bgcolor="#eeeeee">推荐状态</th>
    <th width="6%" bgcolor="#eeeeee">审核情况</th>
    <th width="7%" bgcolor="#eeeeee">操作</th>
  </tr>
  <?php
  $sqlstr="select count(hid) as hnum,sum(hstate) as hstate,askid,kcid,asktitle,uid,kctitle,kcpagename,askcontent,askflag,askkwd,askname,askgg,askzd,askjh,asktime,askuptime,askhits,max(htime) as htime 
from 
( select hid,".$hbpre."ask.*,kctitle,kcpagename,(case when htime is null then asktime else htime end) as htime,(case when hstate=1 then 1 else 0 end) as hstate
	from ".$hbpre."ask_hf right outer join ".$hbpre."ask on ".$hbpre."ask.askid=".$hbpre."ask_hf.askid left outer join ".$hbpre."ask_kclass on ".$hbpre."ask.kcid=".$hbpre."ask_kclass.kcid )as aaa 
 where 1=1 $whr 
GROUP BY askid,kcid,asktitle,uid,askflag,askkwd,askname,askgg,askzd,askjh,asktime,askuptime,askhits,kctitle,kcpagename
 order by htime desc,askzd desc,askjh desc,asktime desc";
 //echo $sqlstr;
 //exit();
$pagecount=pagecount($pagesize);
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
  ?>
  <tr>
    <td align="center"><input type="checkbox" name="aid[]" id="aid<?php echo $rs['askid'];?>" value="<?php echo $rs['askid'];?>" />
      <label for="aid[]"></label>      <?php echo $rs['askid'];?></td>
    <td align="left" style="padding-left:10px"><a href="ask_hf.php?askid=<?php echo $rs['askid'];?>" onclick="window.open('','new','width=1000,height=700,left=50')" target="new"><?php echo $rs['asktitle'];?></a>
	<?php 
	if($rs['askjh']==1){
		echo "<span style=\"color:#ff0000\">(精)</span>";
	} ?>	<?php 
	if($rs['askgg']==1){
		echo "<span style=\"color:#ff00ff\">(公告)</span>";
	} ?></td>
    <td align="center" style="padding-left:10px"><a href="ask_article.php?kcid=<?php echo $rs['kcid'];?>" target="_blank"><?php echo $rs['kctitle'];?></a></td>
    <td align="center" style="padding-left:10px"><a href="/ask/peixun_detail.php?id=<?php echo $rs['askid'];?>" target="_blank">预览</a></td>
    <td align="center" nowrap="nowrap" style="padding-left:10px"><?php echo substr($rs['asktime'],0,10);?></td>
    <td align="center" nowrap="nowrap"><?php echo substr($rs['htime'],0,10);?></td>
    <td align="center">
    <a href="ask_hf.php?askid=<?php echo $rs['askid'];?>" onclick="window.open('','new','width=1000,height=700,left=50')" target="new"><?php
		echo $rs['hnum'];
	?>
		</a>
    </td>
    <td align="center">
    <?php
	if($rs['hstate']>0){
	  echo "已选";	
	}else{
	  echo "<span style=\"color:#ff0000\">未选</span>";	
	}
	?>
    </td>
    <td align="center"> <?php 
	if($rs['askzd']==1){
		echo "<span style=\"color:#ff00ff\">置顶</span>";
	}else{
		echo "正常";
	 }
	
	 ?></td>
    <td align="center">
	<?php 
	if($rs['askflag']==0){
		echo "<span style=\"color:#eeeeee\">未审核</span>";
	}else if($rs['askflag']==1){
		echo "<span style=\"color:#ff00ee\">已审核</span>";
	}else{
		echo "<span style=\"color:#ff0000\">站长推荐</span>";
		}
	
	 ?>
    </td>
    <td align="center"><a href="ask_article.php?kcid=<?php echo $rs['kcid'];?>&edit=<?php echo $rs['askid'];?>" target="_blank">修改</a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td align="center"><input type="checkbox" name="ckall" id="ckall" onclick="checkall()" />
      <label for="ckall">
        <input type="submit" name="mysz" id="mysz" value="确定" />
      </label></td>
    <td colspan="10" align="center"><?php echo showpage($pagecount);?></td>
    </tr>
</table> </form>
</div>
</body>
</html>
