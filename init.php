<?php
include('vendor/autoload.php');

include('TelegramBot.php');
include('Weather.php');

$telegramApi = new TelegramBot();
$weatherApi = new Weather();

while (true) {
	sleep(2);
	
	$updates = $telegramApi->getUpdates();

	foreach($updates as $update){

		if(isset($update->message->location)){
			$weatherApi->getWeather($apdate->message->location->latitude, $update->message->location->longitude);

			switch ($result->weather[0]->main) {
				case 'Clear':
					$response = "Aysor arevot or e!";
					break;
				case 'Clouds':
					$response = "Aysor ampamac e, amen depqum vercreq andzrevanoc!";
					break;
				case 'Rain':
					$response = "Drsum andzrev e, vercreq andzrevanoc!";
					break;
				
				default:
					$response = "Nayeq patuhanic, ktesneq!";
					break;
			}


		} else{

			$telegramApi->sendMessage($update->message->chat->id, 'Send please your location');
		}

		$telegramApi->sendMessage($update->message->chat->id, 'Hello!');
	}
}
