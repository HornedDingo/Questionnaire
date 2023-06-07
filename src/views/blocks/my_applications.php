<?php require_once dirname(__DIR__) . '../forms/add_new_entry_application.php' ?>
<?php require_once dirname(__DIR__) . '../forms/add_new_visit_application.php' ?>
<div class="row featurette">
    <div class="col-md-7 order-md-2" style=" justify-content: center; margin: auto;">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="margin-top: 2%;">
            <li><a href="?page=my_applications" id="header_link_2" class="nav-link">Мои заявления</a></li>
            <li><a href="?page=applications_entry" id="header_link_2" class="nav-link">Заявления на въезд</a></li>
            <li><a href="?page=applications_visit" id="header_link_2" class="nav-link">Заявления на посещение</a></li>
            <li style="align-self: center;"><button id="newEntry" onclick="openAddForm()" class="btnApplication" style="background-color: transparent; border: 0; color:#a06623;">Новая заявка на въезд</button></li>
            <li style="align-self: center;"><button id="newVisit" onclick="openAddForm2()" class="btnApplication" style="background-color: transparent; border: 0; color:#a06623;">Новая заявка на посещение</button></li>
        </ul>
        <hr class="featurette-divider" style="color: #d6a86c; height:2px;">
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
    <?php require_once dirname(__DIR__) . '../blocks/head_main.php' ?>
    <body>
    <div class="container" style="background: antiquewhite; width: 50%;">
            <h1 style="color: #d6a86c; font-family: ui-sans-serif; text-align: center;">Мои заявления</h1>
            <div class="row featurette">
                <div class="col-md-7 order-md-2" style=" justify-content: center; margin: auto;">
                    <hr class="featurette-divider" style="color: #d6a86c; height:2px;">
                </div>
            </div>
            <div id="polls">
            <ul style="margin-right: 2rem!important; margin: auto;margin-top:3%;">
                <?php
                    require_once dirname(__DIR__) . '../../functions/function.php';
                    session_start();
                    $application_array = get5ApplicationsVisit($_SESSION['ID_user']);
                    foreach ($application_array as $application_item) {
                        switch($application_item["application_status_ID"]){
                            case 1:
                                $application_status_name = "Ожидает одобрения";
                                break;
                            case 2:
                                $application_status_name = "Одобрено";
                                break;
                            case 3:
                                $application_status_name = "Отклонено";
                                break;
                        }
                        echo'
                        <a href="" style="margin-bottom:1%;" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <img src="/src/assets/icons/person-check-fill.svg" alt="twbs" width="25" height="25" class="flex-shrink-0" style="margin: auto;">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                            <h6 class="mb-0">'.$application_item["guests_surname"]. '</h6>
                            <p class="mb-0 opacity-75">'.explode("\n", wordwrap($application_item['purpose_of_the_visit'], 250))[0].'...</p>
                            </div>
                            <small class="opacity-50 text-nowrap">'.$application_status_name.'</small>
                        </div>
                        </a>
                        ';
                        require_once dirname(__DIR__) . '../../functions/function.php';
                        $application_array = get5ApplicationsEntry($_SESSION['ID_user']);
                        foreach ($application_array as $application_item) {
                            switch($application_item["application_status_ID"]){
                                case 1:
                                    $application_status_name = "Ожидает одобрения";
                                    break;
                                case 2:
                                    $application_status_name = "Одобрено";
                                    break;
                                case 3:
                                    $application_status_name = "Отклонено";
                                    break;
                            }
                            echo'
                            <a href="" style="margin-bottom:1%;" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <img src="/src/assets/icons/person-check-fill.svg" alt="twbs" width="25" height="25" class="flex-shrink-0" style="margin: auto;">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                <h6 class="mb-0">'.$application_item["guests_surname"]. '</h6>
                                <p class="mb-0 opacity-75">'.explode("\n", wordwrap($application_item['purpose_of_the_visit'], 250))[0].'...</p>
                                </div>
                                <small class="opacity-50 text-nowrap">'.$application_status_name.'</small>
                            </div>
                            </a>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
<script>
    function openAddForm() {
        document.getElementById("add-form").style.display = "block";
    }

    function hideEditForm(){
        document.getElementById("add-form").style.display = "none";
    }

    function openAddForm2() {
        document.getElementById("add-new-form").style.display = "block";
    }

    function hideEditForm2() {
        document.getElementById("add-new-form").style.display = "none";
    }

    $(document).ready(function() {
    $('#add-entry-form').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: '../../src/functions/add_entry_application.php',
        data: formData,
        success: function(response) {
          alert(response);
          window.location.reload();
        },
        error: function() {
          alert('Ошибка при отправке данных.');
        }
      });
    });
  });

  $(document).ready(function() {
    $('#add-visit-form').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: '../../src/functions/add_visit_application.php',
        data: formData,
        success: function(response) {
          alert(response);
          window.location.reload();
        },
        error: function() {
          alert('Ошибка при отправке данных.');
        }
      });
    });
  });
</script>