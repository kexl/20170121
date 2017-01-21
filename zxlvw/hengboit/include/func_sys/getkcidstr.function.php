<?php
 function getallkcidstr($kcid){
	 global $hbpre;
	if(isset($kcidstr)){
	$kcidstr=$kcid.",".$kcidstr;	
	}else{
	  $kcidstr=$kcid;	
	}
  $sqlstr="select kcid from ".$hbpre."ask_kclass where kbid in ($kcid)";
  $query=mysql_query($sqlstr);
  while($rs=mysql_fetch_array($query)){
	 $kcidstr.=",".$rs['kcid']; 
	    $kcidstr.=",".getallkcidstr($rs['kcid']);
	 }
	 $kcidarr=explode(",",$kcidstr);
	 $kcidarr=array_unique($kcidarr);
	 sort($kcidarr);
	 $kcidstr=implode(",",$kcidarr);
		return $kcidstr;
 }
function getkcidstr($kcid,$is=0){
	 global $hbpre;
	if($is==0){
   	$kcidstr=getallkcidstr($kcid);
	$kcidstr=str_replace($kcid.",","",$kcidstr);
	}else{
   	$kcidstr=getallkcidstr($kcid);
	}
	return $kcidstr;
}
?>
