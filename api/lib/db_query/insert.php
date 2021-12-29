<?php
require_once "./make_value_query.php";

echo $_SERVER["REQUEST_METHOD"];
echo "<br><br>";

$dataList = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  echo "post 타입";
  echo "<br><br>";
  echo "POST:   ";
  var_dump($_POST);
  $dataList = $_POST;
  echo "<br><br>";
} else if ($_SERVER["REQUEST_METHOD"] ===  "GET") {
  echo "get 타입";
  echo "<br><br>";
  echo "GET:   ";
  var_dump($_GET);

  $dataList = $_GET;
  echo "<br><br>";
}

$sql = "INSERT INTO TABLE VALUE ";
$value = makeValueQuery($dataList, "imgFile");

echo $sql . $value;
