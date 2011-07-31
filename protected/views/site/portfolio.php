<!-- portfolio -->
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

<? if($ajax): ?>
<ul class="button-row">
		<li><a class="selected" href="#" data-value="all">All</a></li>
		<li><a href="#" data-value="web">Web</a></li>
		<li><a href="#" data-value="mobile">Mobile</a></li>
		<li><a href="#" data-value="brand">Branding</a></li>
		<li><a href="#" data-value="search" style="display:none">Search</a></li>
		<li id="lastbutton-row"><input type="text" name="search" <? echo (isset($tag)) ? 'value="'.$tag.'"' : '' ?> id="search" placeholder="Search..." /><a id="searchbutton" href="#">Search</a></li>
</ul>
<? endif; ?>

<article id="portfolio-article">
<section class="our-work">
	
	<div class="extend-thumb"><a href=""><img src="#" alt="Wide Project Thumbnail" width="590" height="120" /></a></div>
	
	<ul class="portfolio_display">
		<!-- this list is the displayed result after the ajax and quicksand sorting -->
		<? if(!$ajax): ?>
			<? foreach($projects as $key => $project): ?>
				<li>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/<? echo $project->id ?>">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/thumbs/<? echo $project->thumb ?>" alt="Project Thumbnail"/>
					</a>
				</li>
			<? endforeach; ?>
		<? endif; ?>
	</ul>
	
	<ul id="data" class="hidden">
		<!-- this list is populated via the selected user choice, sorted, and then cloned into the display -->
		<? if($ajax): ?>
			<? foreach($projects as $key => $project): ?>
				<li data-id="id-<? echo ($key + 1) ?>" data-type="<? echo $project->type ?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/<? echo $project->id ?>">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/thumbs/<? echo $project->thumb ?>" alt="Project Thumbnail" data-extended="<? echo $project->thumb_lg ?>" />
					</a>
				</li>
			<? endforeach; ?>
		<? endif; ?>
	</ul>
</section>
</article>
<? if(!$ajax): ?>
</div>
<? endif; ?>
<!-- page specific JS loads -->
<!--[if !IE]><!-->
<script type="text/javascript">
	tags = <?php echo json_encode($tags);?>;
	<? if(isset($tag)): ?>
		tag = <?php echo json_encode($tag);?>;
	<? endif; ?>
	$(function(){
		if(typeof(tag) != "undefined" && tag !== null) {
			filterProjects(tag);
		}
	});
</script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>
 <!--<![endif]-->
	<!--[if gt IE 8]><!-->
<script type="text/javascript">
	tags = <?php echo json_encode($tags);?>;
	<? if(isset($tag)): ?>
		tag = <?php echo json_encode($tag);?>;
	<? endif; ?>
	$(function(){
		if(typeof(tag) != "undefined" && tag !== null) {
			filterProjects(tag);
		}
	});
</script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.quicksand.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/our-work.js"></script>
	 <!--<![endif]-->
