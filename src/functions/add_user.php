<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['add_user'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $patronymic = $_POST['patronymic'];

        $result = $mysqli->query("INSERT INTO user (login, password, surname, name_user, patronymic) VALUES ('$login', '$password', '$surname', '$name', '$patronymic')");

        if ($result) {
            echo "Запись была успешно добавлена в базу данных!";
        } else {
            echo "Не удалось добавить новую запись в базу данных!";
        }
        header('Location: ../views/admin_page.php');
    }
    closeDB();
?>