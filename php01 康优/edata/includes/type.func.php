<?php
//防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( 'Access Defined!' );
}
//妇科中心
function _fkzx_type(){
	$_type = array('妇科炎症','月经不调','宫颈疾病','妇科肿瘤');
	return $_type;
}

//男科中心
function _nkzx_type(){
	$_type = array('前列腺疾病','前列腺增生','前列腺痛','前列腺囊肿');
	return $_type;
}

//计划生育
function _jhsy_type(){
	$_type = array('无痛人流','药物流产','宫外孕','早早孕','引产','上环取环');
	return $_type;
}
?>