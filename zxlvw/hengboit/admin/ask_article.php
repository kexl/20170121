<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$pagesize=30;
require_once('hengboit_editor/fckeditor.php'); 
if(isset($_GET['kcid'])){
	$kcid=$_GET['kcid'];	
}else{
	$kcid=0;
}
if($kcid!=0){
	$sqlstr="select kcid,kctitle,kbid,kcflag from ".$hbpre."ask_kclass where kcid=$kcid";
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	$kcflag=$rs['kcflag'];
}else{
	$kcflag=1;
}
function askload($kcid){
	global $hbpre;
	$str="";
	$sqlstr="select kcid,kctitle,kbid from ".$hbpre."ask_kclass where kcid=$kcid";
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	$str.="<a href=\"ask_article.php?kcid=".$rs['kcid']."\">".$rs['kctitle']."</a>";
	if($rs['kbid']!=0){
		$str=askload($rs['kbid'])." >> ".$str;	
	}
	return $str;
}
if(isset($_POST['ddd'])){
	$kcid=$_POST['kcid'];
	$asktitle=$_POST['asktitle'];
	$askkwd=$_POST['askkwd'];
	$askflag=$_POST['askflag'];
	if(isset($_POST['askjh'])){
		$askjh=1;
	}else{
		$askjh=0;
		}
	if(isset($_POST['askzd'])){
		$askzd=1;
	}else{
		$askzd=0;
	}
	if(isset($_POST['askgg'])){
		$askgg=1;
	}else{
		$askgg=0;
	}
	$askname=$_POST['askname'];
	if(strlen($askname)<3){
		$askname='匿名网友';	
	}
	$askcontent=str_replace("'","\'",$_POST['askcontent']);
	
	$sqlstr="insert into ".$hbpre."ask(kcid,asktitle,askkwd,askflag,askjh,askzd,askgg,askname,askcontent,asktime,askuptime)values('$kcid','$asktitle','$askkwd','$askflag','$askjh','$askzd','$askgg','$askname','$askcontent',now(),now())";
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "location='?kcid=".$kcid."';";
	echo "</script>";
}
if(isset($_POST['askid'])){
	$askid=	$_POST['askid'];
	$kcid=$_POST['kcid'];
	$asktitle=$_POST['asktitle'];
	$askkwd=$_POST['askkwd'];
	$askflag=$_POST['askflag'];
	if(isset($_POST['askjh'])){
		$askjh=1;
	}else{
		$askjh=0;
		}
	if(isset($_POST['askzd'])){
		$askzd=1;
	}else{
		$askzd=0;
	}
	if(isset($_POST['askgg'])){
		$askgg=1;
	}else{
		$askgg=0;
	}
	$askname=$_POST['askname'];
	if(strlen($askname)<3){
		$askname='匿名网友';	
	}
	$askcontent=$_POST['askcontent'];
	$sqlstr="update ".$hbpre."ask set asktitle='$asktitle',kcid='$kcid',askname='$askname',askkwd='$askkwd',askcontent='$askcontent',askflag=$askflag,askzd=$askzd,askjh=$askjh,askgg=$askgg,askuptime=now() where askid=$askid";
	mysql_query($sqlstr);
	echo "<script language=\"javascript\">";
	echo "window.close();";
	echo "window.opener.location.reload(true);";
	echo "</script>";
}
if(isset($_POST['del'])){
	if(isset($_POST['aid'])){
	   foreach($_POST['aid'] as $v){
		   $sqlstr="delete from ".$hbpre."ask_hf where askid=".$v;
		   mysql_query($sqlstr);
		$sqlstr="delete from ".$hbpre."ask where askid=".$v;
		mysql_query($sqlstr);
	  }	
	}
   echo "<script language='javascript'>";
   echo "location='?kcid=".$kcid."';";
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
 <body>
<div id="man_zone">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>当前位置：<a href="ask_article.php"> 在线交流</a> 
    <?php
	if($kcid!=0){
	?>
    &gt;&gt;  <?php echo askload($kcid);?> 
    <?php } ?>
    
    &gt;&gt; 贴子管理  
    <?php
	if($kcflag==0){
	?>
    <a href="?kcid=<?php echo $kcid;?>&add=1">[增加新贴]</a>
    <?php
	}
	?>
    </td>
  </tr>
</table>
  <?php
if(!isset($_GET['add'])&&!isset($_GET['edit'])){
?>
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
    <th width="8%" bgcolor="#eeeeee">编号</th>
    <th width="42%" bgcolor="#eeeeee">贴子主题</th>
    <th width="6%" bgcolor="#eeeeee">所属版块</th>
    <th width="5%" bgcolor="#eeeeee">预览</th>
    <th width="7%" bgcolor="#eeeeee">发贴时间</th>
    <th width="7%" bgcolor="#eeeeee">回复时间</th>
    <th width="7%" bgcolor="#eeeeee">回复数量</th>
    <th width="6%" bgcolor="#eeeeee">最佳答案</th>
    <th width="6%" bgcolor="#eeeeee">审核情况</th>
    <th width="6%" bgcolor="#eeeeee">操作</th>
  </tr>
  <?php
    $kcidstr=getkcidstr($kcid,1);
  $sqlstr="select count(hid) as hnum,sum(hstate) as hstate,askid,kcid,asktitle,uid,kctitle,kcpagename,askcontent,askflag,askkwd,askname,askgg,askzd,askjh,asktime,askuptime,askhits,max(htime) as htime 
from 
( select hid,".$hbpre."ask.*,kctitle,kcpagename,(case when htime is null then asktime else htime end) as htime,(case when hstate=1 then 1 else 0 end) as hstate
	from ".$hbpre."ask_hf right outer join ".$hbpre."ask on ".$hbpre."ask.askid=".$hbpre."ask_hf.askid left outer join ".$hbpre."ask_kclass on ".$hbpre."ask.kcid=".$hbpre."ask_kclass.kcid )as aaa 
where kcid in ($kcidstr) 
GROUP BY askid,kcid,asktitle,uid,askflag,askkwd,askname,askgg,askzd,askjh,asktime,askuptime,askhits,kctitle,kcpagename
 order by htime desc,askzd desc,askjh desc,asktime desc";
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
	} ?>
    <?php 
	if($rs['askzd']==1){
		echo "<span style=\"color:#ff00ff\">置顶</span>";
	}
	 ?>
    </td>
    <td align="center" nowrap="nowrap"><a href="ask_article.php?kcid=<?php echo $rs['kcid'];?>"><?php echo $rs['kctitle'];?></a></td>
    <td align="center" style="padding-left:10px"><a href="/ask/peixun_detail.php?id=<?php echo $rs['askid'];?>" target="_blank">预览</a></td>
    <td align="center" nowrap="nowrap" style="padding-left:10px"><?php echo substr($rs['asktime'],0,10);?></td>
    <td align="center" nowrap="nowrap"><?php echo substr($rs['htime'],0,10);?></td>
    <td align="center">
    <?php
		echo $rs['hnum'];
	?>
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
    <td align="center"><a href="ask_article.php?kcid=<?php echo $kcid;?>&edit=<?php echo $rs['askid'];?>" onclick="window.open('','new','width=1000,height=800')" target="new">修改</a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td align="center"><input type="checkbox" name="ckall" id="ckall" onclick="checkall()" />
      <label for="ckall">
        <input type="submit" name="del" id="del" value="删除" />
      </label></td>
    <td colspan="9" align="center"><?php echo showpage($pagecount);?></td>
    </tr>
</table> </form>
<?php
}
if(isset($_GET['add'])){
?>
 <form id="form1" name="form1" method="post" action="">
<table width="98%"  bgcolor="#CCCCCC" border="0" align="center" cellpadding="0" cellspacing="1">
   <tr>
      <td width="14%" align="center" bgcolor="#F3F3F3">主&nbsp;题：</td>
      <td width="86%" bgcolor="#FFFFFF"><label>
        <input name="asktitle" type="text" id="asktitle" size="80" />
        <input name="kcid" type="hidden" id="kcid" value="<?php echo $kcid;?>" />
        <input name="ddd" type="hidden" id="ddd" value="1" />
      </label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">状态：</td>
      <td bgcolor="#FFFFFF">
          <input type="radio" name="askflag" value="0" id="state_1" />
不显示
          <input name="askflag" type="radio" id="state_0" value="1" checked="checked" />
          显示          
          <input name="askflag" type="radio" id="state_0" value="2" />
          站长推荐          
          <input name="askjh" type="checkbox" id="askjh" value="1" />
          <label for="askjh">精华 
            <input name="askzd" type="checkbox" id="askzd" value="1" />
          置顶
          <input name="askgg" type="checkbox" id="askgg" value="1" />
          公告</label></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">发起人：</td>
      <td bgcolor="#FFFFFF"><label for="askname"></label>
        <input type="text" name="askname" id="askname" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">关键词：</td>
      <td bgcolor="#FFFFFF"><label for="askkwd"></label>
        <input name="askkwd" type="text" id="askkwd" size="80" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F3F3F3">文章内容：</td>
      <td bgcolor="#FFFFFF">
         <?php
		 $sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "ask_article" ) )."/hengboit_editor/" ;

$oFCKeditor = new FCKeditor('askcontent') ;
$oFCKeditor->BasePath = $sBasePath ;

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/' . preg_replace("/[^a-z0-9]/i", "", "office2003") . '/' ;
$oFCKeditor->Value = '' ;
$oFCKeditor->Create() ;
		 ?>   </td>
    </tr>
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
  </table></form>
<?php
}
?>
</div>

<?php
if(isset($_GET['edit'])){
	$edit=$_GET['edit'];
	$sqlstr="select * from ".$hbpre."ask where askid=$edit";
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
?>
 <form id="form1" name="form1" method="post" action="">
<table width="98%"  bgcolor="#CCCCCC" border="0" align="center" cellpadding="0" cellspacing="1">
   <tr>
     <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">所属类别：</td>
     <td bgcolor="#FFFFFF">
       <select name="kcid" id="kcid">
       <?php
	   $sqlstra="select * from ".$hbpre."ask_kclass where kbid=0 order by kcsortnum asc";
	   $querya=mysql_query($sqlstra);
	   while($rsa=mysql_fetch_array($querya)){
		   if($rsa['kcflag']==0){
			   
	   ?>
        <optgroup label="<?php echo $rsa['kctitle'] ?>">
              <option value="<?php echo $rsa['kcid'];?>" <?php if($rs['kcid']==$rsa['kcid']){ echo "selected"; }  ?>><?php echo $rsa['kctitle'] ?></option>
          </optgroup> 
		<?php
		   }else{
		 ?>
   		    <optgroup label="<?php echo $rsa['kctitle'] ?>">
            <?php
			$sqlstrb="select * from ".$hbpre."ask_kclass where kbid=".$rsa['kcid']." order by kcsortnum asc";
			$queryb=mysql_query($sqlstrb);
			while($rsb=mysql_fetch_array($queryb)){
			?>
            <option value="<?php echo $rsb['kcid'];?>" <?php if($rs['kcid']==$rsb['kcid']){ echo "selected"; }  ?>><?php echo $rsb['kctitle'];?></option>
       <?php
			}
			?>
            </optgroup>
       <?php
		   }
	   }
	   ?>
      </select></td>
   </tr>
   <tr>
      <td width="14%" align="center" nowrap="nowrap" bgcolor="#F3F3F3">主&nbsp;题：</td>
      <td width="86%" bgcolor="#FFFFFF"><label>
        <input name="asktitle" type="text" id="asktitle" size="80" value="<?php echo $rs['asktitle'];?>" />
        <input name="askid" type="hidden" value="<?php echo $edit;?>" />
      </label></td>
    </tr>
    <tr>
      <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">状态：</td>
      <td bgcolor="#FFFFFF">
          <input type="radio" name="askflag" value="0" id="state_1" <?php if($rs['askflag']==0){ ?> checked="checked" <?php } ?>/>
不显示
          <input name="askflag" type="radio" id="state_0" value="1" <?php if($rs['askflag']==1){ ?> checked="checked" <?php } ?> />
          显示          
          <input name="askflag" type="radio" id="state_0" value="2" <?php if($rs['askflag']==2){ ?> checked="checked" <?php } ?> />
          站长推荐          
          <input name="askjh" type="checkbox" id="askjh" value="1" <?php if($rs['askjh']==1){ ?> checked="checked" <?php } ?>  />
          <label for="askjh">精华 
            <input name="askzd" type="checkbox" id="askzd" value="1" <?php if($rs['askzd']==1){ ?> checked="checked" <?php } ?>  />
          置顶
          <input name="askgg" type="checkbox" id="askgg" value="1" <?php if($rs['askgg']==1){ ?> checked="checked" <?php } ?>  />
      公告</label></td>
    </tr>
    <tr>
      <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">发起人：</td>
      <td bgcolor="#FFFFFF"><label for="askname"></label>
      <input type="text" name="askname" id="askname" value="<?php echo $rs['askname'];?>" /></td>
    </tr>
    <tr>
      <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">关键词：</td>
      <td bgcolor="#FFFFFF"><label for="askkwd"></label>
      <input name="askkwd" type="text" id="askkwd" size="80" value="<?php echo $rs['askkwd'];?>" /></td>
    </tr>
    <tr>
      <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">文章内容：</td>
      <td bgcolor="#FFFFFF">
    <?php
		 $sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "ask_article" ) )."/hengboit_editor/" ;

$oFCKeditor = new FCKeditor('askcontent') ;
$oFCKeditor->BasePath = $sBasePath ;

	$oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/' . preg_replace("/[^a-z0-9]/i", "", "office2003") . '/' ;
$oFCKeditor->Value = $rs['askcontent'] ;
$oFCKeditor->Create() ;
		 ?>   
    </td>
    </tr>
    <tr>
      <td align="center" nowrap="nowrap" bgcolor="#F3F3F3">&nbsp;</td>
      <td bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="42%" align="center"><input type="submit" name="button7" id="button7" value="提交" />
&nbsp;
<input type="reset" name="button7" id="button8" value="重置" /></td>
          <td width="58%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>

  </table></form>
 <?php
}
?>
</body>
</html>
