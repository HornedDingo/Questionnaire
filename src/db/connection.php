<?php
    $servername = 'localhost:3307';
    $database = "questionnare_db";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }
    else {
        print("Соединение установлено успешно");
    }
    mysqli_close($conn);
?>