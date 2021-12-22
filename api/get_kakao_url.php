<?php


function doKakaoLogin()
{
  // require_once "./config/sns/kakaoInfo.php";

  $client_id = "client_id=797b53098f0f36bb02bddeb91b9a8e86";
  $redirect_uri = "redirect_uri=http://localhost/practice_php_for_kidscafe/api/kakao_oauth.php";
  $response_type = "response_type=code";

  $url = "https://kauth.kakao.com/oauth/authorize?";

  $request = $client_id . "&" . $redirect_uri . "&" . $response_type;


  return $url . $request;
}

doKakaoLogin();
