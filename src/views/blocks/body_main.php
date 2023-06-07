<main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="/src/assets/img/жк_1.jpg" alt="Серебряная подкова" width="100%" height="110%">
              <div class="container">
                  <div class="carousel-caption text-start">
                      <h1>Расположение</h1>
                      <p>Наш коттеджный поселок - район с высоким уровнем экологии.</p>
                  </div>
              </div>
          </div>
          <div class="carousel-item">
              <img src="/src/assets/img/жк_3.png" alt="Серебряная подкова" width="100%" height="50%">
              <div class="container">
                  <div class="carousel-caption">
                      <h1>Транспортная доступность</h1>
                      <p>Расположение в 30 минутах от м. «Бунинская аллея».</p>
                  </div>
              </div>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
  </div>
  <div class="container px-4 py-5" id="properties">
          <h2 class="pb-2 border-bottom">Преимущества жизни в «Серебряной Подкове»</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 py-5">
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/book-half.svg" alt="Услуги">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Дополнительные услуги</h3>
                <p>Для вашего удобства мы предоставляем услуги по уходу за участком, подключением воды и др.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/geo-alt-fill.svg" alt="Местоположение">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Местоположение</h3>
                <p>Находимся близко к м. «Улица Скобелевская», «Бульвар Адмирала Ушакова» и «Бунинская аллея». Время езды не более 30 минут.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/globe-europe-africa.svg" alt="Экология">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Экологичность района</h3>
                <p>Жилой комплекс окружен просторными полями и омывается речкой Пахра.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/heart-pulse.svg" alt="Активность">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Здоровье и спорт</h3>
                <p>На территории комплекса построено много беговых дорожек, спортивных площадок и аллей.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/person-check-fill.svg" alt="Безопасность">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Безопасность</h3>
                <p>Коттеджный посёлок включает в себя два контрольно-пропускных пункта для охраны территории от посторонних лиц. </p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/messenger.svg" alt="Мессенджер">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Всегда на связи</h3>
                <p>Для вашего удобства используйте наш Telegram-канал для оперативного общения с администрацией.</p>
              </div>
            </div>
          </div>
        </div>
  <hr class="featurette-divider">
  <div class="row featurette" id="description">
      <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">О жилом комплексе</h2>
          <p class="lead">«Серебряная Подкова» — уникальный объект загородной недвижимости в Домодедовском районе Московской области. Поселок располагается в окружении полей и смешанных лесов, в 15 км к югу от столицы между Симферопольским и Новокаширским шоссе, и занимает территорию в 56 га.</p>
          <p class="lead">Своим названием поселок «Серебряная Подкова» обязан напоминающей подкову излучине реки Пахры, которая является украшением поселка. В солнечную погоду водная гладь реки искрится серебром, отражая склонившиеся над водой ивы и медленно проплывающие облака. В поселке более 300 домов.</p>
      </div>
      <div class="col-md-5">
          <img src="src/assets/img/жк_4.jpg" alt="Серебряная подкова" width="90%" height="90%">
      </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette" id="news">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading fw-normal lh-1">Следите за нашими новостями</h2>
      <div class="list-group" style="width: 90%;">
        <?php
          require_once dirname(__DIR__) . '../../functions/function.php';
          $news = getNews(3);
          foreach ($news as $row) {
            $news_description = getNewsDetails($row["ID_news"]);
            echo'
            <a class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
              <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
              <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                  <h6 class="mb-0">'.$row["name_news"].'</h6>
                  <p class="mb-0 opacity-75">'.explode("\n", wordwrap($news_description['description_news'], 250))[0].'...</p>
                </div>
                <small class="opacity-50 text-nowrap">'.$row["date_of_addition"].'</small>
              </div>
            </a>
            ';
          }
        ?>
      </div>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="src/assets/img/жк_2.jpg" alt="Серебряная подкова" width="90%" height="90%">
    </div>
  </div>
</main>
    
<?php require_once dirname(__DIR__) . '../../views/forms/authorization.php';  ?>
<?php require_once dirname(__DIR__) . '../../views/forms/registration.php';  ?>

<script>
  $(document).ready(function() {
    $('#openModalBtn').click(function() {
        $('#myModal').show();
    });
    
    $('#closeModalBtn, #myModal').click(function() {
        $('#myModal').hide();
    });
    
    $('#myModalContent').click(function(event) {
        event.stopPropagation();
    });
  });

  $(document).ready(function() {
    $('#openModalBtn2').click(function() {
        $('#myModal2').show();
    });
    
    $('#closeModalBtn, #myModal2').click(function() {
        $('#myModal2').hide();
    });
    
    $('#myModalContent2').click(function(event) {
        event.stopPropagation();
    });
  });
</script>
