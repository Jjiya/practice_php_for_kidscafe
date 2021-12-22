<?php
//echo "DIR >> ".__DIR__."\n";
//$dbConfig = require_once __DIR__.'/dbConfig.php';
//String 형태로 변환할 수 없다고 에러나서 일단 하드코딩...
//$mysqli = new mysqli($dbConfig["hostname"], $dbConfig["username"], $dbConfig["password"],$dbConfig["database"]);
$mysqli = new mysqli("127.0.0.1", "root", "1234", "practice_php");
