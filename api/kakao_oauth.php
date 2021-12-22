<?php

// echo $_GET["code"];

$client_id = "797b53098f0f36bb02bddeb91b9a8e86";
$redirect_uri = "http://localhost/practice_php_for_kidscafe/api/kakao_oauth.php";
$response_type = "code";

$url = "https://kauth.kakao.com/oauth/token";

$data = [
  "grant_type" => "authorization_code",
  "client_id" => $client_id,
  "redirect_uri" => $redirect_uri,
  "code" => $_GET["code"]
];

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

$accessToken = json_decode($response, true)["access_token"];

echo $accessToken;


/************************************* */

$userUrl = "https://kapi.kakao.com/v2/user/me";

$headers = array(
  "Authorization: Bearer {$accessToken}",
  "Content-type: application/x-www-form-urlencoded;charset=utf-8"
);


$curl = curl_init($userUrl);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

$accessToken = json_decode($response, true);
