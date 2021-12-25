<?php

require_once "../config/db/db_access.php";

$query = "UPDATE notice_board
            SET title = '$_POST[title]', category = '$_POST[category]', description = '$_POST[description]'
            WHERE id = '$_POST[id]';";

$result = $mysqli->query($query);

require_once "../config/db/db_close.php";

if ($result = 1) {
    echo "<script>location.href = '../index.php'</script>";
} else {
    echo "<script>
            alert('수정에 실패하였습니다. 다시 시도해주세요.'); 
            history.back();
        </script>";
}
