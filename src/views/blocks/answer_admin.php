<button id="add-row-btn5" type="button" class="btn btn-primary" onclick="showAddForm()">Добавить вариант ответа</button>
<?php require_once dirname(__DIR__) . '../tables/answers.php';?>
<?php require_once dirname(__DIR__) . '../../functions/delete_answer.php';?>
<?php require_once dirname(__DIR__) . '../../functions/add_row.php';?>
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

    $(document).ready(function() {
        $(document).on("click", ".delete-row", function() {
            var id = $(this).closest("tr").find("td:eq(0)").text();
            var confirmDelete = confirm("Вы уверены, что хотите удалить эту запись?");
            if(confirmDelete) {
                $.ajax({
                url: "../../functions/delete_answer.php",
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