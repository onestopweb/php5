<?php
	// 设置字符集编码
	header ( 'Content-Type: text/html; charset=utf-8' );
	if(isset($_COOKIE['name'])){
		setcookie('name','',time()-1);  
	}
	echo "<script type='text/javascript'>location.href='index.php';</script>";
	exit();
?>
