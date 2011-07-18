<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	<p>logged in as <? echo Yii::app()->user->id ?></p>
	<h1>Manage</h1>
	<ul>
		<li><? echo CHtml::link('Clients', array('user/index')); ?></li>
		<li><? echo CHtml::link('Projects', array('project/index')); ?></li>
	</ul>
</div>