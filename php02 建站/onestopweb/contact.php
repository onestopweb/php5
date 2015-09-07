<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	if ($_GET['order'] == 'onestopweb') {
		$_name = trim($_POST['name']);
		$_tel = trim($_POST['tel']);
		$_qq =	trim($_POST['qq']);
		$_ps = trim($_POST['ps']);
		$_user_id ='';
		if(isset($_COOKIE['name'])){
			$_user_id = $_COOKIE['name'];
		}
		$_sql = "INSERT INTO o_order ( o_name ,o_tel ,o_qq ,o_ps ,o_time ,o_top ,o_user_id) VALUES ( '$_name', '$_tel', '$_qq', '$_ps', NOW(), '0', '$_user_id')";
		if(_query($_sql)){
			_close();
			echo "<script type='text/javascript'>alert('提交信息成功');location.href='contact.php';</script>";
			exit();
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
<link rel="stylesheet" type="text/css" href="style/contact.css" />
<link href="style/touch.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="js/contact.js" type="text/javascript"></script>
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
        <a href="onestop.php" class="f_l">一站式建网站</a>
        <a href="search.nav.php" class="f_l">域名导航</a>
        <a href="search.software.php" class="f_l">软件下载</a>
        <a href="search.study.php" class="f_l">视频教程</a>
        <a href="search.liber.php" class="f_l">书籍文档</a>
        <a href="search.web.php" class="f_l">WEB动态</a>
        <a href="contact.php" class="navNow f_l">联系我们</a>
	</p>
</div>

<div class="banner">
	<img src="images/contact/banner.jpg" width="1000" height="200" />
</div>

<div class="online">
	<h3>在线提交需求<a name="online"></a></h3>
    <div class="touch f_r">
    	<p>欢迎联系一站式建网站<br />我们期待与您详细的沟通</p>
        <p>冼经理咨询专线:<br /><i><?php echo $_tel[0]?></i><br />QQ：2940816417</p>
        <p>张经理咨询专线:<br /><i><?php echo $_tel[1]?></i><br />QQ：394761245</p>
    </div>
    <form name="orderForm" action="contact.php?order=onestopweb" method="post">
    <table cellpadding="0" cellspacing="0">
    	<tr><td colspan="2"><input type="text" class="text" id="username"  name="name" maxlength="12" value="您的称呼" /></td></tr>
    	<tr><td align="left"><input type="text" class="text" id="tel" name="tel" maxlength="18" onkeyup="this.value=this.value.replace(/\D/g,'')" value="您的手机号" /></td><td align="right"><input type="text" class="text" maxlength="18" id="qq" name="qq" onkeyup="this.value=this.value.replace(/\D/g,'')" value="您的QQ号" /></td></tr>
       	<tr><td colspan="2"><textarea name="ps" id="ps">您的建站需求</textarea></td></tr>
        <tr><td colspan="2"><input type="submit" class="submit f_r" value="提交" /><span class="f_l">您也可发需求信息至邮箱：<i>onestopweb@163.com</i></span></td></tr>
    </table>
    </form>
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>

