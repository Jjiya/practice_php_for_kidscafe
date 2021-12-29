<?php
//https://seoneu.tistory.com/29


// 파일 타입 체크
function checkFileType($fileExt): bool
{
    $result = false;
    switch ($fileExt) {
        case 'jpeg':
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':
            $result = true;
            break;

        default:
            echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다.";
            $result = false;
            break;
    }
    return $result;
}

function uploadImage($file, $directory)
{
    echo "실행";

    $FILE = $_FILES['imgFile'];

    $name = date("ymd_His_", time()) . $FILE["name"];

    echo $name . "<br>";

    // 임시로 저장된 정보(tmp_name)
    $tempFile = $_FILES['imgFile']['tmp_name'];

    // 파일타입 및 확장자 체크
    $fileTypeExt = explode("/", $_FILES['imgFile']['type']);

    // 파일 타입
    $fileType = $fileTypeExt[0];

    // 파일 확장자
    $fileExt = $fileTypeExt[1];

    // 확장자 검사
    $extStatus = checkFileType($fileExt);


    // 이미지 파일이 맞는지 검사.
    if ($fileType == 'image') {
        // 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
        if ($extStatus) {
            // 임시 파일 옮길 디렉토리 및 파일명
            $resFile = "../../uploads/{$name}";

            // 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
            $imageUpload = move_uploaded_file($tempFile, $resFile);

            // 업로드 성공 여부 확인
            if ($imageUpload == true) {
                echo "파일이 정상적으로 업로드 되었습니다. <br>";
                echo "<img src='{$resFile}' width='100' />";
            } else {
                echo "파일 업로드에 실패하였습니다.";
            }
        }    // end if - extStatus
        else {
            echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
            exit;
        }
    }    // end if - filetype
    // 파일 타입이 image가 아닌 경우
    else {
        echo "이미지 파일이 아닙니다.";
        exit;
    }
}



/**
 * $file_path = realpath(__FILE__); //php파일의 절대 서버 경로
 *
 * $file_name = basename(__FILE__); //php파일 이름
 *
 * $path = str_replace(basename(__FILE__), '', $file_path); //php파일 이름을 뺀 절대 서버 경로
 *
 * $root_path = $_SERVER['DOCUMENT_ROOT']; // 서버의 ROOT 경로
 */
