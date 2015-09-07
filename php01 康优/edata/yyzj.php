<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
	<title><?php echo TOP_TITLE?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body id="back">
<?php 
	require ROOT_PATH.'includes/top.inc.php';
?>
	<div class="index">
		<div class="head">
			<h1><a href="yyzj.php">医院专家</a></h1>
		</div>
		<div class="body">
			<p>&nbsp;</p>
		</div>
	</div>
	<div class="doctor">
		<?php
				$_page=$_GET['page'];//获取当前的页数
				$_page_show =3;//最大显示3页
				$_page_size =5;//显示每页的条数
				if($_page == null || $_page<=0){//为空恢复为第一页
					$_page =1;
				}
				$_page_begin = ($_page-1) * $_page_size;
				$_sql_list = "SELECT * FROM e_yyzj where e_id order by e_time DESC LIMIT $_page_begin , $_page_size";
				$_result = _query($_sql_list);
				while (!!$row = mysql_fetch_array($_result)){
		?>
		<dl>
			<dt>
				<a href="yyzj.cont.php?id=<?php echo $row[e_id] ?>"><img src="product/<?php echo $row[e_img];?>" alt="<?php echo $row[e_title] ?>" width="88" height="118" /></a>
			</dt>
			<dd>
				<h2><a href="yyzj.cont.php?id=<?php echo $row[e_id] ?>"><?php echo $row[e_title] ?></a></h2>
				<p><?php echo mb_substr(strip_tags($row[e_cont]),0,30,'utf-8'); ?>...</p>
				<div>
					<a href="###" rel="nofollow" target="_blank"><img src="images/left_btn.gif" alt="咨询专家" /></a>
					<a href="###" rel="nofollow" target="_blank"><img src="images/right_btn.gif" alt="点击预约" /></a>
				</div>
			</dd>
		</dl>
		<?php }?>
	</div>
	<div class="pagination">
		<ul>
			<?php
				$_sql_count = "SELECT count( e_id ) FROM e_yyzj ";
				$_result_count = _query($_sql_count);
				$_row_count = mysql_fetch_array($_result_count);
				$_allcount= $_row_count[0];//获取总数
				$_page_count = ceil($_allcount/$_page_size);
				if($_page <= 1 || $_page == '') $_page = 1;
				if($_page >= $_page_count) $_page = $_page_count;
				$_pre_page = ($_page == 1)? 1 : $_page - 1;
				$_next_page= ($_page == $_page_count)? $_page_count : $_page + 1 ;
				if($_page>1){
					$_pagenav .= "<li><a href='?page=$_pre_page'>上一页</a></li>";
				}
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
						$_page_show_str .= "<li class='thisclass' href='?page=$_page_show_now'>$_page_show_now</li>";
					}else{
						$_page_show_str .= "<li><a href='?page=$_page_show_now'>$_page_show_now</a></li>";
					}
				}
				$_pagenav.=$_page_show_str;
				if($_page_count>$_page){
					$_pagenav .= "<li><a href='?page=$_next_page'>下一页</a></li>";
				}
				echo $_pagenav ;
			?>
		</ul>
	</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>