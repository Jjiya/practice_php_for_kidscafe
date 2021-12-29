<?php
chdir(dirname(__FILE__));
require_once "./make_value_query.php";

function insertQuery(String $tableName, array $dataList, $excludeDataKeys = null): string
{
  $value = makeValueQuery($dataList, $excludeDataKeys);
  $query = "INSERT INTO {$tableName} SET {$value}";

  return $query;
}
chdir(dirname($_SERVER['SCRIPT_FILENAME']));

// echo $_SERVER["REQUEST_METHOD"];
// echo "<br><br>";

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//   echo "post 타입";
//   echo "<br><br>";
//   echo "POST:   ";
//   var_dump($_POST);
//   $dataList = $_POST;
//   echo "<br><br>";
// } else if ($_SERVER["REQUEST_METHOD"] ===  "GET") {
//   echo "get 타입";
//   echo "<br><br>";
//   echo "GET:   ";
//   var_dump($_GET);

//   $dataList = $_GET;
//   echo "<br><br>";
// }
