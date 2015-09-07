<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _web_type();
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
	if($_GET['oid']!=null){
		$_oid = $_GET['oid'];
		$_sql = "DELETE FROM o_web WHERE o_id = $_oid LIMIT 1";
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
	<h3>WEB动态 -&gt; 查看信息</h3>
</div>

<div class="list">
<table cellpadding="0" cellspacing="0">
<tr class="search">
	<td colspan="10">
        <form action="list.web.php" method="get">
        	<input type="text"  name="search" value="<?php echo $_search ?>" class="text f_l" />
       		<input type="submit" class="submit f_l" value="" />
        </form>
	</td>
</tr>
<tr class="head"><td>编号</td><td>图片</td><td>标题</td><td>阅读量</td><td>好评量</td><td>经典榜</td><td>有效性</td><td>发布人</td><td>类别</td><td>操作</td></tr>
<?php 
	$_page_show =20;//最大显示20页
	$_page_size =15;//显示每页的条数
	$_page_begin = ($_page-1) * $_page_size;
	$_sql_list = "SELECT * FROM o_web ";
	if($_search !=null){
		$_sql_list.= "WHERE o_title LIKE '%$_search%' order by o_id DESC LIMIT $_page_begin , $_page_size";
	}else{
		$_sql_list.= "order by o_id DESC LIMIT $_page_begin , $_page_size";
	}
	$_result = _query($_sql_list);
	$i=0;
	while (!!$row = mysql_fetch_array($_result)){
	$i++;
?>
	<tr class="item<?php if($i%2==0){ echo ' color_bg';}?>"><td><a href="../info.web.php?id=<?php echo $row[o_id];?>" target="_blank"><?php echo $row[o_id];?></a></td><td><img src="../product/20/<?php echo $row[o_img];?>"></img></td><td style="width: 280px;"><a title="<?php echo $row[o_title] ?>"><?php echo mb_substr($row[o_title],0,18,'utf-8') ?></a></td><td><?php echo $row[o_see]?></td><td><?php echo $row[o_good]?></td><td>
				<?php 
                	if ($row[o_top]==1){
                		echo '<i>经典</i>';
                	}else{
                		echo '<i>空白</i>';
                	}
                ?></td><td>
                <?php 
                	if ($row[o_valid]==1){
                		echo '<i>有效</i>';
                	}else{
                		echo '<i>处理中</i>';
                	}
                ?>
                </td><td><?php echo $row[o_user_id]?></td><td><?php echo $_type_arr[$row[o_type_id]-1]; ?></td><td><a href="?search=<?php echo $_search;?>&page=<?php echo $_page;?>&oid=<?php echo $row[o_id];?>" onclick="javascript:return confirm('您确定要删除该条数据吗？')"  title="删除该条数据">删除</a>&nbsp;&nbsp;<a href="update.web.php?id=<?php echo $row[o_id];?>" title="修改或更新">编辑</a></td></tr>
<?php
	}
?>
<tr class="page">
    <td colspan="10">
        <span class="f_l"><a href="add.web.php">发布新贴</a></span>
<?php
$_con = '';
$_sql_count = "SELECT count( o_id ) FROM o_web "; 
if($_search !=null){
	$_sql_count.= "WHERE o_title LIKE '%$_search%'";
	$_con = "search=$_search&";
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