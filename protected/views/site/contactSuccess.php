<?php
if(!$ajax){ 
$this->beginWidget('application.components.NavWidget', array('page'=>2));
$this->endWidget(); 
}
?>

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
	
<? if($ajax): ?> 
	<div id="contactsuccess">
		<address>
			Joseph Lessard<br />
			joseph.lessard@yahoo.com
		</address>
		<address>
			Zeunic<br />
			social@zeunic.com<br />
			Orlando, FL 32825
		</address>
	</div>
<? endif; ?>
	<h2>We got it!</h2>
	<p>We will respond as soon as we are able.  If you need to get ahold of us sooner
please give us a call at (407) 615-0794 and our project manager Stephen will
be happy to assist you!</p>
	<p>In the meantime, if you haven't had a chance to look around, make sure to check out <a href="<? echo Yii::app()->request->baseUrl ?>/index.php/site/portfolio">our work</a>, learn <a href="<? echo Yii::app()->request->baseUrl ?>/index.php/site/about">about us</a>, and read <a href="http://www.zeunic.com/blog">our blog</a>.</p>
<? if(!$ajax): ?>
</div>
<? endif; ?>
