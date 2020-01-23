<?php

class GalleryController extends ControllerAdmin
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
		$model=new Gallery;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new GalleryDescription;
		}

		$modelImage = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			$model->image = $session['upload_foto'][1];

			foreach ($_POST['GalleryDescription'] as $j => $mod) {
	            if (isset($_POST['GalleryDescription'][$j])) {
	                $modelDesc[$j]=new GalleryDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];
			// $model->date_input = date("Y-m-d H:i:s");

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$model->image);
					// $model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					$model->insert_by = Yii::app()->user->name;
					$model->last_update_by = Yii::app()->user->name;

					$model->save();

					foreach ($modelDesc as $key => $value) {
						$value->gallery_id=$model->id;
						$value->save();
					}

					if (count($_FILES['GalleryImage']['name']) > 0) {
						foreach ($_FILES['GalleryImage']['name'] as $key => $value) {
							$modelImage = new GalleryImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$modelImage->image);
								$modelImage->gallery_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					Log::createLog("Gallery Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
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
			'modelImage'=>$modelImage,
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
			$modelDesc[$value->code] = Gallery::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new GalleryDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		$modelImage = array();
		$modelImage = GalleryImage::model()->findAll('gallery_id = :id ORDER BY id', array(':id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$image = $model->image;//mengamankan nama file
			$image2 = $model->image2;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['Gallery'];//setting semua nilai
			$model->image = $image;//mengembalikan nama file
			$model->image2 = $image2;//mengembalikan nama file

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['GalleryDescription'] as $j => $mod) {
	            if (isset($_POST['GalleryDescription'][$j])) {
	                $modelDesc[$j]=new GalleryDescription; // if you had static model only
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
			$image2 = CUploadedFile::getInstance($model,'image2');
			if ($image2->name != '') {
				$model->image2 = substr(md5(time()),0,5).'-'.$image2->name;
			}

			// $model->image = $session['upload_foto_edit'][1];

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$model->image);
					}
					if ($image2->name != '') {
						$image2->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$model->image2);
					}

					$model->date_update = date("Y-m-d H:i:s");
					$model->last_update_by = Yii::app()->user->name;

					$model->save();

					GalleryDescription::model()->deleteAll('gallery_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->gallery_id=$model->id;
						$value->save();
					}

					GalleryImage::model()->deleteAll('gallery_id = :id', array(':id'=>$model->id));
					if (count($_POST['GalleryImage2']) > 0) {
						foreach ($_POST['GalleryImage2'] as $key => $value) {
							$modelImage = new GalleryImage;
							if ($value != '') {
								$modelImage->gallery_id = $model->id;
								$modelImage->image = $value;
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['GalleryImage']['name']) > 0) {
						foreach ($_FILES['GalleryImage']['name'] as $key => $value) {
							$modelImage = new GalleryImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/gallery/'.$modelImage->image);
								$modelImage->gallery_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}
					Log::createLog("GalleryController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
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
			'modelImage'=>$modelImage,
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
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
		$model=Gallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSetStatus($id, $type)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            $model->{$type} = ($model->{$type}-1)*-1;
            $model->save();
            echo json_decode($model->{$type});

        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
    
}
