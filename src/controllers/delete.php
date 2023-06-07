<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM poll_log WHERE user_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $mysqli->prepare("DELETE FROM account WHERE user_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $mysqli->prepare("DELETE FROM news_details WHERE user_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM user WHERE ID_user = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Запись удалена";
        } else {
            echo "Ошибка удаления записи";
        }
        closeDB();
    }
?>