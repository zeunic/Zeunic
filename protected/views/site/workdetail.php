<?php $this->beginWidget('application.components.NavWidget', array('page'=>0)); ?>
<?php $this->endWidget(); ?>

<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/work-detail.css" />

<div id="main">
	<article id="work-detail">
		<nav><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio">< Back</a></nav>
		<section>
			<h1><? echo $project->title ?></h1>
			<ul>
				<? foreach($project->galleries as $key => $image): ?>
				<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/gallery/<? echo $image->image ?>" alt="<? $project->title ?> Image" /></li>
				<? endforeach; ?>
			</ul>
			<p><a href="<? echo $project->link ?>" target="new">View Website</a></p>
		</section>
		<section id="project-details">
			<h2>Project Details</h2>
			<p><? echo nl2br($project->desc) ?></p>
		</section>
		<section>
			<h2>Tags</h2>
			<ul>
				<? foreach($project->tags as $key => $tag): ?>
					<li><? echo $tag->tag ?></li>
				<? endforeach; ?>
			</ul>
		</section>
		<section id="project-testimonials">
			<h2>What the clients and users said...</h2>
			<ul>
				<? foreach($project->testimonials as $key => $test): ?>
					<li><? echo $test->testimonial ?><br />- <? echo $test->author ?>, <strong><? echo $test->authorTitle ?></strong></li>
				<? endforeach; ?>
			</ul>
		</section>
	</article>
</div>