<?php
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/common.inc.php'; //转换成硬路径，速度更快
	$_user = $_POST['user'];
	$_sql = "SELECT o_user_id FROM o_user WHERE o_user_id='$_user' LIMIT 1";
	$_result = _fetch_array($_sql);
	if($_result){
		echo '存在';
	}
	_close();
?>
