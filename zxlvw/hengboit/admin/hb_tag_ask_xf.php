<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
header("Content-type: text/html; charset=utf-8");
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
	}
 $sqlstr="select max(tid) as tid from ".$hbpre."tag";
 $query=mysql_query($sqlstr);
 $rs=mysql_fetch_array($query);
 if(isset($rs['tid'])){
 $i=$rs['tid']+1;
 }else{
  $i=1;	 
}
$pagesize=20;
  $sqlstr="select askid,kcid,askkwd from ".$hbpre."ask  order by askid asc";
  $pagecount=pagecount($pagesize);
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
	 $id=$rs['askid'];
	 $cid=$rs['kcid'];
	  $kwd=str_replace("，",",",str_replace("_",",",str_replace(" ",",",$rs['askkwd'])));
	 $kwd_arr=explode(",",$kwd);
	 foreach($kwd_arr as $value){
		 if($value!=""){
		$sqltag="insert into ".$hbpre."tag(tid,id,cid,tag,ttime,tflag)values($i,$id,$cid,'$value',now(),1)";
		mysql_query($sqltag);
	 echo "<script language=\"javascript\">";
	  echo "document.write('已经修复了".$i."条<br>');";
	 echo "</script>";
		$i++;
		 }
	  }
  }



if($page<$pagecount){
 echo "<script language=\"javascript\">";
  echo "location='hb_tag_ask_xf.php?page=".($page+1)."';";
 echo "</script>";
   	
}else{
 echo "<script language=\"javascript\">";
  echo "location='hb_tag_lastxf.php?page=".($page+1)."';";
 echo "</script>";
}
?>