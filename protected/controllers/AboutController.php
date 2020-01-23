<?php

class AboutController extends Controller
{

	public function actionIndex()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$data = array(
			'title'=>$this->setting['about_whoweare_title'],
			'content'=>$this->setting['about_whoweare_content'],
			);

		$this->render('index', array(	
			'data' => $data,
		));
	}

	public function actionWho_we_are()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		// $this->layout='//layouts/column1';
		$this->layout=false;

		$data = array(
			'title'=>$this->setting['about_whoweare_title'],
			'content'=>$this->setting['about_whoweare_content'],
			);

		// header('Content-type: application/json');
		// echo json_encode(
		// 		array(
		// 			'status'=>200,
		// 			'msg'=>'',
		// 			'data'=>$data,
		// 		)
		// 	);
		$this->renderPartial('ajaxContent', array('data'=>$data), false, true);
	}

	public function actionOurteam()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		// $this->layout='//layouts/column1';

		$data = array(
			'title'=>$this->setting['about_ourteam_title'],
			'content'=>$this->setting['about_ourteam_content'],
			);

		$this->renderPartial('ajaxContent', array('data'=>$data), false, true);
	}

	public function actionVisimisi()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		// $this->layout='//layouts/column1';

		// $this->render('visimisi', array(	
		// ));
		$data = array(
			'title'=>$this->setting['about_visimisi_title'],
			'content'=>$this->setting['about_visimisi_content'],
			);

		$this->renderPartial('ajaxContent', array('data'=>$data), false, true);
	}

	public function actionWorkwithus()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		// $this->layout='//layouts/column1';

		// $this->render('workwithus', array(	
		// ));
		$data = array(
			'title'=>$this->setting['about_workwithus_title'],
			'content'=>$this->setting['about_workwithus_content'],
			);

		$this->renderPartial('ajaxContent', array('data'=>$data), false, true);
	}

}

