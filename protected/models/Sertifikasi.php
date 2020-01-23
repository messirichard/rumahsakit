<?php

/**
 * This is the model class for table "sertifikasi".
 *
 * The followings are the available columns in table 'sertifikasi':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $images_icon
 * @property string $images_big
 */
class Sertifikasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sertifikasi the static model class
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
		return 'sertifikasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),

			//array('description'),

			array('name, images_icon, images_big', 'length', 'max'=>225),
			array('description', 'length', 'min'=>1),
			// The following rule is used by search().
			array('images_icon, images_big', 'length', 'max'=>200),
			array('images_icon, images_big', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			array('images_icon, images_big', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),

			// Please remove those attributes that should not be searched.
			array('id, name, description, images_icon, images_big', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'description' => 'Description',
			'images_icon' => 'Images Icon',
			'images_big' => 'Images Big',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('images_icon',$this->images_icon,true);
		$criteria->compare('images_big',$this->images_big,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}