<?php

class PromoOngkirController extends ControllerAdmin
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
			array('SystemLogin.filter.AuthFilter'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PromoOngkir;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PromoOngkir']))
		{
			$model->attributes=$_POST['PromoOngkir'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->date_input = date("Y-m-d H:i:s");
					$model->save();
					Log::createLog("PromoOngkirController Create $model->id");
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

		if(isset($_POST['PromoOngkir']))
		{
			$model->attributes=$_POST['PromoOngkir'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();

					if ($_POST['PromoOngkir']['id_product']) {
						if (count($_POST['PromoOngkir']['id_product']) > 0) {
							// clear product promo ongkir
							PromoOngkirProduct::model()->deleteAll('id_promo = :id', array(':id'=>$model->id));

							foreach ($_POST['PromoOngkir']['id_product'] as $key => $value) {
								$modelPromoP = new PromoOngkirProduct;
								$modelPromoP->id_product = $value;
								$modelPromoP->id_promo = $model->id;
								$modelPromoP->save(false);
							}
						}
					}

					Log::createLog("PromoOngkirController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update', 'id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$criteria=new CDbCriteria;
		$criteria->addCondition('status = "1"');
		$criteria->with = array('description');
		$criteria->select = 'description.name as name';
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = 2;
		$m_prd = PrdProduct::model()->findAll($criteria);

		$list_prd = CHtml::listData($m_prd, 'id', 'name');
		

		$this->render('update',array(
			'model'=>$model,
			'm_prd'=>$list_prd,
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
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new PromoOngkir('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PromoOngkir']))
			$model->attributes=$_GET['PromoOngkir'];

		$dataProvider=new CActiveDataProvider('PromoOngkir');
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
		$model=PromoOngkir::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='promo-ongkir-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
