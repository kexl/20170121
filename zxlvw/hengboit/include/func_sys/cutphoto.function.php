<?php 
/* 
*        $o_photo 原图路径 
*        $d_photo 处理后图片路径 
*        $width   定义宽 
*        $height  定义高 
*        调用方法  cutphoto("test.jpg","temp.jpg",256,146); 
*/ 

function cutphoto($o_photo,$d_photo,$width,$height){ 

$temp_img = imagecreatefromjpeg($o_photo); 
$o_width  = imagesx($temp_img);                                //取得原图宽 
$o_height = imagesy($temp_img);                                //取得原图高 

//判断处理方法 
if($width>$o_width || $height>$o_height){        //原图宽或高比规定的尺寸小,进行压缩 

        $newwidth=$o_width; 
        $newheight=$o_height; 

        if($o_width>$width){ 
                $newwidth=$width; 
                $newheight=$o_height*$width/$o_width; 
        } 

        if($newheight>$height){ 
                $newwidth=$newwidth*$height/$newheight; 
                $newheight=$height; 
        } 

        //缩略图片 
        $new_img = imagecreatetruecolor($newwidth, $newheight);  
        imagecopyresampled($new_img, $temp_img, 0, 0, 0, 0, $newwidth, $newheight, $o_width, $o_height);  
        imagejpeg($new_img , $d_photo);                 
        imagedestroy($new_img); 


}else{                                                                                //原图宽与高都比规定尺寸大,进行压缩后裁剪 

        if($o_height*$width/$o_width>$height){        //先确定width与规定相同,如果height比规定大,则ok 
                $newwidth=$width; 
                $newheight=$o_height*$width/$o_width; 
                $x=0; 
                $y=($newheight-$height)/2; 
        }else{                                                                        //否则确定height与规定相同,width自适应 
                $newwidth=$o_width*$height/$o_height; 
                $newheight=$height; 
                $x=($newwidth-$width)/2; 
                $y=0; 
        } 

        //缩略图片 
        $new_img = imagecreatetruecolor($newwidth, $newheight);  
        imagecopyresampled($new_img, $temp_img, 0, 0, 0, 0, $newwidth, $newheight, $o_width, $o_height);  
        imagejpeg($new_img , $d_photo);                 
        imagedestroy($new_img); 
         
        $temp_img = imagecreatefromjpeg($d_photo); 
        $o_width  = imagesx($temp_img);                                //取得缩略图宽 
        $o_height = imagesy($temp_img);                                //取得缩略图高 

        //裁剪图片 
        $new_imgx = imagecreatetruecolor($width,$height); 
        imagecopyresampled($new_imgx,$temp_img,0,0,$x,$y,$width,$height,$width,$height); 
        imagejpeg($new_imgx , $d_photo); 
        imagedestroy($new_imgx); 
} 

} 
?>