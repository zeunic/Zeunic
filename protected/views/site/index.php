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
<h1>Recharge your brand with Zeunic.</h1>

<div id="newsgallery">
	<ul id="slider">
		<li>Slide 1</li>
		
		<li>Slide 2</li>
		
		<li>Slide 3</li>
		<li><img width="590" height="180"</li>
	</ul>
</div>

<article>
	<section>
		<h2>Mobile</h2>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
		<p><a href="">Mobile Projects</a></p>
	</section>
	
	<section>
		<h2>Web</h2>
		<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		<p><a href="">Web Projects</a></p>
	</section>
	
	<section>
		<h2>Brand</h2>
		<p>Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.</p>
		<p><a href="">Brand Projects</a></p>
	</section>
</article>

</div>
<? if(!$ajax): ?>
</div>
<? endif; ?>


<!-- page specific JS loads -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.zSlide.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/home.js"></script>