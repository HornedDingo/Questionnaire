<?php
    require_once dirname(__DIR__) . '../functions/function.php';
    connectDB();
    if (isset($_POST['update_news'])) {
        $news_id = $_POST['edit-news-id'];
        $title = $_POST['edit-news-title'];
        $description = $_POST['edit-news-description'];
        $date = date('Y-m-d', strtotime($_POST['date_of_addition']));
        $stmt = $mysqli->prepare("UPDATE news SET name_news = ?, date_of_addition = ? WHERE id_news = ?");
        $stmt->bind_param("ssi", $title, $date, $news_id);
        $stmt->execute();
        $stmt->close();
        $stmt2 = $mysqli->prepare("UPDATE news_details SET description_news = ? WHERE news_ID = ?");
        $stmt2->bind_param("si", $description, $news_id);
        $stmt2->execute();
        $stmt2->close();
        echo "Запись была успешно обновлена в базе данных!";
        header('Location: ../views/admin_page.php?page=news_read');
    }
    closeDB();
?>