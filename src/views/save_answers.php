<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<?php
    require_once dirname(__DIR__) . '../functions/function.php';

    $user_id = $_SESSION["ID_user"];
    $poll_id = $_POST["poll_id"];

    connectDB();

    $question_stmt = $mysqli->prepare("SELECT ID_question FROM question WHERE poll_ID = ?");
    $question_stmt->bind_param("i", $poll_id);
    $question_stmt->execute();
    $question_result = $question_stmt->get_result();

    $date_poll = date("Y-m-d");
    $result_stmt = $mysqli->prepare("INSERT INTO poll_log(user_ID, poll_ID) VALUES (?, ?)");
    $result_stmt->bind_param("ii", $user_id, $poll_id);
    $result_stmt->execute();

    while ($question = mysqli_fetch_assoc($question_result)) {
        $answer_id = $_POST["answer_" . $question['ID_question']];

        $result_smth = $mysqli->prepare("SELECT votes FROM answer WHERE ID_answer = ?");
        $result_smth->bind_param("i", $answer_id);
        $result_smth->execute();
        $result_smth = $result_smth->get_result();

        $result_stmt = $mysqli->prepare("UPDATE answer SET votes = votes + 1 WHERE ID_answer = ?");
        $result_stmt->bind_param("i", $answer_id);
        $result_stmt->execute();
    }

    closeDB();

    header("Location: user_page.php?page=poll");
?>