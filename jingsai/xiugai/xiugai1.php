<?php session_start(); ?>
<html>
	<head>
		<meta charset = "utf-8">
		<title></title>
		<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script><!---->
	    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.js"> </script>
	    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
	</head>
	<body>
		<?php
			require "../mysql/conn.php"; 
			$id = $_GET['id'];
			$delete = "../delete/delete.php?id=".$id;
			$sql = "SELECT * FROM xinxi WHERE id = '$id'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$Event_name = $row['Event_name'];//赛事名称
			$Event_type_select = $row['Event_type_select'];//赛事类型
			$sponsor = $row['sponsor'];//主办单位
			$synopsis = $row['synopsis'];//赛事简介
			$Event_details = $row['Event_details'];//赛事详情
			$teacher = $row['teacher'];//负责教师姓名
			$Phone = $row['phone'];//负责教师电话
		 ?>
		 <div id = "outer" ><!-- 外框 -->
			<form action="" method = "post" enctype="multipart/form-data">
				<div id = "one">
					<span class = "Event_name">赛事名称</span>
					<span class = "Event_name_input">
						<input type="text" name = "Xname" class = "event" value = "<?php echo $Event_name; ?>"><!-- 赛事名称输入框-->
					</span>
				</div>
				<div id = "two">
					<span class = "Event_type">赛事类型</span>
					<span class = "Event_type_input">
						<select name="Xtype_select[]" id="" ><!--赛事类型选择框-->
							<option value = "<?php echo $Event_type_select;?>"><?php echo $Event_type_select; ?></option>
							<option value="国省赛事">国省赛事</option>
							<option value="校级赛事">校级赛事</option>
							<option value="院级赛事">院级赛事</option>
							<option value="自组赛事">自组赛事</option>
						</select>
					</span>
				</div>
				<div id = "three">
					<span class = "ponsors">主办单位</span>
					<span class = "sponsor_input">
						<input type="text" name = "Xsponsor" value = "<?php echo $sponsor; ?>"><!--主办单位输入框-->
					</span>
				</div>
				<div id = "four">
					<span class = 'synopsis'>赛事简介</span>
					<span class = 'synopsis_input'>
						<script id="content" type="text/plain" style="width:500px;height:100px;" name = "Xsynopsis"><?php echo $synopsis; ?></script><!--赛事简介文本编辑器-->
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
					<span class = "Event_details">赛事详情</span>
					<span class = "Event_details_input">
						<script id="editor" type="text/plain" style="width:500px;height:200px;" name = "Xdetails"><?php echo $Event_details; ?></script><!--赛事详情文本编辑器-->
						<script type="text/javascript">
							var ue = UE.getEditor('editor',{
								autoHeightEnabled : false,//去掉自动延伸
								wordCount : false,//关闭数字统计功能
								elementPathEnabled : false,//关闭元素路径功能
								toolbars : [
								    ['fullscreen', 'source', 'undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|' ,'rowspacingtop', 'rowspacingbottom', 'lineheight', 'indent', "|" , 'customstyle', 'paragraph', 'fontfamily', 'fontsize', "|" , 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', "|" , 'touppercase', 'tolowercase', "|" , 'link', 'unlink', "|" , 'emotion', 'pagebreak', 'horizontal', 'template',  'insertcode', "|" , 'date', 'time', 'spechars', 'snapscreen', "|" , 'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', "|" , 'preview', 'searchreplace', 'drafts', 'simpleupload'] 
								]//使用传参的方法，规定文本编辑器的功能
							});
						</script>
					</span>
				<!-- </div> -->
				<!-- <div id = "six">
					<span class = "Upload_the_cover">上传封面</span>
					<span class = "Upload_the_cover_input">
						<input type="file" name = "myfile" accept = "image/gif,image/jpeg,image/jpg,image/png" /> --><!--选择图片框-->
					<!-- </span>
				</div> -->
				<div id = "correlation">
					<span class = "teacher">教师名字</span>
					<span class = "teacher_name">
						<input type="text" name = "Xuser" value = "<?php echo $teacher; ?>"> <!--教师名字输入框-->
					</span>
					<br />
					<span class = 'phone'>手机号码</span>
					<span class = 'teacher_phone'>
						<input type="text" name = "Xphone" value = "<?php echo $Phone; ?>"><!--电话输入框-->
					</span>
				</div>
				<div id = "seven">
					<span class = "time">修改赛事时间</span>
					<span class = "issue_time">
						<?php 
							date_default_timezone_set('PRC'); //设置中国时区
							$issue_time = date("Y-m-d H:i:s"); //当前时间
							echo $issue_time;//输出当前时间
						?>
					</span>
				</div>
				<div id = "eight">	
					<span class = "sub">
						<input type="submit" name = "sub" value = "修改赛事"><!--提交表单-->
						
						<a href="../saishi.php">查看赛事</a>
					</span>
				</div>
			</form>
			<?php 
				if(isset($_POST['sub']))
				{
					$Xname = $_POST['Xname'];
					$Xtype_select = $_POST['Xtype_select'];
					$Xsponsor = $_POST['Xsponsor'];
					$Xsynopsis = $_POST['Xsynopsis'];
					$Xuser = $_POST['Xuser'];
					$Xphone = $_POST['Xphone'];
					$Xdetails = $_POST['Xdetails'];
					$name_word = $Xname.".docx";
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
						$html = $Xdetails;
						$word = new word();
						$word->start();
						
						$word_name = "../word/".$name_word;
						$wordname = "http://localhost/jingsai/word/".$name_word;
						echo $html;
						$word -> save($word_name);
						ob_flush();
						flush();
					if(!empty($Xname))//如果赛事名称不为空，就继续判断
					{
						if(strlen($Xname) <= 90)//如果赛事名称长度小于30则继续判断
						{
							if(!empty($Xsponsor))//如果主办单位不为空，则继续判断
							{
								if(!empty($Xsynopsis))//赛事简介不为空，继续判断
								{
									if(!empty($Xdetails))//赛事详情不为空，继续判断
									{
										if(!empty($Xuser))//教师名字不为空，继续判断
										{
											if(!empty($Xphone))//电话不为空，继续判断
											{
												$reg = "/^(0|86|17951)?(13[0-9]|15[012356789]|166|17[3678]|18[0-9]|14[57])[0-9]{8}$/";//手机号码的正则表达式
												$Xtype_select_str = implode(",", $Xtype_select);
												$username = $_SESSION['username'];
												if(preg_match($reg, $Xphone))//输入的手机号码符合正则表达式
												{
													// switch($_FILES['myfile']['error']) //PHP规定的文件错误
													// {
													// 	case 3://文件只有部分被上传
													// 		echo "<script>alert('文件只有部分被上传');</script>";
													// 		break;
													// 	case 0://上传没有错误
													// 		if($_FILES['myfile']['type'] == "image/gif" || $_FILES['myfile']['type'] == "image/jpeg" || $_FILES['myfile']['type'] == "image/jpg" || $_FILES['myfile']['type'] == "image/png")//规定上传图片的格式，格式只能是JPEG、jpg、GIF、PNG
													// 		{
													// 			if($_FILES['myfile']['size'] < 1024000)//规定了上传图片的大小，不能超过1M
													// 			{
													// 				$filename = "../upload/".$Event_name.date("YmdHis").$_FILES['myfile']['name'];//图片的保存路劲
													// 				$filename = iconv("UTF-8", "gb2312", $filename);//编码转换
													// 				if(file_exists($filename))//判断图片是否存在
													// 				{
													// 					echo "该文件已存在";
													// 				}
													// 				else
													// 				{
													// 					move_uploaded_file($_FILES['myfile']['tmp_name'], $filename);//上传图片	
													// 				}
													// 			}
													// 			else
													// 			{
													// 				echo "图片不能超过1M";
													// 			}
													// 		}
													// 		else
													// 		{
													// 			echo '图片格式只能是JPEG/JPG/GIF/PNG';
													// 		}
													// 		break;
													// }
													
													$sql = "UPDATE xinxi SET Event_name = '$Xname', Event_type_select = '$Xtype_select_str', sponsor = '$Xsponsor', synopsis = '$Xsynopsis', Event_details = '$Xdetails', teacher = '$Xuser', phone = '$Xphone',time = '$issue_time', Dow = '$wordname', word = '$name_word' WHERE id = '$id'";
													$result = mysqli_query($con , $sql);
													// , Dow = '$wordname', word = '$name_word'
													// if($result)
													// {
													// 	echo "<script>window.open('http://localhost/jingsai/xianqing.php?name={$wordname}')</script>";
													// }
													// else
													// {	
													// 	echo "发布失败，请查看是否输入有错";
													// 	exit();
													// }
												}
												else
												{
													echo "手机号码格式错误";
												}	
											}
											else//电话为空
											{
												echo "电话号码不能为空";
											}
										}
										else//教师名字为空
										{
											echo "教师名字不能为空";
										}
									}
									else//赛事详情为空
									{
										echo "赛事详情不能为空";
									}
								}
								else//赛事简介为空
								{
									echo "赛事简介不能为空";
								}
							}
							else//主办单位为空
							{
								echo "主办单位不能为空";
							}
						}
						else//赛事长度大于30
						{		
							echo "赛事长度不能大于30";
						}	
					}
					else//赛事名称为空
					{
						echo "赛事名称不能为空";
					}
				}
			?>
		</div>
	</body>
</html>