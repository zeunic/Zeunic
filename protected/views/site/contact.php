<?php $this->beginWidget('application.components.NavWidget', array('page'=>2)); ?>
<?php $this->endWidget(); ?>

<div id="main">
	<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contact',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>
		<?php 
		if(count($model->getErrors())){
			$base = Yii::app()->request->baseUrl;
			echo '<p class="error">(psst: you have not filled out the form correctly)<img src="'.$base.'/images/icons/error.png" alt="Form Error"/></p>';
		} 
		?>
		<h2>Hey Zeunic,</h2>
		<p>	
			My name is <?php echo $form->textField($model,'name',array('placeholder' => '(your name)')) ?> and you can get ahold of me at<br />
			<?php echo $form->textField($model,'email',array('placeholder' => '(email or phone)')) ?>. I would really like to talk to you guys about<br />
			<?php echo $form->textArea($model,'body',array('placeholder' => '(what would you like to chat about?)')) ?><br />
			<span id="signature">Thanks.</span>
		</p>
		<p>
			<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/btn_contact.jpg" id="submit" />
		</p>
	<?php $this->endWidget(); ?>
</div>