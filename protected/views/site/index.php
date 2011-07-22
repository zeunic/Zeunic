<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>-1));
	$this->endWidget(); 
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>

<h2>Wow. Really hope this persistence pays off. Getting closer I think.</h2>

<? if(!$ajax): ?>
</div>
<? endif; ?>