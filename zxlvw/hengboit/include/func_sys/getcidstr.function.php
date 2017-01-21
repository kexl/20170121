<?php
 function getallcidstr($cid){
	 global $hbpre;
	if(isset($cidtr)){
	$cidstr=$cid.",".$cidstr;	
	}else{
	  $cidstr=$cid;	
	}
  $sqlstr="select cid from ".$hbpre."class where bid=$cid";
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
	 $cidstr.=",".$rs['cid']; 
	    $cidstr.=",".getallcidstr($rs['cid']);
	 }
	 $cidarr=explode(",",$cidstr);
	 $cidarr=array_unique($cidarr);
	 sort($cidarr);
	 $cidstr=implode(",",$cidarr);
		return $cidstr;
 }
function getcidstr($cid,$is=0){
	 global $hbpre;
	if($is==0){
   	$cidstr=getallcidstr($cid);
	$cidstr=str_replace($cid.",","",$cidstr);
	}else{
   	$cidstr=getallcidstr($cid);
	}
	return $cidstr;
}
?>
