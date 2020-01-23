<?php

class StaticController extends ControllerAdmin
{
	public $layout='//layoutsAdmin/column2';

	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('SystemLogin.filter.AuthFilter'),
		);
	}

	public function actionHome()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('home',array(
			'model'=>$model,
		));
	}

	public function actionAbout()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('about',array(
			'model'=>$model,
		));
	}

	public function actionProduct()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('product',array(
			'model'=>$model,
		));
	}

	public function actionApplication()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('application',array(
			'model'=>$model,
		));
	}

	public function actionInstall()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('install',array(
			'model'=>$model,
		));
	}
	
	public function actionContact()
	{
		$model = Setting::model()->getModelSetting('data');

		$model = $this->loadData($model);

		$this->render('contact',array(
			'model'=>$model,
		));
	}

	public function loadData($model='')
	{
		if(isset($_POST['Setting']) OR isset($_FILES['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					if (count($setting) > 0) {
						foreach ($setting as $key => $value) {
							if ( ! is_array($value)) {
								$modelSetting = Setting::model()->getSettingByName($key);
								$modelSetting->value = $value;
								$modelSetting->save();
							}else{
								foreach ($value as $k => $v) {
									$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
									if ($modelSetting==null) {
										$modelSetting = new SettingDescription;
										$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
										$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
										$modelSetting->setting_id = $setting_id;
										$modelSetting->language_id = $language_id;
									}
									$modelSetting->value = $v;
									$modelSetting->save();
								}
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				    echo $ce;
			exit;
				}
			}
		}

		return $model;
	}


}
