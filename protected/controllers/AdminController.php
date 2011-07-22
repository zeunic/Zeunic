<?php

class AdminController extends Controller
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
		if(Yii::app()->user->isGuest){
			$this->redirect(array('site/login'));
		} else {
			$this->pageTitle = 'Zeunic - Administration';
			$this->render('index', array('ajax'=>false));
		}
	}
	
	public function actionIndexAjax()
	{
		if(Yii::app()->user->isGuest){
			$this->redirect(array('site/login'));
		} else {
			$this->pageTitle = 'Zeunic - Administration';
			$this->renderPartial('index', array('ajax'=>true));
		}
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('site/login'));
	}

}