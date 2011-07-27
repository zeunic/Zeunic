<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>0));
	$this->endWidget();
}
?>

<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/work-detail.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettyPhoto.css" />

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
	<article id="work-detail">
		<section>
			<h1>| <? echo $project->title ?></h1>
			<p id="project_link"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio">Back to List</a> | <a href="<? echo $project->link ?>" target="new">View Full Project</a></p>
		</section>
		
		<section id="gallery">
			<ul id="slider">
			
				<? // place the video li here // ?>
			
				<? foreach($project->galleries as $key => $image): ?>
				<? 
				$file = explode('.',$image->image); 
				$filename = $file[0];
				$fileext = $file[1];
				$thumb = $filename.'_thumb.'.$fileext;
				?>
				<li><a href="<? echo Yii::app()->request->baseUrl.'/images/projects/gallery/'.$image->image ?>" rel="prettyPhoto[gallery]"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/gallery/<? echo $thumb ?>" alt="<? echo $project->title ?>"  /></a></li>
				<? endforeach; ?>
			</ul>
			<div class="utils">
				<? foreach($project->galleries as $key => $image): ?>
					<span class="carousel <? if ($key == 0) { echo "selected"; }?>" page="<? echo $key ?>"></span>
				<? endforeach; ?>
			</div>
		</section>
		
		<section id="project-details">
			<h2>| Project Details</h2>
			<p><? echo nl2br($project->desc); ?></p>
		</section>
		<section id="project-tags">
			<h2>| Tags</h2>
			<ul>
				<? foreach($project->tags as $key => $tag): ?>
					<li><a href="#"><? echo $tag->tag ?></a></li>
				<? endforeach; ?>
			</ul>
		</section>
		<section id="project-testimonials">
			<h2>| What the clients and users said...</h2>
			<ul>
				<? foreach($project->testimonials as $key => $test): ?>
					<li>
						<div class="even">
							<q><? echo "In reality, we couldn't have been any happier with zeunic" ?></q>
							<p><? echo $test->testimonial ?>
							<cite>- <? echo $test->author ?>, <strong><? echo $test->authorTitle ?></strong></cite>
							</p>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</section>
	</article>
<? if(!$ajax): ?>
</div>
<? endif; ?>
<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.zSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/work-detail.js"></script>
