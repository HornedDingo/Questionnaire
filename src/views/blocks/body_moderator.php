<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news_edit":
            include("news_admin.php");
            break;
        case "news_read":
            include("news_read.php");
            break;
        case "polls":
            include("poll_admin.php");
            break;
        case "questions":
            include("question_admin.php");
            break;
        case "answers":
            include("answer_admin.php");
            break;
        case "application":
            include("users_applications.php");
            break;
        default:
            include("news_admin.php");
            break;
    }
}
?>