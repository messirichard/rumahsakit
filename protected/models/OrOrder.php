<?php

/**
 * This is the model class for table "or_order".
 *
 * The followings are the available columns in table 'or_order':
 * @property integer $id
 * @property integer $invoice_no
 * @property string $invoice_prefix
 * @property integer $customer_id
 * @property integer $customer_group_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $payment_first_name
 * @property string $payment_last_name
 * @property string $payment_company
 * @property string $payment_address_1
 * @property string $payment_address_2
 * @property string $payment_city
 * @property string $payment_district
 * @property string $payment_postcode
 * @property string $payment_zone
 * @property string $payment_country
 * @property string $shipping_first_name
 * @property string $shipping_last_name
 * @property string $shipping_company
 * @property string $shipping_address_1
 * @property string $shipping_address_2
 * @property string $shipping_city
 * @property string $shipping_district
 * @property string $shipping_postcode
 * @property string $shipping_zone
 * @property string $shipping_country
 * @property string $comment
 * @property string $total
 * @property integer $order_status_id
 * @property integer $affiliate_id
 * @property string $commission
 * @property integer $language_id
 * @property integer $currency_id
 * @property string $currency_code
 * @property string $currency_value
 * @property string $ip
 * @property string $date_add
 * @property string $date_modif
 */
class OrOrder extends CActiveRecord
{
	public $express_ship;
	public $pass;
	public $confirm_pass;
	public $type_login;
	public $print_ship;
	public $jml_print_ship;
	public $delivery_kurir;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrOrder the static model class
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
		return 'or_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('email, payment_first_name, payment_last_name, payment_address_1, payment_city, payment_district, payment_zone, shipping_first_name, shipping_last_name, shipping_address_1, shipping_city, shipping_district, shipping_zone, phone, tos', 'required', 'on'=>'input_order_data'),

			// array('email, payment_first_name, payment_last_name, payment_address_1, payment_city, payment_district, payment_zone, shipping_first_name, shipping_last_name, shipping_address_1, shipping_city, shipping_district, shipping_zone, phone, delivery_package, tos', 'required', 'on'=>'input_order_data'),
			
			array('invoice_no, customer_id, customer_group_id, order_status_id, affiliate_id, language_id, currency_id', 'numerical', 'integerOnly'=>true),
			array('invoice_prefix, shipping_area', 'length', 'max'=>20),
			array('first_name, last_name, phone, payment_first_name, payment_last_name, payment_company, payment_address_1, payment_address_2, payment_city, payment_postcode, payment_zone, payment_country, shipping_first_name, shipping_last_name, shipping_company, shipping_address_1, shipping_address_2, shipping_city, shipping_postcode, shipping_zone, shipping_country, ip, shipping_district, payment_district', 'length', 'max'=>128),
			array('email', 'length', 'max'=>255),
			array('email', 'email'),
			array('total, commission, currency_value, tax, express_ship', 'length', 'max'=>15),
			array('currency_code', 'length', 'max'=>100),
			array('type_login, pass, confirm_pass, tracking_id, comment, delivery_package', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoice_no, invoice_prefix, customer_id, customer_group_id, first_name, last_name, email, phone, payment_first_name, payment_last_name, payment_company, payment_address_1, payment_address_2, payment_city, payment_postcode, payment_zone, payment_country, shipping_first_name, shipping_last_name, shipping_company, shipping_address_1, shipping_address_2, shipping_city, shipping_postcode, shipping_zone, shipping_country, comment, total, order_status_id, affiliate_id, commission, language_id, currency_id, currency_code, currency_value, ip, date_add, date_modif, shipping_district, payment_district', 'safe', 'on'=>'search'),
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
			'invoice_no' => Tt::t('front', 'Invoice No'),
			'invoice_prefix' => Tt::t('front', 'Invoice Prefix'),
			'customer_id' => Tt::t('front', 'Customer'),
			'customer_group_id' => Tt::t('front', 'Customer Group'),
			'first_name' => Tt::t('front', 'First Name'),
			'last_name' => Tt::t('front', 'Last Name'),
			'email' => Tt::t('front', 'Email'),
			'phone' => Tt::t('front', 'Phone'),
			'payment_first_name' => Tt::t('front', 'First Name'),
			'payment_last_name' => Tt::t('front', 'Last Name'),
			'payment_company' => Tt::t('front', 'Company'),
			'payment_address_1' => Tt::t('front', 'Address'),
			'payment_address_2' => Tt::t('front', 'Address 2'),
			'payment_city' => Tt::t('front', 'City'),
			'payment_district' => Tt::t('front', 'District'),
			'payment_postcode' => Tt::t('front', 'Postcode'),
			'payment_zone' => Tt::t('front', 'Provinsi'),
			'payment_country' => Tt::t('front', 'Country'),
			'shipping_first_name' => Tt::t('front', 'First Name'),
			'shipping_last_name' => Tt::t('front', 'Last Name'),
			'shipping_company' => Tt::t('front', 'Company'),
			'shipping_address_1' => Tt::t('front', 'Address'),
			'shipping_address_2' => Tt::t('front', 'Address 2'),
			'shipping_city' => Tt::t('front', 'City'),
			'shipping_district' => Tt::t('front', 'District'),
			'shipping_postcode' => Tt::t('front', 'Postcode'),
			'shipping_zone' => Tt::t('front', 'Provinsi'),
			'shipping_country' => Tt::t('front', 'Country'),
			'comment' => Tt::t('front', 'Comment'),
			'total' => Tt::t('front', 'Total'),
			'order_status_id' => Tt::t('front', 'Order Status'),
			'affiliate_id' => Tt::t('front', 'Affiliate'),
			'commission' => Tt::t('front', 'Commission'),
			'language_id' => Tt::t('front', 'Language'),
			'currency_id' => Tt::t('front', 'Currency'),
			'currency_code' => Tt::t('front', 'Currency Code'),
			'currency_value' => Tt::t('front', 'Currency Value'),
			'ip' => Tt::t('front', 'Ip'),
			'date_add' => Tt::t('front', 'Date Add'),
			'date_modif' => Tt::t('front', 'Date Modif'),
			'tax' => Tt::t('front', 'GST'),
			'express_ship'=> Tt::t('front', 'Express Shipping'),
			'pass'=> Tt::t('front', 'Password'),
			'tracking_id'=> Tt::t('front', 'No Resi'),
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
		$criteria->compare('invoice_no',$this->invoice_no);
		$criteria->compare('invoice_prefix',$this->invoice_prefix,true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('customer_group_id',$this->customer_group_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('payment_first_name',$this->payment_first_name,true);
		$criteria->compare('payment_last_name',$this->payment_last_name,true);
		$criteria->compare('payment_company',$this->payment_company,true);
		$criteria->compare('payment_address_1',$this->payment_address_1,true);
		$criteria->compare('payment_address_2',$this->payment_address_2,true);
		$criteria->compare('payment_city',$this->payment_city,true);
		$criteria->compare('payment_district',$this->payment_district,true);
		$criteria->compare('payment_postcode',$this->payment_postcode,true);
		$criteria->compare('payment_zone',$this->payment_zone,true);
		$criteria->compare('payment_country',$this->payment_country,true);
		$criteria->compare('shipping_first_name',$this->shipping_first_name,true);
		$criteria->compare('shipping_last_name',$this->shipping_last_name,true);
		$criteria->compare('shipping_company',$this->shipping_company,true);
		$criteria->compare('shipping_address_1',$this->shipping_address_1,true);
		$criteria->compare('shipping_address_2',$this->shipping_address_2,true);
		$criteria->compare('shipping_city',$this->shipping_city,true);
		$criteria->compare('shipping_district',$this->shipping_district,true);
		$criteria->compare('shipping_postcode',$this->shipping_postcode,true);
		$criteria->compare('shipping_zone',$this->shipping_zone,true);
		$criteria->compare('shipping_country',$this->shipping_country,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('order_status_id',$this->order_status_id);
		$criteria->compare('affiliate_id',$this->affiliate_id);
		$criteria->compare('commission',$this->commission,true);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('currency_value',$this->currency_value,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_modif',$this->date_modif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function createCheck($invoice, $id)
	{
		$str_c = '';
		$str_c .= '<input type="checkbox" class="inps_check" name="checkOrder[]" value="'.$id.'" checked>';
		return $str_c;
	}
	
}