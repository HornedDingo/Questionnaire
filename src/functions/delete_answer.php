<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM answer WHERE ID_answer = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        closeDB();
    }
?>