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

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
<?php
require_once "./config/db/db_access.php";

$query = " SELECT notice.*, admin.name FROM notice_board notice JOIN admin_user admin ON notice.admin_user = admin.id; ";
$result = $mysqli->query($query);

?>
<h1>게시판</h1>
<?php require_once "./api/get_kakao_url.php" ?>
<a href="<?= doKakaoLogin(); ?>"> 카톡로그인</a>
<br>
<br>
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
        echo "<tr onclick=location.href='./pages/board/read_board.php?id=$list[id]'>";
        foreach ($noticeNameList as $key) {
            if ($key !== "admin_user") echo "<td>$list[$key]</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<br><br><br>
<?php //require_once "./api/lib/send_message.php" ?>
<!--<div onclick="--><?php //require_once "./api/lib/send_message.php"; send();?><!--">문자 발송</div>-->

<?php require_once "./config/db/db_close.php" ?>
</body>
</html>