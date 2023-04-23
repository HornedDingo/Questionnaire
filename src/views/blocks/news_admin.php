<?php require_once dirname(__DIR__) . '../tables/news.php';?>
<script>
    $(document).ready(function() {
        $('#myTable2').DataTable({
            "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            "pageLength": 5,
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

    //заполняем таблицу данными (обновление таблицы)
    function updateTable() {
        $.ajax({
            url: '../functions/update_table.php',
            type: 'get',
            success: function(response) {
                $('#myTable tbody').html(response);
                $('#myTable tbody tr').each(function(){
                $(this).find('td:last').html('<button class="delete-row">Удалить</button><button class="edit-row">Редактировать</button>');
            });
            }
        });   
    }

    //спрашиваем подтверждение удаления новости
    $('#myTable2 tbody').on('click', 'button.delete-row', function() {
        var data = $('#myTable2').DataTable().row($(this).parents('tr')).data();
        var id = data[0];
        var confirmation = confirm("Вы уверены, что хотите удалить новость " + data[1] + "?");
        if (confirmation) {
            $('#myTable2').DataTable().row($(this).parents('tr')).remove().draw();
        }
    });

    //функция для удаления новости
    $(document).on("click", ".delete-row", function() {
        var row = $(this).closest("tr");
        var id = row.find("td:eq(0)").text();
        $.ajax({
            url: "../controllers/delete_news.php",
            method: "POST",
            data: { id: id },
            success: function() {
            row.remove();
            alert("Запись удалена");
            },
            error: function() {
            alert("Ошибка удаления записи");
            }
        });
    });
</script>