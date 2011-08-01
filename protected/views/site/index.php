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
		<img alt="Let's recharge your branding!" src="<?php echo Yii::app()->request->baseUrl; ?>/images/homeheader.png" style="" />
	<section id="mobile">
		<h2>MOBILE</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/8"><span class="innershadow"></span><img alt="Voice Tricks" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_voice.png" /><span class="projectText">Voice Tricks</span></a></p>
	</section>
	
	<section>
		<h2>WEB</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/12"><span class="innershadow"></span><img alt="JillZarin.com" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_jill.jpg" /><span class="projectText">JillZarin.com</span></a></p>
	</section>
	
	<section>
		<h2>BRAND</h2>
		<p><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/portfolio/4"><span class="innershadow"></span><img alt="NESOI" src="<?php echo Yii::app()->request->baseUrl; ?>/images/home_nesoi.jpg" /><span class="projectText">NESOI</span></a></p>
	</section>
</article>
</div>
<? if(!$ajax): ?>
</div>
<? endif; ?>


<!-- page specific JS loads -->
<!--[if !IE]><!-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.zSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/home.js"></script>
 <!--<![endif]-->
	<!--[if gt IE 8]>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.zSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/home.js"></script>
	 <!--<![endif]-->
