<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<button id="add-row-btn5" type="button" class="btn btn-primary" onclick="showAddForm()">Добавить вопрос</button> 
<?php require_once dirname(__DIR__) . '../tables/questions.php';?>
<?php require_once dirname(__DIR__) . '../forms/add_question.php';?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable4').DataTable({
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
                return '<button class="delete-row">Удалить</button>'
            }
            }]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#add-question-form').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../../src/functions/add_question.php',
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

    $(document).on("click", ".delete-row", function() {
        var row = $(this).closest("tr");
        var id = row.find("td:eq(0)").text();
        $.ajax({
            url: "../functions/delete_question.php",
            method: "POST",
            data: { id: id },
            success: function() {
            row.remove();
            alert("Запись удалена");
            },
            success: function(response) {
              alert(response);
              window.location.reload();
            },
            error: function() {
            alert("Ошибка удаления записи");
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
        $(document).on("click", ".delete-row", function() {
            var id = $(this).closest("tr").find("td:eq(0)").text();
            var confirmDelete = confirm("Вы уверены, что хотите удалить эту запись?");
            if(confirmDelete) {
                $.ajax({
                url: "../functions/delete_question.php",
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