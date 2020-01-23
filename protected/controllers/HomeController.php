<?php

class HomeController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	public function actionTestmail()
	{
		// test email
		$this->layout = '//layouts/_blank';

		$model = OrOrder::model()->findByPk(12);
		// get or_order testing
		$order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));
	    $bank = Bank::model()->findAll();
	    
		$mail = $this->renderPartial('//mail/cart2', array(
			'bank'=>$bank,
			'data' => $order,
			'modelOrder' => $model,
		), true);
		
		echo $mail;
		exit;
	}

	public function actionDummy()
	{
		Dummy::createDummyProduct();
		echo '<META http-equiv="refresh" content="0;URL=http://localhost/dv-computers/home/dummy">';
	}
	public function actionCroncategory()
	{
		$data = PrdProduct::model()->findAll();
		foreach ($data as $key => $value) {
			$tag = PrdCategory::model()->getBreadcrump($value->category_id, $this->languageID);
			$dataTag = array();
			foreach ($tag as $k => $v) {
				$dataTag[] = $k;
			}
			$value->tag = implode(', ', $dataTag);
			$value->save();
		}
	}

	public function actionIndex()
	{
		// $criteria = new CDbCriteria;
		// $criteria->with = array('description');
		// $criteria->addCondition('status = "1"');
		// $criteria->addCondition('description.language_id = :language_id');
		// $criteria->params[':language_id'] = $this->languageID;
		// $criteria->order = 'date_input DESC';
		// $_GET['category'] = 0;
		// if ($_GET['category'] != '') {
		// 	$criteria->addCondition('t.category_id = :category');
		// 	$criteria->params[':category'] = $_GET['category'];
		// }
		// $product = new CActiveDataProvider('PrdProduct', array(
		// 	'criteria'=>$criteria,
		//     'pagination'=>array(
		//         'pageSize'=>8,
		//     ),
		// ));

		$this->pageTitle = ($this->setting['home_meta_title'] != '')? $this->setting['home_meta_title'] : $this->pageTitle;
		$this->metaKey = ($this->setting['home_meta_keyword'] != '')? $this->setting['home_meta_keyword'] : $this->metaKey;
		$this->metaDesc = ($this->setting['home_meta_description'] != '')? $this->setting['home_meta_description'] : $this->metaDesc;

		$this->layout='//layouts/column1';
		$this->render('index', array(
			// 'product'=>$product,
		));
	}

	public function actionAbout()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'About Amari - '.$this->pageTitle;

		$this->pageTitle = ($this->setting['about_meta_title'] != '')? $this->setting['about_meta_title'] : $this->pageTitle;
		$this->metaKey = ($this->setting['about_meta_keyword'] != '')? $this->setting['about_meta_keyword'] : $this->metaKey;
		$this->metaDesc = ($this->setting['about_meta_description'] != '')? $this->setting['about_meta_description'] : $this->metaDesc;

		$this->render('about', array(
		));
	}

	public function actionProducts()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Product & Accessories - '.$this->pageTitle;

		$criteria = new CDbCriteria;
		$criteria->with = array('description', 'alternateImage');
		$criteria->order = 'date ASC';
		$criteria->addCondition('t.status = "1"');
		$data = PrdProduct::model()->findAll($criteria);

		$this->pageTitle = ($this->setting['product_meta_title'] != '')? $this->setting['product_meta_title'] : $this->pageTitle;
		$this->metaKey = ($this->setting['product_meta_keyword'] != '')? $this->setting['product_meta_keyword'] : $this->metaKey;
		$this->metaDesc = ($this->setting['product_meta_description'] != '')? $this->setting['product_meta_description'] : $this->metaDesc;

		$this->render('products', array(
			'data' => $data,
		));
	}

	public function actionApplication()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Applications - '.$this->pageTitle;

		$this->pageTitle = ($this->setting['application_meta_title'] != '')? $this->setting['application_meta_title'] : $this->pageTitle;
		$this->metaKey = ($this->setting['application_meta_keyword'] != '')? $this->setting['application_meta_keyword'] : $this->metaKey;
		$this->metaDesc = ($this->setting['application_meta_description'] != '')? $this->setting['application_meta_description'] : $this->metaDesc;

		$this->render('application', array(
			'data' => $data,
		));
	}

	public function actionInstallation()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Installation - '.$this->pageTitle;

		// $criteria = new CDbCriteria;
		// $criteria->order = 'sorting ASC';
		// $data = Sertifikat::model()->findAll($criteria);

		$this->pageTitle = ($this->setting['install_meta_title'] != '')? $this->setting['install_meta_title'] : $this->pageTitle;
		$this->metaKey = ($this->setting['install_meta_keyword'] != '')? $this->setting['install_meta_keyword'] : $this->metaKey;
		$this->metaDesc = ($this->setting['install_meta_description'] != '')? $this->setting['install_meta_description'] : $this->metaDesc;

		$this->render('installation', array(
			// 'data' => $data,
		));
	}

	public function actionLayanan()
	{
		$this->pageTitle = 'Layanan - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('layanan', array(
			'model'=>$model,	
		));
	}

	public function actionPerawat()
	{
		$this->pageTitle = 'Perawat - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('perawat', array(
			'model'=>$model,	
		));
	}

	public function actionArtikel()
	{
		$this->pageTitle = 'Artikel - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('artikel', array(
			'model'=>$model,	
		));
	}

	public function actionContact()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Contact Us'.' - '.$this->pageTitle;

		$model = new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			$status = true;
	        $secret_key = "6LeoESkUAAAAALvt2dGt0u_XsurphVpIWAwk8nnT";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	        	$model->addError('email', Tt::t('front', 'You must complete the captcha first.'));
	        	$status = false;
	        }

			if ($status AND $model->validate()) {
				// $model->save();

				$mail = $this->renderPartial('//mail/contact', array(
					'model'=>$model,
				), true);

				$config = array(
					'to'=>array($this->setting['email'], $model->email),
					'bcc'=>array('info@fotocopysurabaya.web.id'),
					'subject'=>'Hello, New Contact AmariUpvc.com from '. $model->email,
					'message'=>$mail,
				);
				// echo "<pre>";
				// print_r($config);
				// echo "</pre>";
				// exit;
				
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success',Tt::t('front', 'Thank you for sending contacting form.'));
				$this->redirect(array('contact'));
			}
		}

		// $this->pageTitle = ($this->setting['contact_meta_title'] != '')? $this->setting['contact_meta_title'] : $this->pageTitle;
		// $this->metaKey = ($this->setting['contact_meta_keyword'] != '')? $this->setting['contact_meta_keyword'] : $this->metaKey;
		// $this->metaDesc = ($this->setting['contact_meta_description'] != '')? $this->setting['contact_meta_description'] : $this->metaDesc;

		// $criteria = new CDbCriteria;
		// $criteria->order = 'sorting ASC';
		// $data = MemberCompany::model()->findAll($criteria);
		
		$this->render('contact', array(
			'model'=>$model,
			// 'data'=>$data,
		));
	}


	public function actionEnquire()
	{
		$this->layout='//layouts/column2';
		$model = new Enquire;
		if(isset($_POST['Enquire']))
		{
			$model->attributes=$_POST['Enquire'];

			$status = true;
	        $secret_key = "6LeoESkUAAAAALvt2dGt0u_XsurphVpIWAwk8nnT";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	        	$model->addError('email', Tt::t('front', 'You must complete the captcha first.'));
	        	$status = false;
	        }

			if ($status AND $model->validate()) {
				// $model->save();

				$mail = $this->renderPartial('//mail/enquire', array(
					'model'=>$model,
				), true);

				$config = array(
					'to'=>array($this->setting['email'], $model->email),
					'bcc'=>array('info@fotocopysurabaya.web.id'),
					'subject'=>'Enquire Amariupvc.com from '. $model->email,
					'message'=>$mail,
				);
				// echo "<pre>";
				// echo print_r($config);
				// echo "</pre>";
				// exit;

				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success',Tt::t('front', 'Thank you for sending contacting form.'));
				$this->redirect(array('contact'));
			}
		}
		exit;
	}


	public function actionError()
	{
		$this->layout = '//layouts/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->layout='//layouts/column1';

				$this->pageTitle = 'Error '.$error['code'].': '. $error['message'] .' - '.$this->pageTitle;
				$this->render('error', array(
					'error'=>$error,
				));
			}
		}

	}

}