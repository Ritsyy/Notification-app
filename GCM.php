<?php

class GCM{

	function __construct(){

	}

	public function send_notification($registeration_ids, $message){
		include_once './config.php';

		$url = 'https://android.googleapis.com/gcm/send';

		$fields= array(
			'registeration_ids' => $registeration_ids;
			'data' => $message;
			);
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		$result = curl_exec($ch);

		if ($result === FALSE ){
			die('Curl failed:' . curl_error($ch));
		}
		 curl_close($ch);
		 echo $result;
	}
}
?>