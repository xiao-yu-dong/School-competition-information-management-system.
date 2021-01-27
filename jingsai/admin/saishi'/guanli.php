<html>
	<head>
		<meta charset = "utf-8">
		<title></title>
	</head>
	<body>
		<?php 
			require "../../mysql/conn.php";
			$sql = "SELECT * FROM xinxi";
			$result = mysqli_query($con, $sql); 
			echo "<table>";
			while($row = mysqli_fetch_array($result))
			{
		?>
				<div id = "outer">
					<tr>
						<td>
							<?php echo $row['Event_name']; ?>
						</td>
						<td>
							<a href="">删除</a> 
						</td>
					</tr>
				</div>
		<?php } 
			echo "</table>";
		 ?>
	</body>
</html>