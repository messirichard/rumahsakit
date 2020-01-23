<?php

class OrderController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('SystemLogin.filter.AuthFilter', 'params'=>array(
				'actionAllowOnLogin'=>array('edit'),
			)),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view','create','update', 'confirmPrint'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['User'];
			$model->image = $image;//mengembalikan nama file

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->pass = sha1($model->pass);

					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
					}

					$model->save();
					Log::createLog("GroupController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['User'];
			$model->pass = $pass;

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			if ($model->validate()) {
				if ($_POST['User']['pass']!='') {
					$model->pass = sha1($_POST['User']['pass']);
				}

				if ($image->name != '') {
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
				}

				$model->save();
				Yii::app()->user->setFlash('success',Tt::t('admin', 'Data Edited'));
				Log::createLog("User Update $model->id $model->email");
				$this->redirect(array('index'));
			}
		}
		
		$model->pass = '';
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEdit()
	{
		$model=User::model()->find('email = :email', array(':email'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'updatepass';
		if(isset($_POST['User']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['User'];
			// $model->pass = $pass;
			if ($model->validate()) {
				//cek password lama
				if (sha1($_POST['User']['passold'])==$pass AND $_POST['User']['pass']==$_POST['User']['passconf']) {
					$model->pass = sha1($_POST['User']['pass']);
					$model->save();
					Log::createLog("User Update Pass $model->id $model->email");
					$this->redirect(array('edit'));
				} else {
					$model->addError('pass','Incorrect password.');
				}
			}
		}
		$model->pass = '';
		$this->render('edit',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// we only allow deletion via POST request
		$data = $this->loadModel($id);
		Log::createLog("User Delete $data->email $data->id");
		OrOrderHistory::model()->deleteAll('order_id = :order_id', array(':order_id'=>$data->id));
		OrOrderProduct::model()->deleteAll('order_id = :order_id', array(':order_id'=>$data->id));
		$data->delete();

		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new OrOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrOrder']))
			$model->attributes=$_GET['OrOrder'];
		$_GET['OrOrder_sort'] = 'id.desc';

		if ($_GET['OrOrder']['print_ship'] == 1 AND $_GET['OrOrder']['date_add'] != '' AND $_GET['OrOrder']['order_status_id'] != '') {
			// $c_limit = ($_GET['OrOrder']['jml_print_ship'] != '')? $_GET['OrOrder']['jml_print_ship']: 0;
			// 'limit'=> $c_limit,
			$c_order_status = ($_GET['OrOrder']['order_status_id'] != '')? $_GET['OrOrder']['order_status_id']: 0;
			$this->redirect(array('/SystemLogin/order/confirmPrint', 'tanggal'=> $_GET['OrOrder']['date_add'], 'order_status' => $c_order_status));
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionConfirmPrint($tanggal, $order_status)
	{
		$model=new OrOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrOrder']))
			$model->attributes=$_GET['OrOrder'];
			$_GET['OrOrder_sort'] = 'id.desc';

			// filter data
			// $model->date_add = $tanggal;
			// $model->order_status_id = $order_status;
		// $limits = false;
		$searchresult = Yii::app()->db->createCommand()
                ->select('p.id, p.invoice_prefix, p.invoice_no, p.date_add, p.email, p.first_name, p.order_status_id, p.grand_total')
                ->from('or_order p')
                ->where('DATE(p.date_add)=:date_add AND p.order_status_id=:status_id', array(':date_add'=>$tanggal, ':status_id'=> $order_status))
                // ->limit($limits)
                ->queryAll();
        $dataProvider=new CArrayDataProvider($searchresult);

		// checking if process Print
		if ($_GET['OrOrder']['print_ship'] == 1 AND $_GET['OrOrder']['date_add'] != '' AND $_GET['OrOrder']['order_status_id'] != '') {
			// $c_limit = ($_GET['OrOrder']['jml_print_ship'] != '')? $_GET['OrOrder']['jml_print_ship']: 0;
			// 'limit'=> $c_limit,
			$c_order_status = ($_GET['OrOrder']['order_status_id'] != '')? $_GET['OrOrder']['order_status_id']: 0;
			$this->redirect(array('/SystemLogin/order/printShipping', 'tanggal'=> $_GET['OrOrder']['date_add'], 'order_status' => $c_order_status));
		}

		$this->render('confirm_print',array(
			'dataProvider' => $dataProvider,
			// 'model'=>$model,
		));
	}

	public function actionDetail()
	{
		if ($_GET['nota'] != '') {
			$model = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota', array(':nota'=>$_GET['nota']));
		}
		if ($_GET['id'] != '') {
			$id = $_GET['id'];
			$model = OrOrder::model()->findByPk($id);
		}
		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

		if(isset($_POST['OrOrder']))
		{
			$order_id = $model->order_status_id;
			$model->attributes=$_POST['OrOrder'];
			// $model->pass = $pass;
			if ($model->validate()) {
				if ($order_id == $model->order_status_id) {
					$model->addError('order_status_id','Status order sama dengan sebelumnya');
				}else{
					// $model->comment = 
					$model->save(false);
					// save history
					// $modelHistory = new OrOrderHistory;
					// $modelHistory->member_id = $model->customer_id;
					// $modelHistory->order_id = $model->id;
					// $modelHistory->order_status_id = $model->order_status_id;
					// $modelHistory->notify = '';
					// $modelHistory->comment = $model->comment;
					// $modelHistory->date_add = date("Y-m-d H:i:s");
					// $modelHistory->save(false);
					// $this->refresh();
				}
			}
		}

		$this->render('detail',array(
			'model'=>$model,
			'data'=>$data,
		));
	}

	public function actionResi($date = '', $status = '')
	{
		if ($date == '') {
			$date = date('Y-m-d');
		}
		if ($status == '') {
			$status = false;
		}

		$criteria = new CDbCriteria;
		$criteria->order = 'date_add DESC';
		$criteria->addCondition('DATE_FORMAT(date_add,"%Y-%m-%d") = :date_add');
		$criteria->params[':date_add'] = $date;
		if ($status) {
			$criteria->addCondition('order_status_id = :status_id');
			$criteria->params[':status_id'] = intval($status);
		}
		$model= OrOrder::model()->findAll($criteria);

		if (isset($_POST['Resi'])) {
			foreach ($_POST['Resi'] as $key => $value) {
				$data = OrOrder::model()->findByPk($key);
				if ($data != null && $value != '') {
					if ($value != $data->tracking_id) {
						$data->order_status_id = 3;
						$data->tracking_id = $value;
						$data->save(false);

					    $order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));
					    
						$mail = $this->renderPartial('//mail/resi', array(
							'data' => $order,
							'modelOrder' => $data,
						), true);

						$config = array(
							'to'=>array($data->email),
							// 'to'=>array($model->email),
							'subject'=>'Mama Bear Kode Pengiriman '.$data->invoice_prefix.'-'.$data->invoice_no.'',
							'message'=>$mail,
						);
						// kirim email
						Common::mail($config);

					}
				}
			}
			$this->refresh();
		}

		$this->render('resi',array(
			'model'=>$model,
			'date'=>$date,
		));
	}

	public function actionPrint($nota)
	{
		$modelOrder = OrOrder::model()->find('CONCAT(`invoice_prefix`, "-", `invoice_no`) = :nota', array(':nota'=>$nota));

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
		$this->renderPartial('print', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
			'bank' => $bank,
		));
	}
	
	public function actionPrintShipping()
	{

		// get all order_id
		$tanggal_add = $_POST['tanggal'];
		// $limits = $_POST['limit'];
		$c_order_status = isset($_POST['order_status'])? $_POST['order_status']: '';
		// $id_ords = implode("','",$_POST['checkOrder']);
		// $id_ords2 = (string) "'".$id_ords."'";

		$dataProvider=new CActiveDataProvider('OrOrder', array(
		    'criteria'=>array(
		        'condition'=>'DATE(`t`.`date_add`)=:date_add AND `t`.`order_status_id` = :status_id',
		        'params' => array(':date_add' => $tanggal_add, ':status_id' => $c_order_status),
		        'order' => 't.id DESC',
		        // 'limit' => $limits,
		    ),
		));
		if ($_POST['checkOrder']) {
			$nums = array();
			foreach ($_POST['checkOrder'] as $key => $val_post) {
				$nums[] = $val_post;
			}
			$dataProvider->criteria->addInCondition('t.id', $nums); 
		}

		$dataProvider->setPagination(false);
		$order = ($dataProvider->getData());

		$addr_office = $this->setting['alamat_kantor'];
		
		$this->renderPartial('print_shipping', array(
			'model' => $order,
			'alamat_kantor' => $addr_office,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=OrOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
