<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" lang="en" />
	<meta http-equiv="Content-Language" content="EN" />
	<meta name="description" content="Mobile Development, Web Design & Branding" />
	<meta name="keywords" content="zeunic, zeunic.com, mobile, mobile development, web, web design, web site, branding, corporate branding, orlando, florida," />
	<meta name="author" content="Stephen Rivas JR, Joe Lessard & Parker W. Young" />
	<meta name="robots" content="all" />
	<meta name="copyright" content="Copyright © 2011 Zeunic. All Rights Reserved." />
	<meta name="abstract" content="Mobile Development, Web Design & Branding" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

	<header>
		<q><em>we <strong>guarantee</strong></em><br /><em>you will <strong>appreciate</strong></em><br /><small>the <strong>effort</strong> we put into </small><strong>our work.</strong></q>
	</header>
	
	<div id="container">
		<div id="content">
			<?php echo $content; ?>
		</div>
	</div>
	
	<footer>
		<aside>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/@zeunic.png" alt="@Zeunic" /><br />
			<q></q>
			<cite></cite>
		</aside>
	</footer>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tweet.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autoresize.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>