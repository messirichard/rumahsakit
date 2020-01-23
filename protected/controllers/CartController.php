<?php
class CartController extends Controller
{
	public function actions()
	{
	    return array(
	      'aclist'=>array(
	        'class'=>'application.extensions.EAutoCompleteAction.remoteCityLocal',
	      ),
	      'accost'=>array(
	        'class'=>'application.extensions.EAutoCompleteAction.EAutoCompleteActionCost',
	      ),
	    );
	}
	public function actionIndex()
	{
		$this->redirect(array('shop'));
	}
	public function actionShop()
	{
		$model = new Cart;

		$data = $model->viewCart($this->languageID);

		$this->pageTitle = Tt::t('front', 'My Cart').' - '.$this->pageTitle;
		$this->layout='//layouts/column1';
		$this->render('shop', array(
			'data' => $data,
		));
	}

	public function actionShipping()
	{
		$session=new CHttpSession;
		$session->open();
		$login_member = $session['login_member'];

		$modelProduct = new Cart;

		$data = $modelProduct->viewCart($this->languageID);

		$model = new OrOrder;

		if (count($data) == 0) {
			$this->redirect(array('shop'));
		}

		
		// setting scenario
		// if (isset($session['login_member'])) {
		// 	$model->scenario = 'input_order_data';
		// } else {
		// 	$this->redirect(array('/member/index'));
		// }
		
		$model->scenario = 'input_order_data';

		if(isset($_POST['OrOrder']))
		{
			$status = true;
			$model->attributes=$_POST['OrOrder'];
			if ($model->type_login == 'new') {
				$cekMember = MeMember::model()->find('email = :email', array(':email'=>$model->email));
				if ($cekMember != null) {
					$model->addError('email',Tt::t('front', 'Email sudah terdaftar'));
					$status = false;
				}
				if ($model->email == '') {
					$model->addError('email',Tt::t('front', 'Email harus di isi'));
					$status = false;
				}
				if ($model->pass == '') {
					$model->addError('pass',Tt::t('front', 'Password harus di isi'));
					$status = false;
				}
				if ($model->pass != $model->confirm_pass) {
					$model->addError('confirm_pass',Tt::t('front', 'Password tidak sama'));
					$status = false;
				}
			}elseif($model->type_login == 'login'){
				$cekMember = MeMember::model()->find('email = :email', array(':email'=>$model->email));
				if ($model->email == '') {
					$model->addError('email',Tt::t('front', 'Email tidak boleh kosong'));
					$status = false;
				}
				if ($model->pass == '') {
					$model->addError('pass',Tt::t('front', 'Password harus di isi'));
					$status = false;
				}
				if ($cekMember == null) {
					$model->addError('email',Tt::t('front', 'Email tidak terdaftar'));
					$status = false;
				}
				if (sha1($model->pass) != $cekMember->pass) {
					$model->addError('pass',Tt::t('front', 'Password salah'));
					$status = false;
				}
			}else{

			}
			if ($model->tos == false) {
				$model->addError('tos',Tt::t('front', 'TOS Harus anda setujui untuk melanjutkan transaksi'));
				$status = false;
			}
			if($status){
				if($model->type_login == 'login'){
					$session['login_member'] = $cekMember->attributes;
					$this->refresh();
				}
					if ($model->validate()) {
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($model->type_login == 'new') {
						$modelMember = new MeMember;
						$modelMember->email = $model->email;
						$modelMember->first_name = $model->shipping_first_name;
						$modelMember->last_name = $model->shipping_last_name;
						$modelMember->pass = sha1($model->pass);
						$modelMember->aktivasi = 0;
						$modelMember->aktif = 1;
						$modelMember->image = '';
						$modelMember->hp = $model->phone;
						$modelMember->address = $model->shipping_address_1;
						$modelMember->province = $model->shipping_zone;
						$modelMember->city = $model->shipping_city;
						$modelMember->district = $model->shipping_district;
						$modelMember->postcode = $model->shipping_postcode;
						$modelMember->save(false);
						$session['login_member'] = $modelMember->attributes;
						$login_member = $session['login_member'];
					}
					$model->attributes = $order;
					$model->first_name = $model->payment_first_name;
					$model->last_name = $model->payment_last_name;
					$model->delivery_price = $order['delivery_price'];
					$model->customer_id = $login_member['id'];

					$model->invoice_no = rand(1000, 9999);
					$model->invoice_prefix = 'MB-'.date("Ymd");
					$model->date_add = date("Y-m-d H:i:s");
					$model->date_modif = date("Y-m-d H:i:s");
					$model->payment_method_id = $_POST['OrOrder']['payment_method'];
					$model->order_status_id = 1;

					// matikan sementara
					$model->save();

					$modelProduct = new Cart;
					$berat = 0;
					foreach ($data as $key => $value) {
						if ($value['option'] != '') {
							$option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
							$value['price'] = $option->price;
						}

						$product = PrdProduct::model()->with('description')->find('t.id = :id AND description.language_id = :language_id', array(':id'=>$key, ':language_id'=>$this->languageID));

						// ambil nilai potongan promo ongkir
						$get_prm_ongkir = Promote_ongkir::promote($product->id);
                         if ($get_prm_ongkir != false) {
                         	$berat = $berat + (($value['optional']['berat']*$value['qty']) - intval($get_prm_ongkir['nilai_potongan_kg'] * 1000));
                         } else {
                        	$berat = $berat + ($value['optional']['berat']*$value['qty']);
                         }

						$modelOrderDetail = new OrOrderProduct;
						$modelOrderDetail->order_id = $model->id;
						$modelOrderDetail->product_id = $product->id;
						$modelOrderDetail->image = $product->image;
						$modelOrderDetail->name = $product->description->name;
						$modelOrderDetail->kode = $product->kode;
						$modelOrderDetail->qty = $value['qty'];
						$modelOrderDetail->price = $value['price'];
						$box = 0;
						if ($value['optional']['box'] != '') {
							$box = $value['optional']['box'];
						}
						$modelOrderDetail->total = $value['qty']*($value['price']+$box);
						$modelOrderDetail->attributes_id = $option->id_str;
						$modelOrderDetail->attributes_name = $option->attribute;
						$modelOrderDetail->attributes_price = $option->price;
						$modelOrderDetail->berat = $product->berat;
						$modelOrderDetail->data = serialize(array_merge($value['optional'], array('category_id'=>$product->category_id, 'category_name'=>ViewCategory::model()->find('id = :id', array(':id'=>$product->category_id))->name)));
						$modelOrderDetail->save(false);
						$total = $total + ($value['price']+$box)*$value['qty'];
					}
					// $model->tax = ($total+$model->delivery_price) / $this->setting['tax'];
					$model->tax = 0;

					// old kode
					// $model->total = $total;
					$uniq_transfer = UniqTransfer::model()->findByPk(1);
					if ($uniq_transfer->number == 0) {
						$uniq_transfer->number = 1;
					}
					// add 1 number uniqTransfer
					$model->total = $total + $uniq_transfer->number;

					$model->delivery_to = $model->shipping_district;
					$model->delivery_from = 444;

					$berat = max($berat, 0);

					if ($berat <= 0) {
						$model->delivery_price = 0;
						$model->delivery_package = 'WAHANA';
						$model->delivery_weight = $berat;
					} else {
						// mengambil harga delivery
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => Yii::app()->request->hostInfo.$this->createUrl('/member/getcost', 
									array(
										'id'=>$model->delivery_to,
										'kurir'=>$_POST['OrOrder']['delivery_kurir'],
										'weight'=>$berat
										)
								),
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 30,
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);

						curl_close($curl);
						if ($err) {
							echo "cURL Error #:" . $err;
						} else {
							// echo Yii::app()->request->hostInfo.$this->createUrl('/member/getcost');
							$result = json_decode($response);
						}

						$model->delivery_price = $result->data->{$model->delivery_package}->cost;
						$model->delivery_package = strtoupper($_POST['OrOrder']['delivery_kurir']).' - '.$model->delivery_package;
						$model->delivery_weight = $berat;
					}

					$model->grand_total = $model->total + $model->delivery_price;

					// echo "<pre>";
					// print_r($model->attributes); exit;
					$model->save();

					unset($session['cart']);
					unset($session['order']);

					$uniq_transfer->number = $uniq_transfer->number + 1;
					$uniq_transfer->save(false);

					$session['order_id'] = $model->id;

					// Yii::app()->user->setFlash('success','Data has been inserted');

				    $order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));
				    $bank = Bank::model()->findAll();
				    
					$mail = $this->renderPartial('//mail/cart2', array(
						'bank'=>$bank,
						'data' => $order,
						'modelOrder' => $model,
					), true);

					$config = array(
						'to'=>array($model->email, $this->setting['email']),
						'subject'=>'MamaBear.co.id - Order '.$model->invoice_prefix.'-'.$model->invoice_no.'',
						'message'=>$mail,
					);
					// kirim email, matikan email pengiriman
					Common::mail($config); 
					

					// Yii::app()->user->setFlash('success',Tt::t('front', 'Data has been inserted'));

				    $transaction->commit();

					$this->redirect(array('/member/vieworder', 'nota'=>$model->invoice_prefix.'-'.$model->invoice_no));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
				}
			}
		}
		$user = MeMember::model()->findByPk($session['login_member']['id']);
		if ( ! isset($_POST['OrOrder'])) {
			$model->payment_first_name = $user->first_name;
			$model->payment_last_name = $user->last_name;
			// $model->payment_company = $user->company;
			$model->payment_address_1 = $user->address;
			// $model->payment_address_2 = $user->address_2;
			$model->payment_city = $user->city;
			$model->payment_postcode = $user->postcode;
			$model->payment_zone = $user->province;
			// $model->payment_country = $user->country;

			$model->shipping_first_name = $user->first_name;
			$model->shipping_last_name = $user->last_name;
			// $model->shipping_company = $user->company;
			$model->shipping_address_1 = $user->address;
			// $model->shipping_address_2 = $user->address_2;
			$model->shipping_city = $user->city;
			$model->shipping_district = $user->district;
			$model->shipping_postcode = $user->postcode;
			$model->shipping_zone = $user->province;
			// $model->shipping_country = $user->country;

			$model->phone = $user->hp;
		}

		$this->pageTitle = Tt::t('front', 'Detail Pemesanan').' - '.$this->pageTitle;
		$this->layout='//layouts/column1';
		$this->render('shipping', array(
			'data' => $data,
			'model' => $model,
			'user' => $user,
		));
	}

	public function actionPayment()
	{
		$session=new CHttpSession;
		$session->open();

		$order = $session['order'];

		$modelProduct = new Cart;

		$data = $modelProduct->viewCart($this->languageID);
		
		if (count($data) == 0)
			throw new CHttpException(404,'The requested page does not exist.');

		$model = new OrOrder;

		if(isset($_POST['OrOrder']))
		{
			$transaction=$model->dbConnection->beginTransaction();
			try
			{
				$user = MeMember::model()->findByPk($session['login_member']['id']);

				$model->attributes = $order;
				$model->delivery_price = $order['delivery_price'];

				$model->customer_id = $user->id;
				$model->customer_group_id = 0;
				$model->first_name = $user->first_name;
				$model->last_name = $user->last_name;
				$model->email  = $user->email;

				$model->invoice_no = rand(1000, 9999);
				$model->invoice_prefix = 'DV-'.date("Ymd");
				$model->date_add = date("Y-m-d H:i:s");
				$model->date_modif = date("Y-m-d H:i:s");
				$model->payment_method_id = $_POST['OrOrder']['payment_method'];

				$model->save();

				$orderDetail = array();
				$total = 0;
				foreach ($data as $key => $value) {
					if ($value['option'] != '') {
						$option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
						$value['price'] = $option->price;
					}
					$total = $total + $value['price']*$value['qty'];
					$berat = $berat + ($value['optional']['berat']*$value['qty']);

					$product = PrdProduct::model()->with('description')->find('t.id = :id AND description.language_id = :language_id', array(':id'=>$key, ':language_id'=>$this->languageID));
					$modelOrderDetail = new OrOrderProduct;
					$modelOrderDetail->order_id = $model->id;
					$modelOrderDetail->product_id = $product->id;
					$modelOrderDetail->image = $product->image;
					$modelOrderDetail->name = $product->description->name;
					$modelOrderDetail->kode = $product->kode;
					$modelOrderDetail->qty = $value['qty'];
					$modelOrderDetail->price = $value['price'];
					$modelOrderDetail->total = $value['qty']*$value['price'];
					$modelOrderDetail->attributes_id = $option->id_str;
					$modelOrderDetail->attributes_name = $option->attribute;
					$modelOrderDetail->attributes_price = $option->price;
					$modelOrderDetail->berat = $product->berat;
					$modelOrderDetail->save(false);
				}
				$model->tax = ($total+$model->delivery_price) / $this->setting['tax'];
				$model->total = $total;
				$model->delivery_weight = $berat;
				$model->save();
				
				// save history
				$modelHistory = new OrOrderHistory;
				$modelHistory->member_id = $user->id;
				$modelHistory->order_id = $model->id;
				$modelHistory->order_status_id = 1;
				$modelHistory->notify = '';
				$modelHistory->comment =  'Your order '.$model->invoice_prefix.'-'.$model->invoice_no.' successfully placed with status "Pending"';
				$modelHistory->date_add = date("Y-m-d H:i:s");
				$modelHistory->save(false);

				unset($session['cart']);
				unset($session['order']);

				$session['order_id'] = $model->id;

				Yii::app()->user->setFlash('success','Data has been inserted');

			    $transaction->commit();

			    $order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

			    $bank = Bank::model()->findAll();

				$mail = $this->renderPartial('//mail/cart', array(
					'model'=>$model,
					'order'=>$order,
					'bank'=>$bank,
				), true);
				// echo $mail;
				// exit;

				$config = array(
					'to'=>array($model->email, $this->setting['email'], 'marcos@dvcomputers.com.au', 'dvcomputers.website@outlook.com'),
					// 'to'=>array($model->email),
					'subject'=>'DV Computers – Order '.$model->invoice_prefix.'-'.$model->invoice_no.'',
					'message'=>$mail,
				);
				// kirim email
				// Common::mail($config);
				// if ($model->payment_method == 'kartu kredit') {
				// 	CreditCard::sendData(array(
				// 		'model'=>$model,
				// 		'order'=>$order,
				// 		'bank'=>$bank,
				// 	));
				// 	exit;
				// }

				$this->redirect(array('confirmation','id'=>$model->id));
			}
			catch(Exception $ce)
			{
				echo $ce;
				exit;
			    $transaction->rollback();
			}
		}


		$this->pageTitle = 'Payment - '.$this->pageTitle;
		$this->render('payment', array(
			'data' => $data,
			'model' => $model,
			'orderDetail' => $orderDetail,
		));
	}

	public function actionConfirmation()
	{
		$session=new CHttpSession;
		$session->open();

		$modelOrder = OrOrder::model()->findByPk($session['order_id']);

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		// jika menggunakan paypal
		if ($modelOrder->payment_method_id == 2) {
			$this->redirect(array('/paypal/pay', 'id'=>$modelOrder->id));
		}

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'Confirmation - '.$this->pageTitle;
		$this->render('confirmation', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
		));

	
	}

	public function actionDestroy()
	{
		$session=new CHttpSession;
		$session->open();

		unset($session['order']);
	
	}

	public function actionGetTo()
	{
		$to = Delivery::model()->findAll('`from` = :from', array(':from'=>$_POST['from']));
		$str = '';
		foreach ($to as $value) {
			$str .= '<option ="'.$value->to.'">'.$value->to.'</option>';
		}
		echo($str);

	
	}

	public function actionGetshippingprice()
	{
		$shipping_area = $_POST['shipping_area'];
		$express_ship = $_POST['check'];

		$modelProduct = new Cart;
		$data = $modelProduct->viewCart($this->languageID);
		$berat = 0;
		foreach ($data as $key => $value) {
			$berat = $berat + ($value['optional']['berat']*$value['qty']);
		}
		if ($express_ship == 1 AND $shipping_area < 7) {
			$shipping_area = $shipping_area + 3;
		}
		$deliveryPricePrice = ShpShippingPrice::model()->find('type = :type AND weight = :weight', array(':type'=>$shipping_area, ':weight'=>ceil($berat/1000)))->price;
		if ($deliveryPricePrice == '0') {
			echo 'Free Shipping';
		}else{
			echo(Cart::money($deliveryPricePrice));
		}
	}

	public function actionPricedelivery()
	{
		$deliveryPrice = Delivery::model()->find('`from` = :from AND `to` = :to', array(':from'=>$_POST['from'], ':to'=>$_POST['to']));
		echo $deliveryPrice->price;

	
	}

	/**
	 * Kartu kredit
	 */
	public function actionCreditcard()
	{
		//Contoh untuk menangani HTTP (POST) notifikasi yang dikirim Veritrans
		$json_result = file_get_contents('php://input');
		$result = (object)json_decode($json_result, true);
		error_log("Menerima notifikasi dari Veritrans: ");
		error_log($result->order_id);

		if($result->notification_key == "2507d2f0-a0c4-4e80-b23f-a0ab0f590323" ) {
			error_log("Read Daatabase");
			$model = Order::model()->find('nota = :nota', array(':nota'=>$result->order_id));
			error_log($model->nota);
			if($result->status_code == "200")
			{
				//OK, trancaction is success
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'success';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else if($result->status_code == "201")
			{
				//Pending, transaction is success but the processing has not been completed.
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'challenge';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else if($result->status_code == "202")
			{
				//Denied, request is success but transaction is denied by bank or Veritrans fraud detection system.
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'denied';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else
			{
				//error. You can see all the possibilities of the status_code and the explanation on the Veritrans Payment API Documentation
				error_log("Terjadi kesalahan. Status code: ".$result->status_code);
				$model->payment = 'gagal';
			}
			$model->save(false);

			$mail = $this->renderPartial('//mail/confirCC', array(
				'model'=>$model,
			), true);

			$config = array(
				'to'=>array($model->email, $this->setting['email'], 'dvcomputers.website@outlook.com'),
				// 'to'=>array($model->email),
				'subject'=>'Pembayaran Invoice Nomor '.$model->nota.' '.ucwords($model->payment),
				'message'=>$mail,
			);
			// kirim email
			Common::mail($config);
		}else{
			error_log("Terjadi kesalahan");
		}
	}
	public function actionRepeatcreditcard($nota)
	{

		$model = Order::model()->find('nota = :nota', array(':nota'=>$nota));

	    $order = OrderDetail::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

	    $bank = Bank::model()->findAll();
		if ($model->payment_method == 'kartu kredit') {
			CreditCard::sendData(array(
				'model'=>$model,
				'order'=>$order,
				'bank'=>$bank,
			));
		}
	}
	public function actionCcgagal()
	{ 
		$error = array(
			'code'=>'Transaksi '.$_GET['order_id'].' Batal',
			'message'=>'Transaksi untuk nomor transaksi '.$_GET['order_id'].' batal di lakukan',
		);

		$this->render('error',array(
			'error'=>$error,
		));		
		
	}
	public function actionCcerror()
	{

		$error = array(
			'code'=>'Transaksi '.$_GET['order_id'].' Gagal',
			'message'=>'Transaksi untuk nomor transaksi '.$_GET['order_id'].' gagal di lakukan',
		);

		$this->render('error',array(
			'error'=>$error,
		));		
		
	}
}