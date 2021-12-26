<?php
require_once "./lib/curl.php";

$client_id = "797b53098f0f36bb02bddeb91b9a8e86";
$redirect_uri = "http://localhost:63342/practice_kids/api/kakao_oauth.php";
//$redirect_uri = "http://localhost/practice_php_for_kidscafe/api/kakao_oauth.php";

$response_type = "code";
$url = "https://kauth.kakao.com/oauth/token";

$data = [
    "grant_type" => "authorization_code",
    "client_id" => $client_id,
    "redirect_uri" => $redirect_uri,
    "code" => $_GET["code"]
];

$response = httpCall($url, null, $data, true);
print_r("<br><br>".var_dump($response)."<br><br>");

if($response["httpCode"] >= 400) {
    echo "error 발생";
    return;
}

$accessToken = json_decode($response["result"], true)["access_token"];

echo $accessToken;

/************************************* */
echo "<br><br> ------------- <br><br>";

$userUrl = "https://kapi.kakao.com/v2/user/me";

$headers = array(
    "Authorization: Bearer " . $accessToken,
    "Content-type: application/x-www-form-urlencoded;charset=utf-8"
);

$response = httpCall( $userUrl, $headers, null, false);


if($response["httpCode"] >= 400) {
    echo "error 발생";
    return;
}

echo "<br><br> -------respo?nse------ <br><br>";
print_r(var_dump($response) . "<br><br><br>");

$responseData = mb_stristr($response["result"], "{");
echo $responseData;

echo "<br><br> -------response------ <br><br>";

$result = json_decode($responseData, true);

echo "<br><br> ------------- <br><br>";

print_r($result);

/**
 * CREATE TABLE `admin_user` (
 * `id` bigint NOT NULL AUTO_INCREMENT,
 * `email` varchar(100) NOT NULL,
 * `password` varchar(255) NOT NULL,
 * `name` varchar(50) NOT NULL,
 * `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 * PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
 *
 * --
 *
 * CREATE TABLE `notice_board` (
 * `id` bigint NOT NULL AUTO_INCREMENT,
 * `category` varchar(50) NOT NULL DEFAULT '공지',
 * `title` varchar(100) NOT NULL,
 * `description` longtext NOT NULL,
 * `view_count` int DEFAULT '0',
 * `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 * `admin_user` bigint DEFAULT NULL,
 * `modify_date` timestamp NULL DEFAULT NULL,
 * PRIMARY KEY (`id`),
 * KEY `admin_user` (`admin_user`),
 * CONSTRAINT `notice_board_ibfk_1` FOREIGN KEY (`admin_user`) REFERENCES `admin_user` (`id`)
 * ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
 */