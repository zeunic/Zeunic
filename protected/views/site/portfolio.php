<?php $this->beginWidget('application.components.NavWidget', array('page'=>0)); ?>
<?php $this->endWidget(); ?>

<div id="main">

<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/our-work.css" />

<article>
<section class="our-work">
	<ul class="button-row">
		<li><a class="selected" href="#" data-value="web">Web</a></li>
		<li><a href="#" data-value="mobile">Mobile</a></li>
		<li><a href="#" data-value="brand">Branding</a></li>
		<li><a href="#" data-value="media">Media</a></li>
		<li><input type="text" name="search" placeholder="Search..." /></li>
	</ul>
	
	<ul id="portfolio">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
		<li data-id="iphone">iPhone OS</li>
		<li data-id="android">Android</li>
		<li data-id="winmo">Windows Mobile</li>
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<li data-id="macosx">Mac OS X</li>
		<li data-id="macos9">Mac OS 9</li>
		<li data-id="iphone">iPhone OS</li>
	</ul>
	
</section>
</article>

</div>

<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>