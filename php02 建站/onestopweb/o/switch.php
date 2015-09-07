<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>切换</title>
<style type="text/css">
*{ margin:0; padding:0;}
</style>
</head>
<body>
<script type="text/javascript"> 
function $id(id){  
    return document.getElementById(id);  
}
window.onload = function(){
var count=0;
$id("menu_switch").onclick = function(){
		var frame_page = top.document.getElementById("frame_page");
		var menu_switch =$id("menu_switch");
		if(count%2==0){
			frame_page.cols = "0,10,*";
			menu_switch.style.backgroundImage='url(images/frame_show.gif)';
			menu_switch.title='点击打开管理界面菜单';
		}else{
			frame_page.cols = "153,10,*";
			menu_switch.style.backgroundImage='url(images/frame_hide.gif)';
			menu_switch.title='点击隐藏管理界面菜单';
		}
		count++;
	};
};
</script>
<div style="height:800px; padding-top:260px; width:100px; cursor:pointer; background:url(images/frame_switch_Bj.gif) repeat-y;">
	<div id="menu_switch" style="background:url(images/frame_hide.gif) no-repeat; width:10px; height:86px;" title="点击隐藏管理界面菜单"></div>
</div>
</body>
</html>
