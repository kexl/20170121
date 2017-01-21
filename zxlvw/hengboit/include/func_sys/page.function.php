<?php
//用来获取总页数的方法
function pagecount($pagesize){
	global $sqlstr;
	 if(isset($_GET['page'])){
		 $page=$_GET['page'];	 
	 }else{
		  $page=1; 
	  }
	$query=mysql_query($sqlstr);
	$num=mysql_num_rows($query);//总启记录数
	$pagecount=ceil($num/$pagesize);//得到总页面数
	$x=($page-1)*$pagesize;
	$sqlstr.=" limit $x,$pagesize";
	return $pagecount;
}
function showpage($pagecount){
	if(isset($_GET['page'])){
		 $page=$_GET['page'];	 
	 }else{
		  $page=1; 
	 }
    $webpage=$_SERVER['REQUEST_URI'];
	$webone=$webpage;
	if(strpos($webpage,"?")){
		if(strpos($webpage,"&page=")){
		  $webpage=str_replace("page=".$page,"",$webpage);
		  $webone=str_replace("&page=".$page,"",$webone);
		}else if(strpos($webpage,"?page=")){
		  $webpage=str_replace("page=".$page,"",$webpage);	
		 $webone=str_replace("?page=".$page,"",$webone);
    }else{
			$webpage=$webpage."&";
			$webone=$webone;
		 }    	
	}else{
	  	$webpage=$webpage."?";
		$webone=$webone;
	}
	 if($page<=1){
	  $pagestr = "首页&nbsp;上一页&nbsp;";	 
	}else if($page==2){
		$pagestr = "<a href=\"".$webone."\">首页</a>&nbsp;<a href=\"".$webone."\">上一页</a>&nbsp;";
	}else{
		$pagestr = "<a href=\"".$webone."\">首页</a>&nbsp;<a href=\"".$webpage."page=".($page-1)."\">上一页</a>&nbsp;";
	}
	if($page>=$pagecount){
	   $pagestr.= "下一页&nbsp;最后一页"	;
	}else{
		$pagestr.= "<a href=\"".$webpage."page=".($page+1)."\">下一页</a>&nbsp;<a href=\"".$webpage."page=".$pagecount."\">最后一页</a>&nbsp;";
	}
   return $pagestr;
}
?>