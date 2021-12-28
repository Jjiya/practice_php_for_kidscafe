<?php
//https://www.phpschool.com/gnuboard4/bbs/board.php?bo_table=qna_function&wr_id=306651&page=1867

//  기준 위치를 변경
chdir(dirname(__FILE__));

//  https://dreamaz.tistory.com/35
/** * 실제 API 호출 메서드 * * @param array headers * @param string $url * @param array $postData * @return array */
function httpCall($url, $headers = null, $postData = null, $showResult = true) :array
{
    try {
        require_once "./convert/convertDataType.php";
        $postQuery = "";
        if ($postData) {
//            postData 배열로 형변환
            $postData = getArrayType($postData);
            $postQuery = http_build_query($postData);
        }

        if ($headers) {
//            headers 배열로 형변환
            $headers = getArrayType($headers);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);    // URL 설정
//        postData가 값이 있다면 postQuery는 ""가 아닐테고 ""가 아니라면 post 요청이겠지
        curl_setopt($curl, CURLOPT_POST, $postQuery === "" ? 2 : 1);   // POST 요청이면 value는 1이어야 한다. GET 요청이면 value는 2
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postQuery);   // POST 데이터 설정
        if ($headers) {
//            헤더가 있다면
            curl_setopt($curl, CURLOPT_HEADER, true); // 헤더 정보 보내기
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // 헤더 값 넣어주기
        } else {
            curl_setopt($curl, CURLOPT_HEADER, false);    // 헤더 정보 안보냄
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $showResult);  // TRUE로 설정 시 curl_exec()의 반환 값을 문자열로 반환
        $result = curl_exec($curl);
        $errorNo = curl_errno($curl);
        $errorMsg = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return array(
            "result" => $result,
            "errorNo" => $errorNo,
            "errorMsg" => $errorMsg,
            "httpCode" => $httpCode
        );
    } catch (Exception $e) {
        echo $e->getMessages();
        return array("false");
    }
//    원래의 경로로 변경
    chdir(dirname($_SERVER['SCRIPT_FILENAME']));
}