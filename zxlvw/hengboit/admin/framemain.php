<?php require_once('../include/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
</head>
<script language="javascript">
  function qhfm(i){
	for(m=1;m<=3;m++){
	  if(m==i){
		document.getElementById("man_nav_"+m).className="bg_image_onclick";
		document.getElementById('show'+m).style.display="block";
	  }else{
		document.getElementById("man_nav_"+m).className="bg_image";
			document.getElementById('show'+m).style.display="none";
  }
	  switch(i){
		case 1:
			window.top.frames['leftFrame'].location='frameleft.php';
			break;
		case 2:
			window.top.frames['leftFrame'].location='frameleft_sys.php';
			break;
		case 3:
			window.top.frames['leftFrame'].location='frameleft_ask.php';
			break;
	  }
	}  
  }
</script>
<body>
<div id="nav">
    <ul><li id="man_nav_1"  class="bg_image_onclick" onclick="qhfm(1)">管理首页</li>
    <li id="man_nav_2" class="bg_image" onclick="qhfm(2)">系统设置</li>
    <li id="man_nav_3" class="bg_image" onclick="qhfm(3)">在线问答</li>
    </ul>
</div>
<div id="sub_info">
<div id="show1" style="float:left; width:50%;">&nbsp;&nbsp;<img src="images/hi.gif" />&nbsp;<span id="show_text">欢迎使用北京恒博教育企业网站智能管理系统!</span>
</div>
<div id="show2" style="float:left; width:50%; display:none;">&nbsp;&nbsp;<img src="images/hi.gif" />&nbsp;<span id="show_text">网站信息设置,留言板管理</span>
</div>
<div id="show3" style="float:left; width:50%; display:none;">&nbsp;&nbsp;<img src="images/hi.gif" />&nbsp;<span id="show_text">网站seo查询，网站流量统计</span>
</div>
<div id="sub_right" style="float:right; width:38%"></div>
</div>
</body>
</html>
