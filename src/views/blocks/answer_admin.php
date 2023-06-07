<button id="add-row-btn5" type="button" class="btn btn-primary">Добавить вариант ответа</button>
<?php require_once dirname(__DIR__) . '../tables/answers.php';?>
<?php require_once dirname(__DIR__) . '../../functions/add_row.php';?>
<?php require_once dirname(__DIR__) . '../forms/add_answer.php';?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable5').DataTable({
            "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            "pageLength": 4,
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
                return '<button class="delete-row">Удалить</button>'
            }
            }]
        });
    });
</script>
<script>
    $(document).on("click", ".delete-row", function() {
    var row = $(this).closest("tr");
    var id = row.find("td:eq(0)").text();
    $.ajax({
        url: "../functions/delete_answer.php",
        method: "POST",
        data: { id: id },
        complete: function(response) {
        if (response.responseText == "success") {
            row.remove();
            window.location.reload();
            alert("Запись удалена");
        } else {
            alert("Запись удалена");
            window.location.reload();
        }
        }
    });
    });
</script>
<script>
    var addForm = document.getElementById("add-form");

    var btn = document.getElementById("add-row-btn5");

    btn.onclick = function() {
        addForm.style.display = "block";
    }

    $(document).ready(function() {
        $('#add-answer-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../../src/functions/add_answer.php',
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