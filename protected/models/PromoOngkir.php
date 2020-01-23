<?php

/**
 * This is the model class for table "tb_promo_ongkir".
 *
 * The followings are the available columns in table 'tb_promo_ongkir':
 * @property integer $id
 * @property integer $maxnilaikg
 * @property integer $status
 * @property string $date_input
 * @property string $date_end
 */
class PromoOngkir extends CActiveRecord
{
	public $id_product;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PromoOngkir the static model class
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
		return 'tb_promo_ongkir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maxnilaikg, date_end', 'required'),
			array('maxnilaikg, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('date_input', 'safe'),
			// Please remove those attributes that should not be searched.
			array('id, maxnilaikg, status, date_input, date_end', 'safe', 'on'=>'search'),
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
			'maxnilaikg' => 'Potongan Nilai Kg',
			'status' => 'Status',
			'date_input' => 'Tanggal Input',
			'date_end' => 'Tanggal Berakhir',
			'id_product' => 'Product',
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
		$criteria->compare('maxnilaikg',$this->maxnilaikg);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_end',$this->date_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}