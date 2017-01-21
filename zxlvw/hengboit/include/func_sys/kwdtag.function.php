<?php
//将详细内容页中的关键词加上超链接
function kwdtag($kwd){
	  global $baseurl;
 	$kwdarr=explode(",",$kwd);
	$str="";
	foreach($kwdarr as $vv){
	  	$str.="<a href=\"".$baseurl."/tag.php?wd=".$vv."\" target=\"_blank\">".$vv."</a>\n";
	}
	return  $str;
}
?>