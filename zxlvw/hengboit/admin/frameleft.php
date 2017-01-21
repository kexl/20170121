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
<title>北京恒博教育网站培训基地-企业网站管理系统</title>
</head>
<style type="text/css">
 body{ background:url(images/left_line.jpg) repeat-y 0px;}
</style>
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
     <div id="user_info">欢迎你,<strong><a href="hb_admin.php?edit=<?php echo $_SESSION['uid'];?>"  target="manFrame"><?php echo $_SESSION['uname'];?></a></strong><br />[<a href="/" target="_blank">访问首页</a>&nbsp;<a href="login_out.php" target="_top">退出</a>]</div>
	   <div id="right_main_nav">
       <dl>
  <?php
  $sqlstr="select * from ".$hbpre."class where bid=$bid order by csortnum asc,cid asc";
  $query=mysql_query($sqlstr);
  $i=1;
  while($rs=mysql_fetch_array($query)){
?>
     		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" ><?php echo $rs['ctitle'];?></dt>
             <dd id="nr<?php echo $i;?>" <?php if($i==1){ ?>style="display:block;" <?php }else{ ?> style="display:none"<?php } ?>><ul class="list_detail">
			  <?php
			  
            if($rs['cflag']==0 || $rs['cflag']==2){
            ?>
              <li><a href="hb_article.php?cid=<?php echo $rs['cid'];?>" target="manFrame">文章管理 </a></li>
			<?php
            }
            ?>
 <?php
 $sqlbb="select * from ".$hbpre."class where bid=".$rs['cid']." order by csortnum asc,cid desc ";
 $querybb=mysql_query($sqlbb);
 while($rsbb=mysql_fetch_array($querybb)){
?>
	<?php	 

	 if($rsbb['cflag']==0 || $rsbb['cflag']==2){
 ?>
         	  <li><a href="hb_article.php?cid=<?php echo $rsbb['cid'];?>" target="manFrame"><?php echo $rsbb['ctitle'];?></a></li>
 <?php
	 }else{
  ?>
         	  <li><a href="hb_class.php?bid=<?php echo $rsbb['cid'];?>" target="manFrame"><?php echo $rsbb['ctitle'];?></a></li>
 <?php
	 }
 }
 ?>

			<?php
            if($rs['cflag']==1 || $rs['cflag']==2){
				if($rs['cidxs']==1){
            ?>
                <li> <a href="hb_class.php?bid=<?php echo $rs['cid'];?>" target="manFrame">小类管理</a></li>
			<?php
				}
				}
            ?>
         </ul></dd>
<?php
$i++;
  }
  ?>
       </dl>
       </div>
</div>
</body>
</html>
