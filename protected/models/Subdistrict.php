<?php

/**
 * This is the model class for table "subdistrict".
 *
 * The followings are the available columns in table 'subdistrict':
 * @property integer $id
 * @property integer $province_id
 * @property string $province
 * @property integer $city_id
 * @property string $city
 * @property string $type
 * @property string $subdistrict_name
 */
class Subdistrict extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subdistrict the static model class
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
		return 'subdistrict';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('province_id, province, city_id, city, type, subdistrict_name', 'required'),
			array('province_id, city_id', 'numerical', 'integerOnly'=>true),
			array('province, city, type, subdistrict_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, province_id, province, city_id, city, type, subdistrict_name', 'safe', 'on'=>'search'),
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
			'province_id' => 'Province',
			'province' => 'Province',
			'city_id' => 'City',
			'city' => 'City',
			'type' => 'Type',
			'subdistrict_name' => 'Subdistrict Name',
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
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('subdistrict_name',$this->subdistrict_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}