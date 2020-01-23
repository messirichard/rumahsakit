<?php

class TripController extends ControllerAdmin
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
				'actions'=>array('admin','delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Trips;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Trips']))
		{
			$model->attributes=$_POST['Trips'];

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
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

		if(isset($_POST['Trips']))
		{
			$model->attributes=$_POST['Trips'];

			if ($model->validate()) {
				$model->save();
				Yii::app()->user->setFlash('success',Tt::t('admin', 'Data Edited'));
				Log::createLog("Trips Update $model->id");
				$this->redirect(array('index'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEdit()
	{
		$model=Trips::model()->find('email = :email', array(':email'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'updatepass';
		if(isset($_POST['Trips']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['Trips'];
			// $model->pass = $pass;
			if ($model->validate()) {
				//cek password lama
				if (sha1($_POST['Trips']['passold'])==$pass AND $_POST['Trips']['pass']==$_POST['Trips']['passconf']) {
					$model->pass = sha1($_POST['Trips']['pass']);
					$model->passconf = sha1($_POST['Trips']['passconf']);
					$model->save();
					Log::createLog("Trips Update Pass $model->id $model->email");
					Yii::app()->user->setFlash('success','Password has been change');
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

	public function actionAccess($id)
	{
		$model=$this->loadModel($id);
		$model2=new AuthRole;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$auth=Yii::app()->authManager;
		if(isset($_POST['AuthRole']))
		{
			$model2->attributes=$_POST['AuthRole'];
			if ($model2->validate()) {
				$dataAuth = $auth->getAuthItems('2', $model->user);
				foreach ($dataAuth as $key => $value) {
					$auth->revoke($value->name, $model->user);
				}
				$auth->assign($model2->name, $model->user);
				Log::createLog("Trips Update Access $model->id $model->user");
				$this->redirect(array('access','id'=>$model->id));
			}
		}
		$dataAuth = $auth->getAuthItems('2', $model->user);
		$model2->name = $dataAuth[0];
		foreach ($dataAuth as $key => $value) {
			$model2->name =  $value->name;
		}
		$this->render('access',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
			$data = $this->loadModel($id);
			Log::createLog("Trips Delete $data->id");
			$data->delete();
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataTrip = Trips::model()->findAll();
		$data = array();
		foreach ($dataTrip as $key => $value) {
			$data[$value->year][$value->month][] = array(
				'id'=>$value->id,
				'trip'=>$value->trip,
				'awal'=>$value->awal,
				'akhir'=>$value->akhir,
			);
		}
		// print_r($data);
		// exit;
		$this->render('index',array(
			'data'=>$data,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Trips('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trips']))
			$model->attributes=$_GET['Trips'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Trips::model()->findByPk($id);
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
