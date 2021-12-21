<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once "../../config/db/dbAccess.php";

$query = "SELECT id, title, category, description, date FROM notice_board WHERE id = $_GET[id];";

$result = $mysqli->query($query);

$board = mysqli_fetch_assoc($result);
?>
<?php
$categoryList = array("공지", "이벤트");
?>
<h1>게시글 수정</h1>
<form action="../../api/modify_board_process.php" method="POST">
    <input type="hidden" name="id" value="<?=$board['id']?>">
    <div>
        <h3>제목</h3>
        <input name="title" type="text" value="<?= $board['title'] ?>">
    </div>
    <div>
        <h3>카테고리</h3>
        <select name="category">
            <?php
                echo $board['category'];
                foreach ($categoryList as $category) {
            ?>
                <option value='<?= $category ?>' <?= $board['category'] = $category ? 'selected' : '' ?>>
                    <?= $category ?>
                </option>
            <?php
                }
            ?>
        </select>
    </div>
    <div>
        <h3>작성일</h3>
        <?= $board['date'] ?>
    </div>
    <div>
        <h3>내용</h3>
        <textarea name="description" cols="30" rows="10"><?= $board['description'] ?></textarea>
    </div>
    <button type="submit">수정하기</button>
</form>
<?php
require_once "../../config/db/dbClose.php";
?>
</body>
</html>

