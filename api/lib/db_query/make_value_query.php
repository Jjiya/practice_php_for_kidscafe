<?php
chdir(dirname(__FILE__));
require_once "../convert/convertDataType.php";


function showNowQuery($key, $value)
{
  echo "<h1> QUERY </h1>";
  echo "key : " . $key . "<br>";
  echo "value : " . $value;
  echo '<hr>';
}


function makeValueQuery($dataList, $exclude = null): string
{
  if (isset($exclude)) $exclude = getArrayType($exclude);

  $query = "";
  foreach ($dataList as $key => $value) {
    echo strstr($value, "'"); // 작은 따옴표 있을 때 어떻게 할 건지 안정함!
    echo "<br>";

    if (0) showNowQuery($key, $value);

    if (isset($exclude) && !in_array($key, $exclude)) {
      $query = $query .  $key . "= '" . $value . "', ";
    } else {
      $query = $query .  $key . "= '" . $value . "', ";
    }
  } // end foreach

  $query = substr($query, 0, -2); // 맨 마지막 공백과 쉼표 제거

  return $query;
}
chdir(dirname($_SERVER['SCRIPT_FILENAME']));
