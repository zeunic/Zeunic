<?php
if(!$ajax){ 
$this->beginWidget('application.components.NavWidget', array('page'=>2));
$this->endWidget(); 
}
?>

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
	<form id="contactform" class="contactsuccess">
		<p>Success! We will get back to you really fast, typically 30 minutes to 24 hours!</p>
	</form>
<? if(!$ajax): ?>
</div>
<? endif; ?>
