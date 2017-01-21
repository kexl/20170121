<?php
 function loadstr($cid){
	 global $hbpre;
	 $str=getloadstr($cid);
	 $str="<a href=\"/\">首页</a> &gt;&gt; ".$str."  &gt;&gt; 内容 ";
	 return $str;
  }
  function getloadstr($cid){
	  global $hbpre;
	  global $pagename;
	$sqlstr="select ctitle,bid,cid from ".$hbpre."class where cid=$cid";
	//echo $sqlstr;
	//exit();
	$query=mysql_query($sqlstr);
	$rs=mysql_fetch_array($query);
	 $str="<a href=".$pagename.".php?cid=".$rs['cid'].">".$rs['ctitle']."</a>";
	 if($rs['bid']!=0){
	  $str= getloadstr($rs['bid'])."  &gt;&gt; ".$str;
	 }
	 return $str;
  }
?>