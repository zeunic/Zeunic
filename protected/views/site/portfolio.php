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
	
	<div class="extend-thumb"><img src="" width="590" height="120" /></div>
	
	<ul class="portfolio_display">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<? foreach($projects as $key => $project): ?>
			<li data-id="id-<? echo $key ?>" data-type="<? echo $project->type ?>">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/thumbs/<? echo $project->thumb ?>" data-extended="<? echo $project->thumb_lg ?>" />
			</li>
		<? endforeach; ?>
	</ul>
</section>
</article>

</div>

<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>