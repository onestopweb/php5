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
	$_type_arr = _nav_type();
	$_u_id = $_GET['u_id'];
	if($_GET['u_id']!=null){
		$_u_sql = " SELECT * FROM o_user WHERE o_user_id ='$_u_id' LIMIT 1 ";
		$_d_sql = " SELECT * FROM o_data WHERE o_user_id = '$_u_id'  LIMIT 1 ";
		$_u_result=_fetch_array($_u_sql);
		$_d_result=_fetch_array($_d_sql);
		if ($_GET['action'] == 'onestopweb') {
			$_name = trim($_POST['name']);
			$_tel = trim($_POST['tel']);
			$_qq = trim($_POST['qq']);
			$_mail = trim($_POST['mail']);
			$_site = trim($_POST['site']);
			$_ps = trim($_POST['ps']);
			$_role = $_POST['role'];
			$_logout = $_POST['logout'];
			if($_FILES[userfile][name]){
				$_img = _uploads($_FILES);
				$_sql = "UPDATE o_user SET 
					o_mail = '$_mail',
					o_img = '$_img',
					o_role_id = '$_role',
					o_logout = '$_logout' WHERE CONVERT( o_user_id USING utf8 ) = '$_u_id' LIMIT 1";
				_query($_sql);
			}else{
				$_sql = "UPDATE o_user SET 
					o_mail = '$_mail',
					o_role_id = '$_role',
					o_logout = '$_logout' WHERE CONVERT( o_user_id USING utf8 ) = '$_u_id' LIMIT 1";
				_query($_sql);
			}
			$_id = $_POST['id'];
			if($_id!=null){
				$_sql = "UPDATE o_data SET o_name = '$_name',
					o_tel = '$_tel',
					o_qq = '$_qq',
					o_site = '$_site',
					o_ps = '$_ps' WHERE o_id =$_id LIMIT 1 ";
				_query($_sql);
			}else{
				$_sql ="INSERT INTO o_data (o_name ,o_tel ,o_qq ,o_site ,o_ps ,o_time ,o_user_id)
					VALUES ( '$_name', '$_tel', '$_qq', '$_site', '$_ps', NOW(), '$_u_id')";
				_query($_sql);
			}
			_close();
			echo "<script type='text/javascript'>alert('修改成功');location.href='user.update.php?u_id=$_u_id';</script>";
			exit();
		}
	}else{
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
	<h3>用户管理 -&gt; 修改用户</h3>
</div>


<div class="update">
<form action="user.update.php?u_id=<?php echo $_u_id?>&action=onestopweb" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">编辑用户</td></tr>
    <tr><td class="w100 h38 b">用户名：</td><td><input type="hidden" name="id" value="<?php echo $_d_result['o_id'] ?>" /><em class="f_l"><?php echo $_u_result['o_user_id']; ?></em></td></tr>
    <tr><td class="h38 b">姓名：</td><td><input type="text" name="name" value="<?php echo $_d_result['o_name']; ?>" class="text f_l" /><em class="f_l">中文名字</em></td></tr>
    <tr><td class="h38 b">手机号：</td><td><input type="text" name="tel" value="<?php echo $_d_result['o_tel']; ?>" class="text f_l" /><em class="f_l">手机号</em></td></tr>
    <tr><td class="h38 b">qq号：</td><td><input type="text" name="qq" value="<?php echo $_d_result['o_qq']; ?>" class="text f_l" /><em class="f_l">qq号</em></td></tr>
    <tr><td class="h38 b">电子邮件：</td><td><input type="text" name="mail" value="<?php echo $_u_result['o_mail']; ?>" class="text f_l" /><em class="f_l">电子邮件</em></td></tr>
    <tr><td class="h38 b">地址：</td><td><input type="text" name="site" value="<?php echo $_d_result['o_site']; ?>" class="text f_l" /><em class="f_l">地址</em></td></tr>
    <tr><td class="h360 b">备注：</td><td>
    	<p>
        	<textarea name="ps"><?php echo $_d_result['o_ps']; ?></textarea>
            <i class="f_r">当前已输入 11 个字</i>
        </p>
    </td></tr>
    <tr><td class="h38 b">权限：</td><td><span>
    	<?php
	    	for($i=0;$i<count($_role);$i++){
				if(($i+1)==$_u_result[o_role_id]){
					echo '<input type="radio" class="radio" name="role" value="'.($i+1).'" checked="checked" />'.$_role[$i];
				}else{
					echo '<input type="radio" class="radio" name="role" value="'.($i+1).'" />'.$_role[$i];
				}
	    	}
    	?>
    </span></td></tr>
    <tr><td class="h38 b">状态：</td><td><span>
    	<?php
	    	if ($_u_result[o_logout]==1){
	    		echo '<input type="radio" class="radio"  value="1" name="logout" checked="checked" />在用';
	    		echo '<input type="radio" class="radio"  value="0" name="logout" />已注销';
	    	}else{
	    		echo '<input type="radio" class="radio"  value="1" name="logout" />在用';
				echo '<input type="radio" class="radio"  value="0" name="logout" checked="checked" />已注销';
	    	}
    	?>
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