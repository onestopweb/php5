// JavaScript Document

//根据 id 获取元素
function _id(id){  
    return document.getElementById(id);  
} 

window.onload = function(){
	//用户名验证
	_id("user").onfocus = function(){
		user_onfocus();
	};
	_id("user").onblur = function(){
		user_onblur(this);
	};

	//密码验证
	_id("pwd").onfocus = function(){
		pwd_onfocus();
	};
	_id("pwd").onblur = function(){
		pwd_onblur(this);
	};
	
	//提交表单
	document.loginForm.onsubmit = function(){
		return check();
	};  
}

//用户名验证
function user_onfocus(){
	var user = _id("user");
	user.style.border = "1px solid #c00";
	if(user.value == "请输入您的用户名"){
		user.value = "";
		user.style.color = "#000";
	}
}
function user_onblur(obj){
	var user = _id("user");
	var user_prompt = _id("user_prompt");
	if("" == obj.value){
		user.value = "请输入您的用户名";
		user_prompt.innerHTML="用户名不能为空";
		user.style.color = "#999";
		user.style.border = "1px solid #c00";
		return false;
	}
	var reg = /^[a-zA-Z][a-zA-Z0-9]{3,17}$/; 
	if(reg.test(obj.value) == false){
		user_prompt.innerHTML="输入用户名不正确";
		user_prompt.style.color="#c00";
		return false;
	}
	user_prompt.innerHTML = "";
	user.style.borderTop = "1px solid #c4c4c4";
	user.style.borderLeft = "1px solid #c4c4c4";
	user.style.borderBottom = "1px solid #ebebeb";
	user.style.borderRight = "1px solid #ebebeb";
	return true;
}


//密码验证
function pwd_onfocus(){
	var pwd = _id("pwd");
	pwd.style.border = "1px solid #c00";
}
function pwd_onblur(obj){
	var pwd = _id("pwd");
	var user_prompt = _id("user_prompt");
	if("" == obj.value){
		user_prompt.innerHTML="密码不能为空";
		user_prompt.style.color="#c00";
		return false;
	}
	var reg = /^[a-zA-Z0-9._-]{6,18}$/; 
	if(reg.test(obj.value) == false){
		user_prompt.innerHTML="输入密码不正确";
		user_prompt.style.color="#c00";
		return false;
	}
	user_prompt.innerHTML = "";
	pwd.style.borderTop = "1px solid #c4c4c4";
	pwd.style.borderLeft = "1px solid #c4c4c4";
	pwd.style.borderBottom = "1px solid #ebebeb";
	pwd.style.borderRight = "1px solid #ebebeb";
	return true;
}

//提交表单
function check(){
	if(_id("user").value == "请输入您的用户名"){
		_id("user_prompt").innerHTML = "请输入您的用户名";
		return false;
	}
	var user = user_onblur(_id("user"));
	var pwd = pwd_onblur(_id("pwd"));
	if(user && pwd){
		return true;
	}
	return false;
}
