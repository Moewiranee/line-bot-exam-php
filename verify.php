<?php
$access_token = 'clJoeuyabo6h9tDh1sFazcKbQoyS0fYCKTv3HKaoCj72JBadslLUMNHb0Yu4H3HSnJuhtUYdQBB80k8ZGkJFALwb35sl3kBPsQRybKqQsrYj0sU0Q+TfhTj9W28wHrC3KX7zK81BZGbpkGsHGhivGwdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;