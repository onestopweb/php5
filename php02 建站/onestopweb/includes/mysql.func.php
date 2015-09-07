<?php
// 防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( 'Access Defined!' );
}

// _connect() 连接MYSQL数据库
function _connect() {
	// global 表示全局变量的意思，意图是将此变量在函数外部也能访问
	global $_conn;
	if (! $_conn = @mysql_connect ( DB_HOST, DB_USER, DB_PWD )) {
		exit ( '数据库连接失败' );
	}
}
// _select_db选择一款数据库
function _select_db() {
	if (! mysql_select_db ( DB_NAME )) {
		exit ( '找不到指定的数据库' );
	}
}
// 设置字符集
function _set_names() {
	if (! mysql_query ( 'SET NAMES UTF8' )) {
		exit ( '字符集错误' );
	}
}
// 获取一条数据
function _query($_sql) {
	if (! $_result = mysql_query ( $_sql )) {
		exit ( 'SQL执行失败' );
	}
	return $_result;
}
// 获取一批数据
function _fetch_array($_sql) {
	return mysql_fetch_array ( _query ( $_sql ), MYSQL_ASSOC );
}
// 关闭数据库
function _close() {
	if (! mysql_close ()) {
		exit ( '关闭异常' );
	}
}

?>