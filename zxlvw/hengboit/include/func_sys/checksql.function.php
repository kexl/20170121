<?php
function checksql($str){
	$str=strtolower($str);
	$search=array('~insert~'
				  ,'~update~'
				  ,'~delete~'
				  ,'~drop~'
				  ,'~union~'
				  ,'~into~'
				  ,'~and~'
				  ,'~or~'
				  ,"~'~"
				  ,"~\"~"
				 );
	$arrb=array(
				"　i n s e r t　"
				,"　u p d a t e　"
				,'　d e l e t e　'
				  ,' d r o p '
				,' u n i o n '
				,'i n t o'
				,'　a n d　'
				,'　o r　'
				,"‘"
				,"“"
				);
	$str=preg_replace($search,$arrb,$str);
	return $str;
}
?>