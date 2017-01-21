<?php
	 //自定义的根据文件(如 aa/bb/cc/23423.html)的路径来递规创建文件夹的方法,记住这里的
function cdir($filepath){
	 $arr=explode("/",$filepath);
	 $num=count($arr);
	 $i=1;
	 foreach($arr as $k=>$v){
	   if($i!=$num){
		 if($i==1){
			$dir=$v; 
		 }else{
			$dir.="/".$v; 
		 }
		 if(!file_exists($dir)){
		  mkdir($dir,"0777");	
		}
	   }
	 $i++;
	 }
}
?>