<?php
//调用tag标记代码
function gettag($cid=0,$num=30,$tagtype="0",$tagstyle=1){
		 global $hbpre;
//tagtype=0 为最新
	//tagtype=1 为最热门的
	//tagtype=2 为随机调用
	  $cidstr=getcid($cid);//使用上面的函数
	  if($tagtype==2){
		$sqlstr="select tag from ".$hbpre."tag where tstate=1 and cid in(".$cidstr.") group by tag order by count(tid) desc limit 0,".$num;
	  }else if($tagtype==1){
		$sqlstr="select tag from ".$hbpre."tag where tstate=1 and cid in(".$cidstr.") group by tag order by rand() desc limit 0,".$num;
	  }else{
		$sqlstr="select tag from ".$hbpre."tag where tstate=1 and cid in(".$cidstr.") group by tag order by tid desc limit 0,".$num;
	  }
	  $str="";
		$query=mysql_query($sqlstr);
while($rs=mysql_fetch_array($query)){
	$rsa['turl']=$baseurl."/tags.php?wd=".trim(urlencode($rs['tag']));
	$rsa['tag']=mysubstr($rs['tag'],0,30);
	if($tagstyle==1){
	$str.= "<a href=\"".$rsa['turl']."\" style=\"".getTagStyle()."\">".$rsa['tag']."</a>\n";
	}else{
	$str.= "<a href=\"".$rsa['turl']."\">".$rsa['tag']."</a>\n";
	}
}
	return $str;
}
//---------------------------------------------------------
//调用tag标记时可以显示不同的风格
function getTagStyle(){ 
$minFontSize=12; //最小字体大小,可根据需要自行更改 
$maxFontSize=12; //最大字体大小,可根据需要自行更改
return 'font-size:'.($minFontSize+lcg_value()*(abs($maxFontSize-$minFontSize))).'px;color:#'.dechex(rand(0,255)).dechex(rand(0,196)).dechex(rand(0,255));  
}
?>