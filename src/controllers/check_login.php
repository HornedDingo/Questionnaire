<?php
    require_once dirname(__DIR__) . '../../src/functions/function.php'; 
    global $mysqli;
    connectDB();
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
        $stmt->bind_param("ss", $login, $password);
        $stmt->execute();

        // Получение пользователя из результатов запроса
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user !== null) {
            $_SESSION['loggedIn'] = true;
            if ($user['role_ID'] === 1){
                header('Location: ../views/admin_page.php');
                exit();
            }
            elseif ($user['role_ID'] === 2){
                header('Location: ../views/moderator_page.php');
                exit();
            }
            else{
                header('Location: ../views/user_page.php?page=news');
                exit();
            }
        } else {
            // Неверные учетные данные
            $_SESSION['loggedIn'] = false;
            var_dump($user, $password);
            header('Location: ../views/article.php');
            exit();
        }
    }
    closeDB();
?>