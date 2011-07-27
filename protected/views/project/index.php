<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	<div id="admin">
	
		<h1>Projects</h1>
	
		<ul class="admin-nav">
			<li><? echo CHtml::link('< Back', array('admin/index')); ?></li>
			<li><? echo CHtml::link('Create New Project', array('project/create')); ?></li>
			<li><? echo CHtml::link('logout', array('admin/logout')); ?></li>
		</ul>
		<table>
		<tr><th>Name</th><th>Type</th><th>Show?</th><th>Edit</th><th>Remove</th></tr>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
		</table>
	</div>
</div>
