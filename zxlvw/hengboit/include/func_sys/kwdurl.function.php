<?php
//将关键词替换为带有超链接的页面,主要用于详细内容页
function kwdurl($content){
  $str_arr1[]="~aa~";
  $str_arr2[]="aa";
  $sqlstra="select * from n_url where ustate=1 and ucid=2 ";
  $querya=mysql_query($sqlstra);
  while($rsb=mysql_fetch_array($querya)){
	  $str_arr1[]="~".$rsb['utitle']."~";
	  $str_arr2[]="<a href=\"".$rsb['url']."\" target=\"_blank\">".$rsb['utitle']."</a>";
	}
	$content=preg_replace($str_arr1,$str_arr2,$content);
	return $content;
	//print_r($str_arr1);
	//exit();
}
?>