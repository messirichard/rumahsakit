<?php

class GalleryController extends Controller
{

	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		if ($_GET['category'] != '') {
			$criteria->addCondition('t.topik_id = :category');
			$criteria->params[':category'] = $_GET['category'];
		}
		if ($_GET['q'] != '') {
			$criteria->addCondition('t.title LIKE :q OR t.content LIKE :q OR t.sub_title LIKE :q');
			$criteria->params[':q'] = '%'.$_GET['q'].'%';
		}
		$criteria->order = 'date_input DESC';
		$gallery = new CActiveDataProvider('ViewGallery', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>6,
		    ),
		));
		$this->layout='//layouts/column1';
		$this->render('index', array(
			'gallery'=>$gallery,
		));
	}

	public function actionDetail($id)
	{
		$data = ViewGallery::model()->find('id = :id', array(':id'=>$id));
		$this->layout='//layouts/column1';
		$this->render('detail', array(
			'data'=>$data,
		));
	}

	

}

