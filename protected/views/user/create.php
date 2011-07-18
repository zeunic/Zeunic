<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">

	<h1>Create User</h1>

	<ul id="admin">
		<li><? echo CHtml::link('< Back', array('user/index')); ?></li>
		<li><? echo CHtml::link('logout', array('admin/logout')); ?></li>
	</ul>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>