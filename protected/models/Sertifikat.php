<?php

/**
 * This is the model class for table "member_company".
 *
 * The followings are the available columns in table 'member_company':
 * @property integer $id
 * @property string $info_sertifikat
 * @property string $image
 * @property integer $sorting
 */
class Sertifikat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sertifikat the static model class
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
		return 'sertifikat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('info_sertifikat, image', 'required'),
			array('sorting', 'numerical', 'integerOnly'=>true),
			array('info_sertifikat, image', 'length', 'max'=>225),
			// The following rule is used by search().
			array('sorting', 'safe'),
			// Please remove those attributes that should not be searched.
			array('id, info_sertifikat, image, sorting', 'safe', 'on'=>'search'),
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
			'info_sertifikat' => 'Certificate Name',
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
		$criteria->compare('info_sertifikat',$this->info_sertifikat,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sorting',$this->sorting);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}