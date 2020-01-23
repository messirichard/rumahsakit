<?php

class GrabController extends Controller
{

	public function actionIndex()
	{
		echo "";
		exit;
	}

	public function actionGetCity()
	{
		echo "has done";
		exit;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://pro.rajaongkir.com/api/city",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: d8c0793b1556781c7e835399f5cc599c"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		  	echo "cURL Error #:" . $err;
		} else {
			// get data results city
			$res_data = json_decode($response);

			$data = array();
			foreach ($res_data->rajaongkir->results as $key => $value) {
				$model = new City;
				$model->id = $value->city_id;
				$model->province_id = $value->province_id;
				$model->province = $value->province;
				$model->type = $value->type;
				$model->city_name = $value->city_name;
				$model->postal_code = $value->postal_code;
				$model->save(false);
			}

			echo "sukses input";
			exit;
		}
	}

	public function actionGetDistrict()
	{
		set_time_limit(0);
		$res_city = City::model()->findAll();
		foreach ($res_city as $key => $value) {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=".$value->id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: d8c0793b1556781c7e835399f5cc599c"
			  ),
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);

			if ($err) {
			  	echo "cURL Error #:" . $err;
			} else {
				// get data results city
				$res_data = json_decode($response);

				// $data = array();
				foreach ($res_data->rajaongkir->results as $key => $value) {
					$model = new Subdistrict;
					$model->id = $value->subdistrict_id;
	                $model->province_id = $value->province_id;
	                $model->province = $value->province;
	                $model->city_id = $value->city_id;
	                $model->city = $value->city;
	                $model->type = $value->type;
	                $model->subdistrict_name = $value->subdistrict_name;
					$model->save(false);
				}
			}	
		}
		echo "sukses input"; 
		exit;
		// end District
	}

}

