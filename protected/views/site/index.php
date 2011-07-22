<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>-1));
	$this->endWidget(); 
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>

<h2>Testing Deployment Copy. PLEEEEEAAAASSSSSSSEEEEEEE.</h2>

<? if(!$ajax): ?>
</div>
<? endif; ?>