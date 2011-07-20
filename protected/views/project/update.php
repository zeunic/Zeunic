<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="admin">

	<ul class="admin-nav">
		<li><? echo CHtml::link('< Back', array('project/index')); ?></li>
	</ul>

	<h1>Update Project - <?php echo $model->title; ?></h1>

	<?php echo $this->renderPartial('_form', array('model'=>$model,'galleryModel'=>$galleryModel,'images'=>$images,'tagModel'=>$tagModel,'testimonialModel'=>$testimonialModel,'videoModel'=>$videoModel,
			'videos'=>$videos,
			'testimonials'=>$testimonials,
			'tags'=>$tags,)); ?>

</div>