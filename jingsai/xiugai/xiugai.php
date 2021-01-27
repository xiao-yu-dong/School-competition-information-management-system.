<?php 
	session_start();
	require "../mysql/login_exit.php";
 ?>
<html>
	<head>
		<meta charset = "utf-8">
		<title></title>
		<style type = "text/css">
			#name
			{
				width: 500px;
				height: 50px;
				border: 1px solid;
			}
		</style>
	</head>
	<body>
		<?php 
			require "../mysql/conn.php";
			$username = $_SESSION['username'];
			$sql = "SELECT * FROM xinxi	WHERE fabuzhe = '$username' ORDER BY id DESC";
			$result = mysqli_query($con, $sql);
			while($row = mysqli_fetch_array($result))
			{
				echo "<div id = 'name'>";
				echo $row['Event_name'];
				echo "<a href = 'xiugai1.php?id={$row['id']}'>修改</a>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['time'];
				echo "</div>";
			}
		?>
	</body>
</html>