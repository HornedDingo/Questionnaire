<?php
    require_once dirname(__DIR__) . '/functions/function.php';
    connectDB();
    $id = $_POST['id'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $stmt = $mysqli->prepare("UPDATE user SET login=?, password=?, surname=?, name_user=?, patronymic=? WHERE ID_user=?");
    $stmt->bind_param("sssssi", $login, $password, $surname, $name, $patronymic, $id);
    $stmt->execute();
    $stmt->close();
    closeDB();
    header('Location: ../views/admin_page.php?page=users');
?>