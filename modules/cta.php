<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Request-Headers: *');
header('Access-Control-Request-Method: *');
header('Access-Control-Allow-Headers: *');

function random($length = 16)
{
    $string = '';

    while (($len = strlen($string)) < $length) {
        $size = $length - $len;

        $bytes = random_bytes($size);

        $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
    }

    return $string;
}

$partnerKey = 'MNL7iMYt6t';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$clickID = urldecode($input['click_id']);
$key = $input['key'];

$secret = $key.$partnerKey;
$cipher = "aes-256-cbc";
if ( !empty($key) ) {
    if (in_array($cipher, openssl_get_cipher_methods())) {

      $iv = 'abc1231231231231';
      $clickID = openssl_decrypt($clickID, $cipher, $secret, 0, $iv);
    }
}

$cta_key = 'H3FrYFjWsQuZT9pni3iv9ggrjuCnnWRV';

if (in_array($cipher, openssl_get_cipher_methods())) {
  $iv2 = random(16);
  $cr = openssl_encrypt($clickID, $cipher, $cta_key, 0, $iv2);
  $crypted = base64_encode($iv2 . base64_decode($cr));

  $e = urlencode($crypted);

  $url = "https://ev.mobstra.com/event/cta?e=" . $e;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
  curl_exec($curl);

  curl_close ($curl);

}
