// JavaScript Document

//根据 id 获取元素
function _id(id){  
    return document.getElementById(id);  
} 

window.onload = function(){
	//搜索框
	_id("search").onfocus = function(){
		search_onfocus();
	};
	_id("search").onblur = function(){
		search_onblur(this);
	};
	
	//用户名验证
	_id("username").onfocus = function(){
		username_onfocus();
	};
	_id("username").onblur = function(){
		username_onblur(this);
	};
	
	//电话验证
	_id("tel").onfocus = function(){
		tel_onfocus();
	};
	_id("tel").onblur = function(){
		tel_onblur(this);
	};
	
	//QQ 验证
	_id("qq").onfocus = function(){
		qq_onfocus();
	};
	_id("qq").onblur = function(){
		qq_onblur(this);
	};
	
	//备注验证
	_id("ps").onfocus = function(){
		ps_onfocus();
	};
	_id("ps").onblur = function(){
		ps_onblur(this);
	};
	
	//提交表单
	document.orderForm.onsubmit = function(){
		return check();
	};
}

//搜索框
function search_onfocus(){
	var search = _id("search");
	if(search.value == "请输入您要搜索的内容"){
		search.value = "";
		search.style.color = "#000";
	}
}
function search_onblur(obj){
	var search = _id("search");
	var reg = new RegExp("[`'<>]");
    var rs = "";
    for (var i = 0; i < search.value.length; i++) {
        rs = rs + search.value.substr(i, 1).replace(reg, '');
    }
    search.value = rs;
	if(search.value == ""){
		search.value = "请输入您要搜索的内容";
		search.style.color = "#999";
	}
}

//用户名验证
function username_onfocus(){
	var username = _id("username");
	if(username.value == "您的称呼"){
		username.value = "";
		username.style.color = "#000";
	}
}
function username_onblur(obj){
	var username = _id("username");
	if(username.value == ""){
		username.value = "您的称呼";
		username.style.color = "#999";
	}
	var reg = new RegExp("[`'<>]");
    var rs = "";
    for (var i = 0; i < username.value.length; i++) {
        rs = rs + username.value.substr(i, 1).replace(reg, '');
    }
    username.value = rs;
}

//电话验证
function tel_onfocus(){
	var tel = _id("tel");
	if(tel.value == "您的手机号"){
		tel.value = "";
		tel.style.color = "#000";
	}
}
function tel_onblur(obj){
	var tel = _id("tel");
	if(tel.value == ""){
		tel.value = "您的手机号";
		tel.style.color = "#999";
	}
}

//QQ 验证
function qq_onfocus(){
	var qq = _id("qq");
	if(qq.value == "您的QQ号"){
		qq.value = "";
		qq.style.color = "#000";
	}
}
function qq_onblur(obj){
	var qq = _id("qq");
	if(qq.value == ""){
		qq.value = "您的QQ号";
		qq.style.color = "#999";
	}
}

//备注验证
function ps_onfocus(){
	var ps = _id("ps");
	if(ps.value == "您的建站需求"){
		ps.value = "";
		ps.style.color = "#000";
	}
}
function ps_onblur(obj){
	var ps = _id("ps");
	if(ps.value == ""){
		ps.value = "您的建站需求";
		ps.style.color = "#999";
	}
	var reg = new RegExp("[`'<>]");
    var rs = "";
    for (var i = 0; i < ps.value.length; i++) {
        rs = rs + ps.value.substr(i, 1).replace(reg, '');
    }
    ps.value = rs;
}

//提交表单
function check(){
	var username =_id("username");
	var tel =_id("tel");
	var qq =_id("qq");
	if(username.value == "您的称呼"){
		alert("姓名不能为空");
		return false;
	}
	if (isNaN(tel.value)) { 
		alert("手机号不能为空");
		return false;
	}
	if (isNaN(qq.value)) { 
		alert("QQ号不能为空");
		return false;
	}
	if(username.value.length>=2){
		if(tel.value.length>=10||qq.value.length>=5){
			if(ps.value == "您的建站需求"){
				ps.value = '';
			}
			return true;
		}
	}
}


