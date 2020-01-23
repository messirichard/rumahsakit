<?php

class SlideController extends ControllerAdmin
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
			array('SystemLogin.filter.AuthFilter', 
				'params'=>array(
					'actionAllowOnLogin'=>array('upload'),
				)
			),
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
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
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
		$model=new Slide;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new SlideDescription;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slide']))
		{
			$model->attributes=$_POST['Slide'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			$model->image = $session['upload_foto'][1];

			foreach ($_POST['SlideDescription'] as $j => $mod) {
	            if (isset($_POST['SlideDescription'][$j])) {
	                $modelDesc[$j]=new SlideDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			// $model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];
			$model->date_input = date("Y-m-d H:i:s");

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;
			
			// $image2 = CUploadedFile::getInstance($model,'image2');
			// $model->image2 = substr(md5(time()),0,5).'-'.$image2->name;

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image);
					// $image2->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image2);

					// $model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					$model->insert_by = Yii::app()->user->name;
					$model->last_update_by = Yii::app()->user->name;

					$count = Slide::model()->count();
					$model->sort = $count+1;

					$model->save();

					foreach ($modelDesc as $key => $value) {
						$value->slide_id=$model->id;
						$value->save();
					}

					Log::createLog("Slide Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					// $this->redirect(array('update','id'=>$model->id));
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		if ($model->writer == '') {
			$dataLogin = User::model()->getDataLogin();
			$model->writer = $dataLogin['initial'];
		}
		if ($model->date_input == '') {
			$model->date_input = date('Y-m-d H:i:s');
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
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
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = Slide::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new SlideDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slide']))
		{
			$image = $model->image;//mengamankan nama file
			// $image2 = $model->image2;
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['Slide'];//setting semua nilai
			$model->image = $image;//mengembalikan nama file
			// $model->image2 = $image2;

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['SlideDescription'] as $j => $mod) {
	            if (isset($_POST['SlideDescription'][$j])) {
	                $modelDesc[$j]=new SlideDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}
			// $image2 = CUploadedFile::getInstance($model,'image2');
			// if ($image2->name != '') {
			// 	$model->image2 = substr(md5(time()),0,5).'-'.$image2->name;
			// }

			// $model->image = $session['upload_foto_edit'][1];

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image);
					}
					// if ($image2->name != '') {
					// 	$image2->saveAs(Yii::getPathOfAlias('webroot').'/images/slide/'.$model->image2);
					// }

					$model->date_update = date("Y-m-d H:i:s");
					$model->last_update_by = Yii::app()->user->name;

					$model->save();

					SlideDescription::model()->deleteAll('slide_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->slide_id=$model->id;
						$value->save();
					}

					Log::createLog("SlideController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					// $this->redirect(array('update','id'=>$model->id));
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			SlideDescription::model()->deleteAll('slide_id = :id', array(':id'=>$id));
			
			SortOrder::sortUlang('Slide');
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Slide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slide']))
			$model->attributes=$_GET['Slide'];

		$dataProvider=new CActiveDataProvider('Slide');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}
	
	public function actionSort()
	{
		SortOrder::sortTo($_GET['id'], $_GET['to'], 'Slide');
		$this->redirect(array('index'));//redirect ke view
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Slide::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='slide-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
