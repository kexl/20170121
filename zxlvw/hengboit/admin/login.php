<?php require_once('../include/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $wtitle;?>-企业网站管理系统登录</title>
<style type="text/css">
  body{ background:#7BB0CF url(images/login_02.jpg) repeat-x 0px 50px; padding:50px 0px; margin:0px; font-size:14px;}
  #logo{ height:80px; padding:24px 100px;  }
  #login{ width:460px; height:220px; padding: 107px 30px 30px 300px; margin:0px auto; background:url(images/login_09.jpg) no-repeat center center}
  .dl{ width:73px; height:30px; background:url(images/submit_bg.jpg) no-repeat; color:#FFF; border:none; padding:0px; margin:0px;}
  .copyright{ padding-top:40px; text-align:center; font-size:12px;}
</style>
</head>

<body>
 <div id="logo"><img src="images/logo.jpg" width="582" height="65" alt="" /></div>
 <div id="login">
<form id="form1" name="form1" method="post" action="login_ck.php">
     <table width="100%" height="171" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
         <td width="35%" align="right" nowrap="nowrap">用户名：</td>
         <td width="65%"><label>
           <input type="text" name="u_name" id="u_name" />
         </label></td>
       </tr>
       <tr>
         <td align="right" nowrap="nowrap">密&nbsp;&nbsp;&nbsp;码：</td>
         <td><label>
           <input type="password" name="u_pwd" id="u_pwd" />
         </label></td>
       </tr>
      <?php
	  if($wauth==1){
	  ?>
       <tr>
         <td align="right" nowrap="nowrap">认证码：</td>
         <td><label>
           <input type="text" name="u_loginauth" id="u_loginauth" />
         </label></td>
       </tr>
      <?php
	  }
	  ?>
       <tr>
         <td align="right" nowrap="nowrap">验证码：</td>
         <td><label>
           <input name="hbyzm" type="text" id="hbyzm" size="6" /> 
         </label><a href="#" class="left" style="position:relative;top:2px;" onclick="document.getElementById('image').src = '../include/securimage/securimage_show.php?sid=' + Math.random(); return false"><img src="../include/securimage/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" name="image" border="0" align="absmiddle" id="image" /></a></td>
       </tr>
       <tr>
         <td align="right" nowrap="nowrap">&nbsp;</td>
         <td><label>
           <input name="button" type="submit" class="dl" id="button" value=" 提 交 " />
           &nbsp;
           <input name="button2" type="button" class="dl" id="button2" value="返回首页" />
         &nbsp;</label></td>
       </tr>
     </table>
   </form>
 </div>
 <div class="copyright">
   <p>版权所有：<a href="http://www.hengboit.com">北京恒博教育网站培训基地 &nbsp;</a>使用此程序请保留版权</p>
   <p>学网站技术，就要到专业的网站培训学校</p>
 </div>
</body>
</html>