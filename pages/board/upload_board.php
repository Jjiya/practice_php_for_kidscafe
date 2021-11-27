<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Document</title>
</head>
<body>
<?php
$categoryList = array("공지", "이벤트");
?>
<h1>게시글 작성</h1>
<form action="">
    <div>
        <h3>제목</h3>
        <input type="text">
    </div>
    <div>
        <h3>카테고리</h3>
        <select name="category">
            <?php
            foreach ($categoryList as $category) echo "<option value='$category'>$category</option>"
            ?>
        </select>
    </div>
    <div>
        <h3>내용</h3>
        <textarea name="description" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">등록하기</button>
</form>

</body>
</html>