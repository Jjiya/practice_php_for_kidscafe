<?php

$result = unlink($_SERVER['DOCUMENT_ROOT']."/uploads/211228_132455WIN_20201219_214330.JPG");

if($result) echo "삭제 완료";
else echo "삭제 실패";

/**파일 다중 삭제
 * $files는 삭제할 파일 명 array
 *    foreach ($files as $item) {
        unlink($item);
        }
 *
 * 폴더 삭제
 * rmdir('삭제할 경로명')
 *
 * 폴더 생성
 * 폴더를 생성시 권한을 설정한다는 점도 꼭 함께 알아두세요. 참고로 만약 권한 설정값을 지정하지 않는 경우 default 값으로 0777이 설정되게 됩니다.
 * mkdir('생성할 경로명', 부여할 권한);
 */