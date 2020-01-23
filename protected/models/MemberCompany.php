<?php

/**
 * This is the model class for table "member_company".
 *
 * The followings are the available columns in table 'member_company':
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $content
 * @property string $image
 * @property integer $sorting
 */
class MemberCompany extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberCompany the static model class
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
		return 'member_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, image', 'required'),
			array('sorting', 'numerical', 'integerOnly'=>true),
			array('title, sub_title, image', 'length', 'max'=>225),
			// The following rule is used by search().
			array('sub_title, content, sorting', 'safe'),
			// Please remove those attributes that should not be searched.
			array('id, title, sub_title, content, image, sorting', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'sub_title' => 'Sub Title',
			'content' => 'Content',
			'image' => 'Image',
			'sorting' => 'Sort',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sorting',$this->sorting);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}