<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	$_id = $_GET['id'];
	if($_id == null || !(is_numeric($_id))){
		_close();
		echo "<script type='text/javascript'>alert('无效访问');location.href='dxal.php';</script>";
		exit();
	}
	$_sql = "SELECT * FROM e_dxal WHERE e_id = $_id LIMIT 1";
	$_info = _fetch_array($_sql);
	if(!$_info){
		$_sql = "SELECT * FROM e_dxal WHERE e_id = 1 LIMIT 1";
		$_info = _fetch_array($_sql);
	}
	$_see_number = $_info['e_see']+1;
	$_sql_see = "UPDATE e_dxal SET e_see = '$_see_number' WHERE e_id = $_id LIMIT 1";
	_query($_sql_see);
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
		<div class="head"><a href="dxal.php">返回典型案例</a></div>
	</div>
	<h1 id="title">
		<?php echo $_info['e_title'] ?>
	</h1>
	<div class="split">
		<span class="left"></span>
		<div class="head"><strong><?php echo AD_TITLE?></strong></div>
		<span class="right"></span>
	</div>
	<div id="content">
		<?php echo $_info['e_cont'] ?>
	</div>
	<div class="index">
		<div class="head">您可能还需要以下内容</div>
	</div>
	<div class="list">
		<ul>
			<?php
			$_sql_list = "SELECT * FROM e_dxal ORDER BY e_see DESC LIMIT 5";
			$_result = _query($_sql_list);
			while (!!$row = mysql_fetch_array($_result)){
				echo '<li><a href="?id='.$row[e_id].'">'.$row[e_title].'</a></li>';
			}
			?>
		</ul>
	</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>