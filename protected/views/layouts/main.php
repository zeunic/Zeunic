<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="EN" />
	<meta name="description" content="Mobile Development, Web Design & Branding" />
	<meta name="keywords" content="zeunic, zeunic.com, mobile, mobile development, web, web design, web site, branding, corporate branding, orlando, florida," />
	<meta name="author" content="Stephen Rivas JR, Joe Lessard & Parker W. Young" />
	<meta name="robots" content="all" />
	<meta name="copyright" content="Copyright © 2011 Zeunic. All Rights Reserved." />
	<meta name="abstract" content="Mobile Development, Web Design & Branding" />

	<!-- Social Open Graph --> 
	<meta property="og:title" content="zeunic | home" />
	<meta property="og:type" content="company" />
	<meta property="og:image" content="http://www.zeunic.com/images/og.jpg" />
	<meta property="og:url" content="http://www.zeunic.com/" />
	<meta property="og:description" content="Mobile Development, Web Design & Branding" />
	<meta property="og:site_name" content="zeunic.com" />
	<meta property="fb:admins" content="555537034, 19213532, 1469677507"/>
	<meta property="og:email" content="social@zeunic.com" />
	<meta property="og:locality" content="Orlando" />
	<meta property="og:region" content="FL" />
	<meta property="og:postal-code" content="32779" /> 
	<meta property="og:country-name" content="USA" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="shortcut icon" href="http://www.zeunic.com/favicon.ico" type="image/x-icon" />
	<link rel="image_src" href="http://www.zeunic.com/images/og.jpg" />
	
	
	<!-- jQuery & Modernizr Loaded in Header -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
	<?php Yii::app()->clientScript->registerScript('helpers', 'baseUrl = '.CJSON::encode(Yii::app()->baseUrl).';'); ?>
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
			<a href="http://www.twitter.com/zeunic" title="Follow Us on Twitter @zeunic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/@zeunic.png" alt="@Zeunic" /></a><br />
			<q></q>
			<cite></cite>
		</aside>
	</footer>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tweet.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autoresize.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>