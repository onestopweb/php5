<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/uploads.face.func.php';
	require ROOT_PATH.'includes/type.func.php';
	$_role = _role();
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
		_close();
		exit();
	}
	if ($_GET['action'] == 'onestopweb') {
		$_type_arr = _nav_type();
		$_user = trim($_POST['user']);
		$_pwd = md5(trim($_POST['pwd']));
		$_name = trim($_POST['name']);
		$_tel = trim($_POST['tel']);
		$_qq = trim($_POST['qq']);
		$_mail = trim($_POST['mail']);
		$_site = trim($_POST['site']);
		$_ps = trim($_POST['ps']);
		$_role = $_POST['role'];
		$_logout = $_POST['logout'];
		$_img = 'face.png';
		if($_FILES[userfile][name]){
			$_img = _uploads($_FILES);
		}
		$_u_sql = "INSERT o_user (o_user_id, o_pwd, o_mail, o_img, o_time, o_role_id, o_logout) VALUES ('$_user', '$_pwd', '$_mail', '$_img', NOW(), '$_role', '$_logout')";
		_query($_u_sql);
		$_d_sql ="INSERT INTO o_data (o_name ,o_tel ,o_qq ,o_site ,o_ps ,o_time ,o_user_id)
		VALUES ( '$_name', '$_tel', '$_qq', '$_site', '$_ps', NOW(), '$_user')";
		_query($_d_sql);
		_close();
		echo "<script type='text/javascript'>location.href='user.list.php';</script>";
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
	<h3>用户管理 -&gt; 新增用户</h3>
</div>


<div class="update">
<form action="user.add.php?action=onestopweb" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">新增用户</td></tr>
    <tr><td class="w100 h38 b">用户名：</td><td><input type="text" name="user" class="text f_l" /><em class="f_l">推荐是纯字母，结尾有数字也可以，长度为4-14</em></td></tr>
    <tr><td class="h38 b">密码：</td><td><input type="text" name="pwd" class="text f_l" /><em class="f_l">字母数字混合，长度为6-18</em></td></tr>
    <tr><td class="h38 b">姓名：</td><td><input type="text" name="name" class="text f_l" /><em class="f_l">中文名字</em></td></tr>
    <tr><td class="h38 b">手机号：</td><td><input type="text" name="tel" class="text f_l" /><em class="f_l">手机号</em></td></tr>
    <tr><td class="h38 b">qq号：</td><td><input type="text" name="qq" class="text f_l" /><em class="f_l">qq号</em></td></tr>
    <tr><td class="h38 b">电子邮件：</td><td><input type="text" name="mail" class="text f_l" /><em class="f_l">电子邮件</em></td></tr>
    <tr><td class="h38 b">地址：</td><td><input type="text" name="site" class="text f_l" /><em class="f_l">地址</em></td></tr>
    <tr><td class="h360 b">备注：</td><td>
    	<p>
        	<textarea name="ps"></textarea>
            <i class="f_r">当前已输入 11 个字</i>
        </p>
    </td></tr>
    <tr><td class="h38 b">权限：</td><td><span>
    	<?php
	    	for($i=0;$i<count($_role);$i++){
				if(($i+1)==3){
					echo '<input type="radio" class="radio" name="role" value="'.($i+1).'" checked="checked" />'.$_role[$i];
				}else{
					echo '<input type="radio" class="radio" name="role" value="'.($i+1).'" />'.$_role[$i];
				}
	    	}
    	?>
    </span></td></tr>
    <tr><td class="h38 b">状态：</td><td><span>
    	<input type="radio" class="radio"  value="1" name="logout" checked="checked" />在用
	    <input type="radio" class="radio"  value="0" name="logout" />已注销
    </span></td></tr>
    <tr><td class="h38 b">更新头像：</td><td><input type="file" name="userfile" class="file f_l" /><em class="f_l">图片文件上传支持 .png .jpg .gif格式　大小在5120K以内</em></td></tr>
    <tr><td colspan="2" class="h38 center"><input type="submit" value="提交" class="submit" /><input type="reset" class="reset" value="重填" /></td></tr>
</table>
</form>
</div>

<div style="height:40px;"></div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>