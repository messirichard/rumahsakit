<?php

class BlogController extends Controller
{

	public function actionIndex()
	{
		// $this->layout='//layouts/home';

		// $subMenu = array();
		// $menu = Blog::model()->getMenu($this->languageID);
		// $writer = Blog::model()->getWriter($this->languageID);

		// // convert to list item menu
		// $month = $_GET['month'];
		// $year = $_GET['year'];
		// // $listMenu = array();
		// // foreach ($menu as $key => $value) {
		// // 	foreach ($value as $k => $v) {
		// // 		$listMenu[] = array(
		// // 			'label'=>Yii::app()->locale->getMonthName($k).' '.$key,
		// // 			'month'=>$k,
		// // 			'year'=>$key,
		// // 		);
		// // 	}
		// // }
		// $categoryName = Product::model()->getCategoryName();

		// $konten = Blog::model()->getAllData(2, false, $this->languageID);

		// $amankan = $_GET;
		// unset($_GET);
		// $terbaru = Blog::model()->getAllData(6, false, $this->languageID);
		
		// $_GET = $amankan;

		// $this->pageTitle = 'Tips & Artikel - ' . $this->pageTitle;

		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		// Mengatur Order
		$criteria->order = 'date_input DESC';
		if ($_GET['category'] != '') {
			$criteria->addCondition('topik_id = '. abs((int) $_GET['category']) );
		}

		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$blog = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>12,
		    ),
		));

		$this->layout='//layouts/column2';
		$this->render('index', array(
			'data'=>$blog,
			// 'menu'=>$menu,
			// 'writer'=>$writer,
			// 'data'=> $konten,
			// 'subMenu'=>$subMenu,
			// 'terbaru'=>$terbaru,
		));
	}
	// public function actionDetail($id)
	public function actionDetail($id)
	{
		// $id
		// $this->layout='//layouts/home';

		// $detail = Blog::model()->getData($id, $this->languageID);

		// $subMenu = array();
		// $menu = Blog::model()->getMenu($this->languageID);

		// // convert to list item menu
		// $month = $_GET['month'];
		// $year = $_GET['year'];
		// // $listMenu = array();
		// // foreach ($menu as $key => $value) {
		// // 	foreach ($value as $k => $v) {
		// // 		$listMenu[] = array(
		// // 			'label'=>Yii::app()->locale->getMonthName($k).' '.$key,
		// // 			'month'=>$k,
		// // 			'year'=>$key,
		// // 		);
				
		// // 	}
		// // }

		// $categoryData = Category::model()->findByPk($detail->topik_id) ;
		// $categoryName = Product::model()->getCategoryName();

		// $amankan = $_GET;
		// unset($_GET);
		// $terbaru = Blog::model()->getAllData(6, false, $this->languageID);
		
		// $_GET = $amankan;

		// $this->pageTitle = $detail->title . ' | Galeri Fitness';

		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		// Mengatur Order
		$criteria->order = 'date_input DESC';

		$criteria->addCondition('active = "1"');
		$criteria->addCondition('t.id = :id');
		
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->params[':id'] = $id;

		$detail = Blog::model()->find($criteria);
		
		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		// Mengatur Order
		$criteria->order = 'date_input DESC';
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('t.id != :ids');
		
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':ids'] = $id;
		
		$criteria->params[':language_id'] = $this->languageID;
		$blog = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>4,
		    ),
		));

		$this->layout='//layouts/column2';
		$this->render('detail', array(
			'detail' => $detail,
			'blogs' => $blog,
			// 'menu'=>$menu,
			// 'data'=> $konten,
			// 'subMenu'=>$subMenu,
			// 'categoryData'=>$categoryData,
			// 'terbaru'=>$terbaru,
			// 'categoryName'=>$categoryName,
		));
	}

	public function actionList()
	{

		$this->layout='//layouts/home';

		// convert to list item menu
		$categoryName = Product::model()->getCategoryName();

		$konten = Blog::model()->getAllData(10, false, $this->languageID);

		$this->pageTitle = $konten['pageTitle'].' - ' . $this->pageTitle;
		if ($_GET['topik'] == 'topik-panduan-pemula') {
		$this->render('panduan', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}elseif($_GET['topik'] == 'topik-workout-list'){
		$this->render('workout', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}else{
		$this->render('list', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}
	}
	public function actionCalculator()
	{

		$this->layout='//layouts/home';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render('calculator', array(
		));
	}
	public function actionCalc($type)
	{
		switch ($type) {
			case 'bmi':
				$tampilan = 'calc-bmi';
				break;
			
			case 'bmr':
				$tampilan = 'calc-bmr';
				break;
			
			case 'kalori':
				$tampilan = 'calc-kalori';
				break;
			
			case 'minum':
				$tampilan = 'calc-minum';
				break;
			
			case 'nutrisi':
				$tampilan = 'calc-nutrisi';
				break;
			
			default:
				$tampilan = 'calc-bmi';
				break;
		}

		$this->layout='//layoutsAdmin/mainKosong';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render($tampilan, array(
		));
	}

	// public function actionPanduan()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Panduan Fitness untuk Pemula | ' . $this->pageTitle;
	// 	$this->render('panduan', array(
	// 	));
	// }
	// public function actionWorkout()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Workout List Fitness | ' . $this->pageTitle;
	// 	$this->render('workout', array(
	// 	));
	// }
}