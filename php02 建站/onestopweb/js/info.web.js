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
	
	//侧栏列表切换
	_id("list1").style.backgroundColor="#d10504"; 
	_id("list1").style.color="#fff"; 
	_id("list1").onmousemove = function(){
		var list = _id("list1");
		var list_hover = _id("list_hover1");
		list_close();
		list.style.backgroundColor="#d10504"; 
		list.style.color="#fff"; 
		list_hover.style.display="block";
	};
	_id("list2").onmousemove = function(){
		var list = _id("list2");
		var list_hover = _id("list_hover2");
		list_close();
		list.style.backgroundColor="#d10504"; 
		list.style.color="#fff"; 
		list_hover.style.display="block";
	};
	_id("list3").onmousemove = function(){
		var list = _id("list3");
		var list_hover = _id("list_hover3");
		list_close();
		list.style.backgroundColor="#d10504"; 
		list.style.color="#fff"; 
		list_hover.style.display="block";
	};
	
	//过滤器
	_id("cont").onblur = function(){
		cont_onblur(this);
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

//过滤器
function cont_onblur(obj){
	var cont = _id("cont");
	var reg = new RegExp("[`'<>]");
    var rs = "";
    for (var i = 0; i < cont.value.length; i++) {
        rs = rs + cont.value.substr(i, 1).replace(reg, '');
    }
    cont.value = rs;
}

//关闭所有的侧栏列表
function list_close(){
	for(var i=1; i<=3; i++){
		document.getElementById("list"+i).style.backgroundColor="#f2f2f2"; 
		document.getElementById("list"+i).style.color="#333"; 
		document.getElementById("list_hover"+i).style.display="none"; 
	}
}

//增加主赞
function good(id,num,cls){
	var good = _id("good");
	var number = num+1;
	$.post('includes/good.ajax.php', {
		id : id,
		num : num,
		cls : cls
	}, function (response, status, xhr) {
		good.innerHTML =number+"个赞";
	});
}

//增加主赞2
function good2(id,num,cls){
	var good2 = _id("good2");
	var number = num+1;
	$.post('includes/good.ajax.php', {
		id : id,
		num : num,
		cls : cls
	}, function (response, status, xhr) {
		good2.innerHTML =number+"个赞";
	});
}

//增加链接赞
function good_link(id,num,cls){
	var good_link = _id("good_link"+id);
	var number = num+1;
	$.post('includes/good.link.ajax.php', {
		id : id,
		num : num,
		cls : cls
	}, function (response, status, xhr) {
		good_link.innerHTML =number+"个赞";
	});
}

//增加内容赞
function good_cont(id,num,cls){
	var good_cont = _id("good_cont"+id);
	var number = num+1;
	$.post('includes/good.cont.ajax.php', {
		id : id,
		num : num,
		cls : cls
	}, function (response, status, xhr) {
		good_cont.innerHTML =number+"个赞";
	});
}

//点击处理中
function valid(id,cls){
	var valid = _id("valid");
	$.post('includes/valid.ajax.php', {
		id : id,
		cls : cls
	}, function (response, status, xhr) {
		valid.innerHTML ="处理";
	});
}


//点击内容处理中
function valid_cont(id,cls){
	var valid_cont = _id("valid_cont"+id);
	$.post('includes/valid.cont.ajax.php', {
		id : id,
		cls : cls
	}, function (response, status, xhr) {
		valid_cont.innerHTML ="处理";
	});
}

