<?php
if(!$ajax){ 
$this->beginWidget('application.components.NavWidget', array('page'=>2));
$this->endWidget(); 
}
?>

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
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
	<p>Success! We will get back to you really fast, typically 30 minutes to 24 hours!</p>
<? if(!$ajax): ?>
</div>
<? endif; ?>
