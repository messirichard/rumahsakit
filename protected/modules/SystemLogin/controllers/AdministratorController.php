<?php

class AdministratorController extends ControllerAdmin
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
					$model->type = 'root';
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
				$model->type = 'root';
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
					$model->passconf = sha1($_POST['User']['passconf']);
					$model->save();
					Log::createLog("User Update Pass $model->id $model->email");
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
				Log::createLog("User Update Access $model->id $model->user");
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
			Log::createLog("User Delete $data->email $data->id");
			$data->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$model2=new Group('search');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Group']))
			$model2->attributes=$_GET['Group'];

		$this->render('index',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
