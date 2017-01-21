<?php 
//截取utf8中文字符的函数
function mysubstr($str,$start,$len){   
	$len=$len*3;
    if($start < 0)$start = strlen($str)+$start;   
    $retstart = $start+getOfFirstIndex($str,$start);   
    $retend = $start + $len -1 + getOfFirstIndex($str,$start + $len);   
    return substr($str,$retstart,$retend-$retstart+1);   
}   
function getOfFirstIndex($str,$start){   
    $char_aci = ord(substr($str,$start-1,1));   
    if(223<$char_aci && $char_aci<240)   
        return -1;   
    $char_aci = ord(substr($str,$start-2,1));   
    if(223<$char_aci && $char_aci<240)   
        return -2;   
    return 0;   
}  
?>