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
		$this->render('index');
	}
	
	public function actionAbout()
	{
		$this->pageTitle = 'Zeunic - About Us';
		$this->render('about');
	}
	
	public function actionBlog()
	{
		$this->pageTitle = 'Zeunic - Search';
		$this->render('blog');
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
		$this->render('login',array('model'=>$model, 'error'=>$error));
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
		    	$message = $attributes['name'].'\n\n'.$attributes['body'];
            	$to      = 'joe@zeunic.com';
				$subject = 'Zeunic Contact Form';
				$headers = 'From: web@zeunic.com' . "\r\n" .
				    'Reply-To: '.$attributes['email'].''."\r\n" .
				    'X-Mailer: PHP/' . phpversion();
				
				mail($to, $subject, $message, $headers);
				$this->render('contactSuccess');
            } else {
				$this->render('contact',array('model'=>$model));
			}
		} else {
			$this->render('contact',array('model'=>$model));
		}
	}
	
	public function actionPortfolio()
	{
		$this->pageTitle = 'Zeunic - Our Work';
		$this->render('portfolio');
	}

}