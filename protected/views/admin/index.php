<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	<div id="admin">
		<p>logged in as <? echo Yii::app()->user->id ?> <? echo CHtml::link('logout', array('admin/logout')); ?></p>
		<h1>Administration</h1>
		<ul>
			<li><? echo CHtml::link('Manage Users', array('user/index')); ?></li>
			<li><? echo CHtml::link('Manage Projects', array('project/index')); ?></li>
		</ul>
	</div>
</div>