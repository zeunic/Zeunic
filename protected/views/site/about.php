<?php $this->beginWidget('application.components.NavWidget', array('page'=>1)); ?>
<?php $this->endWidget(); ?>

<div id="main">
<!-- page specific CSS sheets loaded here until a compiler/compressor could be implemented -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/about-us.css" />

<article id="about_us">
	<section>
	
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thumbs/590x120_vignette.jpg" alt="590x120_vignette" width="590" height="120" />
	
	<h1>&#8220;We're about the details. <em>Your details.</em>&#8221;</h1>
	
	<p>Zeunic was started in Spring 2011 around an idea that passion, focus, and energy could create great things if you could see both the big picture and the details that nobody else pays attention to.</p>

	<p>Have you ever noticed how much nicer a glass of tea looks served with a mint leaf? Or that feeling of relief when you thought you lost everything only to find out the web application was saving for you? What about when you fell completely in love with a particular brand, not because of what it does or how it does it, but because of how it made you feel inside?</p>

	<p><strong>Yea, us too. Those are game changers.</strong></p>

	<p>Zeunic is about creativity and vision meeting the effective simplicity of focusing on the details. The greatest web application in the world won't work without the little things that make it a great experience, nor would the best little detail features matter without a vision to make them part of a greater whole.</p>

	<p>That's what we are about. Why don't you <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contact">tell us about you?</a></p>
	</section>
	
	<section>
		<h2>Meet the Team</h2>
		
		<div class="minibio">
			<img src="" width="190" height="120" alt="stephen" />
			<ul>
				<li class="tweet"><a href="twitter.com/olivierlacan">@olivierlacan</a> lol, I need to retain reference to a setInterval and setTimeout in a .bind()/.live() scenario. I'll call some time.</li>
				<li>Weight: 180lbs</li>
				<li>Favorite Food: Ramen</li>
				<li>Likes: InDesign</li>
			</ul>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue.</p>
		</div>
		
		<div class="minibio">
			<img src="" width="190" height="120" alt="joe" />
			<ul>
				<li class="tweet">Hangin with Edward Maya tonight <a href="http://t.co/Yb5OnO4">http://t.co/Yb5OnO4</a></li>
				<li>iPhones Destroyed: 2</li>
				<li>Music: House/Techno</li>
				<li>Status: Baller</li>
			</ul>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Etiam porta sem malesuada magna mollis euismod.</p>
		</div>
		
		<div class="minibio">
			<img src="" width="190" height="120" alt="parker" />
			<ul>
				<li class="tweet">Just realized if you took the cost of education to get us where we are, the website we're deploying this month cost roughly $225,000.</li>
				<li>Drives: Toyota</li>
				<li>Dislikes: Then ending to Inception</li>
				<li>Favorite Site: Adobe.com</li>
			</ul>
			<p>Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
		</div>
		
		<div class="minibio">
			<img src="" width="190" height="120" alt="spencer" />
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

</div>