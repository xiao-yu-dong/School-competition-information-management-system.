<?php 
	session_start(); 
	require "../mysql/login_exit.php";
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/zhuye.css"/>
		<link rel="stylesheet" type="text/css" href="../css/saishi.css"/>
		<link rel="stylesheet" type = "text/css" href="../css/index.css">
		<script type="text/javascript" charset="utf-8" src="ueditor.config.js"></script><!---->
	    <script type="text/javascript" charset="utf-8" src="ueditor.all.js"> </script>
	    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
	    <!-- <script type="text/javascript">
	    	window.onload = function(){
	    		
	    	};
	    </script> -->
	</head>
	<body>
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
					<img class="logo" src="../image/logo.png"/>
					<p>竞赛信息管理系统</p>
					<ul class = "daohang_1">
						<li class="daohuang">
							<a href="../index.php">首页</a>
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
		<div id = "outer" ><!-- 外框 -->
			<form action="" method = "post" enctype="multipart/form-data" id = "form">
				<div id = "one" style="">
					<span class = "Event_name" style="margin-right: 10px;font-size: 20px;">赛事名称:</span>
					<span class = "Event_name_input">
						<input type="text" style="width: 170px;height: 30px;" name = "Event_name" class = "event"><!-- 赛事名称输入框-->
					</span>
				</div>
				<div id = "two">
					<span class = "Event_type">赛事类型:</span>
					<span class = "Event_type_input">
						<select name="Event_type_select[]" id="sop" style="width: 150px;height: 30px;"><!--赛事类型选择框-->
							
							<option value="国省赛事">国省赛事</option>
							<option value="校级赛事">校级赛事</option>
							<option value="院级赛事">院级赛事</option>
							<option value="自组赛事">自组赛事</option>
						</select>
					</span>
				</div>
				<div id = "three">
					<span class = "sponsor" style="font-size: 20px;">主办单位:</span>
					<span class = "sponsor_input">
						<input type="text" name = "sponsor" style="width: 170px;height: 30px;"><!--主办单位输入框-->
					</span>
				</div><br>
				<div id = "four">
					<p class = 'synopsis' style="font-size: 20px;" >赛事简介:</p><br>
					<span class = 'synopsis_input'>
						<script id="content" type="text/plain" style="width:700px;height:515px;margin-bottom: 10px; float: left;" name = "synopsis">可以点击右上角进入全屏编辑</script><!--赛事简介文本编辑器-->
						<script type="text/javascript">
							var ue = UE.getEditor('content',{
								autoHeightEnabled : false,	//去掉自动延伸，改为固定大小
								toolbars : [
								    ['fullscreen', 'source', 'undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
								],//使用传参的方法规定文本编辑器的功能
								wordCount : false,	//关闭字数统计
								elementPathEnabled : false 	//关闭元素路劲
							});
						</script>
					</span>
				</div>
				<div id = "five">
					<p class = "Event_details" style="font-size: 20px;line-height: 10px;position: relative;top:-20px;">赛事详情:</p><br>
					<span class = "Event_details_input">
						<script id="editor" type="text/plain" style="width:700px;height:440px;" name = "Event_details">可以点击右上角进入全屏编辑</script><!--赛事详情文本编辑器-->
						<script type="text/javascript">
							var ue = UE.getEditor('editor',{
								autoHeightEnabled : false,//去掉自动延伸
								wordCount : false,//关闭数字统计功能
								elementPathEnabled : false,//关闭元素路径功能
								toolbars : [
								    ['fullscreen', 'source', 'undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|' ,'rowspacingtop', 'rowspacingbottom', 'lineheight', 'indent', "|" , 'customstyle', 'paragraph', 'fontfamily', 'fontsize', "|" , 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', "|" , 'touppercase', 'tolowercase', "|" , 'link', 'unlink', "|" , 'emotion', 'pagebreak', 'horizontal', 'template',  'insertcode', "|" , 'date', 'time', 'spechars', 'snapscreen', "|" , 'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', "|" , 'preview', 'searchreplace', 'drafts', 'simpleupload', 'insertimage'] 
								]//使用传参的方法，规定文本编辑器的功能
							});
						</script>
					</span>
				</div><br><br><br>
				<div id = "six">
					<span class = "Upload_the_cover" style="float: left; margin-right: 15px;font-size: 20px;">上传封面 :</span>
					<span class = "Upload_the_cover_input">
						<input type="file" name = "myfile" accept = "image/gif,image/jpeg,image/jpg,image/png" style="float: left;margin-right: 100px;" /><!--选择图片框-->
					</span>
				</div>
				<div id = "correlation">
					<span class = "teacher" style="float: left;margin-right: 15px;font-size: 20px;">教师名字 :</span>
					<span class = "teacher_name">
						<input type="text" name = "teacher_user" style="float: left;width: 170px;height: 30px;margin-right: 175px;"> <!--教师名字输入框-->
					</span>
					<span class = 'phone' style="float: left;margin-right: 15px;font-size: 20px;">手机号码</span>
					<span class = 'teacher_phone'>
						<input type="text" name = "phone" style="float: left;margin-right: 10px; width: 170px;height: 30px;"><!--电话输入框-->
					</span>
				</div>
				<div id = "seven">
					<span class = "time">发布时间</span>
					<span class = "issue_time">
						<?php 
							date_default_timezone_set('PRC'); //设置中国时区
							$issue_time = date("Y-m-d H:i:s"); //当前时间
							echo $issue_time;//输出当前时间
						?>
					</span>
				</div><br><br>
				<div id = "eight">
					<span class = "sub">
						<input type="submit"  style="width: 120px; margin-left: 300px; margin-right: 365px; font-size: 20px;" name = "sub" value = "发布赛事"> <!--提交表单-->
					</span>
					<span class = "btn" >
						<a href="../saishi.php" target="_black" id = 'yu'><button style="width: 80px; font-size: 20px;">预览</button>	</a>
					</span>
				</div>
			</form>
		</div>

		<?php 
			if(isset($_POST['sub']))
			{
				require "../mysql/conn.php";//连接数据库
				$Event_name = $_POST['Event_name']; //赛事名称
				$Event_type_select = $_POST['Event_type_select'];//赛事类型
				$sponsor = $_POST['sponsor'];//主办单位
				$synopsis = $_POST['synopsis'];//赛事简介
				$Event_details = $_POST['Event_details'];//赛事详情
				$teacher_user = $_POST['teacher_user'];//教师名字
				$phone = $_POST['phone'];//电话
				$file_tmp = $_FILES['myfile']['tmp_name'];
				$file_name = $_FILES['myfile']['name'];
				$file_size = $_FILES['myfile']['size'];
				$file_type = $_FILES['myfile']['type'];
				$Event_type_select_str = implode(",", $Event_type_select);
				
/****************************word类**********************************************************************/
					$name_word = $Event_name.".doc";
					$wordname = "../word/".$name_word;
						Class word//文档类
					   	{ 
					      	function start()
					      	{
					        	ob_start();
					       	 	echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
					        	xmlns:w="urn:schemas-microsoft-com:office:word"
					        	xmlns="http://www.w3.org/TR/REC-html40">
					        	<head><meta charset = "utf-8"></head><body>';//office的命名空间
						    }
					        function save($path)
						    {
						
						       echo "</body></html>";
						       $data = ob_get_contents();
						       ob_end_clean();
						
						       $this->wirtefile ($path,$data);
						    }
						
						    function wirtefile ($fn,$data)
						    {
						        $fp=fopen($fn,"wb");
						        fwrite($fp,$data);
						        fclose($fp);
						    }
						}
						$lianxi = $teacher_user;
						$Phone = $phone;
						$title = $Event_name;
						$html = $Event_details;
						$word = new word();
						$word->start();
						
						$word_name = "../word/".$name_word;
						$wordname = "http://localhost/jingsai/word/".$name_word;
						echo "<h1 stylee='text-align:center;'>".$title."</h1>";
						echo $html;
						echo "联系人：".$lianxi;
						echo "<br>";
						echo "联系电话：".$Phone;
						$word -> save($word_name);
						ob_flush();
						flush();
/****************************验证输入的信息*****************************************************************/
				if(!empty($Event_name))//如果赛事名称不为空，就继续判断
				{
					if(strlen($Event_name) <= 90)//如果赛事名称长度小于30则继续判断
					{
						if(!empty($sponsor))//如果主办单位不为空，则继续判断
						{
							if(!empty($synopsis))//赛事简介不为空，继续判断
							{
								if(!empty($Event_details))//赛事详情不为空，继续判断
								{
									if(!empty($teacher_user))//教师名字不为空，继续判断
									{
										if(!empty($phone))//电话不为空，继续判断
										{
											$reg = "/^(0|86|17951)?(13[0-9]|15[012356789]|166|17[3678]|18[0-9]|14[57])[0-9]{8}$/";//手机号码的正则表达式
											
											$username = $_SESSION['username'];
											if(preg_match($reg, $phone))//输入的手机号码符合正则表达式
											{
												switch($_FILES['myfile']['error']) //PHP规定的文件错误	
												{
													case 3://文件只有部分被上传
														echo "<script>alert('文件只有部分被上传');</script>";
														break;
													case 0://上传没有错误
														if($_FILES['myfile']['type'] == "image/gif" || $_FILES['myfile']['type'] == "image/jpeg" || $_FILES['myfile']['type'] == "image/jpg" || $_FILES['myfile']['type'] == "image/png")//规定上传图片的格式，格式只能是JPEG、jpg、GIF、PNG
														{
															if($_FILES['myfile']['size'] < 1024000)//规定了上传图片的大小，不能超过1M
															{
																$filename = "../upload/".$Event_name.date("YmdHis").$_FILES['myfile']['name'];//图片的保存路劲
																$filename = iconv("UTF-8", "gb2312", $filename);//编码转换
																if(file_exists($filename))//判断图片是否存在
																{
																	echo "该文件已存在";
																}
																else
																{
																	move_uploaded_file($_FILES['myfile']['tmp_name'], $filename);//上传图片	
																}
															}
															else
															{
																echo "图片不能超过1M";
															}
														}
														else
														{
															echo '图片格式只能是JPEG/JPG/GIF/PNG';
														}
														break;
												}
												
												$sql = "INSERT INTO xinxi(Event_name, Event_type_select, sponsor, synopsis, Event_details, teacher, phone,time,fabuzhe, Dow, word) VALUES('$Event_name', '$Event_type_select_str', '$sponsor', '$synopsis', '$Event_details', '$teacher_user', '$phone', '$issue_time', '$username', '$wordname', '$name_word')";
												$result = mysqli_query($con , $sql);

												if($result)
												{
													echo "<script>window.open('http://localhost/jingsai/xianqing.php?name={$wordname}&Event={$Event_name}')</script>";
												}
												else
												{	
													echo "发布失败，请查看是否输入有错";
													exit();
												}
											}
											else
											{
												echo "手机号码格式错误";
												exit();
											}	
										}
										else//电话为空
										{
											echo "电话号码不能为空";
											exit();
										}
									}
									else//教师名字为空
									{
										echo "教师名字不能为空";
										exit();
									}
								}
								else//赛事详情为空
								{
									echo "赛事详情不能为空";
									exit();
								}
							}
							else//赛事简介为空
							{
								echo "赛事简介不能为空";
								exit();
							}
						}
						else//主办单位为空
						{
							echo "主办单位不能为空";
							exit();
						}
					}
					else//赛事长度大于30
					{		
						echo "赛事长度不能大于30";
						exit();
					}	
				}
				else//赛事名称为空
				{
					echo "赛事名称不能为空";
					exit();
				}
 			}
		 ?>
	</body>
</html> 
<!--
	toolbars : [
    [
        'anchor', //锚点
        'undo', //撤销
        'redo', //重做
        'bold', //加粗
        'indent', //首行缩进
        'snapscreen', //截图
        'italic', //斜体
        'underline', //下划线
        'strikethrough', //删除线
        'subscript', //下标
        'fontborder', //字符边框
        'superscript', //上标
        'formatmatch', //格式刷
        'source', //源代码
        'blockquote', //引用
        'pasteplain', //纯文本粘贴模式
        'selectall', //全选
        'print', //打印
        'preview', //预览
        'horizontal', //分隔线
        'removeformat', //清除格式
        'time', //时间
        'date', //日期
        'unlink', //取消链接
        'insertrow', //前插入行
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'deletecaption', //删除表格标题
        'inserttitle', //插入标题
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'cleardoc', //清空文档
        'insertparagraphbeforetable', //"表格前插入行"
        'insertcode', //代码语言
        'fontfamily', //字体
        'fontsize', //字号
        'paragraph', //段落格式
        'simpleupload', //单图上传
        'insertimage', //多图上传
        'edittable', //表格属性
        'edittd', //单元格属性
        'link', //超链接
        'emotion', //表情
        'spechars', //特殊字符
        'searchreplace', //查询替换
        'map', //Baidu地图
        'gmap', //Google地图
        'insertvideo', //视频
        'help', //帮助
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'forecolor', //字体颜色
        'backcolor', //背景色
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表
        'fullscreen', //全屏
        'directionalityltr', //从左向右输入
        'directionalityrtl', //从右向左输入
        'rowspacingtop', //段前距
        'rowspacingbottom', //段后距
        'pagebreak', //分页
        'insertframe', //插入Iframe
        'imagenone', //默认
        'imageleft', //左浮动
        'imageright', //右浮动
        'attachment', //附件
        'imagecenter', //居中
        'wordimage', //图片转存
        'lineheight', //行间距
        'edittip ', //编辑提示
        'customstyle', //自定义标题
        'autotypeset', //自动排版
        'webapp', //百度应用
        'touppercase', //字母大写
        'tolowercase', //字母小写
        'background', //背景
        'template', //模板
        'scrawl', //涂鸦
        'music', //音乐
        'inserttable', //插入表格
        'drafts', // 从草稿箱加载
        'charts', // 图表
    ]
]
-->