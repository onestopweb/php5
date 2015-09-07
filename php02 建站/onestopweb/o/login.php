<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	if ($_GET['action'] == 'login') {
		$_user = $_POST['user'];
		$_pwd = md5($_POST['pwd']);
		$_sql = "SELECT o_user_id FROM o_user WHERE o_user_id='$_user' AND o_pwd='$_pwd' AND o_role_id = 4 AND o_logout = '1' LIMIT 1";
		$_result = _fetch_array($_sql);
		if($_result){
			session_start();
			$_SESSION['name'] = $_result[o_user_id];
			_close();
			echo "<script type='text/javascript'>location.href='index.php';</script>";
			exit();
		}else{
			echo "<script type='text/javascript'>alert('账号或密码错误');location.href='login.php';</script>";	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后面界面登陆</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link type="text/css" rel="stylesheet" href="style/login.css" />
</head>
<body>

<div class="interface">    
    <form action="login.php?action=login" method="post">
    <div class="login">
    	<input type="text" class="name" name="user" maxlength="16" />
        <input type="password" class="pwd" name="pwd" maxlength="20" />
        <input type="submit" class="submit" value="登陆" />
    </div>
    </form>
</div>

<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>
