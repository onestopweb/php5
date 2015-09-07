<?php 
	define('IN_TG',true);
	//引入公共文件
	require dirname(__FILE__).'/includes/common.inc.php'; //转换成硬路径，速度更快
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0" />
	<title><?php echo TOP_TITLE?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body id="back">
<?php 
	require ROOT_PATH.'includes/top.inc.php';
?>
	<div class="index">
		<div class="head"><a href="index.php">返回首页</a></div>
	</div>
	<h1 id="title">
		医院介绍
	</h1>
	<div class="split">
		<span class="left"></span>
		<div class="head"><strong><?php echo AD_TITLE?></strong></div>
		<span class="right"></span>
	</div>
	<div id="content">
		<p>
	&nbsp;&nbsp;&nbsp; 为推行优生优育工作，广东身卫生厅、广东省优生优育协会于1993年12月8日成立了广东省优生优育科研培训中心，并筹资兴建了番禺石基康优医院。</p>
<p>
	&nbsp;&nbsp;&nbsp; 建院20多年以来，广州康优医院与南方医院、省计生科研所联合，先后承担了广东地区《不孕不育的流行病学调查与诊治》、《10078名中小学生尿钙代谢普查》、《病残儿病因分析》等应用性科研项目33项，其中获国家计生委科技进步奖2项、省部门级奖31项，为推动广东省妇幼工作的发展作出了重要贡献。</p>
<p>
	&nbsp;&nbsp;&nbsp; 康优医院坚持科研与临床相结合，重点突出以妇科、男科、儿科、儿童保健、生殖健康与不孕症的诊治为专科特色，并设有优生优育咨询、优生基因检测分析、儿童微量元素检测、妇科、男科、外科、内科、耳鼻喉科、中医科、口腔科、放射科、乳腺检查室、宫腔镜检查室、B超心电图室、检验科、麻醉科、手术室等二十余个临床医技科室。</p>
<p>
	&nbsp;&nbsp;&nbsp; 康优医院门诊、诊室流程布局合理、环境优雅，病房宽敞、明亮、舒适。医院建立了就医服务模式，方便患者就医；为了给患者就诊提供最大便利，医院全年365天实行“无假日医院”制度，节假日照常上班，医生均轮流坐诊，以缓解市民节假日“就医难”的问题，医院拥有一流的专家团队，高尖端的检测设备，已逐渐发展成为集临床诊治、科研与培训相结合的专业性医院。</p>
	</div>
<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>