<?php



require "vendor/autoload.php";

$access_token = 'clJoeuyabo6h9tDh1sFazcKbQoyS0fYCKTv3HKaoCj72JBadslLUMNHb0Yu4H3HSnJuhtUYdQBB80k8ZGkJFALwb35sl3kBPsQRybKqQsrYj0sU0Q+TfhTj9W28wHrC3KX7zK81BZGbpkGsHGhivGwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75c03f392f6e53d662d6f5a8db9e421f';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







