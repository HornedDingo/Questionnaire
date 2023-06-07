<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        connectDB();
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM news_details WHERE news_ID = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error deleting record: " . $stmt->error;
            return;
        }
        
        $stmt = $mysqli->prepare("DELETE FROM news WHERE ID_news = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error deleting record: " . $stmt->error;
            return;
        }
        closeDB();
    }
?>