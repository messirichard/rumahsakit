<?php

/**
 * This is the model class for table "testimonial".
 *
 * The followings are the available columns in table 'testimonial':
 * @property string $id
 * @property string $nama
 * @property string $email
 * @property string $subjek
 * @property string $pesan
 * @property string $date_add
 * @property string $date_modif
 * @property integer $status
 */
class Testimonials extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Testimonials the static model class
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
		return 'testimonial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, email, subjek, pesan', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('nama, email, subjek', 'length', 'max'=>225),
			// The following rule is used by search().
			array('date_add, date_modif, status', 'safe'),
			// Please remove those attributes that should not be searched.
			array('id, nama, email, subjek, pesan, date_add, date_modif, status', 'safe', 'on'=>'search'),
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
			'nama' => 'Nama',
			'email' => 'Email',
			'subjek' => 'Subjek',
			'pesan' => 'Pesan',
			'date_add' => 'Date Input',
			'date_modif' => 'Date Approve',
			'status' => 'Status',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subjek',$this->subjek,true);
		$criteria->compare('pesan',$this->pesan,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_modif',$this->date_modif,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}