<?php

 echo $_GET["code"];

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

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

$accessToken = json_decode($response, true)["access_token"];

echo $accessToken;

curl_close($curl);

/************************************* */
echo "<br><br> ------------- <br><br>";

$userUrl = "https://kapi.kakao.com/v2/user/me";

$headers = array(
  "Authorization: Bearer ".$accessToken,
  "Content-type: application/x-www-form-urlencoded;charset=utf-8"
);


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $userUrl); //URL 지정하기
curl_setopt($curl, CURLOPT_POST, true); //0이 default 값이며 POST 통신을 위해 1로 설정해야 함
//curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));  //POST로 보낼 데이터 지정하기
//curl_setopt ($curl, CURLOPT_POSTFIELDSIZE, 0); //이 값을 0으로 해야 알아서 &post_data 크기를 측정하는듯
curl_setopt($curl, CURLOPT_HEADER, true);//헤더 정보를 보내도록 함(*필수)
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);   ////header 지정하기
curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);   //이 옵션이 0으로 지정되면 curl_exec의 결과값을 브라우저에 바로 보여줌. 이 값을 1로 하면 결과값을 return하게 되어 변수에 저장 가능(테스트 시 기본값은 1인듯?)
$response = curl_exec($curl);

$result = json_decode($response, true);
echo "<br><br> ------------- <br><br>";
echo curl_getinfo($curl, CURLINFO_HTTP_CODE);

echo "<br><br> ------------- <br><br>";
echo $result;
echo "<br><br> ------------- <br><br>";
print_r($result);

echo "<br><br> ------------- <br><br>";
$retVal["code"] =  curl_error($curl);



//  https://dreamaz.tistory.com/35

/**
CREATE TABLE `admin_user` (
`id` bigint NOT NULL AUTO_INCREMENT,
`email` varchar(100) NOT NULL,
`password` varchar(255) NOT NULL,
`name` varchar(50) NOT NULL,
`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--

CREATE TABLE `notice_board` (
`id` bigint NOT NULL AUTO_INCREMENT,
`category` varchar(50) NOT NULL DEFAULT '공지',
`title` varchar(100) NOT NULL,
`description` longtext NOT NULL,
`view_count` int DEFAULT '0',
`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`admin_user` bigint DEFAULT NULL,
`modify_date` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `admin_user` (`admin_user`),
CONSTRAINT `notice_board_ibfk_1` FOREIGN KEY (`admin_user`) REFERENCES `admin_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


 */