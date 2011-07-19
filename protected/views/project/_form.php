<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>
	
	<fieldset>
	<legend>Basic Information</legend>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<br />
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<br />
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumb'); ?>
		<br />
		<?php echo $form->fileField($model,'thumb',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'thumb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumb_lg'); ?>
		<br />
		<?php echo $form->fileField($model,'thumb_lg',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'thumb_lg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<br />
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>
	
	</fieldset>
	
	<fieldset>
	
	<legend>Image Gallery</legend>
	
	<?php echo $form->errorSummary($galleryModel); ?>

    <div class="row">
        <?php echo $form->labelEx($galleryModel,'image'); ?>
        <?php echo $form->fileField($galleryModel,'image',array('size'=>50,'maxlength'=>50, 'name'=>'Gallery[image][0]')); ?>
        <?php echo $form->error($galleryModel,'image'); ?>
    </div>
	
	</fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js"></script>