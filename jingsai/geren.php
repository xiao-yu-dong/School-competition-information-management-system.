<?php 
	session_start();
	require "mysql/login_exit.php";
 ?>
<html>
	<head>
		<meta charset = 'utf-8'>
		<title></title>
		<!-- <script>
			window.onload = function(){
            	var del = document.getElementById('del');
            	del.onclick = function(){
            		// confirm("是否删除");
            		if(!confirm("是否删除"))
            		{
            			alert("已取消删除");
            			
            		}
            		
            	};
            };
         </script> -->
         <style type="text/css">
         	#waikuan{
         		border:1px solid #000;
         		width: 400px;
         		height: 30px;
         		margin-bottom:5px; 
         		background-color: #2ff;

         	}
         </style>
	</head>
	<body>
			
		<center>
			<div style="border: 1px solid #000;width: 500px;min-height:500px ">
		发布的赛事
		<?php 
				$i=0;
			require 'mysql/conn.php';
			$username = $_SESSION['username'];
			$sql = "SELECT * FROM xinxi	WHERE fabuzhe = '$username' ORDER BY id DESC";
			$result = mysqli_query($con, $sql);
			
			while($row = mysqli_fetch_array($result))
			{
		?>	
		<table id="waikuan">						<!-- 装饰框 -->
		<?php	$id = "delete/delete.php?id={$row['id']}";
				$i++;
				echo "<div id = 'name'>";
				echo "<tr><td >".$i."</td>";
				echo "<td>".$row['Event_name']."</td>";
				echo "<td>".$row['time']."</td>";
				echo "<td><a href = 'xiugai/xiugai1.php?id={$row['id']}' >修改赛事</a></td>";
				?>
					<td><a href = "<?php echo $id; ?>" id = "del">删除赛事</a></td></tr>
				<?php
				echo "</div>";
			}
			
		 ?>
		 </table>
		<td><a href="index.php">返回主页</a></td>
		<script type="text/javascript">
			var del = document.getElementById('del');
			// var allA = document.getElementsTagName("a");
				allA.onclick = function(){
				//confirm("是否删除");
				if(!confirm("是否删除"))
				{			
				    del.href = "#";		
				}
				else
				{
				    del.href = "<?php echo $id; ?>";
				}
				            		
			};
		</script>
		</div>
	</center>

	</body>
</html>