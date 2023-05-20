<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
    require_once dirname(__DIR__) . '../functions/function.php';

    $user_id = 1; // ID текущего пользователя, необходимо получать из сессии или другого источника
    $poll_id = $_POST["poll_id"];

    connectDB();

    // Выборка вопросов опроса
    $question_stmt = $mysqli->prepare("SELECT ID_question FROM question WHERE poll_ID = ?");
    $question_stmt->bind_param("i", $poll_id);
    $question_stmt->execute();
    $question_result = $question_stmt->get_result();

    $date_poll = date("Y-m-d");
    $result_stmt = $mysqli->prepare("INSERT INTO poll_log(user_ID, poll_ID) VALUES (?, ?)");
    $result_stmt->bind_param("ii", $user_id, $poll_id);
    $result_stmt->execute();

    // Обработка ответов пользователя
    while ($question = mysqli_fetch_assoc($question_result)) {
        $answer_id = $_POST["answer_" . $question['ID_question']];

        // Вставка результата ответа в базу данных
        $result_smth = $mysqli->prepare("SELECT votes FROM answer WHERE ID_answer = ?");
        $result_smth->bind_param("i", $answer_id);
        $result_smth->execute();
        $result_smth = $result_smth->get_result();

        $result_stmt = $mysqli->prepare("UPDATE answer SET votes = votes + 1 WHERE ID_answer = ?");
        $result_stmt->bind_param("i", $answer_id);
        $result_stmt->execute();
    }

    closeDB();

    // Перенаправление на страницу с благодарностью за участие в опросе или на другую страницу 
    header("Location: user_page.php?page=poll");
?>