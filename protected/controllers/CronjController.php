<?php 

/**
* View Cronjob Uniq Transfer
*/
// class AboutController extends Controller
class CronjController extends Controller
{
	
	public function actionIndex()
	{
		// call cronjobs reset uniq Transfer
		$uniq_transfer = UniqTransfer::model()->findByPk(1);
		$uniq_transfer->number = 0;
		$uniq_transfer->date_reset = date("Y-m-d H:i:s");
		$uniq_transfer->save(false);

		echo "sukses CronJob Controller";
		exit(0);
	}

	public function actionOngkircheck()
	{
		$this->layout='//layouts/_blank';

		$id_n = intval(1);
		$data = Yii::app()->db->createCommand()
		    ->select('*')
		    ->from('tb_promo_ongkir u')
		    ->where('id=:id AND status = 0', array(':id'=>$id_n))
		    ->queryRow();
		 
		// $data = (object) $data;
		if (isset($data) AND $data !== false) {
			$tanggal_sistem = date("Y-m-d");
			$tanggal_lock1 = $data['date_end'];

			$tg_sistem = explode('-', $tanggal_sistem);
		    $till = explode('-', $tanggal_lock1);
		    $tg_sistem = gregoriantojd($tg_sistem[1], $tg_sistem[2], $tg_sistem[0]);
		    $till = gregoriantojd($till[1], $till[2], $till[0]);

	    	$days = ($till - $tg_sistem);
	    	// jika hasil 0 / -1 -> lock 1
	    	if ($days <= 0) {
		    	$gPromod = PromoOngkir::model()->find('id = :id AND status = 1', array(':id'=>$id_n));
		    	$gPromod->status = 0;
		    	$gPromod->save(false);
	    	}
		}

    	exit;
	}

}

?>