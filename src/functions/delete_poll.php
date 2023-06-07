<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM poll_log WHERE poll_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $mysqli->prepare("SELECT * FROM question WHERE poll_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        while ($question = $result->fetch_assoc()) {
            $stmt = $mysqli->prepare("DELETE FROM answer WHERE question_ID = ?");
            $stmt->bind_param("i", $question['ID_question']);
            $stmt->execute();
        }

        $stmt = $mysqli->prepare("DELETE FROM question WHERE poll_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $stmt = $mysqli->prepare("DELETE FROM poll WHERE ID_poll = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Запись удалена";
        } else {
            echo "Ошибка удаления записи";
        }
        closeDB();
    }
?>