<?php
Yii::import('application.vendors.*');
require_once('imageupload.php');

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
				'actions'=>array('create','update', 'delete', 'index', 'deletegallery', 'deletevideo', 'deletetag', 'deletetestimonial'),
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
		$videoModel = new Video;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			$model->show = $_POST['Project']['show'];
			$model->type = $_POST['Project']['type'];
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
	            
	            //Save video to Video table
	            $videos = CUploadedFile::getInstances($videoModel, 'video');
				$videosDir = '/images/projects/videos/';
	            foreach($videos as $key => $value){
	            	$video = new Video;
	            	$uid = uniqid();
	            	$file= $baseURL . $videosDir . $id . '_' . $uid . '.' . $value->extensionName;
	            	$value->saveAs($file);
	            	$video->video = $id . '_' . $uid . '.' . $value->extensionName;
		            $video->projectID = $id;
		            $video->save();
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
	            
	            //Save testimonials to Testimonial table
	            foreach($_POST['Testimonial']['testimonial'] as $key => $value){
	            	$testimonial = new Testimonial;
	            	$testimonial->testimonial = $value;
	            	if($value != ''){
		            	$testimonial->author = $_POST['Testimonial']['author'][$key];
		            	$testimonial->authorTitle = $_POST['Testimonial']['authorTitle'][$key];
		            	$testimonial->projectID = $id;
		            	$testimonial->save();
	            	}
	            }
	            if(count($images) > 0){
	            	$this->redirect(array('cropimages'));
	            } else {
					$this->redirect(array('index'));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'galleryModel'=>$galleryModel,
			'tagModel'=>$tagModel,
			'testimonialModel'=>$testimonialModel,
			'videoModel'=>$videoModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		//models
		$model=$this->loadModel($id);
		$galleryModel = new Gallery;
		$tagModel = new Tag;
		$testimonialModel = new Testimonial;
		$videoModel = new Video;
		
		//assets
		$images = Gallery::model()->findAll('projectID=:id',array(':id'=>$id));
		$testimonials = Testimonial::model()->findAll('projectId=:id',array(':id'=>$id));
		$videos = Video::model()->findAll('projectId=:id',array(':id'=>$id));
		$tags = Tag::model()->findAll('projectId=:id',array(':id'=>$id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->title=$_POST['Project']['title'];
			$model->desc=$_POST['Project']['desc'];
			$model->link=$_POST['Project']['link'];
			$model->show=$_POST['Project']['show'];
			$model->type=$_POST['Project']['type'];
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
	            
	            //Save video to Video table
	            $vids = CUploadedFile::getInstances($videoModel, 'video');
				$videosDir = '/images/projects/videos/';
	            foreach($vids as $key => $value){
	            	$video = new Video;
	            	$uid = uniqid();
	            	$file= $baseURL . $videosDir . $id . '_' . $uid . '.' . $value->extensionName;
	            	$value->saveAs($file);
	            	$video->video = $id . '_' . $uid . '.' . $value->extensionName;
		            $video->projectID = $id;
		            $video->save();
	            }
	            
	            //Save tags to Tag table
	            $tagModel->attributes=$_POST['Tag'];
	            $tagId = $tagModel->id;
	            $thetags = explode(',',str_replace(' ', '', $tagModel->tag));
	            foreach($thetags as $key => $tag){
	            	$tagExists=Tag::model()->exists('projectID=:id AND tag=:tag',array(':id'=>$id, ':tag'=>$tag));
	            	if($tag != '' && !$tagExists){
		            	$tagModel = new Tag;
		            	$tagModel->projectID = $id;
		            	$tagModel->tag = $tag;
		            	$tagModel->save();
		            }
	            }
	            
	            //Save testimonials to Testimonial table
	            foreach($_POST['Testimonial']['testimonial'] as $key => $value){
	            	$testimonial = new Testimonial;
	            	$testimonial->testimonial = $value;
	            	if($value != ''){
		            	$testimonial->author = $_POST['Testimonial']['author'][$key];
		            	$testimonial->authorTitle = $_POST['Testimonial']['authorTitle'][$key];
		            	$testimonial->projectID = $id;
		            	$testimonial->save();
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
			'testimonialModel'=>$testimonialModel,
			'videoModel'=>$videoModel,
			'videos'=>$videos,
			'testimonials'=>$testimonials,
			'tags'=>$tags,
		));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$this->redirect(array('index'));
	}
	
	public function actionDeleteGallery($id){
		$image=Gallery::model()->findByPk($id);
		$image->delete();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	public function actionDeleteTestimonial($id){
		$t=Testimonial::model()->findByPk($id);
		$t->delete();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	public function actionDeleteTag($id){
		$tag=Tag::model()->findByPk($id);
		$tag->delete();
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	public function actionDeleteVideo($id){
		$video=Video::model()->findByPk($id);
		$video->delete();
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
