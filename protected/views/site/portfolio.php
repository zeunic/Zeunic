<?php $this->beginWidget('application.components.NavWidget', array('page'=>0)); ?>
<?php $this->endWidget(); ?>

<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/our-work.css" />

<ul class="button-row">
		<li><a class="selected" href="#" data-value="all">All</a></li>
		<li><a href="#" data-value="web">Web</a></li>
		<li><a href="#" data-value="mobile">Mobile</a></li>
		<li><a href="#" data-value="brand">Branding</a></li>
		<li><input type="text" name="search" placeholder="Search..." /></li>
</ul>

<div id="main">

<article>
<section class="our-work">
	
	<ul class="portfolio_display">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<li data-id="id-1" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web01.jpg" />
			World Vision</li>
		<li data-id="id-2" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web02.jpg" />
			World Vision</li>
		<li data-id="id-3" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web03.jpg" />
			World Vision</li>
		<li data-id="id-4" data-type="mobile">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/mobile01.jpg" />
			World Vision</li>
		<li data-id="id-5" data-type="mobile">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/mobile02.jpg" />
			World Vision</li>
		<li data-id="id-6" data-type="brand">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/brand01.jpg" />
			World Vision</li>
		<li data-id="id-7" data-type="media">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/media01.jpg" />
			World Vision</li>
		<li data-id="id-8" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web01.jpg" />
			World Vision</li>
		<li data-id="id-9" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web02.jpg" />
			World Vision</li>
		<li data-id="id-10" data-type="web">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/web03.jpg" />
			World Vision</li>
		<li data-id="id-11" data-type="mobile">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/mobile01.jpg" />
			World Vision</li>
		<li data-id="id-12" data-type="mobile">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/mobile02.jpg" />
			World Vision</li>
		<li data-id="id-13" data-type="brand">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/brand01.jpg" />
			World Vision</li>
		<li data-id="id-14" data-type="media">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/media01.jpg" />
			World Vision</li>
	</ul>
</section>
</article>

</div>

<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>