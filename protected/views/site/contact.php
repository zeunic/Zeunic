<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>3));
	$this->endWidget(); 
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contactform',
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
			<?php echo $form->textArea($model,'body',array('placeholder' => '(what would you like to chat about?)')) ?>
			<span id="signature">Thanks.</span>
		</p>
		<p>
			<input type="submit" value="send" id="submit" />
		</p>
	<?php $this->endWidget(); ?>
	
	<aside class="contact-print">
		<address id="contact-address">
			Zeunic, LLC<br />
			560 Twisting Pine Court<br />
			Longwood FL 322279
		</address>
	</aside>
	
	<aside class="contact-media">
		<ul>
			<li id="contact-phone"><a href="#">407-615-0794</a></li>
			<li id="contact-placeholder"><a href="#">"placeholder"</a></li>
			<li id="contact-email"><a href="#">social@zeunic.com</a></li>
		</ul>
	</aside>
	
	<aside class="contact-social">
		<ul>
			<li id="contact-twitter"><a href="http://www.twitter.com/zeunic">twitter.com/zeunic</a></li>
			<li id="contact-gplus"><a href="http://www.google.com/plus">zeunic.com/+</a></li>
			<li id="contact-facebook"><a href="http://www.facebook.com/zeunic">facebook.com/zeunic</a></li>
		</ul>
	</aside>
<? if(!$ajax): ?>
</div>
<? endif; ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autoresize.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/contact.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.curve.js"></script>
