<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>
<div id="main">
<div id="admin">

	<ul class="admin-nav">
		<li><? echo CHtml::link('< Back', array('project/index')); ?></li>
	</ul>

	<h1>Create Project</h1>

	<?php echo $this->renderPartial('_form', array('model'=>$model,'galleryModel'=>$galleryModel,'tagModel'=>$tagModel,
			'testimonialModel'=>$testimonialModel,'videoModel'=>$videoModel)); ?>

</div>
</div>