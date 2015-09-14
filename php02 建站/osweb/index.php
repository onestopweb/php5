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
			echo "<script type='text/javascript'>alert('提交信息成功');location.href='index.php';</script>";
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
<link rel="stylesheet" type="text/css" href="style/index.css" />
<link href="style/touch.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="js/jquery.superslide.2.1.1.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
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
    	<a href="index.php" class="navNow f_l">首页</a>
        <a href="onestop.php" class="f_l">一站式建网站</a>
        <a href="search.nav.php" class="f_l">域名导航</a>
        <a href="search.software.php" class="f_l">软件下载</a>
        <a href="search.study.php" class="f_l">视频教程</a>
        <a href="search.liber.php" class="f_l">书籍文档</a>
        <a href="search.web.php" class="f_l">WEB动态</a>
        <a href="contact.php" class="f_l">联系我们</a>
	</p>
</div>

<div class="banner">
    <ul class="banner_box">
        <li><a href="onestop.php" target="_blank"><img src="images/index/banner1.png" width="1010" height="360" /></a></li>
        <li><a href="onestop.php" target="_blank"><img src="images/index/banner2.png" width="1010" height="360" /></a></li>
        <li><a href="onestop.php" target="_blank"><img src="images/index/banner3.png" width="1010" height="360" /></a></li>
        <li><a href="search.web.php" target="_blank"><img src="images/index/banner4.png" width="1010" height="360" /></a></li>
    </ul>
    <a class="prev" href="javascript:void(0)"></a>
    <a class="next" href="javascript:void(0)"></a>
    <div class="num">
    	<ul></ul>
    </div>
</div>

<div class="site">
	<a href="onestop.php" target="_blank" class="site01 f_l">
    	<dl>
        	<dt><img src="images/index/site01.png" width="50" height="50" class="png_bg" /></dt>
            <dd>产品展示型</dd>
        </dl>
        <p>初创期企业，产品官网。以展示和宣传产品为主要方向。全面兼容浏览器：火狐浏览器、谷歌浏览器、IE6+。</p>
    </a>
    <a href="onestop.php" target="_blank" class="site02 f_l">
    	<dl>
        	<dt><img src="images/index/site02.png" width="50" height="50" class="png_bg" /></dt>
            <dd>企业官网型</dd>
        </dl>
        <p>发展期企业，初创期企业，企业官网。以展示企业实力和品牌战略为主要方向。全面兼容浏览器：火狐浏览器、谷歌浏览器、IE6+。</p>
    </a>
    <a href="onestop.php" target="_blank" class="site03 f_l">
    	<dl>
        	<dt><img src="images/index/site03.png" width="50" height="50" class="png_bg" /></dt>
            <dd>外贸专业型</dd>
        </dl>
        <p>外贸企业，多语言版本企业网站。支持语言：English。全面兼容浏览器：火狐浏览器、谷歌浏览器、IE6+。</p>
    </a>
    <a href="onestop.php" target="_blank" class="site04 f_l">
    	<dl>
        	<dt><img src="images/index/site04.png" width="50" height="50" class="png_bg" /></dt>
            <dd>会员服务型</dd>
        </dl>
        <p>互联网投资企业、行业协会、行业领军企业、产业整合类企业。全面兼容浏览器：火狐浏览器、谷歌浏览器、IE6+。</p>
    </a>
    <a href="onestop.php" target="_blank" class="site05 f_l">
    	<dl>
        	<dt><img src="images/index/site05.png" width="50" height="50" class="png_bg" /></dt>
            <dd>企业电商型</dd>
        </dl>
        <p>电商企业、传统企业转型、自建电商平台的淘企业。全面兼容浏览器：火狐浏览器、谷歌浏览器、IE6+。</p>
    </a>
</div>

<div class="cont">
	<div class="list f_l list_margin">
		<h3><p class="f_l">域名导航</p><a href="search.nav.php" target="_blank" class="f_r">更多&gt;</a></h3>
        <ul>
<?php 
	$result = _query("SELECT o_id,o_time,o_title FROM o_nav order by o_time DESC limit 12");
    while (!!$row = mysql_fetch_array($result)){
	echo '<li><em class="f_r">'.substr($row[o_time],0,10).'</em><a href="info.nav.php?id='.$row[o_id].'" target="_blank" title="'.$row[o_title].'">'.mb_substr($row[o_title],0,16,'utf-8').'</a></li>'."\n";
    }
?>
        </ul>
	</div>
    <div class="list f_l">
		<h3><p class="f_l">软件下载</p><a href="search.software.php" target="_blank" class="f_r">更多&gt;</a></h3>
        <ul>
<?php 
	$result = _query("SELECT o_id,o_time,o_title FROM o_software order by o_time DESC limit 12");
    while (!!$row = mysql_fetch_array($result)){
	echo '<li><em class="f_r">'.substr($row[o_time],0,10).'</em><a href="info.software.php?id='.$row[o_id].'" target="_blank"  title="'.$row[o_title].'">'.mb_substr($row[o_title],0,16,'utf-8').'</a></li>'."\n";
    }
?>
        </ul>
	</div>
    <div class="list f_r">
		<h3><p class="f_l">视频教程</p><a href="search.study.php" target="_blank" class="f_r">更多&gt;</a></h3>
        <ul>
<?php 
	$result = _query("SELECT o_id,o_time,o_title FROM o_study order by o_time DESC limit 12");
    while (!!$row = mysql_fetch_array($result)){
	echo '<li><em class="f_r">'.substr($row[o_time],0,10).'</em><a href="info.study.php?id='.$row[o_id].'" target="_blank"  title="'.$row[o_title].'">'.mb_substr($row[o_title],0,16,'utf-8').'</a></li>'."\n";
    }
?>
        </ul>
	</div>
    <div class="list f_l list_margin">
		<h3><p class="f_l">书籍文档</p><a href="search.liber.php" target="_blank" class="f_r">更多&gt;</a></h3>
        <ul>
<?php 
	$result = _query("SELECT o_id,o_time,o_title FROM o_liber order by o_time DESC limit 12");
    while (!!$row = mysql_fetch_array($result)){
	echo '<li><em class="f_r">'.substr($row[o_time],0,10).'</em><a href="info.liber.php?id='.$row[o_id].'" target="_blank"  title="'.$row[o_title].'">'.mb_substr($row[o_title],0,16,'utf-8').'</a></li>'."\n";
    }
?>
        </ul>
	</div>
    <div class="list f_l">
		<h3><p class="f_l">WEB动态</p><a href="search.web.php" target="_blank" class="f_r">更多&gt;</a></h3>
        <ul>
<?php 
	$result = _query("SELECT o_id,o_time,o_title  FROM o_web order by o_time DESC limit 12");
    while (!!$row = mysql_fetch_array($result)){
	echo '<li><em class="f_r">'.substr($row[o_time],0,10).'</em><a href="info.web.php?id='.$row[o_id].'" target="_blank"  title="'.$row[o_title].'">'.mb_substr($row[o_title],0,16,'utf-8').'</a></li>'."\n";
    }
?>
        </ul>
	</div>
    <div class="list f_r">
		<h3><p class="f_l">联系我们</p><a name="order"></a></h3>
		<form name="orderForm" action="index.php?order=onestopweb" method="post">
        <table border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td class="td_other">姓名：</td>
                <td><input type="text" class="data_text" id="username" name="name" maxlength="12" /></td>
            </tr>
            <tr>
            	<td class="td_other">手机：</td>
                <td><input type="text" class="data_text" id="tel" name="tel"  maxlength="18" onkeyup="this.value=this.value.replace(/\D/g,'')" /></td>
            </tr>
            <tr>
            	<td class="td_other">Q Q：</td>
                <td><input type="text" class="data_text" id="qq" name="qq" maxlength="18" onkeyup="this.value=this.value.replace(/\D/g,'')" /></td>
            </tr>
            <tr class="tr_other">
            	<td class="td_other">建站&nbsp;&nbsp;&nbsp;<br/>需求：</td>
                <td><textarea name="ps" id="ps"></textarea></td>
            </tr>
            <tr>
            	<td class="td_other">&nbsp;</td>
                <td><input type="submit" class="data_submit" value="提交信息" /></td>
            </tr>
        </table>
        </form>
	</div>
</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
	require ROOT_PATH.'includes/touch.inc.php';
?>
<script type="text/javascript"> 
/*鼠标移过，左右按钮显示*/
$(".banner").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
});
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
});
$(".banner").slide({ titCell:".num ul" , mainCell:".banner_box" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
</script>
</body>
</html>

