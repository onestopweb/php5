<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
		_close();
		exit();
	}
	$_page=$_GET['page'];
	$_search = trim($_GET['search']);
	if($_page == null || $_page<=0){
		$_page =1;
	}
	if($_GET['yes_id']!=null){
		$_yes_id = $_GET['yes_id'];
		$_sql = "UPDATE o_order SET o_top = '1' WHERE o_id =$_yes_id LIMIT 1";
		_query($_sql);
	}
	if($_GET['no_id']!=null){
		$_no_id = $_GET['no_id'];
		$_sql = "UPDATE o_order SET o_top = '2' WHERE o_id =$_no_id LIMIT 1";
		_query($_sql);
	}
	if($_GET['del_id']!=null){
		$_del_id = $_GET['del_id'];
		$_sql = "DELETE FROM o_order WHERE o_id = $_del_id LIMIT 1";
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
	<h3>域名导航 -&gt; 查看信息</h3>
</div>

<div class="list">
<table cellpadding="0" cellspacing="0">
<tr class="search">
	<td colspan="8">
        <form action="order.php" method="get">
        	<input type="text"  name="search" value="<?php echo $_search ?>" class="text f_l" />
       		<input type="submit" class="submit f_l" value="" />
        </form>
	</td>
</tr>
<tr class="head"><td>姓名</td><td>手机</td><td>QQ</td><td>建站要求</td><td>提交时间</td><td>用户</td><td>分类</td><td>操作</td></tr>
<?php 
	$_page_begin = ($_page-1)*20;
	$_page_end = $_page*20;
	$_sql_list = "SELECT * FROM o_order ";
	if($_search !=null){
		$_sql_list.= "WHERE o_name LIKE '%$_search%' ORDER BY o_time DESC LIMIT $_page_begin , $_page_end";
	}else{
		$_sql_list.= "ORDER BY o_time DESC LIMIT $_page_begin , $_page_end";
	}
	$_result = _query($_sql_list);
	$i=0;
	while (!!$row = mysql_fetch_array($_result)){
	$i++;
?>
	<tr class="item<?php if($i%2==0){ echo ' color_bg';}?>">
	<td><?php echo $row[o_name];?></td>
	<td><?php echo $row[o_tel];?></td>
	<td><?php echo $row[o_qq];?></td>
	<td style="width: 420px;"><a title="<?php echo $row[o_ps] ?>"><?php echo mb_substr($row[o_ps],0,30,'utf-8') ?></a></td>
	<td><?php echo substr($row[o_time],0,20)?></td>
	<td><?php echo $row[o_user_id]; ?></td>
	<td>
		<?php 
        	if ($row[o_top]==1){
                echo '<i>好</i>';
            }else if($row[o_top]==2){
           		echo '<i>差</i>';
            }else{
            	echo '<i>潜</i>';
            }
        ?>
	</td>
	<td><a href="?search=<?php echo $_search;?>&page=<?php echo $_page;?>&yes_id=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要设置数据为好吗？')"  title="设置'好'">设置'好'</a>&nbsp;&nbsp;
	<a href="?search=<?php echo $_search;?>&page=<?php echo $_page;?>&no_id=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要设置数据为差吗？')"  title="设置'差'">设置'差'</a>&nbsp;&nbsp;
	<a href="?search=<?php echo $_search;?>&page=<?php echo $_page;?>&del_id=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要删除该条数据吗？')"  title="删除该条数据">删除</a>&nbsp;&nbsp;</td></tr>

<?php
	}
?>
<tr class="page">
    <td colspan="8">
        <span class="f_l"></span>
<?php
$_con = '';
$_sql_count = "SELECT count( o_id ) FROM o_order "; 
if($_search !=null){
	$_sql_count.= "WHERE o_name LIKE '%$_search%'";
	$_con = "search=$_search&";
}
$_result2 = _query($_sql_count);
$_row2 = mysql_fetch_array($_result2);

//分页
$_allcount= $_row2[0];
$_page_size =20;
$_page_show =10;
$_page_count = ceil($_allcount/$_page_size);
if($_page <= 1 || $_page == '') $_page = 1;
if($_page >= $_page_count) $_page = $_page_count;
$_pre_page = ($_page == 1)? 1 : $_page - 1;
$_next_page= ($_page == $_page_count)? $_page_count : $_page + 1 ;
$_pagenav .= "第 $_page/$_page_count 页 共 $_allcount 条记录 ";
$_pagenav .= "<a href='?".$_con."page=1'>首页</a> ";
$_pagenav .= "<a href='?".$_con."page=$_pre_page'>前一页</a> ";
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
$_pagenav .= "<a href='?".$_con."page=$_next_page'>后一页</a> ";
$_pagenav .= "<a href='?".$_con."page=$_page_count'>末页</a>";
echo '<em class="f_r">'.$_pagenav.'</em>' ;
?>
    </td>
</tr>
</table>
</div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>