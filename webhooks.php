<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'clJoeuyabo6h9tDh1sFazcKbQoyS0fYCKTv3HKaoCj72JBadslLUMNHb0Yu4H3HSnJuhtUYdQBB80k8ZGkJFALwb35sl3kBPsQRybKqQsrYj0sU0Q+TfhTj9W28wHrC3KX7zK81BZGbpkGsHGhivGwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            $ReplyText = "";
            if( $event['message']['text'] == "UserID") {

                // Get text sent
                $ReplyText = $event['source']['userId'];

                // Build message to reply back
                $messages = [
                    'type' => 'text',
                    'text' => $ReplyText
                ];
            }elseif( $event['message']['text'] == "ประกาศ") {

                // Get text sent
                $ReplyText = $event['source']['userId'];

                // Build message to reply back
                $messages = [
                    'type' => 'text',
                    'text' => 'ประกาศ',
                ];
            }elseif(strpos($event['message']['text'], 'log') !== false){
                // Get text sent
                $ReplyText = json_encode($event);

                // Build message to reply back
                $messages = [
                    'type' => 'text',
                    'text' => $ReplyText
                ];
            }

//             Get text sent
//                $ReplyText = $event['source']['userId'];
//
//                // Build message to reply back
//                $messages = [
//                    'type' => 'text',
//                    'text' => json_encode($event)
//                ];


            if($ReplyText != "") {
                // Get replyToken
                $replyToken = $event['replyToken'];

                // Make a POST Request to Messaging API to reply to sender
                $url = 'https://api.line.me/v2/bot/message/reply';
                $data = [
                    'replyToken' => $replyToken,
                    'messages' => [$messages],
                ];
                $post = json_encode($data);
                $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);

                echo $result . "\r\n";
            }
        }
    }
}
echo "OK";
