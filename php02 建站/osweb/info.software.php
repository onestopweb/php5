<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/domain.func.php';
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _software_type();
	$_id = $_GET['id'];
	if($_id == null || !(is_numeric($_id))){
		_close();
		echo "<script type='text/javascript'>alert('无效访问');location.href='search.software.php';</script>";
		exit();
	}
	$_sql = " SELECT * FROM o_software WHERE o_id = $_id LIMIT 1";
	$_info = _fetch_array($_sql);
	if(!$_info){
		$_sql = " SELECT * FROM o_software WHERE o_id = 1 LIMIT 1";
		$_info = _fetch_array($_sql);
	}
	if ($_GET['links'] == 'onestopweb') {
		$_link = trim($_POST['link']);
		$_user_id ='';
		if(isset($_COOKIE['name'])){
			$_user_id = $_COOKIE['name'];
		}else{
			$_user_id = 'no'.rand(1000, 9999);
		}
		$_sql = "INSERT INTO o_software_link ( o_link , o_time ,o_good ,o_valid ,o_main_id ,o_user_id)
				VALUES ( '$_link', NOW(), '1', '1', '$_id', '$_user_id');";
		if(_query($_sql)){
			_close();
			echo "<script type='text/javascript'>alert('提交链接成功');location.href='info.software.php?id=$_id';</script>";
			exit();
		}
	}
	if($_GET['cons'] == 'onestopweb'){
		$_con = trim($_POST['con']);
		$_user_id ='';
		if(isset($_COOKIE['name'])){
			$_user_id = $_COOKIE['name'];
		}else{
			$_user_id = 'no'.rand(1000, 9999);
		}
		$_sql = "INSERT INTO o_software_con (o_con ,o_time ,o_good ,o_valid ,o_main_id,o_user_id)
				VALUES ('$_con', NOW(), '1', '1', '$_id', '$_user_id')";
		if(_query($_sql)){
			_close();
			echo "<script type='text/javascript'>alert('提交内容成功');location.href='info.software.php?id=$_id';</script>";
			exit();
		}
	}
	//统计点击次数
	$_see_number = $_info['o_see']+1;
	$_sql_see = "UPDATE o_software SET o_see = '$_see_number' WHERE o_id = $_id LIMIT 1";
	_query($_sql_see);
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
<link rel="stylesheet" type="text/css" href="style/info.css" />
<link rel="stylesheet" type="text/css" href="style/amplify.css" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/jquery.imgbox.pack.js" type="text/javascript" ></script>
<script src="js/info.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".amplify").imgbox({
			'speedIn'		: 0,
			'speedOut'		: 0,
			'alignment'		: 'center',
			'overlayShow'	: true,
			'allowMultiple'	: false
		});
	});
</script>
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
                <option value="1">域名导航</option>
                <option value="2" selected="selected">软件下载</option>
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
        <a href="search.software.php" class="navNow f_l">软件下载</a>
        <a href="search.study.php" class="f_l">视频教程</a>
        <a href="search.liber.php" class="f_l">书籍文档</a>
        <a href="search.web.php" class="f_l">WEB动态</a>
        <a href="contact.php" class="f_l">联系我们</a>
	</p>
</div>

<div class="result">
	<div class="result_icon f_l"></div>
    <p class="f_l">当前位置：<a href="index.php">首页</a> &gt; <a href="search.software.php">软件下载</a> &gt; <a href="search.software.php?type=<?php echo $_info[o_type_id]; ?>"><?php echo $_type_arr[$_info[o_type_id]-1]; ?></a>
    &gt; 标题：<?php echo $_info['o_title'] ?></p>
</div>
<div class="cont">
	<div class="sidebar f_r">
    	<?php 
			require ROOT_PATH.'includes/sidebar.inc.php';
		?>
    </div>
	<div class="show">
    	<h3>
        	<em class="f_r"><?php echo $_info['o_see'] ?>点击量</em>
            <i class="f_r" onclick="javascript:good(<?php echo $_info[o_id]?>,<?php echo $_info[o_good]?>,2);" id="good"><?php echo $_info['o_good'] ?>个赞</i>
            <span><?php echo mb_substr($_info[o_title],0,30,'utf-8')?></span>
            <?php 
                if ($_info[o_valid]==1){
            ?>
            	<a class="valid" onclick="javascript:valid(<?php echo $_info[o_id]?>,2);" id="valid">有效</a>
            <?php
                }else{
                	echo '<a class="lose">处理中</a>';
                }
           	?>
            <?php 
                if ($_info[o_top]==1){
                	echo '<a class="sutra">经典</a>';
                }
          	?>
        </h3>
        <h5><i class="f_r">收录时间：<?php echo substr($_info[o_time],0,10)?></i><em>内容介绍<a href="<?php echo $_info[o_link]?>" title="<?php echo $_info[o_link]?>" target="_blank">打开链接</a></em></h5>
        <div class="show_text">
			<?php echo nl2br($_info[o_con])?>
			<br/>
			请访问：<a href="<?php echo $_info[o_link]?>" title="<?php echo $_info[o_link]?>" target="_blank"><?php echo $_info[o_link]?></a>
        </div>
        <h3><span class="span_other">查看大图</span></h3>
        <div class="show_img">
        	<a class="amplify f_l" title="[上传时间:<?php echo $_info[o_time]?>]" href="product/<?php echo $_info[o_img]?>" ><img onerror="this.src='product/100/product.png'" src="product/100/<?php echo $_info[o_img]?>" /></a>
<?php
	$_sql_img = "SELECT * FROM o_software_img WHERE o_main_id =$_id LIMIT 5";
	$_result_img = _query($_sql_img);
	while (!!$row = mysql_fetch_array($_result_img)){
?>
			<a class="amplify f_l" title="[上传时间:<?php echo $row[o_time]?>]" href="product/<?php echo $row[o_img]?>" ><img onerror="this.src='product/100/product.png'" src="product/100/<?php echo $row[o_img]?>" /></a>
<?php
	}
?>  
        	
        </div>
        <h3><span class="span_other">分享链接</span></h3>
        <div class="show_link">
        	<table border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td><a href="<?php echo $_info[o_link]?>" title="<?php echo $_info[o_link]?>" target="_blank"><?php echo top_domain($_info[o_link])?></a></td>
                    <td><a href="<?php echo $_info[o_link]?>" title="<?php echo $_info[o_link]?>" target="_blank" class="open">打开</a></td>
                    <td>发布人：<?php echo $_info[o_user_id] ?></td>
                    <td>时间：<?php echo substr($_info[o_time],0,10)?></td>
                    <td><em onclick="javascript:good2(<?php echo $_info[o_id]?>,<?php echo $_info[o_good]?>,2);" id="good2"><?php echo $_info['o_good'] ?>个赞</em></td>
                    <td>链接错误请点击 -&gt;
	                <?php 
		                if ($_info[o_valid]==1){
		            ?>
		            	<a class="valid" onclick="javascript:valid2(<?php echo $_info[o_id]?>,2);" id="valid2">有效</a>
		            <?php
		                }else{
		                	echo '<a class="lose">处理中</a>';
		                }
		           	?>  	
                    </td>
                </tr>
<?php
	$_sql_link = " SELECT * FROM o_software_link WHERE o_main_id =$_id LIMIT 0 , 30 ";
	$_result_link = _query($_sql_link);
	while (!!$row = mysql_fetch_array($_result_link)){
?>
               <tr>
                	<td><a href="<?php echo $row[o_link]?>" title="<?php echo $row[o_link]?>" target="_blank"><?php echo top_domain($row[o_link])?></a></td>
                    <td><a href="<?php echo $row[o_link]?>" title="<?php echo $row[o_link]?>" target="_blank" class="open">打开</a></td>
                    <td>发布人：<?php echo $row[o_user_id] ?></td>
                    <td>时间：<?php echo substr($row[o_time],0,10)?></td>
                    <td><em onclick="javascript:good_link(<?php echo $row[o_id]?>,<?php echo $row[o_good]?>,2);" id="good_link<?php echo $row[o_id] ?>"><?php echo $row[o_good] ?>个赞</em></td>
                    <td>链接错误请点击 -&gt;
	                <?php 
		                if ($row[o_valid]==1){
		            ?>
		            	<a class="valid" onclick="javascript:valid_link(<?php echo $row[o_id]?>,2);" id="valid_link<?php echo $row[o_id] ?>">有效</a>
		            <?php
		                }else{
		                	echo '<a class="lose">处理中</a>';
		                }
		           	?>   	
                    </td>
              </tr>
<?php }?>
            </table>
        	<form method="post" name="linkForm" action="info.software.php?id=<?php echo $_id?>&links=onestopweb">
            	<input class="link_submit f_r" type="submit" value="提交链接" />
            	<input type="text" id="link" name="link" class="link_text" value="将提交的链接复制到这里" />
            </form>
        </div>
        <h3><span class="span_other">我来补充</span></h3>
<?php
	$_sql_con_count = "SELECT count(o_id) FROM o_software_con WHERE o_main_id=$_id";
	$_result_con_count = mysql_fetch_array(_query($_sql_con_count));
?>
        <h4>
        	<a name="con"></a>
        	<a href="?id=<?php echo $_id?>&sort=3#con" class="f_r">最热</a>
            <a href="?id=<?php echo $_id?>&sort=2#con" class="f_r">最早</a>
        	<a href="?id=<?php echo $_id?>&sort=1#con" class="f_r">最新</a>
            <span><em><?php echo $_result_con_count[0]?></em> 条内容</span>
        </h4>
<?php
	$_sql_con = "SELECT * FROM o_software_con WHERE o_main_id=$_id ";
	$_sort = $_GET['sort'];
	if($_sort == null || $_sort<=0){
		$_sort =1;
	}
	switch ($_sort){
		case 1:
			$_sql_con.= "order by o_time DESC LIMIT 30";
			break;
		case 2:
			$_sql_con.= "order by o_time ASC LIMIT 30";
			break;
		default:
			$_sql_con.= "order by o_good DESC ,o_time DESC LIMIT 30";
	}
	$_result_con = _query($_sql_con);
	$i=0;
	while (!!$row = mysql_fetch_array($_result_con)){
?>
        <dl>
        	<?php
				$sql_name = " SELECT o_img FROM o_user WHERE o_user_id = '$row[o_user_id]' LIMIT 1";
				$_result_face = _fetch_array($sql_name);
				if($_result_face){
					echo '<dt><img src="face/50/'.$_result_face[o_img].'" onerror="this.src=\'face/50/face.png\'" /></dt>';
				}else{
					echo '<dt><img src="face/50/face.png" /></dt>';
				}
        	?>
            <dd class="line01"><?php echo ++$i?>楼 用户名：<?php echo $row[o_user_id]?></dd>
            <dd class="line02"><?php echo nl2br($row[o_con])?></dd>
            <dd class="line03">发布时间：<?php echo $row[o_time]?> &nbsp;&nbsp;&nbsp;&nbsp;<em  onclick="javascript:good_cont(<?php echo $row[o_id]?>,<?php echo $row[o_good]?>,2);" id="good_cont<?php echo $row[o_id] ?>"><?php echo $row[o_good]?>个赞</em>&nbsp;&nbsp;&nbsp;&nbsp; 内容不好请点击 -&gt;
				 <?php 
		       		if ($row[o_valid]==1){
		       	?>
		        <a class="valid" onclick="javascript:valid_cont(<?php echo $row[o_id]?>,2);" id="valid_cont<?php echo $row[o_id] ?>">有效</a>
		        <?php
		        	}else{
		            	echo '<a class="lose">处理中</a>';
		            }
		        ?>     
            </dd>
        </dl>
<?php 
	}
?>
        <form method="post" action="info.software.php?id=<?php echo $_id?>&cons=onestopweb">
        <div class="show_say">
        	<?php
        		if(isset($_COOKIE['name'])){
        			$sql_name = " SELECT o_img FROM o_user WHERE o_user_id = '".$_COOKIE['name']."' LIMIT 1";
        			$_result_face = _fetch_array($sql_name);
        			echo '<img src="face/50/'.$_result_face[o_img].'" onerror="this.src=\'face/50/face.png\'" />';
        		}else{
        			echo '<img src="face/50/face.png"/>';
        		}
        	?>
            <div class="say_box">
            	<textarea name="con" id="cont"></textarea>
                <input type="submit" value="发布" />
            </div>
        </div>
        </form>
    </div>    
</div>

<div class="c"></div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>
