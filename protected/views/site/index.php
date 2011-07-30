<?php 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>-1));
	$this->endWidget(); 
}
?>
<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css" />

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
<div id="home">

<article>
	<section>
		<h2>Mobile</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/8"><span id="innershadow"></span><img alt="Voice Tricks" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_voice.png" /><span class="projectText">Voice Tricks</span></a></p>
	</section>
	
	<section>
		<h2>Web</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/12"><span id="innershadow"></span><img alt="JillZarin.com" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_jill.jpg" /><span class="projectText">JillZarin.com</span></a></p>
	</section>
	
	<section>
		<h2>Brand</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/4"><span id="innershadow"></span><img alt="NESOI" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_nesoi.jpg" /><span class="projectText">NESOI</span></a></p>
	</section>
</article>

<h1>Let Us Recharge Your Brand!</h1>
</div>
<? if(!$ajax): ?>
</div>
<? endif; ?>


<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.zSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/home.js"></script>
