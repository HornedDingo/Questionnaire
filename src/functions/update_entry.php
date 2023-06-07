<?php
    require_once dirname(__FILE__) . '../../functions/function.php';
    connectDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $status = intval($_POST['status']);

        $mysqli->query("UPDATE application_for_a_vehicle SET application_status_ID = $status WHERE ID_application_for_a_vehicle = $id");

        closeDB();
        exit();
    }
?>