<?php
require_once "../config/db/db_access.php";
require_once "../api/lib/db_query/insert.php";

$dataList = array_merge($_POST, array("admin_user" => 1));

$query = insertQuery("notice_board", $dataList);

echo $query;

$result = $mysqli->query($query);

require_once "../config/db/db_close.php";

if ($result = 1) {
    echo "<script>location.href = '../index.php'</script>";
} else {
    echo "<script>
            alert('등록에 실패하였습니다. 다시 시도해주세요.'); 
            history.back();
        </script>";
}
