<!DOCTYPE html>
<html lang="en">
    <!-- <?php require_once dirname(__DIR__) . '/views/blocks/head_main.php' ?> -->
    <body>
        <ul>
            <?php
                require_once dirname(__DIR__) . '/views/blocks/header_main.php';
                require_once dirname(__DIR__) . '../functions/function.php';
                $news_array = getAllNews();
                foreach ($news_array as $news_item) {
                    $news_description = getNewsDetails($news_item["ID_news"]);
                    echo'
                    <a href="/src//views//blocks//news.php?news_id='.$news_item['ID_news'].'" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                        <h6 class="mb-0">'.$news_item["name_news"].'</h6>
                        <p class="mb-0 opacity-75">'.explode("\n", wordwrap($news_description['description_news'], 250))[0].'...</p>
                        </div>
                        <small class="opacity-50 text-nowrap">'.$news_item["date_of_addition"].'</small>
                    </div>
                    </a>
                    ';
                }
            ?>
        </ul>
    </body>
</html>