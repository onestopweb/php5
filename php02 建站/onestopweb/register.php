<?php 
	session_start();
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/uploads.face.func.php';
	if ($_GET['action'] == 'register') {
		$_user = trim($_POST['user']);
		$_email = trim($_POST['email']);
		$_pwd = md5(trim($_POST['pwd']));
		$_code = trim($_POST['code']);
		if($_SESSION['code'] != $_code){
			echo "<script type='text/javascript'>alert('验证码错误！');history.back();</script>";
			exit();
		}
		//查找该用户是否存在
		$_sql = "SELECT o_user_id FROM o_user WHERE o_user_id='$_user' LIMIT 1";
		$_result = _fetch_array($_sql);
		if($_result){
			echo "<script type='text/javascript'>history.back();</script>";
			exit();
		}
		//过滤器，过滤用户名
		$_user_mode='/^[a-zA-Z][a-zA-Z0-9]{3,13}$/';
		if(!preg_match($_user_mode,$_user)){
			echo "<script type='text/javascript'>history.back();</script>";
			exit();
		}
		//过滤器，过滤电子邮箱
		$_email_mode='/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/';
		if(!preg_match($_email_mode,$_email)){
			echo "<script type='text/javascript'>history.back();</script>";
			exit();
		}
		
		//上传文件的操作
		$_img = 'face.png';
		if($_FILES[userfile][name]){
			$_img = _uploads($_FILES);
		}
		
		//插入数据
		$_sql = "INSERT o_user (o_user_id, o_pwd, o_mail, o_img, o_time, o_role_id, o_logout) VALUES ('$_user', '$_pwd', '$_email', '$_img', NOW(), '2', '1')";
		_query($_sql);
		_close();
		setcookie('name',$_user,time()+(12*60*60));
		echo "<script type='text/javascript'>alert('恭喜您,注册成功');location.href='index.php';</script>";
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="一站式共享网络" />
<meta name="keywords" content="一站式网站共享网络,一站式网站设计,一站式网站制作,一站式做网站,一站式建网站,一站式域名空间" />
<meta name="description" content="我们提供专业的网站建设、网站制作、网站设计、做网站、建网站等服务，同时提供一站式域名注册、网站空间虚拟主机等申请服务。" />
<title>一站式共享网络</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/register.css" />
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/register.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/clear_png.js" ></script>
<script type="text/javascript"> DD_belatedPNG.fix('.png_bg'); </script> 
<![endif]-->
</head>
<body>

<div class="top png_bg">
	<div class="top_nav f_r">
    	<span class="f_r">
    	<?php
    		if(isset($_COOKIE['name'])){
		?>
    		<a style="color: #000;">您好，<?php echo $_COOKIE['name'] ?></a>&nbsp;&nbsp;&nbsp;<a href="logout.ref.php" onclick="return confirm('你确定注册该账号吗?')" class="collection">[注销]</a>
    	<?php
			}else{
    	?>		
    		<a href="login.php">登陆</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php">注册</a>&nbsp;&nbsp;<a class="collection">[欢迎光临]</a>&nbsp;&nbsp;
    	<?php		
    		}
    	?>
    	</span>建站热线<em><?php $_tel = _tel(); echo $_tel[0].'&nbsp;&nbsp;&nbsp;&nbsp;'.$_tel[1]?></em>
    </div>
    <div class="search c">
    	<form action="search.ref.php" method="get" >
    	<input type="submit" class="search_btn f_r" value="搜&nbsp;索" />
    	<div class="search_select f_l">
            <select name="option">
                <option value="1" selected="selected">域名导航</option>
                <option value="2">软件下载</option>
                <option value="3">视频教程</option>
                <option value="4">书籍文档</option>
                <option value="5">WEB动态</option>
            </select>
        </div>
        <div class="text_box f_l">
        	<input type="text" name="search" id="search"  value="请输入您要搜索的内容" />
        </div>
        </form>
    </div>
</div>

<div class="nav">
	<p>
    	<a href="index.php"  class="f_l">首页</a>
        <a href="onestop.php" class="navNow f_l">一站式建网站</a>
        <a href="search.nav.php" class="f_l">域名导航</a>
        <a href="search.software.php" class="f_l">软件下载</a>
        <a href="search.study.php" class="f_l">视频教程</a>
        <a href="search.liber.php" class="f_l">书籍文档</a>
        <a href="search.web.php" class="f_l">WEB动态</a>
        <a href="contact.php" class="f_l">联系我们</a>
	</p>
</div>

<div class="register">
	<form action="register.php?action=register" enctype="multipart/form-data" name="registerForm" method="post">
	<div class="reg_box f_l">
    	<h3>亲，欢迎注册！</h3>
    	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" /> 
        <p><span class="f_l">用户名：</span><input type="text" class="reg_text" name="user" id="user" maxlength="16" /><em id="user_text"><i>*</i> 必填</em></p>
        <p><span class="f_l">Email：</span><input type="text" class="reg_text" name="email" id="email" maxlength="30" /><em id="email_text"><i>*</i> 必填</em></p>
        <p class="reg_upload"><span class="f_l">头像上传：</span><input type="file" name="userfile" class="reg_file" /><em>可选,不上传头像，系统为将你默认头像</em></p>
        <p><span class="f_l">设置密码：</span><input type="password" class="reg_pwd" name="pwd" id="pwd" maxlength="20" /><em id="pwd_text"><i>*</i> 必填</em></p>
        <p><span class="f_l">再次输入密码：</span><input type="password" class="reg_pwd" id="repwd" maxlength="20" /><em id="repwd_text"><i>*</i> 必填</em></p>
        <p><span class="f_l">验证码：</span><input type="text" name="code" id="code" class="reg_code f_l" /><img src="includes/code.inc.php" class="code_img f_l" id="code_img" width="96" height="38" /><em class="f_l" id="code_text"><i>*</i> 必填</em></p>
        <h4><input type="checkbox" checked="checked" />我已阅读并同意遵守 <a>《一站式共享网络服务协议》</a></h4>
        <input type="submit" value="立即注册" class="login_submit" />
        <h5><a href="http://image.baidu.com/i?tn=baiduimage&ct=201326592&lm=-1&cl=2&word=%CD%B7%CF%F1&fr=ala&oriquery=%E5%A4%B4%E5%83%8F&ala=1&alatpl=portait&pos=0#z=0&pn=&ic=0&st=-1&face=0&s=0&lm=-1"  target="_blank">PS:上传图像规定是正方形，点击我即可获取系统为您提供的大量头像</a></h5>
    </div>
    </form>
    <div class="reg_login f_l">
    	<h3>已经是会员？</h3>
        <a href="login.php">立即登录</a>
        <p>一站式共享网络，一直追求卓越</p>
    </div>
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
	
?>

</body>
</html>
