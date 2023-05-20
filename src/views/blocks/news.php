<?php
  $news_title = '';
  $news_date = '';
  if (isset($_GET['news_id'])) {
      $news_id = $_GET['news_id'];
      require_once dirname(__DIR__) . '../../functions/function.php';
      $news_array = getSmthFromNews('ID_news', $news_id);
      $news_desc = getNewsDetails($news_id);
      if (count($news_array) > 0) {
          $news_item = $news_array[0];
          $news_title = $news_item['name_news'];
          $news_date = $news_item['date_of_addition'];
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo ($news_title == '') ? 'Page Title' : $news_title; ?></title>
    <?php require_once dirname(__DIR__) . '../blocks/head_admin.php';?>
    <style>
      
      h1 {
        font-size: 36px;
        color: #333;
      }
      small {
        font-size: 14px;
        color: #999;
      }
      p {
        font-size: 16px;
        line-height: 1.5;
        color: #555;
      }
    </style>
  </head>
  <body>
    <p></p>
    <div id="news_block" class="col-md-8">
      <div id="news_block_title" style="border-width:2%; margin-bottom: 2%;">
        <h3 style="margin-left: 5%;" class="fst-italic">
        <?php echo ($news_title == '') ? 'Page Title' : $news_title; ?>
        </h3>
      </div>
      <article class="blog-post">
        <p class="blog-post-meta"><?php if ($news_date != '') : ?>
          <h7> Дата добавления: <?php echo $news_date; ?></h7>
          <?php endif; ?>
        </p>

        <p><?php echo $news_desc['description_news'] ?></p>
        <hr>
    </div>
  </body>
</html>