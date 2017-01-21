<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
</head>
<frameset rows="50,*,30">
  <frame src="frametop.php" name="topFrame"  frameborder="no" border="0" framespacing="0"/>
  <frameset name="myFrame" cols="199,7,*" frameborder="no" border="0" framespacing="0">
    <frame src="frameleft.php" name="leftFrame" frameborder="no" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
	<frame src="frameswitch.php" name="midFrame" frameborder="no" scrolling="No" noresize="noresize" id="midFrame" title="midFrame" />
    <frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
         <frame src="framemain.php" name="mainFrame" frameborder="no" scrolling="No"  noresize="noresize" id="mainFrame" title="mainFrame" />
         <frame src="framenr.php" name="manFrame" frameborder="no" id="manFrame" title="manFrame" />
     </frameset>
</frameset>
  <frame src="frameend.php" name="endFrame"  frameborder="no" border="0" framespacing="0"/>
</frameset>
<noframes><body>
</body>
</noframes>
</html>
