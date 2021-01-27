<html>
	<head>
		<meta charset  = "utf-8">
		<title></title>
	</head>
	<body>
		<?php 
			require "../mysql/conn.php";
			$id = $_GET['id'];
			// echo $id;
			$sql = "DELETE FROM `xinxi` WHERE `xinxi`.`id` = '$id'";
			$result = mysqli_query($con, $sql);
			if($result)
			{
				echo "<script>
				alert('删除成功');
				window.location = '../geren.php';</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('删除失败');";
				echo "window.location = '../geren.php';";
				echo "</script>";
			}
		 ?>
	</body>
</html>