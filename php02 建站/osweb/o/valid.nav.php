<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _nav_type();
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
		_close();
		exit();
	}
	$_search = trim($_GET['search']);
	if($_GET['del_id']!=null){
		$_del_id = $_GET['del_id'];
		$_sql = "DELETE FROM o_nav WHERE o_valid = '0' AND o_id = $_del_id  LIMIT 1";
		_query($_sql);
	}
	if($_GET['rec_id']!=null){
		$_rec_id = $_GET['rec_id'];
		$_sql = "UPDATE o_nav SET o_valid = '1' WHERE o_id = $_rec_id LIMIT 1";
		_query($_sql);
	}
	if($_GET['del']=='all'){
		$_sql = "DELETE FROM o_nav WHERE o_valid = '0'";
		_query($_sql);
	}
	if($_GET['rec']=='all'){
		$_sql = "UPDATE o_nav SET o_valid = '1'";
		_query($_sql);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="style/basic.css" type="text/css" />
<link rel="stylesheet" href="style/list.css" type="text/css" />
</head>
<body>

<div class="nav">
	<h3>域名导航 -&gt; 处理信息</h3>
</div>

<div class="list">
<table cellpadding="0" cellspacing="0">
<tr class="search">
	<td colspan="9">
        <form action="valid.nav.php" method="get">
        	<input type="text"  name="search" value="<?php echo $_search ?>" class="text f_l" />
       		<input type="submit" class="submit f_l" value="" />
        </form>
	</td>
</tr>
<tr class="head"><td>编号</td><td>图片</td><td>标题</td><td>好评量</td><td>有效性</td><td>发布人</td><td>发布时间</td><td>类别</td><td>操作</td></tr>
<?php 
	$_sql_list = "SELECT * FROM o_nav ";
	if($_search !=null){
		$_sql_list.= "WHERE o_valid=0 AND o_title LIKE '%$_search%' order by o_id DESC LIMIT 100";
	}else{
		$_sql_list.= "WHERE o_valid=0 order by o_id DESC LIMIT 100";
	}
	$_result = _query($_sql_list);
	$i=0;
	while (!!$row = mysql_fetch_array($_result)){
	$i++;
?>
	<tr class="item<?php if($i%2==0){ echo ' color_bg';}?>"><td><a href="../info.nav.php?id=<?php echo $row[o_id];?>" target="_blank"><?php echo $row[o_id];?></a></td><td><img src="../product/20/<?php echo $row[o_img];?>"></img></td><td style="width: 280px;"><a title="<?php echo $row[o_title] ?>"><?php echo mb_substr($row[o_title],0,18,'utf-8') ?></a></td><td><?php echo $row[o_good]?></td><td>
                <?php 
                	if ($row[o_valid]==1){
                		echo '<i>有效</i>';
                	}else{
                		echo '<i>处理中</i>';
                	}
                ?>
                </td><td><?php echo $row[o_user_id]?></td><td><?php echo substr($row[o_time],0,20)?></td><td><?php echo $_type_arr[$row[o_type_id]-1]; ?></td><td>
                <a href="?search=<?php echo $_search;?>&del_id=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要删除该条数据吗？')"  title="删除该条数据">删除</a>&nbsp;
                <a href="?search=<?php echo $_search;?>&rec_id=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要恢复该条数据吗？')"  title="恢复该条数据">恢复</a></td></tr>
<?php
	}
?>
<tr class="page">
    <td colspan="9">
        <span class="f_l"><a href="?del=all" onclick="javascript:return confirm('您确定要删除所有数据吗？')" title="一键删除">一键删除</a>&nbsp;&nbsp;<a href="?rec=all" onclick="javascript:return confirm('您确定要恢复所有数据吗？')" title="一键恢复">一键恢复</a></span>
    </td>
</tr>
</table>
</div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>