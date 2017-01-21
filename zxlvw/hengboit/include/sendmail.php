<?php require_once('../include/email.class.php'); ?>
<?php


$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "hbhuangxc@163.com";//SMTP服务器的用户邮箱
$smtpuser = "hbhuangxc@163.com";//SMTP服务器的用户帐号
$smtppass = "hhbbcc999";//SMTP服务器的用户密码
$mailsubject = "你的账户已经被锁定，激活码见内容";//邮件主题
$mailbody = "<h1> 购买志学牌纸尿裤请点击下面的图片 </h1><div style='text-align:center'><a href='http://www.hengboit.com/jianzhanpeixun/kengchengshezhi/' target='_blank'><img src='http://www.hengboit.com/images/nywutu7.jpg'></a></div>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = FALSE;//是否显示发送的调试信息
	$smtpemailto = "59125994@qq.com";//发送给谁
	$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
echo "邮箱发送成功";

?>