<?php   
//    require "../mysql/conn.php";
    header("Content-Type:image/png");  
    
    //开启session  
    session_start();  
      
    //随机4个数字  
    $code = "";  
    $arrcont = array();
    // $suiji = mt_rand(1000,9999);
    // $arr = str_split($suiji);
    // $arrcont = array_count_values($arr); 
    $dds = "qwertyuipasdfghjklzoxcvbnm123456789";
    for($i=0;$i<4;$i++){  
        $arr[$i] = $dds[rand(0,34)];  
        $code .= (string)$arr[$i];  
    }  
    //设置入session中，方便比对  
    $_SESSION['vaildcode'] = $code;
    if(strlen($code) < 4)
    {
        $code = $code."0";
    }
    //开始绘图  
    $width = 100;  
    $height = 25;  
    $img = imagecreatetruecolor($width,$height);  
      
    //填充背景色  
    $backcolor = imagecolorallocate($img,rand(0,130),rand(0,130),rand(0,130));  
    imagefill($img,0,0,$backcolor);  
      
    //获取随机较深颜色
    for($i=0;$i<4;$i++){     
        $textcolor = imagecolorallocate($img,rand(135,255),rand(135,255),rand(135,255));   
        imagechar($img,12,7+$i*25,3,(string)$arr[$i],$textcolor);  
        $_SESSION["validcode"] = $code;
    }  
      
    //显示图片  
    imagepng($img);  
//    $regtime = time();
//    $time = time() + 60 * 15;
//    $sql_cha = "insert into secret(secret,regtime,time) values('$code','$regtime','$time')";
//    mysqli_query($con,$sql_cha);

    //销毁图片  
    imagedestroy($img);  

?>  