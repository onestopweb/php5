<?php
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	session_start();
	if(!isset($_SESSION['name'])){
		exit ( 'Access Defined!' );
	}
	$_name = $_SESSION['name'];
	if ($_GET['action'] == 'edata') {
		$_title = trim($_POST['title']);
		$_cont = $_POST['content'];
		$_type = $_POST['type'];
		$_sql_add = "INSERT INTO e_tsjs (e_title, e_cont, e_time, e_see, e_name)
				 VALUES ('$_title', '$_cont', NOW(), '1', '$_name')";
		_query($_sql_add);
		_close();
		echo "<script type='text/javascript'>location.href='list.tsjs.php';</script>";
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="style/basic.css" type="text/css" />
<link rel="stylesheet" href="style/update.css" type="text/css" />
</head>
<body>

<div class="nav">
	<h3>特色技术 -&gt; 增加信息</h3>
</div>

<div class="update">
<form action="add.tsjs.php?action=edata" method="post">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">增加信息</td></tr>
   	<tr><td class="w100 h38 b">文章标题：</td><td><input type="text" name="title" class="text f_l" /><em class="f_l">下限是4个字符，上限是28个字符</em></td></tr>
   	<tr><td colspan="2">
        	<!-- 加载编辑器的容器 -->
			<script id="container" name="content" type="text/plain" style="width:1000px;height:300px;" ></script>
			<!-- 配置文件 -->
			<script type="text/javascript" src="ueditor.config.js"></script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="ueditor.all.js"></script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">        var ue = UE.getEditor('container');    </script>
    </td></tr>
    <tr><td colspan="2" class="h38 center"><input type="submit" value="提交" class="submit" /><input type="reset" class="reset" value="重填" /></td></tr>
</table>
</form>
</div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
<div style="height:40px;"></div>
</body>
</html>