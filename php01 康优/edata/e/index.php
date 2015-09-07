<?php 
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
</head>
<frameset cols="153,10,*" id="frame_page" frameborder="no" border="0" framespacing="0">
    <frame src="menu.php" scrolling="no"/>
    <frame src="switch.php" frameborder="no" scrolling="no" noresize="noresize"/>
    <frame src="list.fkzx.php" name="main" scrolling="yes" id="main"/>
</frameset>
<noframes>
<body>
<p>您的浏览器不支持框架。</p>
</body>
</noframes>
</html>
