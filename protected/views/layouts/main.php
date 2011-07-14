<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" lang="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

	<header>
		<q><em>we <strong>guarantee</strong></em><br /><em>you will <strong>appreciate</strong></em><br /><small>the <strong>effort</strong> we put into </small><strong>our work.</strong></q>
	</header>
	
	<div id="container">
	
		<?php echo $content; ?>
	
	</div>
	
	<footer>
		<aside>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/@zeunic.png" alt="@Zeunic" /><br />
			<q></q>
			<cite></cite>
		</aside>
	</footer>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tweet.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>