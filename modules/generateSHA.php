<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Request-Headers: *');
header('Access-Control-Request-Method: *');
header('Access-Control-Allow-Headers: *');

$partnerKey = 'MNL7iMYt6t';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$clickID = urldecode($input['click_id']);
$key = $input['key'];

$secret = $key.$partnerKey;
$cipher = "aes-256-cbc";
if ( !empty($key) ) {
    if (in_array($cipher, openssl_get_cipher_methods()))
    {
        $iv = 'abc1231231231231';
        $clickID = openssl_decrypt($clickID, $cipher, $secret, 0, $iv);
    }
}


$partnerID = 275;
$serviceID = 11;
$str = $clickID.$partnerID.$serviceID.$partnerKey;

$newKey =  hash('sha256', $str);
$newKey = strtolower($newKey);
$jsonData = array(
    'click_id' => $clickID,
    'partner_id' => $partnerID,
    'service_id' => $serviceID,
    'key' => $newKey
);
$jsonData = json_encode($jsonData);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://159.69.208.155/cnd/phone");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
echo $server_output;
curl_close ($ch);