<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news":
            include("news_admin.php");
            break;
        case "users":
            include("users_admin.php");
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
        default:
            include("main.php");
            break;
    }
}
?>
