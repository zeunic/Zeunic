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
	
	<ul id="portfolio_display">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
		<li data-id="iphone">Project</li>
		<li data-id="android">Project</li>
		<li data-id="winmo">Project</li>
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<li data-id="web">World Vision</li>
		<li data-id="web">Wind Pro</li>
		<li data-id="web">Jill Zarin</li>
		<li data-id="mobile">Voice Tricks</li>
		<li data-id="mobile">Mp3co</li>
		<li data-id="brand">Tickr.us</li>
		<li data-id="media">Bumper</li>
	</ul>
</section>
</article>

</div>

<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>