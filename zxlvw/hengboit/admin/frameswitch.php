<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>企业网站管理系统</title>
<style type="text/css">
 body{ background:url(images/switch_bg.jpg) no-repeat 6px 65px;}
 #switchpic{}
</style>
</head>
<script language="JavaScript">
function Submit_onclick(){
		var bgObj=document.createElement("div");
			bgObj.setAttribute('id','bgDiv');
			bgObj.style.display="none";
	if(parent.myFrame.cols == "199,7,*") {
		parent.myFrame.cols="0,7,*";
		document.getElementById("ImgArrow").src="images/switch_right.gif";
		document.getElementById("ImgArrow").alt="恢复";
	} else {
		parent.myFrame.cols="199,7,*";
		document.getElementById("ImgArrow").src="images/switch_left.gif";
		document.getElementById("ImgArrow").alt="收回";
	}
	
}

function MyLoad() {
	if(window.parent.location.href.indexOf("MainUrl")>0) {
		window.top.midFrame.document.getElementById("ImgArrow").src="images/switch_right.gif";
	}
}
</script>
<body onload="MyLoad()">
<script language="javascript">
 document.write("<div id=\"switchjh\" style=\"display:none;\"><iframe scrolling=\"no\""); 
 document.write("frameborder=\"0\" width=\"0\" height=\"0\""); 
 document.write("src=\"hengboit_editor/fckeditor_php4.php\">");
 document.write("</iframe></div><div id=\"switchpic\">");
 document.write("<a href=\"javascript:Submit_onclick()\">");
 document.write("<img src=\"images/switch_left.gif\" alt=\"收回\" id\=\"ImgArrow\" /></a></div>");
</script>
</body>
</html>
