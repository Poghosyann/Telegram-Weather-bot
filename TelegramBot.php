<?php
	
	use GuzzleHttp\Client;
	
	class TelegramBot {
	protected $token = "506875017:AAEy2KMNWtz6MENYjsLNS21Xqh2Yn_CXBgs";
	protected $updateId;
	protected function query($method, $params = []){
		
		$url = "https://api.telegram.org/bot";
		$url .= $this->token;
		$url .= "/" . $method;

		if(!empty($params)){
			$url .= "?" . http_build_query($params);
		}

		$client = new Client([
			'baseUrl' => $url
		]);

		$resault = $client->request('GET');

		return json_decode($resault->getBody());
	}

	public function getUpdates(){
		$response = $this->query('getUpdates', [
			'offset' => $this->updateId + 1
		]);

		if (!empty($response->resault)) {
			$this->updateId = $response->resault[count($response->resault) - 1]->update_id;
		}

		return $response->resault;
	}

	public function sendMessage($chat_id, $text){
		$response = $this->query('sendMessage', [
			'text' => $text,
			'chat_id' => $chat_id
		]);

		return $response;
	}
}