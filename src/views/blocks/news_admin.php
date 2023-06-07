<div class="row featurette">
    <div class="col-md-7 order-md-2" style=" justify-content: center; margin: auto;">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="margin-top: 2%;">
            <li><a href="?page=news_read" id="header_link_2" class="nav-link">Страница просмотра</a></li>
            <li><a href="?page=news_edit" id="header_link_2" class="nav-link">Страница редактирования</a></li>
        </ul>
        <hr class="featurette-divider" style="color: #d6a86c; height:2px;">
    </div>
</div>

<?php require_once dirname(__DIR__) . '../tables/news.php';?>
<?php require_once dirname(__DIR__) . '../forms/edit_news.php';?>
<?php require_once dirname(__DIR__) . '../forms/add_news.php';?>

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

    $('#myTable2 tbody').on('click', 'button.delete-row', function() {
        var data = $('#myTable2').DataTable().row($(this).parents('tr')).data();
        var id = data[0];
        var confirmation = confirm("Вы уверены, что хотите удалить новость " + data[1] + "?");
        if (confirmation) {
            $('#myTable2').DataTable().row($(this).parents('tr')).remove().draw();
        }
    });

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

    $(document).ready(function() {
        $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
        $('.edit-row').click(function() {
        var row = $(this).closest('tr');
        var title = row.find('td:nth-child(2)').text();
        var description = row.find('td:nth-child(3)').text();
        var id = row.find('td:first').text();
        $('#edit-news-title').val(title);
        $('#edit-news-description').val(description);
        $('#edit-news-id').val(id);
        $('#edit-form').show();
        });
    });

    function hideEditForm() {
        $('#edit-form').hide();
        $('#add-form').hide();
    }

    function showAddForm(){
        $('#add-form').show();
    }
</script>