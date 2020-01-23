<?php

class MemberController extends Controller
{

	public function actionIndex()
	{
		$session = new CHttpSession;
		$session->open();
		if (isset($session['login_member'])) {
			$model = MeMember::model()->findByPk($session['login_member']['id']);
			if(isset($_POST['MeMember'])) {
				$pass = $model->pass;
				$model->attributes = $_POST['MeMember'];
				if ($_POST['MeMember']['passold'] != '') {
					$model->scenario = 'updatePass';
					$model->pass = sha1($model->pass);
					$model->pass2 = sha1($model->pass2);
				}else{
					$model->scenario = 'update';
					$model->pass = $pass;
				}
				if ($model->validate()) {
					if ($_POST['MeMember']['passold'] != '') {
						if (sha1($model->passold) != $pass) {
							$model->addError('passold',Tt::t('front', 'Password lama tidak valid'));
						}
					}
					if(!$model->hasErrors())
					{
						$model->save();
						$this->redirect(array('/member/index', 'lang'=>Yii::app()->language));
					}
				}
			}

			$model->pass = '';
			$model->pass2 = '';
			$model->passold = '';

			$criteria = new CDbCriteria;
			$criteria->addCondition('customer_id = :customer_id');
			$criteria->order = 'date_modif DESC';
			$criteria->params[':customer_id'] = $session['login_member']['id'];
			$order =  new CActiveDataProvider('OrOrder', array(
				'criteria'=>$criteria,
				'pagination'=>array(
			        'pageSize'=>5,
			    ),
			));
			$this->layout='//layouts/column1';
			$this->render('index2', array(
				'model'=>$model,
				'order'=>$order,
			));	
		}else{
			$model = new MeMember;
			$model->scenario = 'createMember';
			
			$modelLogin = new LoginForm2;

			if(isset($_POST['MeMember']))
			{
				$model->attributes = $_POST['MeMember'];

				if ($model->validate()) {
					$transaction=$model->dbConnection->beginTransaction();
					try
					{
						$model->aktif = 1;
						$pass = $model->pass;
						$model->pass = sha1($model->pass);
						$model->pass2 = sha1($model->pass2);
						$model->save();

						$transaction->commit();

						$mail = $this->renderPartial('//mail/register', array(
							'model'=>$model,
						), true);
						// echo $mail;
						// exit;

						$config = array(
							'to'=>array($model->email, $this->setting['email']),
							// 'to'=>array($model->email),
							'subject'=>'Hi '.$model->email.', Selamat datang di Mama Bear',
							'message'=>$mail,
						);
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success',Tt::t('front', 'Registration success'));
						$session['login_member'] = $model->attributes;
					    if ($_GET['ret']) {
							$this->redirect(urldecode($_GET['ret']));
					    }else{
							$this->redirect(array('index', 'lang'=>Yii::app()->language));
					    }
					}
					catch(Exception $ce)
					{
					    $transaction->rollback();
					}
				}
			}
			if(isset($_POST['LoginForm2']))
			{
				$modelLogin->attributes=$_POST['LoginForm2'];
				// validate user input and redirect to the previous page if valid
				if($modelLogin->validate()){
					$data = MeMember::model()->find('email = :email AND aktif = 1', array(':email'=>$modelLogin->username));
					$session['login_member'] = $data->attributes;
				    if ($_GET['ret']) {
						$this->redirect(urldecode($_GET['ret']));
				    }else{
						$this->redirect(array('index', 'lang'=>Yii::app()->language));
				    }
				}
			}
			

			// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
			// $this->layout='//layouts/home';
			$this->layout='//layouts/column1';
			$this->render('index', array(
				'model'=>$model,
				'modelLogin'=>$modelLogin,
				// 'modelDelivery'=>$modelDelivery,
			));	
		}
	}
	public function actionLogout()
	{
		$session = new CHttpSession;
		$session->open();
		unset($session['login_member']);
		$this->redirect(array('index', 'lang'=>Yii::app()->language));
	}

	public function actionVieworder($nota)
	{
		$session = new CHttpSession;
		$session->open();
		$modelOrder = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota AND customer_id  = :customer_id ', array(':nota'=>$nota, ':customer_id'=>$session['login_member']['id']));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'View Order - '. $this->pageTitle;
		$this->layout='//layouts/column1';
		// $this->renderPartial('/mail/cart2', array(
		// 	'data' => $data,
		// 	'modelOrder' => $modelOrder,
		// ));
		$bank = Bank::model()->findAll();
		
		$this->render('vieworder', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
			'bank' => $bank,
		));
	}

	public function actionPrint($nota)
	{
		$session = new CHttpSession;
		$session->open();
		$modelOrder = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota AND customer_id  = :customer_id ', array(':nota'=>$nota, ':customer_id'=>$session['login_member']['id']));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'View Order - '.$this->pageTitle;
		$this->layout='//layouts/column1';
		// $this->renderPartial('/mail/cart2', array(
		// 	'data' => $data,
		// 	'modelOrder' => $modelOrder,
		// ));
		$bank = Bank::model()->findAll();
		$this->renderPartial('invoice', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
			'bank' => $bank,
		));
	}

	public function actionForgot()
	{
		$modelLogin = new LoginForm2;

		if(isset($_POST['LoginForm2']))
		{
			$modelLogin->attributes=$_POST['LoginForm2'];
			// validate user input and redirect to the previous page if valid
			if ($modelLogin->username != '') {
				$hash = urlencode(base64_encode($modelLogin->username.'|'.rand(1000000,10000000)));
				$mail = $this->renderPartial('//mail/forgotpass', array(
					'hash'=>$hash,
					'email'=>$modelLogin->username,
				), true);
				// echo $mail;
				// exit;

				$config = array(
					'to'=>array($modelLogin->username),
					// 'to'=>array($model->email),
					'subject'=>'Mama Bear Forgot Password',
					'message'=>$mail,
				);
				// kirim email
				Common::mail($config);
				Yii::app()->user->setFlash('success',Tt::t('front', 'Please access your email to reset your password'));
				$this->redirect(array('index'));
			}
		}

		// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
		// $this->layout='//layouts/home';
		$this->layout='//layouts/column1';
		$this->render('forgot', array(
			'modelLogin'=>$modelLogin,
			// 'modelDelivery'=>$modelDelivery,
		));	
	}
	public function actionChangepass($hash)
	{
		$email = explode('|', base64_decode(urldecode($hash)));
		$email = $email[0];
		
		$model = MeMember::model()->find('email = :email', array(':email'=>$email));

		if(isset($_POST['MeMember'])) {
			$pass = $model->pass;
			$model->attributes = $_POST['MeMember'];
			if ($_POST['MeMember']['pass'] != '') {
				$model->scenario = 'updatePass';
				$model->pass = sha1($model->pass);
				$model->pass2 = sha1($model->pass2);
			}
			if ($model->validate()) {
				if(!$model->hasErrors())
				{
					$model->save();
					Yii::app()->user->setFlash('success',Tt::t('front', 'Your password has been changed , please login'));
					$this->redirect(array('index'));
				}
			}
		}
		$model->pass = '';
		$model->pass2 = '';

		// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
		// $this->layout='//layouts/home';
		$this->layout='//layouts/column1';
		$this->render('changepass', array(
			'model'=>$model,
			// 'modelDelivery'=>$modelDelivery,
		));	
	}

	public function actionGetkota($id)
	{
		// call from API
		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "http://pro.rajaongkir.com/api/city?province=".$id,
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 30,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		//     "key: d8c0793b1556781c7e835399f5cc599c"
		//   ),
		// ));
		// $response = curl_exec($curl);
		// $err = curl_error($curl);
		// curl_close($curl);

		$result = City::model()->findAll('province_id = :province_id', array(':province_id'=>$id));

		if (!$result) {
		  echo "cURL Error #:";
		} else {

			$data = array();
			foreach ($result as $key => $value) {
					$data[$value->id] = array(
						'city_name'=>$value->city_name,
						'province_name'=>$value->province,
						'province_id'=>$value->province_id,
					);
				}

			$str = '<option value="">'.Tt::t('front', 'Select Kota').'</option>';
			foreach ($data as $key => $value) {
				$str .= '<option value="'.$key.'">'.$value['city_name'].'</option>';
			}
			echo $str;
		}
	}

	public function actionGetkecamatan($id)
	{
		// call from API
		// $curl = curl_init();
		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=".$id,
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 30,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		//     "key: d8c0793b1556781c7e835399f5cc599c"
		//   ),
		// ));
		// $response = curl_exec($curl);
		// $err = curl_error($curl);
		// curl_close($curl);
		
		$result = Subdistrict::model()->findAll('city_id = :city_id', array(':city_id'=>$id));

		if (!$result) {
		  echo "cURL Error #:";
		} else {
			$data = array();
			foreach ($result as $key => $value) {
					$data[$value->id] = array(
						'subdistrict_name'=>$value->subdistrict_name,
						'city'=>$value->city,
						'city_id'=>$value->city_id,
					);
				}

			$str = '<option value="">'.Tt::t('front', 'Select Kecamatan').'</option>';
			foreach ($data as $key => $value) {
				$str .= '<option value="'.$key.'">'.$value['subdistrict_name'].'</option>';
			}
			echo $str;
		}
	}
	
	public function actionGetcost($id, $weight, $kurir)
	{
		$destination_type = 'subdistrict';

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=444&originType=city&destination=".$id."&destinationType=".$destination_type."&weight=".$weight."&courier=".$kurir,
			CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: d8c0793b1556781c7e835399f5cc599c"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		$str = '<option value="">'.Tt::t('front', 'Pilih Package').'</option>';
		$data=array();
		if ($err) {
			// echo "cURL Error #:" . $err;
		} else {
			$result = json_decode($response);
			// echo "<pre>".print_r($result); exit;
			foreach ($result->rajaongkir->results[0]->costs as $key => $value) {
				$data[$value->service] = array(
					'service'=>$value->service,
					'cost'=>$value->cost[0]->value,
					'etd'=>$value->cost[0]->etd,
				);
				$str .= '<option value="'.$value->service.'">'.$value->service.' | '.Cart::money($value->cost[0]->value).'</option>';
			}
		}
		echo json_encode(array(
			'html'=>$str,
			'data'=>$data,
		));
	}
}
