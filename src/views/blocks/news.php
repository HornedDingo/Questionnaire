<?php
  $news_title = '';
  $news_date = '';
  if (isset($_GET['news_id'])) {
      $news_id = $_GET['news_id'];
      require_once dirname(__DIR__) . '../../functions/function.php';
      $news_array = getSmthFromNews('ID_news', $news_id);
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
    <!-- <?php require_once "../blocks/head_main.php" ?> -->
    <title><?php echo ($news_title == '') ? 'Page Title' : $news_title; ?></title>
  </head>
  <body>
    <h1><?php echo ($news_title == '') ? 'Page Title' : $news_title; ?></h1>
    <?php if ($news_date != '') : ?>
    <small><?php echo $news_date; ?></small>
    <?php endif; ?>
  </body>
</html>