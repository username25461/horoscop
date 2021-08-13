<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Request-Headers: *');
header('Access-Control-Request-Method: *');
header('Access-Control-Allow-Headers: *');

$partnerKey = 'MNL7iMYt6t';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$subs = json_decode($input[0], TRUE);
$key = $input[1];

$cipher = "aes-256-cbc";

$sub1 = urlencode($subs['sub1']);
$sub2 = urlencode($subs['sub2']);
$sub3 = urlencode($subs['sub3']);
$sub4 = urlencode($subs['sub4']);
$sub5 = urlencode($subs['sub5']);

$url = "https://viptraffic.net/go?id=24707&hash=SFFiFo3IsN&sub1=$sub1&sub2=$sub2&sub3=$sub3&sub4=$sub4&sub5=$sub5";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

$result = curl_exec($curl);

curl_close ($curl);

$location = json_decode($result);
$secret = $key.$partnerKey;
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $iv = 'abc1231231231231';
    $ciphertext = openssl_encrypt($location->click_id, $cipher, $secret, 0, $iv);
    echo urlencode($ciphertext);
}