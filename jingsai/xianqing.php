<?php 
    session_start();
    require "mysql/login_exit.php";
    require "mysql/conn.php";
 ?>
<html>
    <head>
        <meta charset = "utf-8">
        <title></title>
        <link rel="stylesheet" href="css/xianqing.css">
        <script type="text/javascript" src = "js/index.js"></script>
        <style type = "text/css">
            #lun
            {
                width: 100%;
                height: 100%;

            }
        </style>
    </head>
    <body>
        <?php 
            $de = $_GET['name'];
            $Event = $_GET['Event'];
            echo $de;
            $sql = "SELECT * FROM xinxi WHERE  Evnet_name = '$Event'";
            $result = mysqli_query($con, $sql);
         ?>
        <button>
            <a href="<?php echo $de;?>">下载</a>
        </button>
        <button><a href="index.php">返回主页</a></button>
        <iframe src="jqueryxzlbt1/index.html" frameborder="0" id = "lun" scrolling = 'no'></iframe>
    </body>
</html>