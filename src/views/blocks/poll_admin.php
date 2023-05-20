<?php require_once dirname(__DIR__) . '../tables/polls.php';?>
<?php require_once dirname(__DIR__) . '../../functions/add_poll.php';?>
<?php require_once dirname(__DIR__) . '../../functions/add_row.php';?>
<script>
    $(document).ready(function() {
        $('#myTable3').DataTable({
            "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            "pageLength": 3,
            "order": [[ 1, "asc" ]],
            "language": {
            "lengthMenu": "Показать _MENU_ записей",
            "zeroRecords": "Ничего не найдено",
            "info": "Страница _PAGE_ из _PAGES_",
            "infoEmpty": "Нет записей для отображения",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "search": "",
            "paginate": {
                "first": "Первая",
                "last": "Последняя",
                "next": ">>",
                "previous": "<<"}
            },
            "dom": 'Bfrtip',
            "buttons": [
        {
          extend: 'pdf',
          text: 'Скачать в .pdf'
        }],
            "columnDefs": [
            {
            "targets":-1,
            "data": null,
            "defaultContent":"",
            "className": "dt-right",
            "render":function(data,type,row){
                return '<button class="delete-row">Удалить</button><button class="edit-row">Редактировать</button>'
            }
            }]
        });
    });

    //функция для открытия формы создания новой записи
    function showAddForm(){
        $('#add_poll_form').show();
    }
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="add-row-modal" class="modal popup-bg" style="display:none;">
  <div id="createUserModalContent" class="popup">
    <div class="modal-header pb-4 border-bottom-0">
      <h1 class="fw-bold mb-0 fs-2">Создать новое голосование</h1>
      <button id="add-row-cancel" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideEditForm()"></button>
    </div>
    <div class="modal-body p-5 pt-0">
      <form id="add-poll-form" action="../../functions/add_poll.php" method="post">
        <div class="form-floating mb-3">
          <input type="hidden" id="add-poll-id" name="add-poll-id" value="">
          <input type="text" id="name_poll" name="name_poll" value="" class="form-control rounded-3" placeholder="Заголовок">
          <label for="name_poll">Наименование</label>
        </div>
        <div class="form-floating mb-3">
          <textarea id="main_result" name="main_result" value="" class="form-control rounded-3" placeholder="Содержание" style="height: 80px;"></textarea>
          <label for="main_result">Основной результат</label>
        </div>
        <div class="form-floating mb-3">
          <textarea id="description_poll" name="description_poll" value="" class="form-control rounded-3" placeholder="Содержание" style="height: 80px;"></textarea>
          <label for="description_poll">Описание</label>
        </div>
        <div class="form-floating mb-3">
          <select id="status" name="status">
            <option value="1">Открыто</option>
            <option value="2">Закрыто</option>
            <option value="3">Отменено</option>
          </select>
        </div>
        <div class="form-floating mb-3">
          <button name="add_poll" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Добавить запись</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="edit-row-modal" class="modal popup-bg" style="display:none;">
  <div id="createUserModalContent" class="popup">
    <div class="modal-header pb-4 border-bottom-0">
      <h1 class="fw-bold mb-0 fs-2">Редактировать голосование</h1>
      <button id="add-row-cancel" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideEditForm()"></button>
    </div>
    <div class="modal-body p-5 pt-0">
      <form id="edit-poll-form" action="../../functions/add_poll.php" method="post">
        <div class="form-floating mb-3">
          <input type="hidden" id="edit-poll-id" name="add-poll-id" value="">
          <input type="text" id="edit_name_poll" name="edit_name_poll" value="" class="form-control rounded-3" placeholder="Заголовок">
          <label for="edit_name_poll">Наименование</label>
        </div>
        <div class="form-floating mb-3">
          <textarea id="edit_main_result" name="edit_main_result" value="" class="form-control rounded-3" placeholder="Содержание" style="height: 80px;"></textarea>
          <label for="edit_main_result">Основной результат</label>
        </div>
        <div class="form-floating mb-3">
          <textarea id="edit_description_poll" name="edit_description_poll" value="" class="form-control rounded-3" placeholder="Содержание" style="height: 80px;"></textarea>
          <label for="edit_description_poll">Описание</label>
        </div>
        <div class="form-floating mb-3">
          <select id="edit_status" name="status">
            <option value="1">Открыто</option>
            <option value="2">Закрыто</option>
            <option value="3">Отменено</option>
          </select>
        </div>
        <div class="form-floating mb-3">
          <button name="edit_poll" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Редактировать запись</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var addRowModal = document.getElementById("add-row-modal");
  var addRowBtn = document.getElementById("add-row-btn");
  var addRowCancelBtn = document.getElementById("add-row-cancel");
  addRowBtn.onclick = function() {
    addRowModal.style.display = "block";
  }
  addRowCancelBtn.onclick = function() {
    addRowModal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == addRowModal) {
      addRowModal.style.display = "none";
    }
  }

  $(document).ready(function() {
    $('#add-poll-form').submit(function(event) {
      // Отменяем отправку формы по умолчанию
      event.preventDefault();

      // Получаем значения полей формы
      var name_poll = $('#name_poll').val();
      var main_result = $('#main_result').val();
      var description_poll = $('#description_poll').val();
      var status_id = $('#status').val();

      // Отправляем данные на сервер методом POST
      $.ajax({
        type: 'POST',
        url: '../functions/add_poll.php',
        data: {
          name_poll: name_poll,
          main_result: main_result,
          description_poll: description_poll,
          status_id: status_id
        },
        success: function(response) {
          // Если сервер вернул успешный ответ, перезагружаем страницу
          window.location.reload();
        }
      });
    });
  });

    function showEditForm(id, name, description, result, status_id) {
        document.getElementById("edit-id-poll").value = id;
        document.getElementById("edit_name_poll").value = name;
        document.getElementById("edit_main_result").value = description;
        document.getElementById("edit_description_poll").value = result;
        document.getElementById("edit_status").value = status_id;
        document.getElementById("edit-row-modal").style.display = "block";
    }

    $(document).ready(function() {
        $(document).on("click", ".edit-row", function() {
        var id = $(this).closest("tr").find("td:eq(0)").text();
        var name = $(this).closest("tr").find("td:eq(1)").text();
        var description = $(this).closest("tr").find("td:eq(3)").text();
        var result = $(this).closest("tr").find("td:eq(2)").text();
        var status_id = $(this).closest("tr").find("td:eq(4)").text();
        showEditForm(id, name, description, result, status_id);
        });
    });

    $(document).ready(function() {
        $(document).on("click", ".delete-row", function() {
            var id = $(this).closest("tr").find("td:eq(0)").text();
            var confirmDelete = confirm("Вы уверены, что хотите удалить эту запись?");
            if(confirmDelete) {
                $.ajax({
                url: "../functions/delete_poll.php",
                type: "POST",
                data: {id: id},
                success: function(response) {
                    if (response == "success") {
                    $(this).closest("tr").remove();
                    window.location.reload();
                    }
                }
                });
            }
        });
    });
</script>