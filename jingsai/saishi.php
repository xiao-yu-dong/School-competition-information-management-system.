<?php
	session_start();
?>
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
			.he
			{
				text-align: center;
			}
			.fubiaoti
			{
				text-align: center;
			}
			.jianjie
			{
				text-indent: 2em;
			}
			#outer
			{
				width: 1200px;
				height: 150px;
				border: 1px solid;
				margin-bottom: 30px;
				margin-left: 50px;
				background: #ecec;
				margin-top: 50px;
				margin-right: 50px;
			}
			#Event_name
			{
				width: 500px;
				height: 40px;
				border: 1px solid;
				text-align: center;
			}
			#synopsis
			{
				width: 1000px;
				height: 80px;
				border: 1px solid;
				text-indent: 2em;
				padding: 0px 20px;
				padding-top: 5px;
			}
			#Dow
			{
				float: right;
			}
		</style>
		<script type="text/javascript" src = "js/fabusaishi.js"></script>
	</head>
	<body>
		<?php 
			require 'mysql/conn.php';
			$sql_quan = "SELECT * FROM xinxi ORDER BY id DESC";   //ORDER BY id DESC  sql语句逆序查询id
			$result = mysqli_query($con, $sql_quan);
			$num = mysqli_num_rows($result);
			if($num == 0)
			{
				die("暂时还没有赛事");
			}
			while($row = mysqli_fetch_array($result))
			{
				$id = $row['id'];
				$cha = "cahkan.php?id=".$id;
				// chakan.php?id={$id}
				
		    ?>
				<div id = "outer">
					<div id = "Event_name">
						<?php 
							echo "<a href = 'chakan.php?id={$id}'><h1>".$row['Event_name']."</h1></a>";
						 ?>
						<!-- <a href="<?php echo $cha;?>"><h1><?php echo $row['Event_name']; ?></h1></a> -->
					</div>
					<div id = "synopsis">
						<p><?php echo $row['synopsis']; ?></p>
					</div>
					<div id = "Dow">
						<?php echo $row['time']; ?>
						<a href="<?php echo $row['Dow'];?>"><button>word下载地址</button></a>	
					</div>
				</div>
		<?php } ?>
	</body>
</html>