<?php
header('Content-Type: application/json');

// Подключение к базе данных
$host = "localhost";
$user = "root";
$password = "root";
$database = "questionnare_db";

$conn = new mysqli($host, $user, $password, $database, 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение опросов и вопросов
$query = "SELECT * FROM poll";
$polls = $conn->query($query);

$output = [];

while ($poll = $polls->fetch_assoc()) {

    // Получение вопросов и ответов для каждого опроса
    $query = "SELECT * FROM question WHERE poll_ID=" . $poll['ID_poll'];
    $questions = $conn->query($query);
    $poll['questions'] = [];

    while ($question = $questions->fetch_assoc()) {
        $query_answers = "SELECT * FROM answer WHERE question_ID=".$question['ID_question'];
        $answers = $conn->query($query_answers);
        $question['answers'] = [];
    
        while ($answer = $answers->fetch_assoc()) {
            $question['answers'][] = $answer;
        }
    
        $poll['questions'][] = $question;
    }

    $output[] = $poll;
}

// Отправка данных на клиент
echo json_encode($output);

// Закрытие соединения
$conn->close();
?>