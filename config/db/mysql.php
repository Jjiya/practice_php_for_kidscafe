<?php
    $mysqli = new mysqli("127.0.0.1", "root", "1234", "practice_php");
//    $conn = mysqli_connect( "127.0.0.1", "root", "1234", "practice_php");
//    $query = "INSERT INTO admin_user(email, password, name) VALUES ('test3', 'test3', 'test3 Name')";
    $query = "SELECT * FROM admin_user";
    $result = $mysqli -> query($query);

    while ($row = mysqli_fetch_array($result)){
        echo $row["id"]."번 email >> ".$row["name"]."\n";
    }
//    echo my

    echo "row 결과 >> ".$mysqli -> affected_rows."\n";
    if($mysqli -> close()) echo "접속 해제 성공";
    else echo "접속 해제 실패";
//    $result = mysqli_query($conn, $query);
//    $row = mysqli_fetch_assoc($result);
//    echo $row['_msg'];
?>