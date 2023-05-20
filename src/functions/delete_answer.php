<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        connectDB();
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM answer WHERE ID_answer = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Ошибка удаления записи: " . $stmt->error;
            return;
        }
        closeDB();
    }
?>