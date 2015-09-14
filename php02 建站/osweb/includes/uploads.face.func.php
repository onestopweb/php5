<?php
	// 防止恶意调用
	if (! defined ( 'IN_TG' )) {
		exit ( 'Access Defined!' );
	}

	//头像存在的路径
	define('FACE_PATH',ROOT_PATH.'/face/');
	define('FACE_PATH_20',ROOT_PATH.'/face/20/');
	define('FACE_PATH_50',ROOT_PATH.'/face/50/');
	define('FACE_PATH_100',ROOT_PATH.'/face/100/');
	//上传
	function _uploads($_FILES){
		$fileMimes = array('image/jpeg','image/pjpeg','image/gif','image/png','image/x-png');
		////判断类型是否是数组里的一种  
		if(is_array($fileMimes)){
			if(!in_array($_FILES['userfile']['type'],$fileMimes)){
				echo "<script>alert('本站只允许 jpg,png,gif 图片');history.back();</script>";
				exit;
			}
		}
		//上传大小限制
		if($_FILES['userfile']['size'] > 2000000){
			echo "<script>alert('上传不得超过 2 M');history.back();</script>";
			exit;
		}
		//上传错误处理
		if($_FILES['userfile']['error']>0){
			switch ($_FILES['userfile']['error']){
				case 1:echo "<script>alert('上传文件超过约定值');history.back();</script>";
				break;
				case 2:echo "<script>alert('上传文件超过约定值');history.back();</script>";
				break;
				case 3:echo "<script>alert('部分被上传');history.back();</script>";
				break;
				case 4:echo "<script>alert('没有被上传');history.back();</script>";
				break;
			}
			exit;
		}
		//重命名图片名，防止同名
		$_md5_number = md5(time().rand(1000, 9999));
		$_img = $_md5_number.'.'.substr(strrchr($_FILES[userfile][name],"."),1);
		//开始移动
		if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
			if(!move_uploaded_file($_FILES['userfile']['tmp_name'],FACE_PATH.$_img)){
				echo "<script>alert('上传失败');history.back();</script>";
				exit;
			}
		}
		//创建缩略图
		_create_thumbnail(FACE_PATH.$_img,20,20,FACE_PATH_20.$_img);
		_create_thumbnail(FACE_PATH.$_img,50,50,FACE_PATH_50.$_img);
		_create_thumbnail(FACE_PATH.$_img,100,100,FACE_PATH_100.$_img);
		return $_img;
	}
	//创建压缩图
	function _create_thumbnail($srcFile, $toW, $toH, $toFile="")
	{
		if ($toFile == "")
		{
			$toFile = $srcFile;
		}
		$info = "";
		$data = getimagesize($srcFile, $info);
		if (!$data)
			return false;
		
		//将文件载入到资源变量im中
		switch ($data[2]) 
		{
			case 1:
				$im = imagecreatefromgif($srcFile);
				break;
			case 2:
				$im = imagecreatefromjpeg($srcFile);
				break;
			case 3:
				$im = imagecreatefrompng($srcFile);
				break;
		}
		
		//计算缩略图的宽高
		$srcW = imagesx($im);
		$srcH = imagesy($im);
		$toWH = $toW / $toH;
		$srcWH = $srcW / $srcH;
		if ($toWH <= $srcWH)
		{
			$ftoW = $toW;
			$ftoH = (int)($ftoW * ($srcH / $srcW));
		}
		else
		{
			$ftoH = $toH;
			$ftoW = (int)($ftoH * ($srcW / $srcH));
		}
		if (function_exists("imagecreatetruecolor"))
		{
			$ni = imagecreatetruecolor($ftoW, $ftoH); //新建一个真彩色图像
			if ($ni)
			{
				//重采样拷贝部分图像并调整大小 可保持较好的清晰度
				imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
			}
			else
			{
				//拷贝部分图像并调整大小
				$ni = imagecreate($ftoW, $ftoH);
				imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
			}
		}
		else
		{
			$ni = imagecreate($ftoW, $ftoH);
			imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
		}
		//保存到文件 统一为.png格式
		imagepng($ni, $toFile); //以 PNG 格式将图像输出到浏览器或文件
		ImageDestroy($ni);
		ImageDestroy($im);
	}
?>