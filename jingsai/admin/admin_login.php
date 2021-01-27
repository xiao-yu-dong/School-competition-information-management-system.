<html>
	<head>
		<meta charset = "utf-8"> 
		<title></title>
	</head>
	<body>
		<form action="" method = "post">
			<input type="text" name = "username">
			<input type="password" name = "userpass">
			<input type="password" name = "vailpass">
			<input type="submit" name = "sub" value = "注册"> 
		</form>
		<?php 
			if(isset($_POST['sub']))
			{
				$username = $_POST['username'];
				$userpass = $_POST['userpass'];
				$vailpass = $_POST['vailpass'];
				if(!empty($username))
				{

				}
				else
				{	
					echo "";
				}
			}
		 ?>
	</body>
</html>