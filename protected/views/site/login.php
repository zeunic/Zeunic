<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>4));
	$this->endWidget(); 
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>

<div id="admin">
<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />

	<p>To access your account controls and information, please enter the credentials we provided you below:</p>

	<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login_form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true
)); ?>

	 <?php 
	 	echo $form->errorSummary($model);
	 	echo $error;
	  ?>
 
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username', array('placeholder'=>'user name')) ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password', array('placeholder'=>'password')) ?>
    </div>
 
    <div class="row submit">
    	<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/admin/index">Login</a>
    	<?php echo CHtml::submitButton('Login'); ?>
    </div>

	<?php $this->endWidget(); ?>
	
</div>
	
<? if(!$ajax): ?>	
</div>
<? endif; ?>

<!-- page specific JS loads -->
<!--[if !IE]><!-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js"></script>
 <!--<![endif]-->
	<!--[if gt IE 8]><!-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js"></script>
	 <!--<![endif]-->
