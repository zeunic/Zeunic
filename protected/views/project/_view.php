<?
if($data->show == 1){
	$show = 'yes';
} else $show = 'no';
?>
		<tr><td><?php echo CHtml::encode($data->title); ?></td><td><?php echo CHtml::encode($data->type); ?></td><td><?php echo $show ?></td><td><?php echo CHtml::link('Edit', array('project/update/'.$data->id)); ?></td><td><?php echo CHtml::link('Remove', array('project/delete/'.$data->id)); ?></td></tr>
