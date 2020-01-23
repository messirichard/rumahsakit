<?php

class BlogController extends ControllerAdmin
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
		$model=new Blog;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new BlogDescription;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			$model->image = $session['upload_foto'][1];

			foreach ($_POST['BlogDescription'] as $j => $mod) {
	            if (isset($_POST['BlogDescription'][$j])) {
	                $modelDesc[$j]=new BlogDescription; // if you had static model only
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
			// print_r($image->name);
			// exit;

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/blog/'.$model->image);
					// $model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					$model->insert_by = Yii::app()->user->name;
					$model->last_update_by = Yii::app()->user->name;

					$model->save();

					foreach ($modelDesc as $key => $value) {
						$value->blog_id=$model->id;
						$value->save();
					}

					Log::createLog("Blog Controller Create $model->id");
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
			$modelDesc[$value->code] = Blog::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new BlogDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$image = $model->image;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['Blog'];//setting semua nilai
			$model->image = $image;//mengembalikan nama file

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['BlogDescription'] as $j => $mod) {
	            if (isset($_POST['BlogDescription'][$j])) {
	                $modelDesc[$j]=new BlogDescription; // if you had static model only
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

			// $model->image = $session['upload_foto_edit'][1];

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/blog/'.$model->image);
					}

					$model->date_update = date("Y-m-d H:i:s");
					$model->last_update_by = Yii::app()->user->name;

					$model->save();

					BlogDescription::model()->deleteAll('blog_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->blog_id=$model->id;
						$value->save();
					}

					Log::createLog("BlogController Update $model->id");
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
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Blog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Blog']))
			$model->attributes=$_GET['Blog'];

$categoryModel = new PrdCategory;
		$categoryModelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value){
			$categoryModelDesc[$value->code] = new PrdCategoryDescription;
		}

		if (isset($_POST['PrdCategoryDescription'])) {
			$categoryModel->attributes=$_POST['PrdCategory'];//setting semua nilai

			unset($categoryModelDesc);
			$valid=true;
			foreach ($_POST['PrdCategoryDescription'] as $j => $mod) {
	            if (isset($_POST['PrdCategoryDescription'][$j])) {
	                $categoryModelDesc[$j]=new PrdCategoryDescription;
	                $categoryModelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$categoryModelDesc[$j]->language_id = $lang->id;
	                $valid=$categoryModelDesc[$j]->validate() && $valid;
	            }
	        }
            if (isset($_POST['ajax']) && $_POST['ajax']==='category-form') {
				echo(json_encode(array(json_decode(CActiveForm::validate($categoryModel)), json_decode(CActiveForm::validateTabular($categoryModelDesc)))));
				Yii::app()->end();
            }
			if($categoryModel->validate() AND $valid){
				$transaction=$categoryModel->dbConnection->beginTransaction();
				try
				{
					$categoryModel->type = 'blog';
					$categoryModel->save();

					PrdCategoryDescription::model()->deleteAll('category_id = :id', array(':id'=>$categoryModel->id));
					foreach ($categoryModelDesc as $key => $value) {
						$value->category_id=$categoryModel->id;
						$value->save();
					}

					Log::createLog("Create Category $categoryModel->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}

		}

		$dataNestedCategory = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'type = :type',
					'params'=>array(
						':type'=>'blog',
					)
				)
			),
		), $this->languageID);

		$nestedCategory = PrdCategory::model()->nested($dataNestedCategory['data']);

		$json_result = file_get_contents('php://input');
		if ($json_result != '') {
			$result = json_decode($json_result, true);
			PrdCategory::model()->saveSortNested($result);
			Yii::app()->end();
		}

		$this->render('index',array(
			'model'=>$model,
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Blog::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
