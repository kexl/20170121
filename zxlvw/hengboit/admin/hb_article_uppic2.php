<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
  exit();	
}
$dbdir="/statics/images/up/";//写入数据库的路径
$updir="../..".$dbdir;

$sqlstr="select pic2,pic from ".$hbpre."article where id=$id";
$query=mysql_query($sqlstr);
$rs=mysql_fetch_array($query);
$pic=$rs['pic2'];
$set_ext="|jpg|png|gif|rar|";//限制上传的扩展名jpg,png,gif
if(isset($_POST['aa'])){
	 if(strlen($pic)>5){
		if(file_exists("../..".$pic)){
		  unlink("../..".$pic);	
		}
	  }

	$oldname=strtolower($_FILES['myfile']['name']); //上传前的本地文件名
	$ext_arr=explode(".",$oldname);//将上传前的文件名转换数组
	$tmp=$_FILES['myfile']['tmp_name'];
	$ext=end($ext_arr);//   		得到文件扩展
	$time=time();
	if(strpos($set_ext,$ext)){
		$updir=$updir.date("Y",$time)."/";
		$dbdir=$dbdir.date("Y",$time)."/";
	  $newfilea=date("mdhis",$time).rand(0,9).".".$ext;
	  $newfiles=date("mdhis",$time).rand(0,9)."_s.".$ext;
	  if(!file_exists($updir)){
		  cdir($updir);
		}
	  $newfile=$updir.$newfilea;//后台上传的相对路径,
	  $newfilesa=$updir.$newfiles;//后台上传的相对路径,
	  $dbfile=$dbdir.$newfilea;//写入数据表的路径名,是相对站根目录的路径
	  $dbfiles=$dbdir.$newfiles;//写入数据表的路径名,是相对站根目录的路径
//	  echo $dbfile;
//	  echo "<br>";
//	  echo $newfile;
//	  exit();
	  move_uploaded_file($tmp,$newfile);
	  cutphoto($newfile,$newfilesa,200,150);
	  if(isset($_POST['isbg'])){
  $sqlstr="update ".$hbpre."article set pic='$dbfiles',pic2='$dbfile' where id=$id";
	  }else{
  $sqlstr="update ".$hbpre."article set pic2='$dbfile' where id=$id";
		  }
	  mysql_query($sqlstr);
	  echo "<script language='javascript'>";
	  echo "alert('上传成功');";
	  echo "window.opener.location.reload(true);";
	  echo "window.close();";
	  echo "</script>";
	}else{
	  echo "<script language='javascript'>";
	  echo "alert('你选择的文件非法，本系统限制为只能上传扩展名".$set_ext."的文件');";
	  echo "history.back(-1);";
	  echo "</script>";
	}

}
if(isset($_GET['del'])){
  $sqlstr="update ".$hbpre."article set pic2='' where id=$id";
  
  mysql_query($sqlstr);
  if(strlen($pic)>5){
	$delpic="../..".$pic;
	if(file_exists($delpic)){
	  unlink($delpic);	
	}
  }
	  echo "<script language='javascript'>";
	  echo "window.opener.location.reload(true);";
	  echo "window.close();";
	  echo "</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<div align="center">
<?php
if($pic==''){
  echo "无图片";
}else{
?>
  <img src="<?php echo $pic;?>" style="max-width:350px; height:auto;" /> <br />
        <input type="button" name="button" onclick="location='?id=<?php echo $id;?>&del=1';" id="button" value="  删除图片  " />

  <?php
}
?>

</div>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div align="center"> 
    <p>
      <input type="file" name="myfile" id="myfile" />
       &nbsp;
       <input name="isbg" type="checkbox" id="isbg" value="aaa" checked="checked" />
       <label for="isbg"></label>
       同步更新缩略图<br />
      <br />
      <input type="submit" name="aa" id="aa" value="提交" />
      &nbsp;
      <input type="button" name="button2" id="button2" value="  关闭  " onclick="window.close()" />
&nbsp;    </p>
  </div>
</form>
</body>
</html>