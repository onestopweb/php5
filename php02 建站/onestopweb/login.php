<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	if ($_GET['action'] == 'login') {
		$_user = $_POST['user'];
		$_pwd = md5($_POST['pwd']);
		$_sql = "SELECT o_user_id FROM o_user WHERE o_user_id='$_user' AND o_pwd='$_pwd' AND o_role_id !=1 AND o_logout = '1' LIMIT 1";
		$_result = _fetch_array($_sql);
		if($_result){
			setcookie('name',$_result[o_user_id],time()+(24*60*60));
			_close();
			echo "<script type='text/javascript'>location.href='index.php';</script>";
			exit();
		}else{
			$_err = '账号或密码错误';
		}
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
<link rel="stylesheet" type="text/css" href="style/login.css" />
<script type="text/javascript" src="js/login.js"></script>
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

<div class="login">
	<div class="login_banner f_l"><img src="images/login/login_banner.png" width="613" height="409" /></div>
    <form action="login.php?action=login" method="post" name="loginForm">
    <div class="login_box f_r">
    	<h3>
        	<a href="register.php" class="f_r">新用户注册</a>
        	<em>用户登录</em>
        </h3>
        <p><span class="f_l">账  号：</span><input type="text" id="user" name="user" class="login_user" maxlength="16" value="请输入您的用户名" /><a href="onestop.php#online" target="_blank">忘记账号？</a></p>
        <p><span class="f_l">密  码：</span><input type="password" id="pwd" name="pwd" class="login_pwd" maxlength="20" /><a href="onestop.php#online" target="_blank">忘记密码？</a></p>
        <input type="submit" value="登录" class="login_submit" />
        <strong id="user_prompt"><?php echo $_err?></strong>
    </div>
    </form>
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>
