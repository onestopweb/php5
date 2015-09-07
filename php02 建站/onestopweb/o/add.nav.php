<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/uploads.product.func.php';
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _nav_type();
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
		_close();
		exit();
	}
	if ($_GET['action'] == 'onestopweb') {
		$_name = $_SESSION['name'];
		$_title = trim($_POST['title']);
		$_link = trim($_POST['link']);
		$_con = trim($_POST['con']);
		$_type = $_POST['type'];
		$_top = $_POST['top'];
		$_img = 'product.png';
		if($_FILES[userfile][name]){
			$_img = _uploads($_FILES);
		}
		$_sql = "INSERT INTO o_nav ( o_title ,o_link ,o_con ,o_img ,o_time ,o_see ,o_good ,o_top ,o_valid ,o_type_id ,o_user_id)
			VALUES ('$_title', '$_link', '$_con', '$_img', NOW(), '43', '3', '$_top', '1', '$_type', '$_name')";
		_query($_sql);
		_close();
		echo "<script type='text/javascript'>location.href='list.nav.php';</script>";
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
<link rel="stylesheet" href="style/add.css" type="text/css" />
</head>
<body>

<div class="nav">
	<h3>域名导航 -&gt; 添加信息</h3>
</div>


<div class="update">
<form action="add.nav.php?action=onestopweb" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">发布新贴</td></tr>
    <tr><td class="w100 h38 b">文章标题：</td><td><input type="text" name="title" class="text f_l" /><em class="f_l">下限是4个字符，上限是28个字符</em></td></tr>
    <tr><td class="h38 b">打开链接：</td><td><input type="text" name="link" class="text f_l" /><em class="f_l">打开链接</em></td></tr>
    <tr><td class="h360 b">文章正文：</td><td>
    	<p>
        	<textarea name="con"></textarea>
            <i class="f_r">当前已输入 11 个字</i>
        </p>
    </td></tr>
    <tr><td class="h38 b">选择分类：</td><td><span>
    	<?php
	    	for($i=0;$i<count($_type_arr);$i++){
				if(($i+1)==13){
					echo '<input type="radio" class="radio" name="type" value="'.($i+1).'" checked="checked" />'.$_type_arr[$i];
				}else{
					echo '<input type="radio" class="radio" name="type" value="'.($i+1).'" />'.$_type_arr[$i];
				}
	    	}
    	?>
    	</span></td>
    </tr>
    <tr><td class="h38 b">设置经典：</td><td><span><input type="radio" class="radio"  value="1" name="top" />经典<input type="radio" class="radio"  value="0" name="top" checked="checked" />空白</span></td></tr>
    <tr><td class="h38 b">主图上传：</td><td><input type="file" class="file f_l" name="userfile" /><em class="f_l">图片文件上传支持 .png .jpg .gif格式　大小在5120K以内</em></td></tr>
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