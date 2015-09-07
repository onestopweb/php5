<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/type.func.php';
	$_fkzx_type = _fkzx_type();
	$_nkzx_type = _nkzx_type();
	$_jhsy_type = _jhsy_type();
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
		<div class="head"><?php echo AD_TITLE?></div>
		<div class="body">
			<p><a href="index.php"><img src="images/dgxd.gif" alt="广州康优医院" width="294" /></a>　　广州康优医院是一所现代化新型专业医院，是广州首家也是唯一的专业机构。位于番禺石基镇岐山南路9号（石基镇政府斜对面）。</p>
		</div>
	</div>
	<div class="split">
		<span class="left"></span>
		点击以下按钮可快速访问相应栏目
		<span class="right"></span>
	</div>
	<dl class="block">
		<dt style="background-color: #cc3673;">
			<h2><a href="fkzx.php">妇科中心</a></h2>
		</dt>
		<dd style="background-color: #cc3673;">
			<ul>
				<?php
				$_sql_list = "SELECT * FROM e_fkzx ORDER BY e_time DESC LIMIT 6";
				$_result = _query($_sql_list);
				while (!!$row = mysql_fetch_array($_result)){
					echo '<li><a href="fkzx.cont.php?id='.$row[e_id].'">'.$row[e_title].'</a></li>';
				}
				?>
			</ul>
		</dd>
	</dl>
	<div class="button">
		<div>
		<?php 
		for($i=0;$i<count($_fkzx_type);$i++){
			echo "<a href=\"fkzx.type.php?type=".($i+1)."\">$_fkzx_type[$i]</a>";
		}
		?>
		</div>
	</div>
	<dl class="block">
		<dt style="background-color: #318fd4;">
			<h2><a href="nkzx.php">男科中心</a></h2>
		</dt>
		<dd style="background-color: #318fd4;">
			<ul>
				<?php
				$_sql_list = "SELECT * FROM e_nkzx ORDER BY e_time DESC LIMIT 6";
				$_result = _query($_sql_list);
				while (!!$row = mysql_fetch_array($_result)){
					echo '<li><a href="nkzx.cont.php?id='.$row[e_id].'">'.$row[e_title].'</a></li>';
				}
				?>
			</ul>
		</dd>
	</dl>
	<div class="button">
		<div>
		<?php 
		for($i=0;$i<count($_nkzx_type);$i++){
			echo "<a href=\"nkzx.type.php?type=".($i+1)."\">$_nkzx_type[$i]</a>";
		}
		?>
		</div>
	</div>
	<dl class="block">
		<dt style="background-color: #ff40a3;">
			<h2><a href="jhsy.php">计划生育</a></h2>
		</dt>
		<dd style="background-color: #ff40a3;">
			<ul>
				<?php
				$_sql_list = "SELECT * FROM e_jhsy ORDER BY e_time DESC LIMIT 6";
				$_result = _query($_sql_list);
				while (!!$row = mysql_fetch_array($_result)){
					echo '<li><a href="jhsy.cont.php?id='.$row[e_id].'">'.$row[e_title].'</a></li>';
				}
				?>
			</ul>
		</dd>
	</dl>
	<div class="button">
		<div>
		<?php 
		for($i=0;$i<count($_jhsy_type);$i++){
			echo "<a href=\"jhsy.type.php?type=".($i+1)."\">$_jhsy_type[$i]</a>";
		}
		?>
		</div>
	</div>
	<div class="index">
		<div class="head" style="background-color: #0fa0fa;"><a href="yyzj.php">广州康优医院专家</a></div>
	</div>
	<div class="doctor">
		<?php
				$_page=$_GET['page'];//获取当前的页数
				$_page_size =3;//显示每页的条数
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
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>