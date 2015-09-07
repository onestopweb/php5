<?php
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/common.inc.php'; //转换成硬路径，速度更快
	$_id = $_POST['id'];
	$_cls=$_POST['cls'];
	$_sql ='';
	switch ($_cls){
		case 1:
			$_sql = "UPDATE o_nav_con SET o_valid = 0 WHERE o_id =$_id LIMIT 1 ";
		break;
		case 2:
			$_sql = "UPDATE o_software_con SET o_valid = 0 WHERE o_id =$_id LIMIT 1 ";
		break;
		case 3:
			$_sql = "UPDATE o_study_con SET o_valid = 0 WHERE o_id =$_id LIMIT 1 ";
		break;
		case 4:
			$_sql = "UPDATE o_liber_con SET o_valid = 0 WHERE o_id =$_id LIMIT 1 ";
		break;
		default:
			$_sql = "UPDATE o_web_con SET o_valid = 0 WHERE o_id =$_id LIMIT 1 ";
	}
	_query($_sql);
	_close();
?>
