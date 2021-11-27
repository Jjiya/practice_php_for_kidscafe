<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>키즈카페</title>
    <style>
        table {
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
            text-align: center;
        }

    </style>
</head>
<body>
<?php
require_once "./config/db/dbAccess.php";

$query = " SELECT notice.*, admin.name FROM notice_board notice JOIN admin_user admin ON notice.admin_user = admin.id; ";
$result = $mysqli->query($query);

?>
<h1>게시판</h1>
<a href="./pages/board/upload_board.php">작성하기</a>
<table>
    <thead>
    <?php
    $thList = array("번호", "카테고리", "제목", "내용", "조회 수", "게시일", "게시자");
    foreach ($thList as $th) echo "<th>$th</th>";
    ?>
    </thead>
    <tbody>
    <?php
    while ($list = mysqli_fetch_assoc($result)) {
        $noticeNameList = array_keys($list);
        echo "<tr>";
        foreach ($noticeNameList as $key) {
            if ($key !== "admin_user") echo "<td>$list[$key]</td>";
        }
        echo "</tr>";

    }
    ?>
    </tbody>
</table>

<?php require_once "./config/db/dbClose.php" ?>
</body>
</html>