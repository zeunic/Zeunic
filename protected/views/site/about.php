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
	
	<p>Zeunic was started in the spring of 2011 around an idea that passion, focus, and energy could create great things if you could see both the big picture and the details that nobody else pays attention to.</p>

	<p>Have you ever noticed how much nicer a glass of tea looks served with a mint leaf? Or that feeling of relief when you thought you lost everything only to find out the web application was saving your work for you? What about when you fell completely in love with a particular brand, not because of what it does or how it does it, but because of how it made you feel?</p>

	<p><strong>Zeunic is about creativity and vision meeting the effective simplicity of the smallest details.</strong></p>
	<p>The greatest web application in the world will not work without the little things that make make it a great experience, nor would the smallest details matter without a vision to make them a part of the greater whole.</p>

	<p>That's what we are about. Why don't you <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contact">tell us about you?</a></p>
	</section>
	
	<section>
		<!-- <h2>Meet the Team</h2> -->
		
		<div class="minibio">
			<h3>Stephen Rivas JR <span>| Project Manager</span></h3>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/stephen.png" alt="stephen" />
			<ul>
				<li class="tweet">loading latest tweet...</li>
				<li>Likes: <strong>Javascript && CouchDB;</strong></li>
				<li>Super Power: <strong>Teleporting.</strong></li>
				<li>Proud Father: <strong>Yup!</strong></li>
			</ul>
			<p>I love to push myself, frequently past what I am capable of. If I am not struggling, or being challenged I'm not satisfied. I love the web industry, and how it allows me to dream big. I am currently the Full Sail SGA Campus Senator for the Web Program, Project Manager for Zeunic, a student, and father to a really cool daughter.</p>
		</div>
		
		<div class="minibio">
			<h3>Joe Lessard <span>| Lead Developer</span></h3>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/joe.png" alt="joe" />
			<ul>
				<li class="tweet">loading latest tweet...</li>
				<li>Hobbies: <strong>Cycling and Golf</strong></li>
				<li>Languages: <strong>PHP, Coldfusion and Javascript</strong></li>
				<li>Hometowns: <strong>Rochester, MN</strong> | <strong>Fort Collins, CO</strong> | <strong>Casselberry, FL</strong></li>
			</ul>
			<p>I discovered my love for the internet while working towards a degree in computer science at Colorado State University. I have spent the past couple years immersing myself in web development at Full Sail University and strive to create websites that make my clients happy.</p>
		</div>
		
		<div class="minibio">
			<h3>Parker W Young <span>| Creative Director</span></h3>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/parker.png" alt="parker" />
			<ul>
				<li class="tweet">loading latest tweet...</li>
				<li>Passions: <strong>Design, art and strong concept</strong></li>
				<li>Enjoys: <strong>Lifehacking to the extreme</strong></li>
				<li>Would spend his final hour: <strong>Playing Halo Reach</strong></li>
			</ul>
			<p>The name would be Parker. The game is design. I'm a designer, geek, gamer and a seasoned lifehacker. I specialize in corporate branding and motion graphics engineering, but occasionally dabble in print design, web interfacing, traditional art and sketching.</p>
		</div>
		
		<div class="minibio">
			<h3>Spencer Bailey <span>| Front-End Developer</span></h3>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/spencer.png" alt="spencer" />
			<ul>
				<li class="tweet">loading latest tweet...</li>
				<li>Number of Cats: <strong>2</strong></li>
				<li>Money Wasted on Fallout DLC: <strong>Too Much</strong></li>
				<li>Loves looking at: <strong>Minimalism in Design</strong></li>
			</ul>
			<p>I'm your go-to guy for anything CSS, HTML, and Javascript related. I've worked hard with industry professionals for the last two years at Full Sail University and now, my knowledge and possibilities are endless. I love this industry.</p>
		</div>
	</section>
</article>

<? if(!$ajax): ?>
</div>
<? endif; ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tweet.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/about-us.js"></script>