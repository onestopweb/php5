document.writeln('<div class="swt">');
document.writeln('	<a href="###" rel="nofollow" target="_blank"><img src="images/swt.gif" alt="在线咨询" /></a>');
document.writeln('</div>');
document.writeln('<div style="display: none;">');
document.writeln('<script src="http://s20.cnzz.com/stat.php?id=5624699&web_id=5624699" language="JavaScript"></script>');
document.writeln('</div>');

document.writeln('<div style="background:url(images/bottom.png) repeat-x 0 0;width:100%;height:50px;position:fixed;_position:absolute;bottom:0px;left:0px;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight));z-index:99999;">');
document.writeln('	<a href="tel:02039960255" style="width:25%;height:50px;float:left;display:block;background:url(images/bottom.png) no-repeat 50% -50px;"></a>');
document.writeln('	<a href="###" target="_blank" style="width:25%;height:50px;float:left;display:block;background:url(images/bottom.png) no-repeat 50% -100px;"></a>');
document.writeln('	<a href="###" style="width:25%;height:50px;float:left;display:block;background:url(images/bottom.png) no-repeat 50% -150px;position:relative;"><img src="images/number.gif" style="top:5px;left:55%;position:absolute;" /></a>');
document.writeln('	<a href="###" style="width:25%;height:50px;float:left;display:block;background:url(images/bottom.png) no-repeat 50% -200px;"></a>');
document.writeln('</div>');


document.writeln('<div id="effect" style="width:246px;zoom:1; height:108px; display:none; z-index: 2147483647; position: fixed ! important; left: 50%;margin-left: -130px !important; bottom:50%;_margin-bottom:0px;_position:absolute;_bottom:0;_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)))}">');
document.writeln('<div class="hide_off" style="position:relative; margin:0 auto; overflow:hidden"><img src="images/swt.png" alt="医生在线"><a href="javascript:divclose1();" id="button2" target="_top"><div onclick="divclose1()" style="position:absolute; position: absolute;width: 30px;height: 30px;left:210px; bottom:95px;"></div></a><a href="###" id="button2" target="_blank" ><div style="position:absolute; position: absolute;width: 75px;height: 28px;left:38px; bottom:18px;"></div></a><a href="tel:02039960255" id="button2" target="_blank" ><div style="position:absolute; position: absolute;width: 75px;height: 28px;left:135px; bottom:18px;"></div></a></div>');
document.writeln('</div>');


function divclose1()
{
	document.getElementById("effect").style.display='none';
	setTimeout(function(){document.getElementById("effect").style.display='block';},20000);
}

window.onload=function (){
    setTimeout(function(){document.getElementById("effect").style.display='block';},10000);
};

	