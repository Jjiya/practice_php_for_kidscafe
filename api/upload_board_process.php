<?php

require_once "../config/db/dbAccess.php";

$query = "INSERT INTO notice_board(title, category, description, admin_user)
            VALUES('$_POST[title]', '$_POST[category]', '$_POST[description]', 1);";

$result = $mysqli->query($query);

require_once "../config/db/dbClose.php";

if ($result = 1) {
    echo "<script>location.href = '../index.php'</script>";
} else {
    echo "<script>
            alert('등록에 실패하였습니다. 다시 시도해주세요.'); 
            history.back();
        </script>";
}
