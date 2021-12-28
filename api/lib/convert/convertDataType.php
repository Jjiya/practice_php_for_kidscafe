<?php

// 배열 타입으로 변환하기
function getArrayType($data) :array
{
    switch (gettype($data)) {
        case "array":
            return $data;
        case "object":
            $data = (array)$data;
            break;
        case "integer":
            $data = strval($data);
        case "string":
            $data = explode(',', $data);
            break;
        default:
            break;
    }
    echo "변환 완료 타입>> ".gettype($data)."<br>";
    echo var_dump($data);

    return $data;
}