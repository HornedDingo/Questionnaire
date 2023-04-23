<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        connectDB();
        $id = $_POST['id'];
        // $stmt = $mysqli->prepare("DELETE FROM user WHERE ID_user = ?");
        // $stmt->bind_param("i", $id);
        // if ($stmt->execute()) {
        //     echo "Запись удалена";
        // } else {
        //     echo "Ошибка удаления записи";
        // }

        $stmt = $mysqli->prepare("DELETE FROM news_details WHERE news_ID = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error deleting record: " . $stmt->error;
            return;
        }
        
        // Удаление данных из таблицы news
        $stmt = $mysqli->prepare("DELETE FROM news WHERE ID_news = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error deleting record: " . $stmt->error;
            return;
        }
        closeDB();
    }
?>