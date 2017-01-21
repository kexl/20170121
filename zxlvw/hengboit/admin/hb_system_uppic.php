<?php require_once('adminqx.php'); ?>
<?php
if(isset($_GET['fm'])){
  $fm=$_GET['fm'];	
}else{
	$fm="form1";
	}
if(isset($_GET['pt'])){
	$pt=$_GET['pt'];		   
}else{
	$pt="wlogo";	
}
$upfile_ext="|jpg|gif|png|bmp|";

$updir="statics/images/";//设置上传文件所存放的文件夹,这里是上传的相对站点根目录的路径
$dbdir="/".$updir;//写入数据库的路径
	  if(!file_exists($dir)){
		  mkdir($dir);
		}

if(isset($_POST['myup'])){
	//print_r($_FILES['myfile']);
	//exit();
	$filename=strtolower($_FILES['myfile']['name']);//获取是什么上传前的文件名
	$file_arr=explode(".",$filename);
	$key=count($file_arr)-1;
	$ext=$file_arr[$key];//获取上传文件扩展名
	if(strpos($upfile_ext,$ext)){
	 if($pt!="wlogo"){
		 $dir="../../".$updir;
		 $file=date("Ymdhis").rand(0,9).".".$ext;
		$dbfile=$dbdir.$file;
		$upfile=$dir.$file;
	 }else{
		$upfile="../../statics/images/logo.".$ext;
	 }
	//echo $newfile;
	//exit();
	
	$tempfile=$_FILES['myfile']['tmp_name'];//获取上传后的存放在临时文件路径
	move_uploaded_file($tempfile,$upfile);
	 echo "<script language='javascript'>";
	 echo "window.opener.".$fm.".".$pt.".value='".$dbfile."';";
	 echo "window.close();";
	 echo "</script>";
	
	}else{
	 echo "<script language='javascript'>";
	 echo "alert('文件不符合要求,现在只能上传".$upfile_ext."格式的文件');";
	 echo "history.back(-1);";
	 echo "</script>";
		
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片上传</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td align="center">图片上传:
        <label>
          <input type="file" name="myfile" id="myfile" />  
          <input type="submit" name="myup" id="myup" value="上传" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>