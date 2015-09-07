<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _jhsy_type();
	$_page=$_GET['page'];
	$_search = trim($_GET['search']);
	if($_page == null || $_page<=0){
		$_page =1;
	}
	if($_GET['eid']!=null){
		$_eid = $_GET['eid'];
		$_sql = "DELETE FROM e_jhsy WHERE e_id = $_eid LIMIT 1";
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
	<h3>计划生育 -&gt; 查看信息</h3>
</div>

<div class="list">
<table cellpadding="0" cellspacing="0">
<tr class="search">
	<td colspan="7">
        <form action="list.jhsy.php" method="get">
        	<input type="text"  name="search" value="" class="text f_l" />
       		<input type="submit" class="submit f_l" value="" />
        </form>
	</td>
</tr>
<tr class="head">
	<td>编号</td><td>标题</td><td>阅读量</td><td>发布人</td><td>发布时间</td><td>类别</td><td>操作</td></tr>
<?php 
	$_page=$_GET['page'];//获取当前的页数
	$_page_show =10;//最大显示10页
	$_page_size =15;//显示每页的条数
	if($_page == null || $_page<=0){//为空恢复为第一页
		$_page =1;
	}
	$_page_begin = ($_page-1) * $_page_size;	
	$_sql_list = "SELECT * FROM e_jhsy ";
	//搜索词为空
	if($_search !=null){
		$_sql_list.= "WHERE e_title LIKE '%$_search%' order by e_time DESC LIMIT $_page_begin , $_page_size";
	}else{
		$_sql_list.= "order by e_time DESC LIMIT $_page_begin , $_page_size";
	}
	$_result = _query($_sql_list);
	$i=0;
	while (!!$row = mysql_fetch_array($_result)){
	$i++;
?>
	<tr class="item<?php if($i%2==0){ echo ' color_bg';}?>"><td><a href="../jhsy.cont.php?id=<?php echo $row[e_id];?>" target="_blank"><?php echo $row[e_id];?></a></td><td style="width: 360px;"><a title="<?php echo $row[e_title] ?>" href="../jhsy.cont.php?id=<?php echo $row[e_id];?>" target="_blank"><?php echo mb_substr($row[e_title],0,28,'utf-8') ?></a></td>
	<td><?php echo $row[e_see]?></td><td><?php echo $row[e_name]?></td><td><?php echo substr($row[e_time],0,10) ?></td><td><?php echo $_type_arr[$row[e_type]-1]; ?></td><td><a href="?search=<?php echo $_search;?>&page=<?php echo $_page;?>&eid=<?php echo $row[e_id];?>" onclick="javascript:return confirm('您确定要删除该条数据吗？')"  title="删除该条数据">删除</a>&nbsp;&nbsp;<a href="update.jhsy.php?id=<?php echo $row[e_id];?>" title="修改或更新">编辑</a></td></tr>
<?php
	}
?>
	<tr class="page">
    	<td colspan="7">
		<span class="f_l"><a href="add.jhsy.php">增加信息</a></span>
<?php
$_con = '';
$_sql_count = "SELECT count( e_id ) FROM e_jhsy "; 
if($_search !=null){
	$_sql_count.= "WHERE e_title LIKE '%$_search%'";
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