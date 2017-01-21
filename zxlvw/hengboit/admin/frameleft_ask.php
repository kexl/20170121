<?php require_once('adminqx.php'); ?>
<?php require_once('../include/config.php'); ?>
<?php
$kbid=0;
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
  <?php $i=1;?>
       		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" >管理所有</dt>
             <dd id="nr<?php echo $i;?>" style="display:none"><ul class="list_detail">
             	<li><a href="ask_all.php" target="manFrame">所有问题管理</a></li>
                <li><a href="ask_hf_new.php" target="manFrame">所有回复管理</a></li>
            	  <li><a href="ask_article.php?kcid=10000" target="manFrame">用户提问</a></li>
          </ul>
            </dd>
  <?php
  $sqlstr="select * from ".$hbpre."ask_kclass where kbid=$kbid order by kcsortnum asc,kcid desc";
  $query=mysql_query($sqlstr);
  $i++;
  while($rs=mysql_fetch_array($query)){
?>
     		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" ><?php echo $rs['kctitle'];?></dt>
             <dd id="nr<?php echo $i;?>" <?php if($i==1){ ?>style="display:block;" <?php }else{ ?> style="display:none"<?php } ?>><ul class="list_detail">
			  <?php
			  
            if($rs['kcflag']==0 || $rs['kcflag']==2){
            ?>
              <li><a href="ask_article.php?kcid=<?php echo $rs['kcid'];?>" target="manFrame">文章管理 </a></li>
			<?php
            }
            ?>
 <?php
 $sqlbb="select * from ".$hbpre."ask_kclass where kbid=".$rs['kcid']." order by kcsortnum asc,kcid desc ";
 $querybb=mysql_query($sqlbb);
 while($rsbb=mysql_fetch_array($querybb)){
?>
	<?php	 

	 if($rsbb['kcflag']==0 || $rsbb['kcflag']==2){
 ?>
         	  <li><a href="ask_article.php?kcid=<?php echo $rsbb['kcid'];?>" target="manFrame"><?php echo $rsbb['kctitle'];?></a></li>
 <?php
	 }else{
  ?>
         	  <li><a href="ask_class.php?bid=<?php echo $rsbb['kcid'];?>" target="manFrame"><?php echo $rsbb['kctitle'];?></a></li>
 <?php
	 }
 }
 ?>

			<?php
            if($rs['kcflag']==1 || $rs['kcflag']==2){
				if(substr($rs['kcmx'],0,1)==1){
            ?>
                <li> <a href="ask_class.php?kbid=<?php echo $rs['kcid'];?>" target="manFrame">小类管理</a></li>
			<?php
				}
				}
            ?>
        </ul></dd>
<?php
$i++;
  }
if($_SESSION['uflag']==9){

  ?>
       		<dt class="list_tilte" id="tt<?php echo $i;?>" onclick="qh(<?php echo $i;?>);" >问答系统设置</dt>
             <dd id="nr<?php echo $i;?>" style="display:none"><ul class="list_detail">
            	<li><a href="ask_class.php" target="manFrame">问答分类管理</a></li>
            </ul>
            </dd>
<?php
}
?>
       </dl>
       </div>
</div>
</body>
</html>
