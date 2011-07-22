<? 
if(!$ajax){
	$this->beginWidget('application.components.NavWidget', array('page'=>1));
	$this->endWidget();
}
?>

<? if(!$ajax): ?>
<div id="main">
<? endif; ?>
<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/about-us.css" />

<article id="about_us">
	<section>
	
	<img class="header" src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/header.png" alt="About Zeunic" />
	
	<h1>&#8220;We're about the details. <em>Your details.</em>&#8221;</h1>
	
	<p>Zeunic was started in Spring 2011 around an idea that passion, focus, and energy could create great things if you could see both the big picture and the details that nobody else pays attention to.</p>

	<p>Have you ever noticed how much nicer a glass of tea looks served with a mint leaf? Or that feeling of relief when you thought you lost everything only to find out the web application was saving your work for you? What about when you fell completely in love with a particular brand, not because of what it does or how it does it, but because of how it made you feel?</p>

	<p><strong>Yeah, us too. Those are game changers.</strong></p>

	<!-- <p>Zeunic is about creativity and vision meeting the effective simplicity of focusing on the details. The greatest web application in the world won't work without the little things that make it a great experience, nor would the best little detail features matter without a vision to make them part of a greater whole.</p> -->
	
	<p>Zeunic is about creativity and vision meeting the effective simplicity of the smallest details.  The greatest web application in the world will not work without the little things that make make it a great experience, nor would the smallest details matter without a vision to make them a part of the greater whole.</p>

	<p>That's what we are about. Why don't you <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contact">tell us about you?</a></p>
	</section>
	
	<section>
		<h2>Meet the Team</h2>
		
		<div class="minibio">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/stephen.png" alt="stephen" />
			<ul>
				<li class="tweet"><a href="twitter.com/olivierlacan">@olivierlacan</a> lol, I need to retain reference to a setInterval and setTimeout in a .bind()/.live() scenario. I'll call some time.</li>
				<li>Weight: <strong>180lbs</strong></li>
				<li>Favorite Food: <strong>Mexican</strong></li>
				<li>Likes: <strong>InDesign</strong></li>
			</ul>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue.</p>
		</div>
		
		<div class="minibio">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/joe.png" alt="joe" />
			<ul>
				<li class="tweet">Hangin with Edward Maya tonight <a href="http://t.co/Yb5OnO4">http://t.co/Yb5OnO4</a></li>
				<li><strong>iPhones Destroyed:</strong> 2</li>
				<li><strong>Music:</strong> House/Techno</li>
				<li><strong>Status:</strong> Baller</li>
			</ul>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Etiam porta sem malesuada magna mollis euismod.</p>
		</div>
		
		<div class="minibio">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/parker.png" alt="parker" />
			<ul>
				<li class="tweet">Serif and Sans-serif fonts play nice together, you just gotta lay down some ground rules first. <a href="fb.me/12jIDAl0K">fb.me/12jIDAl0K</a></li>
				<li>Drives: Toyota</li>
				<li>Dislikes: Then ending to Inception</li>
				<li>Favorite Site: Adobe.com</li>
			</ul>
			<p>Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
		</div>
		
		<div class="minibio">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/spencer.png" alt="spencer" />
			<ul>
				<li class="tweet">Finished up the new Zeunic teaser site with help of my esteemed colleagues! Check it out over at zeunic.com</li>
				<li>Cats: On A Couch</li>
				<li>Likes: Not Presenting</li>
				<li>Skinny Jeans: Definitely</li>
			</ul>
			<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
		</div>
	</section>
</article>

<? if(!$ajax): ?>
</div>
<? endif; ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autocomplete.js"></script>