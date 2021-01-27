<html>
	<head>
		<meta charset = "utf-8">
		<title></title>
	 	<style type = "text/css">
	 		*
	 		{
	 			margin: 0px;
	 			padding: 0px;
	 		}
	 		#outer
	 		{
	 			width: 80%;
	 			height: 100%;
	 			border: 1px solid;
	 			margin: 0px auto;
	 			padding: 20px;
	 		}
		</style>
	</head>
	<body>
		<a href="../index.php">返回主页</a>
		<?php 
			if(isset($_POST['sub']))
			{
				require "../mysql/conn.php";
				$keyname = $_POST['keyname'];
				$sql = "SELECT * FROM `xinxi` WHERE `Event_details` LIKE '%$keyname%'";
				$result = mysqli_query($con, $sql);
				$num = mysqli_num_rows($result);
				if($num == 0)
				{
					echo "没有查询到结果";
				}
				else
				{
					echo "搜索到了".$num."条结果";
				}
				while($row = mysqli_fetch_array($result))
				{
					if($row == NULL)
					{
						echo "没有查询到结果";
					}
					else
					{
						?>
							<div id = "outer">
								<?php echo $row['Event_details']; ?>
							</div>
						<?php
					}
				}
			}
		 ?>
	</body>
</html>