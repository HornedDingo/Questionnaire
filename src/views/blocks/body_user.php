<?php
if(isset($_GET['page'])) {
    switch($_GET['page']) {
        case "news_read":
            include("article.php");
            break;
        case "poll":
            include("polling.php");
            break;
        case "application":
            include("users_applications.php");
            break;
    }
}
?>
