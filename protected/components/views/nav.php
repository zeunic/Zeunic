<div id="nav">
	<nav>
		<a id="logo" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/index">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_hover.png" alt="Zeunic" width="250" height="80" /> 
		</a>
		<ul id="main-nav">
		<? 
			$base = Yii::app()->request->baseUrl;
			foreach($pages as $key => $value){
				
				$section = ($value[1] == 'admin') ? 'admin/index' : ('site/'.$value[0]);
			
				$anchor = '<a href="'.$base.'/index.php/'.$section.'/" title="'.$value[1].'">'. $value[1].'</a>';
				
				if ($value[1] == 'our blog') {
					$anchor = '<a href="http://www.zeunic.com/blog" title="our blog">' . $value[1] . '</a>';
				}
				
				echo '<li id="'.$value[0].'"';
				
				if($key == $page){
					echo ' class="active">'.$anchor.'</li>';
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
</div>
