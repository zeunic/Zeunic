<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
<div id="admin">

	<ul class="admin-nav">
		<li><? echo CHtml::link('< Back', array('project/index')); ?></li>
	</ul>

	<h1>Are you sure you want to delete that?</h1>
	<p>&nbsp;</p>
	<p>You clicked the link to remove a project, which will delete it permanently from the database. This includes all the media tied too it.</p>
	<p><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/project/delete/<?php echo $id ?>" class="link-button">Yep, delete.</a> <a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/project/index">No don't, I changed my mind.</a></p>

</div>
</div>