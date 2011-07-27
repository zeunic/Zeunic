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
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumb'); ?>
		<? if(!$model->isNewRecord): ?>
			<label>Leave blank to use current thumbnail</label>
		<? endif; ?>
		<?php echo $form->fileField($model,'thumb',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'thumb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumb_lg'); ?>
		<? if(!$model->isNewRecord): ?>
			<label>Leave blank to use current thumbnail</label>
		<? endif; ?>
		<?php echo $form->fileField($model,'thumb_lg',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'thumb_lg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'show'); ?>
        <?php echo $form->checkBox($model,'show'); ?>
        <?php echo $form->error($model,'show'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('web'=>'Web', 'mobile'=>'Mobile', 'brand'=>'Brand')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	
	</fieldset>
	
	<fieldset id="imageGallery">
	
	<legend>Image Gallery</legend>
	
	<?php echo $form->errorSummary($galleryModel); ?>
	
	<? if(!$model->isNewRecord): ?>
	
	<div class="row">
		<ul>
		<? foreach($images as $key => $value):
			$file = explode('.',$value->image); 
			$filename = $file[0];
			$fileext = $file[1];
			$thumb = $filename.'_thumb.'.$fileext; ?>
			<li><img alt="Project Gallery Image" src="<? echo Yii::app()->request->baseUrl ?>/images/projects/gallery/<? echo $thumb ?>"/><br />
					<? echo CHtml::link('delete', array('project/deletegallery', 'id'=>$value->id)); ?>
			</li>
		<? endforeach; ?>
		</ul>
	</div>
	
	<? endif; ?>

    <div class="row">
        <?php echo $form->labelEx($galleryModel,'image'); ?>
        <?php echo $form->fileField($galleryModel,'image',array('size'=>50,'maxlength'=>50, 'name'=>'Gallery[image][0]')); ?>
        <?php echo $form->error($galleryModel,'image'); ?>
    </div>
	
	</fieldset>
	
	<fieldset id="video">
	
	<legend>Video</legend>
	
	<? if(!$model->isNewRecord): ?>
	
	<div class="row">
		<ul>
		<? foreach($videos as $key => $value): ?>
			<li><? echo $value->video ?><br />
					<? echo CHtml::link('delete', array('project/deletevideo', 'id'=>$value->id)); ?>
			</li>
		<? endforeach; ?>
		</ul>
	</div>
	
	<? endif; ?>
	
	<div class="row">
        <?php echo $form->labelEx($videoModel,'video'); ?>
        <?php echo $form->textArea($videoModel,'video',array('size'=>1000,'maxlength'=>1000, 'name'=>'Video[video][0]')); ?>
        <?php echo $form->error($videoModel,'video'); ?>
    </div>
	
	</fieldset>
	
	<fieldset>
	
	<legend>Tags</legend>
	
	<? if(!$model->isNewRecord): ?>
	
	<div class="row">
		<ul>
		<? foreach($tags as $key => $value): ?>
			<li><? echo $value->tag ?><br />
					<? echo CHtml::link('delete', array('project/deletetag', 'id'=>$value->id)); ?>
			</li>
		<? endforeach; ?>
		</ul>
	</div>
	
	<? endif; ?>

    <div class="row">
        <?php echo $form->labelEx($tagModel,'tag'); ?>
        <?php echo $form->textField($tagModel,'tag'); ?>
        <?php echo $form->error($tagModel,'tag'); ?>
    </div>
    
    </fieldset>
    
    <fieldset>
    
    <legend>Testimonials</legend>
	
	<? if(!$model->isNewRecord): ?>
	
	<div class="row">
		<ul>
		<? foreach($testimonials as $key => $value): ?>
			<li><? echo $value->testimonial ?><br />
					<? echo CHtml::link('delete', array('project/deletetestimonial', 'id'=>$value->id)); ?>
			</li>
		<? endforeach; ?>
		</ul>
	</div>
	
	<? endif; ?>
    
    <div class="row">
        <?php echo $form->labelEx($testimonialModel,'testimonial'); ?>
        <?php echo $form->textArea($testimonialModel,'testimonial',array('rows'=>6, 'cols'=>50, 'name'=>'Testimonial[testimonial][0]')); ?>
        <?php echo $form->error($testimonialModel,'testimonial'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($testimonialModel,'author'); ?>
        <?php echo $form->textField($testimonialModel,'author',array('size'=>40,'maxlength'=>40, 'name'=>'Testimonial[author][0]')); ?>
        <?php echo $form->error($testimonialModel,'author'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($testimonialModel,'authorTitle'); ?>
        <?php echo $form->textField($testimonialModel,'authorTitle',array('size'=>40,'maxlength'=>40, 'name'=>'Testimonial[authorTitle][0]')); ?>
        <?php echo $form->error($testimonialModel,'authorTitle'); ?>
    </div>
    
    </fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js"></script>
