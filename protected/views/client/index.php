<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	<h1>Client Page</h1>
	<ul id="admin">
		<li><? echo CHtml::link('logout', array('admin/logout')); ?></li>
	</ul>
</div>