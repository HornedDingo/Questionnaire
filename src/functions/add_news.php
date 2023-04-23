<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['add_news'])) {
        $title = $_POST['add-news-title'];
        $description = $_POST['add-news-description'];
        $date = date('Y-m-d', strtotime($_POST['date_of_addition']));
        $stmt = $mysqli->prepare("INSERT INTO news (name_news, date_of_addition) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $date);
        $stmt->execute();
        $news_id = $stmt->insert_id;
        $stmt->close();

        $stmt2 = $mysqli->prepare("INSERT INTO news_details (news_ID, description_news) VALUES (?, ?)");
        $stmt2->bind_param("is", $news_id, $description);
        $stmt2->execute();
        $stmt2->close();

        if ($stmt2) {
            echo "Запись была успешно добавлена в базу данных!";
        } else {
            echo "Не удалось добавить новую запись в базу данных!";
        }
        header('Location: ../views/admin_page.php?page=news');
    }
    closeDB();
?>