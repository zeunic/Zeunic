<?php 
if(!$ajax){
$this->beginWidget('application.components.NavWidget', array('page'=>0));
$this->endWidget();
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>

<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/our-work.css" />

<ul class="button-row">
		<li><a class="selected" href="#" data-value="all">All</a></li>
		<li><a href="#" data-value="web">Web</a></li>
		<li><a href="#" data-value="mobile">Mobile</a></li>
		<li><a href="#" data-value="brand">Branding</a></li>
		<li><a href="#" data-value="search" style="display:none">Search</a></li>
		<li><input type="text" name="search" <? echo (isset($tag)) ? 'value="'.$tag.'"' : '' ?> id="search" placeholder="Search..." /></li>
</ul>

<article id="portfolio-article">
<section class="our-work">
	
	<div class="extend-thumb"><a href=""><img src="" width="590" height="120" /></a></div>
	
	<ul class="portfolio_display">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<? foreach($projects as $key => $project): ?>
			<li data-id="id-<? echo ($key + 1) ?>" data-type="<? echo $project->type ?>">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/<? echo $project->id ?>">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/thumbs/<? echo $project->thumb ?>" data-extended="<? echo $project->thumb_lg ?>" />
				</a>
			</li>
		<? endforeach; ?>
	</ul>
</section>
</article>
<? if(!$ajax): ?>
</div>
<? endif; ?>
<!-- page specific JS loads -->
<script type="text/javascript">
	tags = <?php echo json_encode($tags);?>;
	$(function(){
		if(<?php echo (isset($tag))? 'true' : 'false'; ?>) {
			console.log('filtering tags...');
			filterProjects(<?php echo (isset($tag))? '\''+$tag+'\'': '\'web\''; ?>)
		}
	});
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>
