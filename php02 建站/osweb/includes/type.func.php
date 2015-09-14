<?php
//防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( 'Access Defined!' );
}

//存放分类
function _nav_type(){
	$_type = array('编程语言','美工设计','网页制作','页面特效','搜索与导航','推广与广告','网站优化','批发与零售','互联网教学','软件下载','在线功能','服务器与域名','其他');
	return $_type;
}
function _liber_type(){
	$_type = array('有道云笔记','在线手册','其他');
	return $_type;
}
function _software_type(){
	$_type = array('应用软件','系统软件','开发者软件','热门电影','其他');
	return $_type;
}
function _study_type(){
	$_type = array('Java 教程','PHP 教程','数据库教程','美工设计','网页制作','页面特效','黑客教程','办公类教程','其他');
	return $_type;
}
function _web_type(){
	$_type = array('本站公告','联系方式','支付方式','电脑网站模板','手机网站模板','自适应网站模板','其他');
	return $_type;
}
function _sort(){
	$_sort = array('按最新时间','按最早时间','按经典排序','点赞量排序','点击量排序');
	return $_sort;
}
function _role(){
	$_role = array('未激活','用户','管理员');
	return $_role;
}

?>