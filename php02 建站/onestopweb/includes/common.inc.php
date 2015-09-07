<?php
// 防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( 'Access Defined!' );
}

// 设置字符集编码
header ( 'Content-Type: text/html; charset=utf-8' );

// 转换硬路径常量
define ( 'ROOT_PATH', substr ( dirname ( __FILE__ ), 0, - 8 ) );

// 引入函数库
require ROOT_PATH . 'includes/mysql.func.php';

// 数据库连接
define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PWD', '******' );
define ( 'DB_NAME', 'osweb' );

// 初始化数据库
_connect (); // 连接MYSQL数据库
_select_db (); // 选择指定的数据库
_set_names (); // 设置字符集

//设置电话
function _tel(){
	$_tel = array('137-1917-4168','159-1433-4331');
	return $_tel;
}
?>