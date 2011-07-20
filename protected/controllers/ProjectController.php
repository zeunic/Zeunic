<?php

class ProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update', 'delete', 'index', 'deletegallery'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->type == "super"'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;
		$galleryModel = new Gallery;
		$tagModel = new Tag;
		$testimonialModel = new Testimonial;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
	            
	            //Save testimonials to Testimonial table
	            $counter = 0;
	            $testimonialModel->attributes = $_POST['Testimonial'];
	            foreach($testimonialModel->attributes as $key => $value){
	            	echo print_r($value);
	            	$counter++;
	            }
	            die;
			$model->attributes=$_POST['Project'];
			$model->thumb = CUploadedFile::getInstance($model, 'thumb');
			$model->thumb_lg = CUploadedFile::getInstance($model, 'thumb_lg');
			if($model->save()){
				//Rename Uploaded Images with ProjectID and Update Database
				$baseURL = dirname(Yii::app()->request->scriptFile);
				$imageDir = '/images/projects/thumbs/';
				$id = $model->id;
	            $file= $baseURL . $imageDir . $id . '.' . $model->thumb->extensionName;
	            $model->thumb->saveAs($file);
	            $model->thumb = $id . '.' . $model->thumb->extensionName;
	            $file2= $baseURL . $imageDir . $id . '_lg.' . $model->thumb_lg->extensionName;
	            $model->thumb_lg->saveAs($file2);
	            $model->thumb_lg = $id . '_lg.' . $model->thumb_lg->extensionName;
	            $model->save();
	            
	            //Save images to Gallery table
	            $images = CUploadedFile::getInstances($galleryModel, 'image');
				$imageDir = '/images/projects/gallery/';
	            foreach($images as $key => $value){
	            	$galleryImage = new Gallery;
	            	$uid = uniqid();
	            	$file= $baseURL . $imageDir . $id . '_' . $uid . '.' . $value->extensionName;
	            	$value->saveAs($file);
	            	$galleryImage->image = $id . '_' . $uid . '.' . $value->extensionName;
		            $galleryImage->projectID = $id;
		            $galleryImage->save();
	            }
	            
	            //Save tags to Tag table
	            $tagModel->attributes=$_POST['Tag'];
	            $tags = explode(',',str_replace(' ', '', $tagModel->tag));
	            foreach($tags as $key => $tag){
	            	if($tag != ''){
		            	$tagModel = new Tag;
		            	$tagModel->projectID = $id;
		            	$tagModel->tag = $tag;
		            	$tagModel->save();
		            }
	            }
	            
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'galleryModel'=>$galleryModel,
			'tagModel'=>$tagModel,
			'testimonialModel'=>$testimonialModel
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$galleryModel = new Gallery;
		$tagModel = new Tag;
		$images = Gallery::model()->findAll('projectID=:id',array(':id'=>$id));
		$testimonialModel = new Testimonial;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->title=$_POST['Project']['title'];
			$model->desc=$_POST['Project']['desc'];
			$model->link=$_POST['Project']['link'];
			if(CUploadedFile::getInstance($model, 'thumb')){
				$model->thumb = CUploadedFile::getInstance($model, 'thumb');
			}
			if(CUploadedFile::getInstance($model, 'thumb_lg')){
				$model->thumb_lg = CUploadedFile::getInstance($model, 'thumb_lg');
			}
			if($model->save()){
				//Rename Uploaded Images with ProjectID and Update Database
				$baseURL = dirname(Yii::app()->request->scriptFile);
				$imageDir = '/images/projects/thumbs/';
				$id = $model->id;
				if(gettype($model->thumb) == 'object'){
		            $file= $baseURL . $imageDir . $id . '.' . $model->thumb->extensionName;
		            $model->thumb->saveAs($file);
		            $model->thumb = $id . '.' . $model->thumb->extensionName;
	            }
				if(gettype($model->thumb_lg) == 'object'){
		            $file2= $baseURL . $imageDir . $id . '_lg.' . $model->thumb_lg->extensionName;
		            $model->thumb_lg->saveAs($file2);
		            $model->thumb_lg = $id . '_lg.' . $model->thumb_lg->extensionName;
	            }
	            $model->save();
	            
	            //Save images to Gallery table
	            $images = CUploadedFile::getInstances($galleryModel, 'image');
				$imageDir = '/images/projects/gallery/';
	            foreach($images as $key => $value){
	            	$galleryImage = new Gallery;
	            	$uid = uniqid();
	            	$file= $baseURL . $imageDir . $id . '_' . $uid . '.' . $value->extensionName;
	            	$value->saveAs($file);
	            	$galleryImage->image = $id . '_' . $uid . '.' . $value->extensionName;
		            $galleryImage->projectID = $id;
		            $galleryImage->save();
	            }
	            
	            //Save tags to Tag table
	            $tagModel->attributes=$_POST['Tag'];
	            $tagId = $tagModel->id;
	            $tags = explode(',',str_replace(' ', '', $tagModel->tag));
	            foreach($tags as $key => $tag){
	            	$tagExists=Tag::model()->exists('projectID=:id AND tag=:tag',array(':id'=>$id, ':tag'=>$tag));
	            	if($tag != '' && !$tagExists){
		            	$tagModel = new Tag;
		            	$tagModel->projectID = $id;
		            	$tagModel->tag = $tag;
		            	$tagModel->save();
		            }
	            }
	            
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'galleryModel'=>$galleryModel,
			'images'=>$images,
			'tagModel'=>$tagModel,
			'testimonialModel'=>$testimonialModel
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeletegallery($id){
		$image=Gallery::model()->findByPk($id);
		$image->delete();
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
