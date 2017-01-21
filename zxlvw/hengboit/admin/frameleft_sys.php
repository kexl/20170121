<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$bid=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>企业网站管理系统</title>
<style type="text/css">
 body{ background:url(images/left_line.jpg) repeat-y 0px;}
</style>
</head>
<body>
<script language="javascript">
  function qh(i){
		 if(document.getElementById("nr"+i).style.display =='none'){
			 document.getElementById("tt"+i).className="list_tilte_onclick";
			 document.getElementById("nr"+i).style.display="block";
		  }else{
			  document.getElementById("tt"+i).className="list_tilte";
			  document.getElementById("nr"+i).style.display="none";
				 
		  } 
	  
  }

</script>
<div id="left_content">
     <div id="user_info">欢迎你,<strong><?php echo $_SESSION['uname'];?></strong><br />[<a href="/" target="_blank">访问本站首页</a>&nbsp;<a href="login_out.php" target="_top">退出</a>]</div>
	   <div id="right_main_nav">
       <dl>
       <?php $i=1;?>
     		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" >系统管理</dt>
             <dd id="nr<?php echo $i;?>" <?php if($i==1){ ?>style="display:block;" <?php }else{ ?> style="display:none"<?php } ?>>
           <ul class="list_detail"> 
           <li><a href="hb_system.php" target="manFrame">系统设置</a></li>
           <li><a href="hb_admin.php" target="manFrame">管理员管理</a></li>
           <li><a href="lyb.php" target="manFrame">留言板管理</a></li>
 <?php
 
 if($_SESSION['uflag']==9){
	 echo "<li><a href=hb_class.php target=manFrame>网站栏目管理</a></li>";
 }
 ?>
       </ul></dd>
      <?php  $i++;?>
     		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" >链接管理</dt>
            <dd id="nr<?php echo $i;?>"  style="display:none" >
           <ul class="list_detail"> 
           <li><a href="hb_url.php?ucid=0" target="manFrame">内链管理(关键词)</a></li>
        <?php
		   $sqlstr="select * from ".$hbpre."uclass  order by usortnum asc";
		   $query=mysql_query($sqlstr);
		   while($rs=mysql_fetch_array($query)){
		   ?>
           <li><a href="hb_url.php?ucid=<?php echo $rs['ucid'];?>" target="manFrame"><?php echo $rs['uctitle'];?></a></li>         
            <?php
			   }
			if($_SESSION['uflag']==9){
		   ?>
           
           <li><a href="hb_uclass.php" target="manFrame">链接分类</a></li>
           <?php
			}
			$i++;
			?>
           </ul>
           </dd>
     		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" >tag标记管理</dt>
             <dd id="nr<?php echo $i;?>"  style="display:none">
                <ul class="list_detail"> 
                 <li><a href="hb_tag_xf.php" target="manFrame">修复tag标记</a></li>
                 <li><a href="hb_tags.php" target="manFrame">tag标记</a></li>
                 </ul>
 </dd>
 <?php
 			   $i++;
?>
</dl>
       </div>
</div>
</body>
</html>
