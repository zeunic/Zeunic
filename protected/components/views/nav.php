<nav>
	<a id="logo" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_hover.png" alt="Zeunic" width="250" height="80" /> 
	</a>
	<ul>
	<? 
		foreach($pages as $key => $value){
			$base = Yii::app()->request->baseUrl;
			$anchor = '<a href="'.$base.'/index.php/site/'.$value[0].'" title="'.$value[1].'">'. $value[1].'</a>';
			
			echo '<li id="'.$value[0].'"';
			
			if($key == $page){
				echo 'class="active">'.$value[1].'</li>';
			} else {
				echo '>'. $anchor .'</li>';
			}
		}
	?>
	</ul>
	<h1><? if($page != -1) echo $pages[$page][1]; else echo 'welcome'; ?></h1>
</nav>
		
<div id="vertrule">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vert_rule.png" alt="Vertical Divider" />
</div>