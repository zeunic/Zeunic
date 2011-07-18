<?php

/**
 * This is the model class for table "portfolio".
 *
 * The followings are the available columns in table 'portfolio':
 * @property string $id
 * @property string $thumb
 * @property string $thumb_lg
 * @property string $title
 * @property string $desc
 * @property string $link
 * @property string $image
 * @property string $video
 * @property string $tag
 * @property string $testimonial
 * @property string $author
 * @property string $authorTitle
 */
class Portfolio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Portfolio the static model class
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
		return 'portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc', 'required'),
			array('id', 'length', 'max'=>11),
			array('thumb, thumb_lg', 'length', 'max'=>30),
			array('title, image, video', 'length', 'max'=>50),
			array('link', 'length', 'max'=>100),
			array('tag', 'length', 'max'=>20),
			array('author, authorTitle', 'length', 'max'=>40),
			array('testimonial', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, thumb, thumb_lg, title, desc, link, image, video, tag, testimonial, author, authorTitle', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'thumb' => 'Thumb',
			'thumb_lg' => 'Thumb Lg',
			'title' => 'Title',
			'desc' => 'Desc',
			'link' => 'Link',
			'image' => 'Image',
			'video' => 'Video',
			'tag' => 'Tag',
			'testimonial' => 'Testimonial',
			'author' => 'Author',
			'authorTitle' => 'Author Title',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('testimonial',$this->testimonial,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('authorTitle',$this->authorTitle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}