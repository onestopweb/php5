<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/type.func.php';
	$_sort_arr = _sort();
	$_type_arr = _web_type();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="一站式共享网络" />
<meta name="keywords" content="一站式网站共享网络,一站式网站设计,一站式网站制作,一站式做网站,一站式建网站,一站式域名空间" />
<meta name="description" content="我们提供专业的网站建设、网站制作、网站设计、做网站、建网站等服务，同时提供一站式域名注册、网站空间虚拟主机等申请服务。" /><title>一站式共享网络</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="style/basic.css" />
<link rel="stylesheet" type="text/css" href="style/search.css" />
<link href="style/touch.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="js/search.js" type="text/javascript"></script>
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
                <option value="2">软件下载</option>
                <option value="3">视频教程</option>
                <option value="4">书籍文档</option>
                <option value="5" selected="selected">WEB动态</option>
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
        <a href="search.web.php" class="navNow f_l">WEB动态</a>
        <a href="contact.php" class="f_l">联系我们</a>
	</p>
</div>
<div class="result">
	<div class="result_icon f_l"></div>
    <p class="f_l">当前位置：<a href="index.php">首页</a> &gt; <a href="search.web.php">WEB动态</a>
    &gt;
<?php
	$_search = trim($_GET['search']);
	$_sort = $_GET['sort'];
	$_type = $_GET['type'];
	if($_search !=null){
		echo "搜索\"$_search\"";
	}else if($_sort !=null){
		echo '排序：'.$_sort_arr[$_sort-1];
	}else if($_type !=null){
		echo '分类：'.$_type_arr[$_type-1];
	}else{
		echo '排序：按最新时间';
	}
?>    
    </p>
</div>

<div class="type">
	<p>软件下载的排序：
	<?php 
		for($i=0;$i<count($_sort_arr);$i++){
			echo "<a href=\"?sort=".($i+1)."\">$_sort_arr[$i]</a>";
		}
	?>
		
	</p>
    <p>软件下载的分类：
    <?php 
		for($i=0;$i<count($_type_arr);$i++){
			echo "<a href=\"?type=".($i+1)."\">$_type_arr[$i]</a>";
		}
	?>
    </p>
</div>

<div class="cont">
	<div class="sidebar f_r">
    	<?php 
			require ROOT_PATH.'includes/sidebar.inc.php';
		?>
    </div>
	<div class="show">
    	<h3>WEB动态</h3>
<?php
	$_page=$_GET['page'];//获取当前的页数
	$_page_show =20;//最大显示20页
	$_page_size =15;//显示每页的条数
	if($_page == null || $_page<=0){//为空恢复为第一页
		$_page =1;
	}
	$_page_begin = ($_page-1) * $_page_size;
	$_sql_list = "SELECT * FROM o_web ";
	if($_search !=null){
		$_sql_list.= "WHERE o_title LIKE '%$_search%' order by o_time DESC LIMIT $_page_begin , $_page_size";
	}else if($_sort !=null){
		switch ($_sort){
			case 1:
				$_sql_list.= "order by o_time DESC LIMIT $_page_begin , $_page_size";
			break;
			case 2:
				$_sql_list.= "order by o_time ASC LIMIT $_page_begin , $_page_size";
			break;
			case 3:
				$_sql_list.= "order by o_top DESC ,o_time DESC LIMIT $_page_begin , $_page_size";
			break;
			case 4:
				$_sql_list.= "order by o_good DESC ,o_time DESC LIMIT $_page_begin , $_page_size";
			break;
			default:
				$_sql_list.= "order by o_see DESC ,o_time DESC LIMIT $_page_begin , $_page_size";
		}
	}else if($_type !=null){
		$_sql_list.= "WHERE o_type_id = '$_type' order by o_time DESC LIMIT $_page_begin , $_page_size";
	}else{
		$_sql_list.= "order by o_time DESC LIMIT $_page_begin , $_page_size";
	}
	$_result = _query($_sql_list);
    while (!!$row = mysql_fetch_array($_result)){
?>
		<dl>
        	<dt class="f_l"><a href="<?php echo $row[o_link]?>" title="<?php echo $row[o_link]?>" target="_blank"><img onerror="this.src='product/100/product.png'" src="product/100/<?php echo $row[o_img]?>" class="product" /><img src="images/link.png" class="link png_bg" /></a></dt>
            <dd class="line01">
            	<em class="f_r"><?php echo $row[o_see]?>点击量</em>
            	<i class="f_r" onclick="javascript:good(<?php echo $row[o_id]?>,<?php echo $row[o_good]?>,5);" id="good<?php echo $row[o_id]?>"><?php echo $row[o_good]?>个赞</i>
                <a href="info.web.php?id=<?php echo $row[o_id]?>" target="_blank" class="title" title="<?php echo $row[o_title]?>"><?php echo mb_substr($row[o_title],0,22,'utf-8')?></a>
                <?php 
                	if ($row[o_valid]==1){
                ?>
                	<a class="valid" onclick="javascript:valid(<?php echo $row[o_id]?>,5);" id="valid<?php echo $row[o_id]?>">有效</a>
                <?php
                	}else{
                		echo '<a class="lose">处理中</a>';
                	}
                ?>
                <?php 
                	if ($row[o_top]==1){
                		echo '<a class="sutra">经典</a>';
                	}
                ?>
            </dd>
            <dd class="line02">
            	<?php echo mb_substr(strip_tags($row[o_con]),0,86,'utf-8'); ?>......<a href="info.web.php?id=<?php echo $row[o_id]?>" target="_blank" class="title" title="<?php echo strip_tags($row[o_con])?>">[更多]</a>
            </dd>
            <dd class="line03">
            	<em class="f_r"><?php echo substr($row[o_time],0,10)?></em>
            	分类：<a href="?type=<?php echo $row[o_type_id]?>">
            		<?php echo $_type_arr[$row[o_type_id]-1]; ?>
            	</a>
            </dd>
        </dl>
<?php
    }
?>    	  
    </div>
<?php
$_con = '';
$_sql_count = "SELECT count( o_id ) FROM o_web "; 
if($_search !=null){
	$_sql_count.= "WHERE o_title LIKE '%$_search%'";
	$_con = "search=$_search&";
}else if($_sort !=null){
	$_con = "sort=$_sort&";
}else if($_type !=null){
	$_sql_count.= "WHERE o_type_id = '$_type'";
	$_con = "type=$_type&";
}
$_result2 = _query($_sql_count);
$_row2 = mysql_fetch_array($_result2);

//分页
$_allcount= $_row2[0];
$_page_count = ceil($_allcount/$_page_size);
if($_page <= 1 || $_page == '') $_page = 1;
if($_page >= $_page_count) $_page = $_page_count;
$_pre_page = ($_page == 1)? 1 : $_page - 1;
$_next_page= ($_page == $_page_count)? $_page_count : $_page + 1 ;
$_pagenav .= "第 $_page/$_page_count 页 共 $_allcount 条记录 ";
$_pagenav .= "<a href='?".$_con."page=1'>首页</a> ";
$_pagenav .= "<a href='?".$_con."page=$_pre_page'>上一页</a> ";
//当前显示的开始
$_page_show_start = (ceil($_page/$_page_show)-1)*$_page_show;
//显示分页
$_page_show_str = '';
if($_page_show>$_page_count){
	$_page_show = $_page_count;
}
for($j=1;$j<=$_page_show;$j++){
	$_page_show_now = $_page_show_start+$j;
	if($_page==$_page_show_now){
		$_page_show_str .= "<a href='?".$_con."page=$_page_show_now'><strong>$_page_show_now</strong></a> ";
	}else{
		$_page_show_str .= "<a href='?".$_con."page=$_page_show_now'>$_page_show_now</a> ";
	}
}
$_pagenav.=$_page_show_str;
$_pagenav .= "<a href='?".$_con."page=$_next_page'>下一页</a> ";
$_pagenav .= "<a href='?".$_con."page=$_page_count'>末页</a>";
echo '<div class="page">'.$_pagenav.'</div>' ;
?>
</div>
<div class="c"></div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>
