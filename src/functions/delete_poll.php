<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        connectDB();
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM poll WHERE ID_poll = ?");
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error deleting record: " . $stmt->error;
            return;
        }
        closeDB();
    }
?>