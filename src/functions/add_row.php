<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['add_row'])) {
        $name_poll = $_POST['name_poll'];
        $main_result = $_POST['main_result'];
        $description_poll = $_POST['description_poll'];        
        $status = $_POST['status_id'];
        $result = $mysqli->query("INSERT INTO poll (name_poll, main_result, description_poll, status_id) VALUES ('$name_poll', '$main_result', '$description_poll', '$status')");

        if ($result) {
            echo "Запись была успешно добавлена в базу данных!";
        } else {
            echo "Не удалось добавить новую запись в базу данных!";
        }
        
    }
    closeDB();
?>