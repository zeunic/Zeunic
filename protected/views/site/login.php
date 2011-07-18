<?php $this->beginWidget('application.components.NavWidget', array('page'=>4)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	
	<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true
)); ?>

	 <?php 
	 	echo $form->errorSummary($model);
	 	echo $error;
	  ?>
 
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username') ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password') ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

	<?php $this->endWidget(); ?>
</div>