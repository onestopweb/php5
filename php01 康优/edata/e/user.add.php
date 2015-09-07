<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	if ($_GET['action'] == 'edata') {
		$_user = trim($_POST['user']);
		$_pwd = md5(trim($_POST['pwd']));
		$_sql = "INSERT INTO e_user (e_name, e_pwd, e_time) VALUES ('$_user', '$_pwd', NOW())";
		_query($_sql);
		_close();
		echo "<script type='text/javascript'>alert('添加成功');location.href='login.php';</script>";
		exit();
	}
	//唯一进入该网页的路径
	if($_GET['f'] !='76b0d3c95a1b8f6c28c926bdad9c0d5e'){
		_close();
		exit ( 'Access Defined!' );
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
	<h3>用户管理 -&gt; 添加用户</h3>
</div>


<div class="update">
<form action="user.add.php?action=edata" method="post">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">添加用户</td></tr>
    <tr><td class="w100 h38 b">用户名：</td><td><input type="text" name="user" class="text f_l" /><em class="f_l">推荐是纯字母，结尾有数字也可以，长度为4-14</em></td></tr>
    <tr><td class="h38 b">密码：</td><td><input type="text" name="pwd" class="text f_l" /><em class="f_l">字母数字混合，长度为6-18</em></td></tr>
    <tr><td colspan="2" class="h38 center"><input type="submit" value="提交" class="submit" /></tr>
</table>
</form>
</div>

<div style="height:40px;"></div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>