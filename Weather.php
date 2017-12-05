<?php 

class Weather
{
	protected $token = "a6e078118e7c0774913dcbdf826201bf";
	
	public function getWeather(){
		
		$url = "api.openweathermap.org/data/2.5/weather";

		$params = [];
		$params['lat'] = $lat;
		$params['lon'] = $lon;
		$params['APPID'] = $this->token;

		$url .= "?" . http_build_query($params);

		$client = new Client([
			'baseUrl' => $url
		]);

		$result = $client->request('GET');

		return json_decode($result->getBody());
	}
}