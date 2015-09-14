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
	_id("user").onfocus = function(){
		user_onfocus();
	};
	_id("user").onblur = function(){
		user_onblur(this);
	};
	
	//邮箱验证
	_id("email").onfocus = function(){
		email_onfocus();
	};
	_id("email").onblur = function(){
		email_onblur(this);
	};
	
	//密码验证
	_id("pwd").onfocus = function(){
		pwd_onfocus();
	};
	_id("pwd").onblur = function(){
		pwd_onblur(this);
	};
	
	//重复密码验证
	_id("repwd").onfocus = function(){
		repwd_onfocus();
	};
	_id("repwd").onblur = function(){
		repwd_onblur(this);
	};
	
	//验证码验证
	_id("code").onfocus = function(){
		code_onfocus();
	};
	_id("code").onblur = function(){
		code_onblur(this);
	};
	
	//验证码图片切换
	_id("code_img").onclick = function(){
		_id("code_img").src='includes/code.inc.php?tm='+Math.random();
	}
	
	//提交表单
	document.registerForm.onsubmit = function(){
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
function user_onfocus(){
	var user = _id("user");
	user.style.border = "1px solid #c00";
}

function user_onblur(obj){
	var user = _id("user");
	var user_text = _id("user_text");
	if("" == obj.value){
		user_text.innerHTML="用户名不能为空";
		user_text.style.color="#c00";
		return false;
	}
	var reg = /^[a-zA-Z][a-zA-Z0-9]{3,13}$/; 
	if(reg.test(obj.value) == false){
		user_text.innerHTML="推荐是纯字母，结尾有数字也可以，长度为4-14";
		user_text.style.color="#c00";
		return false;
	}
	
	//使用$.post()
	$.post('includes/register.ajax.php', {
		user : obj.value
	}, function (response, status, xhr) {
		if(response == '存在'){
			user_text.innerHTML="该用户已经存在";
			user_text.style.color="#c00";
			user.style.border = "1px solid #c00";
		}
	});
	user_text.innerHTML="恭喜通过，请记住你的用户名";
	user.style.border = "1px solid #c4c4c4";
	user_text.style.color="#999";
	return true;
}


//邮箱验证
function email_onfocus(){
	var email = _id("email");
	email.style.border = "1px solid #c00";
}
function email_onblur(obj){
	var email = _id("email");
	var email_text = _id("email_text");
	if("" == obj.value){
		email_text.innerHTML="Email 不能为空";
		email_text.style.color="#c00";
		return false;
	}
	var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/; 
	if(reg.test(obj.value) == false){
		email_text.innerHTML="请输入正确 的Email";
		email_text.style.color="#c00";
		return false;
	}
	email_text.innerHTML="恭喜通过";
	email.style.border = "1px solid #c4c4c4";
	email_text.style.color="#999";
	return true;
}

//密码验证
function pwd_onfocus(){
	var pwd = _id("pwd");
	pwd.style.border = "1px solid #c00";
}
function pwd_onblur(obj){
	var pwd = _id("pwd");
	var pwd_text = _id("pwd_text");
	if("" == obj.value){
		pwd_text.innerHTML="密码不能为空";
		pwd_text.style.color="#c00";
		return false;
	}
	var reg = /^[a-zA-Z0-9._-]{6,18}$/; 
	if(reg.test(obj.value) == false){
		pwd_text.innerHTML="字母数字混合，长度为6-18";
		pwd_text.style.color="#c00";
		return false;
	}
	pwd_text.innerHTML="恭喜通过";
	pwd.style.borderTop = "1px solid #c4c4c4";
	pwd.style.borderLeft = "1px solid #c4c4c4";
	pwd.style.borderBottom = "1px solid #ebebeb";
	pwd.style.borderRight = "1px solid #ebebeb";
	pwd_text.style.color="#999";
	return true;
}

//重复密码验证
function repwd_onfocus(){
	var repwd = _id("repwd");
	repwd.style.border = "1px solid #c00";
}
function repwd_onblur(obj){
	var repwd = _id("repwd");
	var pwd = _id("pwd");
	var repwd_text = _id("repwd_text");
	if("" == obj.value){
		repwd_text.innerHTML="重复密码不能为空";
		repwd_text.style.color="#c00";
		return false;
	}
	if(obj.value != pwd.value){
		repwd_text.innerHTML="两次密码输入不相同";
		repwd_text.style.color="#c00";
		return false;
	}
	repwd_text.innerHTML="恭喜通过，请记住你的密码";
	repwd.style.borderTop = "1px solid #c4c4c4";
	repwd.style.borderLeft = "1px solid #c4c4c4";
	repwd.style.borderBottom = "1px solid #ebebeb";
	repwd.style.borderRight = "1px solid #ebebeb";
	repwd_text.style.color="#999";
	return true;
}

function code_onfocus(){
	var code = _id("code");
	code.style.border = "1px solid #c00";
}

function code_onblur(obj){
	var code = _id("code");
	var code_text = _id("code_text");
	if("" == obj.value){
		code_text.innerHTML="验证码不能为空";
		code_text.style.color="#c00";
		return false;
	}
	var reg = /^[a-zA-Z0-9._-]{6,18}$/; 
	if(obj.value.length != 4){
		code_text.innerHTML="验证码长度必须是4位";
		code_text.style.color="#c00";
		return false;
	}
	code_text.innerHTML="";
	code.style.borderTop = "1px solid #c4c4c4";
	code.style.borderLeft = "1px solid #c4c4c4";
	code.style.borderBottom = "1px solid #ebebeb";
	code.style.borderRight = "1px solid #ebebeb";
	code.style.color="#999";
	return true;
}


//提交表单
function check(){
	var user = user_onblur(_id("user"));
	var email = email_onblur(_id("email"));
	var pwd = pwd_onblur(_id("pwd"));
	var repwd = repwd_onblur(_id("repwd"));
	if(user && email && pwd && repwd){
		return true;
	}
	return false;
}
