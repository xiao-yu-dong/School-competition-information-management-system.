<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/tangchuang.css"/>
</head>

<body>
    <nav>
        <ul class="ul">
            <li><a href="#" id="login">登录</a></li>
        </ul>
    </nav>
    <div class="mask" id="mask">
        <div class="head">
            <div class="head_title">
                登录竞赛系统个人中心
            </div>
            <div class="close">
                <a href="#" id="close"></a>
            </div>
        </div>
        <!--con sta-->
        <div class="contain" id="contain">
            <div class="login">
                <div class="phone_login">
                    <a class="color" href="#">短信快捷登录</a>
                </div>
                <form action="#" method="post" class="form">
                    <div class="div_username u">
                        <label for="username" class="l_username"></label>
                        <input type="text" name="regname" class="username input" placeholder="手机/邮箱/用户名">
                    </div>
                    <div class="div_password u">
                        <label for="password" class="l_password"></label>
                        <input type="text" name="regpass" class="password input" placeholder="密码">
                    </div>
                    <div class="verify u">
                        <input type="text" name="verifyCode" class="verifyCode" maxlength="6" placeholder="验证码">
                        <a href="javascript:changeCode()">
				            <img src = 'validcode.php' style="width:100px;height:25px;" id="code"/>
				        </a>
                    </div>
                    <div class="u check">
                        <div class="auto_log">
                            <input type="checkbox" class="checkbox" checked="checked">
                            <label class="">下次自动登录</label>
                        </div>
                        <div><a href="#" target="_blank">登录遇到问题</a></div>
                    </div>
                    <input type="submit" value="登录" class="button_submit">
                </form>
                <div class="reg">
                    <a class="color change" style="background: none;" href="../login.php" target="_blank">立即注册</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/tangchuang.js"></script>
    <script type = "text/javascript">
        function changeCode() {
            document.getElementById("code").src = "validcode.php?id=" + Math.random();
        }
    </script>
    <?php 
    	if(isset($_POST['sub']))
    	{
    		$regname = $_POST['regname'];
    		$regpass = $_POST['regpass'];
    		$regsecret = $_POST['regsecret'];
    		require "mysql/conn.php";
    		$sql_cha = "select * from user where username = '$regname'";
    		$result = mysqli_query($con , $sql_cha);
    		$fetch = mysqli_fetch_array($result);
    		$row = mysqli_num_rows($result);
    		if($row > 0)
    		{
    			if($regpass == $fetch['userpass'])
    			{
    				if($regsecret == $_SESSION['vaildcode'])
    				{
    					$_SESSION['username'] = $regname;
    					echo "<script>";
    					echo "window.location.href = 'index.php'";
    					echo "</script>";
    				}
    				else
    				{
    					echo "验证码错误";
    				}
    			}
    			else
    			{
    				echo "密码错误";
    			}
    		}
    		else
    		{
    			echo "用户名不存在";
    		}
    	}
    ?>
        
</body>

</html>