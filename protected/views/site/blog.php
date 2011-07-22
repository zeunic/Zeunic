<?php 
if(!$ajax){
$this->beginWidget('application.components.NavWidget', array('page'=>2));
$this->endWidget(); 
}
?>
<? if(!$ajax): ?>
<div id="main">
<? endif; ?>


<? if(!$ajax): ?>
</div>
<? endif; ?>