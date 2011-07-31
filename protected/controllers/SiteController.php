<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->pageTitle = 'Zeunic';
		$this->render('index', array('ajax'=>false));
	}
	
	public function actionIndexAjax()
	{
		$this->pageTitle = 'Zeunic';
		$this->renderPartial('index', array('ajax'=>true));
	}
	
	public function actionAbout()
	{
		$this->pageTitle = 'Zeunic - About Us';
		$this->render('about', array('ajax'=>false));
	}
	
	public function actionAboutAjax()
	{
		$this->pageTitle = 'Zeunic - About Us';
		$this->renderPartial('about', array('ajax'=>true));
	}
	
	public function actionBlog()
	{
		$this->pageTitle = 'Zeunic - Blog';
		$this->render('blog', array('ajax'=>false));
	}
	
	public function actionBlogAjax()
	{
		$this->pageTitle = 'Zeunic - Blog';
		$this->renderPartial('blog', array('ajax'=>true));
	}
	
	public function actionLogin()
	{
		//If Logged in redirect to correct administration page
		if(!Yii::app()->user->isGuest){
		    if(Yii::app()->user->type == 'super'){
		    	$this->redirect(array('admin/index'));
		    } else {
		    	$this->redirect(array('client/index'));
		    }
	    }
		
		//Login		    
		$this->pageTitle = 'Zeunic - Client Login';
		$model = new LoginForm;
		$error = '';
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			if($model->validate()){
				$identity=new UserIdentity($model->attributes['username'],$model->attributes['password']);
				if($identity->authenticate()){
				    Yii::app()->user->login($identity);
				    if(Yii::app()->user->type == 'super'){
				    	$this->redirect(array('admin/index'));
				    } else {
				    	$this->redirect(array('client/index'));
				    }
				} else {
					$error = 'Username/Password combination is incorrect';
				}
			}
		}
		$this->render('login',array('model'=>$model, 'error'=>$error, 'ajax'=>false));
	}
	
	public function actionLoginAjax()
	{
		//If Logged in redirect to correct administration page
		if(!Yii::app()->user->isGuest){
		    if(Yii::app()->user->type == 'super'){
		    	$this->redirect(array('admin/index'));
		    } else {
		    	$this->redirect(array('client/index'));
		    }
	    }
		
		//Login		    
		$this->pageTitle = 'Zeunic - Client Login';
		$model = new LoginForm;
		$error = '';
		if(isset($_POST['LoginForm'])){
			$model->attributes = $_POST['LoginForm'];
			if($model->validate()){
				$identity=new UserIdentity($model->attributes['username'],$model->attributes['password']);
				if($identity->authenticate()){
				    Yii::app()->user->login($identity);
				    if(Yii::app()->user->type == 'super'){
				    	$this->redirect(array('admin/index'));
				    } else {
				    	$this->redirect(array('client/index'));
				    }
				} else {
					$error = 'Username/Password combination is incorrect';
				}
			}
		}
		$this->renderPartial('login', array('ajax'=>true, 'model'=>$model, 'error'=>$error));
	}
	
	public function actionContact()
	{
		$this->pageTitle = 'Zeunic - Contact Us';
		//Handle form submission
		$model = new ContactForm;
		if(isset($_POST['ContactForm'])){
		    $model->attributes=$_POST['ContactForm'];
		    if($model->validate()){
		    	$attributes = $model->attributes;
		    	$message = 'Name: '.$attributes['name'].'<br /><br />Contact: '.$attributes['email'].'<br /><br />'.$attributes['body'];
            	$to      = 'social@zeunic.com';
				$subject = 'Zeunic Contact Form';
				$headers = 'From: web@zeunic.com' . "\r\n" .
				    'Reply-To: '.$attributes['email'].''."\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				
				mail($to, $subject, $message, $headers);
				$this->render('contactSuccess',array('ajax'=>false));
            } else {
				$this->render('contact',array('model'=>$model));
			}
		} else {
			$this->render('contact',array('model'=>$model, 'ajax'=>false));
		}
	}
	
	public function actionContactAjax()
	{
		$this->pageTitle = 'Zeunic - Contact Us';
		//Handle form submission
		$model = new ContactForm;
		if(isset($_POST['ContactForm'])){
		    $model->attributes=$_POST['ContactForm'];
		    if($model->validate()){
		    	$attributes = $model->attributes;
		    	$message = 'Name: '.$attributes['name'].'<br /><br />Contact: '.$attributes['email'].'<br /><br />'.$attributes['body'];
            	$to      = 'social@zeunic.com';
				$subject = 'Zeunic Contact Form';
				$headers = 'From: web@zeunic.com' . "\r\n" .
				    'Reply-To: '.$attributes['email'].''."\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				
				mail($to, $subject, $message, $headers);
				$this->renderPartial('contactSuccess', array('ajax'=>true));
            } else {
				$this->renderPartial('contact', array('ajax'=>true, 'model'=>$model));
			}
		} else {
			$this->renderPartial('contact', array('ajax'=>true, 'model'=>$model));
		}
	}
	
	public function actionPortfolio($id = NULL)
	{
		if($id){
			$project = Project::model()->findByPk($id);
			$this->render('workdetail',array('project'=>$project, 'ajax'=>false));
		} else {
		
			$projects = Project::model()->findAllByAttributes(array('show'=>1));
			$tagmodels = Tag::model()->findAll(array(
						'select'=>'t.tag',
						'distinct'=>true,
					));
			$tags = Array();		
					
			foreach($tagmodels as $key => $value){
				$tags[] = $value->tag;
			}
			
		
			$this->pageTitle = 'Zeunic - Our Work';
			$this->render('portfolio', array('projects'=>$projects, 'tags'=>$tags, 'ajax'=>false));
		}
	}
	
	public function actionPortfolioAjax($id = NULL)
	{
		if($id){
			$project = Project::model()->findByPk($id);
			$this->renderPartial('workdetail',array('project'=>$project, 'ajax'=>true));
		} else {
			$projects = Project::model()->findAllByAttributes(array('show'=>1));
			$tagmodels = Tag::model()->findAll(array(
						'select'=>'t.tag',
						'distinct'=>true,
					));
			$tags = Array();		
					
			foreach($tagmodels as $key => $value){
				$tags[] = $value->tag;
			}
			
			$this->pageTitle = 'Zeunic - Our Work';
			if(isset($_GET['tag'])){
				$tag = $_GET['tag'];
				$this->renderPartial('portfolio', array('ajax'=>true, 'projects'=>$projects, 'tags'=>$tags, 'tag'=>$tag));
			} else {
				$this->renderPartial('portfolio', array('ajax'=>true, 'projects'=>$projects, 'tags'=>$tags));
			}
		}
	}
	
	public function actionGetProjectsByTag($tag)
	{
		$tagCopy = $tag;
		//search for tags using tag
		$tags = findTags($tag);
		echo 'hello';
		//if no tags were found check if the word ends in s and try the singular version
		if(count($tags) == 0 && preg_match('/s$/', $tag)){
			preg_replace('/s$/', '', $tag);
			$tags = findTags($tag);
			if(count($tags) == 0){
				//reset tag
				$tag = $tagCopy;
			}
		}
		//if no tags were found check if the word ends in es and try the singular version
		if(count($tags) == 0 && preg_match('/es$/', $tag)){
			preg_replace('/es$/', '', $tag);
			$tags = findTags($tag);
			if(count($tags) == 0){
				//reset tag
				$tag = $tagCopy;
			}
		}
		//if no tags were found check if the word ends in ies and try the singular version
		if(count($tags) == 0 && preg_match('/ies$/', $tag)){
			preg_replace('/ies$/', 'y', $tag);
			$tags = findTags($tag);
			if(count($tags) == 0){
				//reset tag
				$tag = $tagCopy;
			}
		}
		$projects = array();
		foreach($tags as $key => $tag){
			$projects[] = Project::model()->findByPk($tag->projectID);
		}
		$this->renderPartial('_projectSearch', array('projects'=>$projects));
	}
	
	protected function findTags($tag){
		return Tag::model()->findAll(array(
				    'select'=>'t.projectID',
				    'condition'=>'tag=:tag',
				    'params'=>array(':tag'=>$tag),
				    'distinct'=>true,
				));
	}

}
