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
	
	//姓名过滤器
	_id("username").onblur = function(){
		username_onblur(this);
	};
	
	//备注过滤器
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

//姓名过滤器
function username_onblur(obj){
	var username = _id("username");
	var reg = new RegExp("[`'<>]");
    var rs = "";
    for (var i = 0; i < username.value.length; i++) {
        rs = rs + username.value.substr(i, 1).replace(reg, '');
    }
    username.value = rs;
}

//备注过滤器
function ps_onblur(obj){
	var ps = _id("ps");
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
	if(username.value.length>=2){
		if(tel.value.length>=10||qq.value.length>=5){
			return true;
		}
	}
	alert("填写信息不正确");
	return false;
}


