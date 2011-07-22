<? foreach($projects as $key => $project): ?>
	<li data-id="id-<? echo uniqid() ?>" data-type="search">
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/<? echo $project->id ?>">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/thumbs/<? echo $project->thumb ?>" data-extended="<? echo $project->thumb_lg ?>" />
		</a>
	</li>
<? endforeach; ?>