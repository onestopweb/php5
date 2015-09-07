var curIndex = 0;
var timeInterval = 4000;
var arr = new Array();
arr[0] = "fukeb.jpg";
arr[1] = "baopi.jpg";
arr[2] = "renliub.jpg";
setInterval(changeImg, timeInterval);

function changeImg() {
	var obj = document.getElementById("showpic");
	if (curIndex == arr.length - 1) {
		curIndex = 0;
	} else {
		curIndex += 1;
	}
	obj.src = "images/" + arr[curIndex];
}

document.writeln("<div style=\"width:300px;margin:10px auto 0 auto;overflow:hidden;\"><a href=\"###\" target=\"_blank\"><img src=\"images/fukeb.jpg\" id=\"showpic\" /></a></div>");