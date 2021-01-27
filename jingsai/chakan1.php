<?php
	session_start();
?>
<html>
	<head>
		<meta charset = 'utf-8'> 
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
		<link rel="stylesheet" type="text/css" href="css/zhuye.css"/>
		<style type = 'text/css'>
			*
			{
				margin: 0px;
				padding: 0px;
			} 
			#outer
			{
				width: 100%;
				border: 1px solid red;
				position: relative;
				
			}
			#biaoti
			{
				text-align: center;
				font-size: 18px;
				margin-top: 30px;
			}
			#fu
			{
				text-align: center;
				margin-top: 20px;
			}
			#xiang
			{
				width: 70%;
				border: 1px solid;
				padding: 20px;
				margin: auto;
				margin-top: 20px;
				
			}
			#guanyu
			{
				margin-top: 315px;
				width: 100%;
				height: 100px;
				border: 1px solid;
				background: rgb(10,10,10);
				color:  rgba(180,180,180, 0.5);
				text-align: center;
				position: relative;
				bottom: 0px;

			}
			#guanyu
			{
				padding-top: 50px;
			}
			body
			{
				width: 100%;
			}

		</style>
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
				<?php 
					require "mysql/conn.php";
					$id = $_GET['id'];
					$sql_cha = "select * from xinxi where id = '$id'";
					$result_cha = mysqli_query($con, $sql_cha);
					$row = mysqli_fetch_array($result_cha);
				 ?>
				<div id = "outer">
					<div id = "biaoti">
						<h1><?php echo $row['Event_name']; ?></h1>
					</div>
					<div id = "fu">
						<p>作者：<?php echo $row['fabuzhe']; ?>&nbsp;&nbsp;&nbsp;发布时间：<?php echo $row['time']; ?></p>
					</div>
					<div id = "xiang">
						<p>
							<?php 
								echo $row['Event_details'];
							 ?>
						</p>
						<br />
						<br />
						<br />
						<br />
						<div id = "lianxi">
							<p>联系人：<?php echo $row['teacher']; ?></p>
							<p>联系电话：<?php echo $row['phone']; ?></p>
							附件：<a href="<?php echo $row['Dow']; ?>"><?php echo $row['word']; ?></a>
						</div>
					</div>
					<div id = "guanyu">
						<p>© 版权所有 || 敖赛欲丘 || 姓名 || 余浩源 、 肖裕东 、 邱垂杰</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>