<?php require_once "../../api/lib/image_control.php";
// require_once "../../api/lib/db_query/insert.php" 
?>
<!DOCTYPE html>
<html>

<head>
</head>
<title>파일 업로드 테스트</title>

<body>

  <form name="reqform" method="GET" action="../../api/lib/db_query/insert.php" enctype="multipart/form-data">
    <p>이미지 파일 업로드 테스트</p>
    <hr>
    <br>
    <input type="hidden" name="id" value="'1'">
    <input type="hidden" name="pw" value="2">
    <input type="hidden" name="name" value="3">
    <input type="file" name="imgFile" /><br>
    <input type="submit" value="업로드" />
  </form>
  <a href="../../api/lib/image_delete.php">삭제</a>
</body>

</html>