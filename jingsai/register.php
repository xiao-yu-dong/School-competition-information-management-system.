<?php
	session_start();
?>
<html>
	<head>
		<meta charset = 'utf-8'> 
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
		<link rel="stylesheet" type="text/css" href="css/zhuye.css"/>
	</head>
	<body>
		<div id="big">
			<div id="neirong">
				<div id="top_1">
					<div class="lianxi">         
						<ul>
							<li>联系我们</li>
							<li>|</li>
							<li>制作方</li>
							<li>|</li>
							<li>门户</li>
							<li>|</li>
							<li>邮箱</li>
						</ul>
					</div>
				</div>
				<div id="logo_daohang">
					<img class="logo" src="image/logo.png"/>
					<p>竞赛信息管理系统</p>
					<ul class = "daohang_1">
						<li class="daohuang">
							<a href="#">首页</a>
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
								<li><a href="#">赛事新闻</a></li>
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
			<table>
				<form action="" method = "post">
					<tr>
						<td>用户名:</td>
						<td>
							<input type="text" name = "regname">
						</td>
					</tr>
					<tr>
						<td>密&nbsp;&nbsp;&nbsp;码:</td>
						<td>
							<input type="password" name = "regpass">
						</td>
					</tr>
					<tr>
						<td>验证码:</td>
						<td>
							<input type="text" name = "regsecret">
							<a href="javascript:changeCode()">
				                <img src="LoginModel-master/validcode.php" style="width:100px;height:25px;" id="code"/>
				            </a>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name = "sub" value = "登录">
						</td>
					</tr>
				</form>
			</table>
		</div>
			</div>
		</div>
				
		<script type = "text/javascript">
            function changeCode() {
                document.getElementById("code").src = "LoginModel-master/validcode.php?id=" + Math.random();
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