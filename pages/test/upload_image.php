<!DOCTYPE html>
<html>
<head>
</head>
<title>파일 업로드 테스트</title>
<body>
<script>
    //
    //function submit()
    //{
    //    <?php //include_once "../../api/lib/image_control.php";
    //    uploadImage(); ?>
    //}
</script>

<?php
echo time() . "<br>";
echo date("ymd_His", time()) . "<br>";

?>
<form name="reqform" method="post" action = "../../api/lib/image_control.php" enctype="multipart/form-data">
    <p>이미지 파일 업로드 테스트</p>
    <hr>
    <br>
    <input type="file" name="imgFile"/><br>
    <input type="submit" value="업로드"/>
</form>
</body>
</html>