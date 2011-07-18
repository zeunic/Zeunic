<div class="view">

	<strong><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</strong>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />

	<strong><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</strong>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<strong><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</strong>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<strong><?php echo CHtml::link('Edit', array('user/update/username/'.$data->username)); ?></strong>

	<strong><?php echo CHtml::link('Remove', array('user/delete/username/'.$data->username)); ?></strong>


</div>