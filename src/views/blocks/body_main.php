<main>
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="/src/assets/img/imgonline-com-ua-Resize-pL44yPT49vhn9DW.png" alt="ЖК Пригород Лесное" width="100%" height="10%">
                  <div class="container">
                      <div class="carousel-caption text-start">
                          <h1>Расположение</h1>
                          <p>Пригород лесное - район с высоким уровнем экологии.</p>
                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="/src/assets/img/seventh_photo.jpg" alt="ЖК Пригород Лесное" width="100%" height="50%">
                  <div class="container">
                      <div class="carousel-caption">
                          <h1>Транспортная доступность</h1>
                          <p>Расположение в 15 минутах от м. «Домодедовская».</p>
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
      <div class="container px-4 py-5" id="icon-grid">
          <h2 class="pb-2 border-bottom">Преимущества жизни в ЖК Пригород Лесное</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 py-5">
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/car-front-fill.svg" alt="Машина">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Парковочные места</h3>
                <p>На территории ЖК расположено большое количество стоянок для личных автомобилей.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/geo-alt-fill.svg" alt="Местоположение">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Местоположение</h3>
                <p>Находимся близко к м. «Домодедовская», «Зябликово» и «Красногвардейская». Время езды не более 15 минут.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/globe-europe-africa.svg" alt="Экология">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Экологичность района</h3>
                <p>Жилой комплекс окружен небольшим лесом и просторными полями, вдалеке от различных заводов и фабрик..</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/heart-pulse.svg" alt="Активность">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Здоровье и спорт</h3>
                <p>На территории комплекса построено много беговых дорожек, спортивных площадок и фитнес-центров.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/book-half.svg" alt="Библиотека">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Библиотека</h3>
                <p>Для студентов, школьников и просто любителей литературы была обустроена библиотека.</p>
              </div>
            </div>
            <div class="col d-flex align-items-start">
              <img id="icon" src="src/assets/icons/messenger.svg" alt="Мессенжер">
              <div>
                <h3 class="fw-bold mb-0 fs-4">Всегда на связи</h3>
                <p>Для вашего удобства используйте наш Telegram-канал для оперативного общения с администрацией.</p>
              </div>
            </div>
          </div>
        </div>
      <hr class="featurette-divider">
      <div class="row featurette" id="descriptionn">
          <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">О жилом комплексе</h2>
              <p class="lead">«Пригород Лесное» — жилой комплекс, в котором ценят разнообразие сценариев для жизни и отдыха. Одновременно удачное расположение квартала на юго-востоке Московской области — в 7 км от МКАД — и природное окружение помогают соблюдать баланс между городским ритмом и умиротворением.</p>
              <p class="lead">Рядом с проектом — метро «Домодедовская» и скоростные магистрали. В «Пригороде Лесном» есть собственные детские сады, школы, поликлиника и магазины. Во дворах домов оборудован пешеходный бульвар, построены детские и спортивные площадки</p>
          </div>
          <div class="col-md-5">
              <img src="src/assets/img/third_photo.jpg" alt="ЖК Пригород Лесное" width="90%" height="90%">
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
                <a href="/src//views//blocks//article.php?news_id='.$row['ID_news'].'" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
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
            <img src="src/assets/img/second_photo.webp" alt="ЖК Пригород Лесное" width="95%" height="95%">
          </div>
        </div>
    </main>
    
    <?php require_once dirname(__DIR__) . '../../views/blocks/authorization.php';  ?>
    <?php require_once dirname(__DIR__) . '../../views/blocks/registration.php';  ?>
    
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
  
                  <!-- <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Another title here</h6>
                        <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
                      </div>
                      <small class="opacity-50 text-nowrap">3d</small>
                    </div>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                      <div>
                        <h6 class="mb-0">Third heading</h6>
                        <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                      </div>
                      <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                  </a> -->