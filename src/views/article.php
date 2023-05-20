<!DOCTYPE html>
<html lang="en">
    <?php require_once dirname(__DIR__) . '/views/blocks/head_main.php' ?>
    <body>
    <div class="container" style="background: antiquewhite; margin-top: 3rem; width: 50%;">
            <h1 style="color: #d6a86c; font-family: ui-sans-serif; text-align: center;">Новости и объявления</h1>
            <div id="polls">
            <ul style="margin-right: 2rem!important; margin: auto;margin-top:3%;">
                <?php
                    require_once dirname(__DIR__) . '../functions/function.php';
                    $news_array = getAllNews();
                    foreach ($news_array as $news_item) {
                        $news_description = getNewsDetails($news_item["ID_news"]);
                        echo'
                        <a href="/src//views//blocks//news.php?news_id='.$news_item['ID_news'].'" style="margin-bottom:1%;" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
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
            </div>
        </div>
    </body>
</html>