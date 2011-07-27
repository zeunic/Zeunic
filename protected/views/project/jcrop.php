<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>
	
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.Jcrop.css" />
		<h1>JCrop Images</h1>
		<ul>
		<? foreach($images as $key => $image): ?>
			<li><img class="jcrop" src="<? echo Yii::app()->request->baseUrl.'/images/projects/gallery/'.$image ?>" alt="JCrop Image" /><br /><a href="#" class="saveThumb">Save Thumbnail</a></li>
		<? endforeach; ?>
		</ul>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcrop.js"></script>
