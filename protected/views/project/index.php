<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">

	<h1>Projects</h1>

	<ul id="admin">
		<li><? echo CHtml::link('< Back', array('admin/index')); ?></li>
		<li><? echo CHtml::link('Create New Project', array('project/create')); ?></li>
		<li><? echo CHtml::link('logout', array('admin/logout')); ?></li>
	</ul>
	
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>

</div>