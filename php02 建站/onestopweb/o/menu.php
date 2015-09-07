<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	session_start();
	$_name = $_SESSION['name'];
	$_sql = "SELECT * FROM o_user WHERE o_user_id='$_name' LIMIT 1";
	$_result = _fetch_array($_sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="style/basic.css" type="text/css" />
<link rel="stylesheet" href="style/menu.css" type="text/css" />
<script language="javascript">
/*共用*/
function $id(id){  
    return document.getElementById(id);  
}

window.onload = function(){
	var count_menu1=0;
	$id("menu1").onclick = function(){
		var menu1=$id("menu1");
		var menu1_hover=$id("menu1_hover");
		if(count_menu1%2==0){
			menu1_hover.style.display="block";
			menu1.style.backgroundImage="url(images/buttom.jpg)";
			menu1.style.backgroundRepeat="no-repeat";
			menu1.style.color="#b6241f";
		}else{
			menu1_hover.style.display="none";
			menu1.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu1.style.backgroundRepeat="no-repeat";
			menu1.style.color="#fff";
		}
		count_menu1++;
	};
	
	var count_menu2=0;
	$id("menu2").onclick = function(){
		var menu2=$id("menu2");
		var menu2_hover=$id("menu2_hover");
		if(count_menu2%2==0){
			menu2_hover.style.display="block";
			menu2.style.backgroundImage="url(images/buttom.jpg)";
			menu2.style.backgroundRepeat="no-repeat";
			menu2.style.color="#b6241f";
		}else{
			menu2_hover.style.display="none";
			menu2.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu2.style.backgroundRepeat="no-repeat";
			menu2.style.color="#fff";
		}
		count_menu2++;
	};
	
	var count_menu3=0;
	$id("menu3").onclick = function(){
		var menu3=$id("menu3");
		var menu3_hover=$id("menu3_hover");
		if(count_menu3%2==0){
			menu3_hover.style.display="block";
			menu3.style.backgroundImage="url(images/buttom.jpg)";
			menu3.style.backgroundRepeat="no-repeat";
			menu3.style.color="#b6241f";
		}else{
			menu3_hover.style.display="none";
			menu3.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu3.style.backgroundRepeat="no-repeat";
			menu3.style.color="#fff";
		}
		count_menu3++;
	};
	
	var count_menu4=0;
	$id("menu4").onclick = function(){
		var menu4=$id("menu4");
		var menu4_hover=$id("menu4_hover");
		if(count_menu4%2==0){
			menu4_hover.style.display="block";
			menu4.style.backgroundImage="url(images/buttom.jpg)";
			menu4.style.backgroundRepeat="no-repeat";
			menu4.style.color="#b6241f";
		}else{
			menu4_hover.style.display="none";
			menu4.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu4.style.backgroundRepeat="no-repeat";
			menu4.style.color="#fff";
		}
		count_menu4++;
	};

	var count_menu5=0;
	$id("menu5").onclick = function(){
		var menu5=$id("menu5");
		var menu5_hover=$id("menu5_hover");
		if(count_menu5%2==0){
			menu5_hover.style.display="block";
			menu5.style.backgroundImage="url(images/buttom.jpg)";
			menu5.style.backgroundRepeat="no-repeat";
			menu5.style.color="#b6241f";
		}else{
			menu5_hover.style.display="none";
			menu5.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu5.style.backgroundRepeat="no-repeat";
			menu5.style.color="#fff";
		}
		count_menu5++;
	};

	var count_menu6=0;
	$id("menu6").onclick = function(){
		var menu6=$id("menu6");
		var menu6_hover=$id("menu6_hover");
		if(count_menu6%2==0){
			menu6_hover.style.display="block";
			menu6.style.backgroundImage="url(images/buttom.jpg)";
			menu6.style.backgroundRepeat="no-repeat";
			menu6.style.color="#b6241f";
		}else{
			menu6_hover.style.display="none";
			menu6.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu6.style.backgroundRepeat="no-repeat";
			menu6.style.color="#fff";
		}
		count_menu6++;
	};

	var count_menu7=0;
	$id("menu7").onclick = function(){
		var menu7=$id("menu7");
		var menu7_hover=$id("menu7_hover");
		if(count_menu7%2==0){
			menu7_hover.style.display="block";
			menu7.style.backgroundImage="url(images/buttom.jpg)";
			menu7.style.backgroundRepeat="no-repeat";
			menu7.style.color="#b7241f";
		}else{
			menu7_hover.style.display="none";
			menu7.style.backgroundImage="url(images/buttom_hover.jpg)";
			menu7.style.backgroundRepeat="no-repeat";
			menu7.style.color="#fff";
		}
		count_menu7++;
	};
	rand_img();
};

var rand1 = 0;
var useRand = 0;
var images = new Array;
images[1] = "box01.png";
images[2] = "box02.png";
images[3] = "box03.png";
images[4] = "box04.png";
function rand_img(){
	var rand_img = $id("rand_img");
	rand_img.style.backgroundImage="url(images/box01.png)";
	var imgnum = images.length - 1;
	do {
	var randnum = Math.random();
	rand1 = Math.round((imgnum - 1) * randnum) + 1;
	} while (rand1 == useRand);
	useRand = rand1;
	rand_img.style.backgroundImage = "url(images/"+images[useRand]+")";
}

</script>
</head>
<body>
<div class="menu">
	<div class="box" id="rand_img">
    	<h2>后台管理系统</h2>
        <em><img src="../face/50/<?php echo $_result['o_img']?>" /></em>
        <p>超级管理员：<?php echo $_result['o_user_id']?></p>
        <p><a href="../index.php" target="_blank">打开首页</a>&nbsp;&nbsp;<a href="logout.ref.php">注销</a></p>
    </div>
    <h3><a id="menu1">用户管理</a></h3>
    <ul id="menu1_hover" style="display:none;">
    	<li><a href="user.list.php" target="main">查看用户</a></li>
        <li><a href="user.add.php" target="main">新增用户</a></li>
    </ul>
    <h3><a id="menu2">域名导航</a></h3>
     <ul id="menu2_hover" style="display:none;">
    	<li><a href="list.nav.php" target="main">查看信息</a></li>
    	<li><a href="valid.nav.php" target="main">处理信息</a></li>
        <li><a href="add.nav.php" target="main">添加信息</a></li>
        <li><a href="link.nav.php" target="main">处理链接</a></li>
        <li><a href="cont.nav.php" target="main">处理内容</a></li>
    </ul>
    <h3><a id="menu3">软件下载</a></h3>
     <ul id="menu3_hover" style="display:none;">
    	<li><a href="list.software.php" target="main">查看信息</a></li>
    	<li><a href="valid.software.php" target="main">处理信息</a></li>
        <li><a href="add.software.php" target="main">添加信息</a></li>
        <li><a href="link.software.php" target="main">处理链接</a></li>
        <li><a href="cont.software.php" target="main">处理内容</a></li>
    </ul>
    <h3><a id="menu4">视频教程</a></h3>
     <ul id="menu4_hover"style="display:none;">
    	<li><a href="list.study.php" target="main">查看信息</a></li>
    	<li><a href="valid.study.php" target="main">处理信息</a></li>
        <li><a href="add.study.php" target="main">添加信息</a></li>
        <li><a href="link.study.php" target="main">处理链接</a></li>
        <li><a href="cont.study.php" target="main">处理内容</a></li>
    </ul>
    <h3><a id="menu5">书箱文档</a></h3>
     <ul id="menu5_hover"style="display:none;">
    	<li><a href="list.liber.php" target="main">查看信息</a></li>
    	<li><a href="valid.liber.php" target="main">处理信息</a></li>
        <li><a href="add.liber.php" target="main">添加信息</a></li>
        <li><a href="link.liber.php" target="main">处理链接</a></li>
        <li><a href="cont.liber.php" target="main">处理内容</a></li>
    </ul>
    <h3><a id="menu6">WEB动态</a></h3>
     <ul id="menu6_hover"style="display:none;">
    	<li><a href="list.web.php" target="main">查看信息</a></li>
    	<li><a href="valid.web.php" target="main">处理信息</a></li>
        <li><a href="add.web.php" target="main">添加信息</a></li>
        <li><a href="cont.web.php" target="main">处理内容</a></li>
    </ul>
    <h3><a id="menu7">订单信息</a></h3>
     <ul id="menu7_hover"style="display:none;">
    	<li><a href="order.php" target="main">查看订单</a></li>
    </ul>
</div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>
