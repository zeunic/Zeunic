<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.Jcrop.css" />
	<div id="jcrop">
		<a href="<? echo Yii::app()->request->baseUrl.'/index.php/project/index' ?>">< Back to Product Index</a>
		<h1>JCrop Images</h1>
		<p>Click and Drag on image(s) to create a thumbnail image. Click save thumbnail and wait for confirmation for each image.  Click back when you have saved a thumbnail for each image.</p>
		<ul>
		<? foreach($images as $key => $image): ?>
			<li><img class="jcrop" src="<? echo Yii::app()->request->baseUrl.'/images/projects/gallery/'.$image ?>" alt="JCrop Image" /><br /><a href="#" class="saveThumb">Save Thumbnail</a></li>
		<? endforeach; ?>
		</ul>
	</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcrop.js"></script>
