<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id
 * @property string $thumb
 * @property string $thumb_lg
 * @property string $title
 * @property string $desc
 * @property string $link
 * @property string $show
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Gallery[] $galleries
 * @property Tags[] $tags
 * @property Testimonial[] $testimonials
 * @property Video[] $videos
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc,title','required'),
			array('thumb, thumb_lg', 'file', 'on'=>'create','types'=>'jpg,png,gif'),
			array('thumb,thumb_lg','file','on'=>'update','allowEmpty'=>true,'types'=>'jpg,png,gif'),
			array('title', 'length', 'max'=>50),
			array('link', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, thumb, thumb_lg, title, desc, link', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'galleries' => array(self::HAS_MANY, 'Gallery', 'projectID'),
			'tags' => array(self::HAS_MANY, 'Tag', 'projectID'),
			'testimonials' => array(self::HAS_MANY, 'Testimonial', 'projectID'),
			'videos' => array(self::HAS_MANY, 'Video', 'projectID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'thumb' => 'Thumbnail (180x110)',
			'thumb_lg' => 'Wide Thumbnail (590x120)',
			'title' => 'Title',
			'desc' => 'Description',
			'link' => 'Link',
			'show' => 'Show?',
			'type' => 'Type'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('thumb_lg',$this->thumb_lg,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('link',$this->link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}