<?php
function tag($taglx=1,$num=30){
	if($taglx==1){
	$sqlstr="select (case when tuid is null then 0 else tuid end) as tuid,tagurl,idstr,aidstr,aa.tag,aa.tnum  
from hb_tagurl right join (select DISTINCT tag,tnum from hb_tag_main) as aa on hb_tagurl.tag=aa.tag 
order by tnum desc limit 0,$num";
	}else if($taglx==2){
		$sqlstr="select (case when tuid is null then 0 else tuid end) as tuid,tagurl,idstr,aidstr,aa.tid,aa.tag,aa.tnum  
from hb_tagurl right join (select DISTINCT tid,tag,tnum from hb_tag_main) as aa on hb_tagurl.tag=aa.tag 
 order by tid desc limit 0,$num";
	}else{
		$sqlstr="select (case when tuid is null then 0 else tuid end) as tuid,tagurl,idstr,aidstr,aa.tag,aa.tnum  
from hb_tagurl right join (select DISTINCT tag,tnum from hb_tag_main) as aa on hb_tagurl.tag=aa.tag  
 order by rand() limit 0,$num";
		}

	$query=mysql_query($sqlstr);
	$str="<style type=\"text/css\">#mytag a{ padding:0px 10px;  line-height:25px;}</style><div id='mytag'>\n";
	while($rs=mysql_fetch_array($query)){
		if($rs['tuid']==0){
		  $tagurl="tags.php?kwd=".trim(urlencode($rs['tag']));	
		}else{
			if(strlen($rs['tagurl'])>3){
		  $tagurl=$rs['tagurl'];	
			}else{
				$tagurl="tag.php?id=".$rs['tuid'];
			}	
		}

			$str.="<a href=\"".$tagurl."\" style=\"color:#".dechex(rand(0,255)).dechex(rand(0,196)).dechex(rand(0,255))."\">".$rs['tag']."</a>\n";
	}
	$str.="</div>";
	return $str;
}


?>