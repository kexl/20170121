<?php
session_start();
if(!isset($_SESSION['uname'])||!isset($_SESSION['uflag'])||!isset($_SESSION['weblogin'])){
	echo "<script language='javascript'>";
	echo "alert('你还没有登录，请登录再试');";
	echo "location='login.php';";
	echo "</script>";
	exit();
}
?>
