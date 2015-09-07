<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
	<title><?php echo TOP_TITLE?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body id="back">
<?php 
	require ROOT_PATH.'includes/top.inc.php';
?>
	<div class="index">
		<div class="head"><a href="index.php">返回首页</a></div>
	</div>
	<h1 id="title">
		医院荣誉
	</h1>
	<div class="split">
		<span class="left"></span>
		<div class="head"><strong><?php echo AD_TITLE?></strong></div>
		<span class="right"></span>
	</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>