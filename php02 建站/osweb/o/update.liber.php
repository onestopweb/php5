<?php 
	define('IN_TG',true);
	//引入公共文件
	require substr ( dirname ( __FILE__ ), 0, - 2 ).'/includes/common.inc.php'; //转换成硬路径，速度更快
	require ROOT_PATH.'includes/uploads.product.func.php';
	require ROOT_PATH.'includes/type.func.php';
	$_type_arr = _liber_type();
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
		_close();
		exit();
	}
	$_id = $_GET['id'];
	if($_GET['id']!=null){
		$_sql = " SELECT * FROM o_liber WHERE o_id =$_id LIMIT 1 ";
		$_result = _fetch_array($_sql);
		if ($_GET['action'] == 'onestopweb') {
			$_title = trim($_POST['title']);
			$_link = trim($_POST['link']);
			$_con = trim($_POST['con']);
			$_valid = $_POST['valid'];
			$_top = $_POST['top'];
			$_type = $_POST['type'];
			if($_FILES[userfile][name]){
				$_img = _uploads($_FILES);
				$_sql = "UPDATE o_liber SET
				o_title = '$_title',
				o_link = '$_link',
				o_con = '$_con',
				o_img = '$_img',
				o_top = '$_top',
				o_valid = '$_valid',
				o_type_id = '$_type' WHERE o_id =$_id LIMIT 1";
				_query($_sql);
			}else{
				$_sql = "UPDATE o_liber SET
				o_title = '$_title',
				o_link = '$_link',
				o_con = '$_con',
				o_top = '$_top',
				o_valid = '$_valid',
				o_type_id = '$_type' WHERE o_id =$_id LIMIT 1";
				_query($_sql);
			}
			_close();
			echo "<script type='text/javascript'>alert('修改成功');location.href='update.liber.php?id=$_id';</script>";
			exit();
		}
		if ($_GET['action'] == 'uploads') {
			session_start();
			$_name = $_SESSION['name'];
			if($_FILES[userfile][name]){
				$_img = _uploads($_FILES);
				$_sql = "INSERT INTO o_liber_img (o_img ,o_time ,o_main_id ,o_user_id)
				VALUES ('$_img', NOW(), '$_id', '$_name')";
				_query($_sql);
				_close();
				echo "<script type='text/javascript'>location.href='update.liber.php?id=$_id';</script>";
				exit();
			}
		}
		if($_GET['del']!=null){
			$_del = $_GET['del'];
			$_sql = "DELETE FROM o_liber_img WHERE o_id = $_del LIMIT 1";
			_query($_sql);
		}
	}else{
		_close();
		exit ( 'Access Defined!' );
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一站式后台管理系统</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="style/basic.css" type="text/css" />
<link rel="stylesheet" href="style/update.css" type="text/css" />
</head>
<body>

<div class="nav">
	<h3>书箱文档 -&gt; 修改信息</h3>
</div>


<div class="update">
<form action="update.liber.php?id=<?php echo $_id?>&action=onestopweb" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">更新信息</td></tr>
    <tr><td class="w100 h38 b">文章标题：</td><td><input type="text" name="title" value="<?php echo $_result[o_title]?>" class="text f_l" /><em class="f_l">下限是4个字符，上限是28个字符</em></td></tr>
    <tr><td class="h38 b">打开链接：</td><td><input type="text" name="link" value="<?php echo $_result[o_link]?>" class="text f_l" /><em class="f_l">打开链接</em></td></tr>
    <tr><td class="h360 b">文章正文：</td><td>
    	<p>
        	<textarea name="con"><?php echo $_result[o_con]?></textarea>
            <i class="f_r">当前已输入 11 个字</i>
        </p>
    </td></tr>
    <tr><td class="h38 b">选择分类：</td><td><span>
    	<?php
	    	for($i=0;$i<count($_type_arr);$i++){
				if(($i+1)==$_result[o_type_id]){
					echo '<input type="radio" class="radio" name="type" value="'.($i+1).'" checked="checked" />'.$_type_arr[$i];
				}else{
					echo '<input type="radio" class="radio" name="type" value="'.($i+1).'" />'.$_type_arr[$i];
				}
	    	}
    	?>
    </span></td></tr>
    <tr><td class="h38 b">设置经典：</td><td><span>
    	<?php
	    	if ($_result[o_top]==1){
	    		echo '<input type="radio" class="radio"  value="1" name="top" checked="checked" />经典';
	    		echo '<input type="radio" class="radio"  value="0" name="top" />空白';
	    	}else{
	    		echo '<input type="radio" class="radio"  value="1" name="top" />经典';
				echo '<input type="radio" class="radio"  value="0" name="top" checked="checked" />空白';
	    	}
    	?>
    	</span></td>
  	</tr>
    <tr><td class="h38 b">设置有效：</td><td><span>
    	<?php 
	    	if ($_result[o_valid]==1){
	    		echo '<input type="radio" class="radio" value="1" name="valid" checked="checked" />有效';
	    		echo '<input type="radio" class="radio" value="0" name="valid" />处理中';
	    	}else{
	    		echo '<input type="radio" class="radio" value="1" name="valid" />有效';
				echo '<input type="radio" class="radio" value="0" name="valid" checked="checked" />处理中';
	    	}
    	?>
    	</span></td>
   	</tr>
    <tr><td class="h38 b">主图替换：</td><td><input type="file" name="userfile" class="file f_l" /><em class="f_l">图片文件上传支持 .png .jpg .gif格式　大小在5120K以内</em></td></tr>
    <tr><td colspan="2" class="h38 center"><input type="submit" value="提交" class="submit" /><input type="reset" class="reset" value="重填" /></td></tr>
</table>
</form>
</div>

<div class="img">
<form action="update.liber.php?id=<?php echo $_id?>&action=uploads" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0">
	<tr class="head"><td colspan="2">图片上传</td></tr>
	<tr>
    	<td class="w124">
        	<p><img src="../product/100/<?php echo $_result[o_img]?>" /></p>
            <h4>主图</h4>
    	</td>
        <td>
        	<?php
				$_sql_img = "SELECT * FROM o_liber_img WHERE o_main_id = $_id";
				$_result_img = _query($_sql_img);
				while (!!$row = mysql_fetch_array($_result_img)){
        	?>
        	<dl class="f_l">
            	<dd><img src="../product/100/<?php echo $row[o_img]?>" /></dd>
                <dt><a href="?id=<?php echo $_id?>&del=<?php echo $row[o_id]?>" onclick="javascript:return confirm('您确定要删除该图片吗吗？')" title="删除该图" >删除</a></dt>
            </dl>
            <?php
				}
			?>
    	</td>
    </tr>
    <tr><td class="h38 b">图片上传：</td><td colspan="7"><input type="file" name="userfile" class="file f_l" /><em class="f_l">图片文件上传支持 .png .jpg .gif格式　大小在5120K以内</em></td></tr>
    <tr><td colspan="2" class="h38 center"><input type="submit" value="提交" class="submit" /><input type="reset" class="reset" value="重填" /></td></tr>
</table>
</form>
</div>

<div style="height:40px;"></div>
<?php 
	require ROOT_PATH.'includes/close.inc.php';
?>
</body>
</html>