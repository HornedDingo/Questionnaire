<?php
    require_once dirname(__DIR__) . '../../src/functions/function.php'; 
    require_once dirname(__DIR__) . '/models/user.php';
    global $mysqli;
    connectDB();
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
        $stmt->bind_param("ss", $login, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $_user = $result->fetch_assoc();

        $stmt = $mysqli->prepare("SELECT * FROM account WHERE user_ID = ?");
        $stmt->bind_param("i", $_user['ID_user']);
        $stmt->execute();
        $result = $stmt->get_result();
        $_account = $result->fetch_assoc();
        $_SESSION['ID_user'] = $_user['ID_user'];
        $user = new User($id, $surname, $name, $patronymic, $dateOfBirth, $passportId, $passportSeries, $street, $house, $apartment, $login, $password, $roleId);
        $user->setId($_user['ID_user']);
        $user->setSurname($_user['surname']);
        $user->setName($_user['name_user']);
        $user->setPatronymic($_user['patronymic']);
        $user->setDateOfBirth($_account['date_of_birth']);
        $user->setPassportId($_account['passport_id']);
        $user->setPassportSeries($_account['passport_series']);
        $user->setStreet($_account['street']);
        $user->setHouse($_account['house']);
        $user->setApartment($_account['apartment']);
        $user->setLogin($_user['login']);
        $user->setPassword($_user['password']);
        $user->setRoleId($_user['role_ID']);

        if ($_user !== null) {
            $_SESSION['loggedIn'] = true;
            if ($_user['role_ID'] === 1){
                header('Location: ../views/admin_page.php?page=news_read');
                exit();
            }
            elseif ($_user['role_ID'] === 2){
                header('Location: ../views/moderator_page.php?page=news_read');
                exit();
            }
            elseif ($_user['role_ID'] === 4){
                header('Location: ../views/guards_page.php?page=news_read');
                exit();
            }
            else{
                header('Location: ../views/user_page.php?page=news_read');
                exit();
            }
        } else {
            $_SESSION['loggedIn'] = false;
            var_dump($user, $password);
            header('Location: ../views/article.php');
            exit();
        }
    }
    closeDB();
?>