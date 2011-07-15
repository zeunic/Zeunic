<nav>
	<a id="logo" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Zeunic" /> 
	</a>
	<ul>
	<? 
		foreach($pages as $key => $value){
			echo '<li id="'.$value[0].'"';
			if($key == $page){
				echo 'class="active"';
			}
			$base = Yii::app()->request->baseUrl;
			echo '><a href="'.$base.'/index.php/site/'.$value[0].'">'.$value[1].'</a></li>';
		}
	?>
	</ul>
	<h1><? if($page != -1) echo $pages[$page][1]; else echo 'Welcome'; ?></h1>
</nav>
		
<div id="vertrule">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vert_rule.png" alt="Vertical Divider" />
</div>