<?php session_start(); ?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>主页</title>
		<link rel="stylesheet" href="css/Page.css" type = "text/css">
		<script type="text/javascript" src = "js/jquery-1.11.3.min.js"></script>
		<script type = "text/javascript">
			window.onload = function(){
				var leiDiv = document.getElementById('stu');
				var yuanxiDiv = document.getElementById('yuan');
				var itrem1 = document.getElementById('itrem1');
				var itrem2 = document.getElementById('itrem2');
				itrem1.onmousedown = function(){
					leiDiv.style.display = "block";
					yuanxiDiv.style.display = "none";
				};
				itrem2.onmousedown = function(){
					leiDiv.style.display = "none";
					yuanxiDiv.style.display = "block";
				};
			};
		</script>
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
			<iframe src="全屏自适应轮播/index.html" frameborder="0" id = "lun" scrolling = 'no'></iframe>
			<div id = "ge">
				<ul class = "geList">
					<li><a href="javascript:;" id = "itrem1">学生荣誉榜</a></li>
					<li><a href="javascript:;" id = "itrem2">各院系赛事</a></li>
					<li><a href="javascript:;">平时校级赛</a></li>
					<li><a href="javascript:;">国/省赛事</a></li>
					<li><a href="javascript:;">各竞赛视频</a></li>
					<li><a href="javascript:;">联系我们</a></li>
				</ul>
			</div>
			<div id = "body">
				<div id = "stu">
					<table id="stuList">
						<th>排名</th>
						<th>班级</th>
						<th>姓名</th>
						<th>获奖</th>
						<th>学分</th>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				<div id = "yuan">
					<table border="0" cellspacing="" cellpadding="">
						<tr class="tupian">
							<td><img src="jqueryxzlbt1/image/a3.png"/></td>
							<td><img src="jqueryxzlbt1/image/a2.png"/></td>
							<td><img src="jqueryxzlbt1/images/a4.png"/></td>
						</tr>
						<tr class="yuanxi_ming">
							<td>××××院系</td>
							<td>××××院系</td>
							<td>××××院系</td>
						</tr>
						<tr>
							<td><img src="jqueryxzlbt1/image/a3.png"/></td>
							<td><img src="jqueryxzlbt1/image/a2.png"/></td>
							<td><img src="jqueryxzlbt1/images/a4.png"/></td>
						</tr>
						<tr>
							<td>××××院系</td>
							<td>××××院系</td>
							<td>××××院系</td>
						</tr>
						<tr>
							<td><img src="jqueryxzlbt1/image/a3.png"/></td>
							<td><img src="jqueryxzlbt1/image/a2.png"/></td>
							<td><img src="jqueryxzlbt1/images/a4.png"/></td>
						</tr>
						<tr>
							<td>××××院系</td>
							<td>××××院系</td>
							<td>××××院系</td>
						</tr>
					</table>
				</div>
			</div>
			<div id = "guanyu">
				<p>© 版权所有 || 敖赛欲丘 || 姓名 || 余浩源 、 肖裕东 、 邱垂杰</p>
			</div>
		</div>
	</body>
</html>