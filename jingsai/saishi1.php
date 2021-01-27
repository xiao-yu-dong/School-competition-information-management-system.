<?php
	session_start();
	require 'mysql/conn.php';
?>
<html>
	<head>
		<meta charset = 'utf-8'> 
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
		<link rel="stylesheet" type="text/css" href="css/zhuye.css"/>
		<link rel="stylesheet" type="text/css" href="css/saishi.css"/>
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
					<div id="daohang_lan">
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
				</div>
				<hr>
				<iframe src="jqueryxzlbt1/index.html" frameborder="0" id = "lun" scrolling = 'no'></iframe>
				<div id = "ad">
					<div id="ac">
						<ul id = "guoList">
							<p id = "guo_title">国省赛事</p>
							<?php 
								
								$sql_guo = "SELECT * FROM xinxi WHERE Event_type_select = '国省赛事' ORDER BY id DESC";   //ORDER BY id DESC  sql语句逆序查询id
								$index_guo = 0;
								$result_guo = mysqli_query($con, $sql_guo);
								$num_guo = mysqli_num_rows($result_guo);
								if($num_guo == 0)
								{
									echo "<br><br><br><li>暂时还没有赛事</li>";
								}
								while($row_guo = mysqli_fetch_array($result_guo))
								{
									$id_guo = $row_guo['id'];
									$cha_guo = "chakan1.php?id=".$id_guo;
									// chakan.php?id={$id}
									$index_guo++;
									if($index_guo == 5)
									{
										break;
									}
							    ?>
							    <li><a href="<?php echo $cha_guo; ?>"><?php echo $row_guo['Event_name']; ?></a></li>
							<?php } ?>
						</ul>
							<ul id = "xiaoList">
								<p id = "xiao_title">校级赛事</p>
							<?php 
								
								$sql_xiao = "SELECT * FROM xinxi WHERE Event_type_select = '校级赛事' ORDER BY id DESC";   //ORDER BY id DESC  sql语句逆序查询id
								$index_xiao = 0;
								$result_xiao = mysqli_query($con, $sql_xiao);
								$num_xiao = mysqli_num_rows($result_xiao);
								if($num_xiao == 0)
								{
									echo "<br><br><br><li>暂时还没有赛事</li>";
								}
								while($row_xiao = mysqli_fetch_array($result_xiao))
								{
									$id_xiao = $row_xiao['id'];
									$cha_xiao = "chakan1.php?id=".$id_xiao;
									// chakan.php?id={$id}
									$index_xiao++;
									if($index_xiao == 5)
									{
										break;
									}
							    ?>
							    <li><a href="<?php echo $cha_xiao; ?>"><?php echo $row_xiao['Event_name']; ?></a></li>

							<?php }  ?>
							</ul> 
							<ul id = "yuanList">
								<p id = "yuan_title">院级赛事</p>
							<?php 
								$sql_yuan = "SELECT * FROM xinxi WHERE Event_type_select = '院级赛事' ORDER BY id DESC";   //ORDER BY id DESC  sql语句逆序查询id
								$index_yuan = 0;
								$result_yuan = mysqli_query($con, $sql_yuan);
								$num_yuan = mysqli_num_rows($result_yuan);
								if($num_yuan == 0)
								{
									echo "<br><br><br><li>暂时还没有赛事</li>";
								}
								while($row_yuan = mysqli_fetch_array($result_yuan))
								{
									$id_yuan = $row_yuan['id'];
									$cha_yuan = "chakan1.php?id=".$id_yuan;
									// chakan.php?id={$id}
									$index_yuan++;
									if($index_yuan == 5)
									{
										break;
									}
							    ?>
							    <li><a href="<?php echo $cha_yuan; ?>"><?php echo $row_yuan['Event_name']; ?></a></li>
							<?php } ?>
							</ul>
							<ul id = "ziList">
								<p id = "zi_title">自组赛事</p>
							<?php 
								$sql_zi = "SELECT * FROM xinxi WHERE Event_type_select = '自组赛事' ORDER BY id DESC";   //ORDER BY id DESC  sql语句逆序查询id
								$index_zi = 0;
								$result_zi = mysqli_query($con, $sql_zi);
								$num_zi = mysqli_num_rows($result_zi);
								if($num_zi == 0)
								{
									echo "<br><br><br><li>暂时还没有赛事</li>";
								}
								while($row_zi = mysqli_fetch_array($result_zi))
								{
									$id_zi = $row_zi['id'];
									$cha_zi = "chakan1.php?id=".$id_zi;
									// chakan.php?id={$id}
									$index_zi++;
									if($index_zi == 5)
									{
										break;
									}
							    ?>
							    <li><a href="<?php echo $cha_zi; ?>"><?php echo $row_zi['Event_name']; ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<div id = "guanyu">
						<p>© 版权所有 || 敖赛欲丘 || 姓名 || 余浩源 、 肖裕东 、 邱垂杰</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>