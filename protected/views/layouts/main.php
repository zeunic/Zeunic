<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" lang="en" />
	 <link rel="shortcut icon" href="http://www.zeunic.com/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	
	<!-- jQuery & Modernizr Loaded in Header -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js"></script>
	
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