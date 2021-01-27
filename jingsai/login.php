<?php
    session_start();
    require "mysql/conn.php";
?>
<html>
    <head>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="css/Page.css" type = "text/css">
        <link rel="stylesheet" type = "text/css" href="css/login.css">
        <script type="text/javascript" src = "js/index.js"></script>
        <title>注册</title>
    </head>
    <body>
        <div id = "outer">  
            <div id = "top">
                <ul class="topLeft">
                    <li>联系我们</li>
                    <li>|</li>
                    <li>制作方</li>
                    <li>|</li>
                    <li>门户</li>
                    <li>|</li>
                    <li>邮箱</li>
                </ul>
                <ul class = "topRight"> 
                    <?php if(!isset($_SESSION['username'])){ ?>
                        <li><a href="login.php">注册</a></li>
                        <li>|</li>
                        <li><a href="register.php">登录</a></li>
                    <?php }else{ ?>
                        <li><a href="geren.php">个人中心</a></li>
                        <li>|</li>
                        <li><a href="ueditor/index.php">发布赛事</a></li>
                        <li>|</li>
                        <li><a href="mysql/exit.php">退出登录</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id = "head">
                <img src="image/logo.png" alt="">
                <p>竞赛信息管理系统</p>
                <ul class = "daohang_1">
                    <li class="daohuang">
                        <a href="index.php">首页</a>
                    </li>
                    <li class="daohuang">
                        <a href="#">报名系统</a>
                        <ul>
                            <li><a href="#">赛事报名</a></li>
                            <li><a href="#">我要查看</a></li>
                            <li><a href="#">个人资料</a></li>
                            <li><a href="#">个人申报</a></li>
                        </ul>
                    </li>
                    <li class="daohuang">
                        <a href="#">赛事动态</a>
                        <ul>
                            <li><a href="#">通知文件</a></li>
                            <li><a href="#">系统公告</a></li>
                            <li><a href="saishi1.php">赛事新闻</a></li>
                        </ul>
                    </li>
                    <li class="daohuang">
                        <a href="#">赛事咨询</a>
                        <ul>
                            <li><a href="#">成绩咨询</a></li>
                            <li><a href="#">比赛地点咨询</a></li>
                            <li><a href="#">联系我们</a></li>
                        </ul>
                    </li>
                    <li class="daohuang">
                        <a href="#">赛事后期</a>
                        <ul>
                            <li><a href="#">学校宣传</a></li>
                            <li><a href="#">学生宣传</a></li>
                            <li><a href="#">赛事详情</a> </li>
                        </ul>
                    </li>                       
                </ul>
            </div>
            <hr>
    	<div class="denglu">
    		<table border="0" cellspacing="" cellpadding="">
		        <form action="" method = "post">
                    <tr>
                    	<td>用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td><td><input type="text" name = "username"></td>
                    	<td><span id = "spanuser">*用户名长度为6-8位</span></td>
            		</tr>
            		<tr>
            			<td>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
            			<td><input type="password" name = "userpass"></td>
            			<td><span id = "spanpass">*密码长度为6-18位，不能全为数字</span></td>
            		</tr>
					<tr>
						<td>确认密码：</td>
						<td><input type="password" name = "vailpass" ></td>
						<td><span id = "spanvail">确认密码要和密码一致</span></td>
					</tr>
					<tr>
						<td>验&nbsp;&nbsp;证&nbsp;&nbsp;码：</td>
						<td><input type="text" name = "secret"></td>
						<td>
							<a href="javascript:changeCode()">
		                	<img src="LoginModel-master/validcode.php" style="width:100px;height:25px;" id="code"/>
		            	</a></td>
					</tr>
		            <tr><td><input type="submit" name = "sub" value = "注册"></td></tr>
		        </form>
	        </table>
	        <script type = "text/javascript">
	            function changeCode() {
	                document.getElementById("code").src = "LoginModel-master/validcode.php?id=" + Math.random();
	            }
	        </script>
        </div>
        <?php
            if(isset($_POST['sub']))
            {
                $username = $_POST['username'];
                $userpass = $_POST['userpass'];
                $vailpass = $_POST['vailpass'];
                $secret = $_POST['secret'];
                // $zheng = "/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
                $index = 0;
                //验证
                $sql_cha = "select * from user where username = '$username'";//查找用户名是否存在
                $result = mysqli_query($con,$sql_cha);

                if($username != '')//用户名是否不为空
                {
                    if(mysqli_num_rows($result) == 0)//用户名是否存在
                    {
                        if(strlen($username) >= 6 && strlen($username) <= 8)//规定用户名的长度
                        {
                            if($userpass != '')//密码是否不为空
                            {
                                if(!is_numeric($userpass))//密码是否不为全数字
                                {
                                    if(strlen($userpass) >= 6 && strlen($userpass) <= 18)//规定了密码的长度
                                    {
                                        if($vailpass != '')//确认密码是否不为空
                                        {
                                            if($vailpass == $userpass)//确认密码是否和密码一致
                                            {
                                                if($secret != '')//验证码是否不为空
                                                {
                                                    if($secret == $_SESSION['validcode'])//验证码有没有输入正确
                                                    {
                                                        $_SESSION['username'] = $username;//将用户名存到session里
                                                        date_default_timezone_set('PRC'); //设置中国时区
                                                        $regtime = date("Y-m-d H:i:s");//当前时间
                                                        $sql_xie = "insert into user(username,userpass,email,regtime) values('$username','$userpass','email','$regtime')";//将用户注册的信息存入数据库
                                                        $ew = mysqli_query($con,$sql_xie);
                                                        echo "<script>window.location.href = 'index.php'</script>";
                                                    }
                                                    else
                                                    {
                                                    	echo "<script>";
						                				echo "alert('验证码错误')";
						                				echo "</script>";
                                                    }
                                                }
                                                else
                                                {
                                                	echo "<script>";
					                				echo "alert('验证码不能为空')";
					                				echo "</script>";
                                                }
                                            }
                                            else
                                            {
                                            	echo "<script>";
                								echo "alert('确认密码要和密码一致')";
                								echo "</script>";
                                            }
                                        }
                                        else
                                        {
                                        	echo "<script>";
                							echo "alert('确认密码不能为空')";
                							echo "</script>";
                                        }
                                    }
                                    else
                                    {
                                    	echo "<script>";
                						echo "alert('密码长度为6-18位')";
                						echo "</script>";
                                    }
                                }
                                else
                                {
                                	echo "<script>";
                					echo "alert('密码不能全为数字')";
                					echo "</script>";
                                }
                            }
                            else
                            {
                            	echo "<script>";
                				echo "alert('密码不能为空')";
                				echo "</script>";
                            }
                        }
                        else
                        {
                        	echo "<script>";
                			echo "alert('用户名长度为6-8位')";
                			echo "</script>";
                        }
                    }
                    else
                    {
                    	echo "<script>";
                		echo "alert('用户名已注册')";
                		echo "</script>";
                    }
                }
                else
                {
                	echo "<script>";
                	echo "alert('用户名不能为空')";
                	echo "</script>";
                }

            }

        ?>
    </div>
    </body>
</html>
