<?php

/**
 * This is the model class for table "payment_conf".
 *
 * The followings are the available columns in table 'payment_conf':
 * @property integer $id
 * @property string $order_id
 * @property string $name
 * @property string $bank_name
 * @property integer $amount
 * @property integer $transfer_to
 * @property string $date_transfer
 * @property string $date_input
 */
class PaymentConf extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_conf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, name, bank_name, amount, transfer_to, date_transfer', 'required'),
			array('amount, transfer_to', 'numerical', 'integerOnly'=>true),
			array('order_id, name, bank_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, name, bank_name, amount, transfer_to, date_transfer, date_input', 'safe', 'on'=>'search'),
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
			'id' => Tt::t('front', 'ID'),
			'order_id' => Tt::t('front', 'Order'),
			'name' => Tt::t('front', 'Name'),
			'bank_name' => Tt::t('front', 'Bank Name'),
			'amount' => Tt::t('front', 'Amount'),
			'transfer_to' => Tt::t('front', 'Transfer To'),
			'date_transfer' => Tt::t('front', 'Date Transfer'),
			'date_input' => Tt::t('front', 'Date Input'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('transfer_to',$this->transfer_to);
		$criteria->compare('date_transfer',$this->date_transfer,true);
		$criteria->compare('date_input',$this->date_input,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentConf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
