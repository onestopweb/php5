<?php
	header ( 'Content-Type: text/html; charset=utf-8' );
	$_option = $_GET['option'];
	$_search = trim($_GET['search']);
	if($_search=="请输入您要搜索的内容"){
		$_search = "";
	}
	switch ($_option){
		case 1:
			echo "<script type='text/javascript'>location.href='search.nav.php?search=$_search';</script>";
		break;
		case 2:
			echo "<script type='text/javascript'>location.href='search.software.php?search=$_search';</script>";
		break;
		case 3:
			echo "<script type='text/javascript'>location.href='search.study.php?search=$_search';</script>";
		break;
		case 4:
			echo "<script type='text/javascript'>location.href='search.liber.php?search=$_search';</script>";
		break;
		default:
			echo "<script type='text/javascript'>location.href='search.web.php?search=$_search';</script>";
	}
?>
