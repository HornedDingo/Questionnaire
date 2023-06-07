<div class="row featurette">
    <div class="col-md-7 order-md-2" style=" justify-content: center; margin: auto;">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="margin-top: 2%;">
            <li><a href="?page=my_applications" id="header_link_2" class="nav-link">Мои заявления</a></li>
            <li><a href="?page=applications_entry" id="header_link_2" class="nav-link">Заявления на въезд</a></li>
            <li><a href="?page=applications_visit" id="header_link_2" class="nav-link">Заявления на посещение</a></li>
        </ul>
        <hr class="featurette-divider" style="color: #d6a86c; height:2px;">
    </div>
</div>
<?php require_once(__DIR__) . '../../tables/applications_entry.php';?>

<script>
      $(document).ready(function() {
        $('#myTable').DataTable({
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
                return '<button class="accept-row" style="background-color: #d6a86c; color: white; border: 0; border-radius: 5px; padding: 5px 10px; cursor: pointer; margin-right: 2%;">Одобрить</button><button style="margin-top: 2%; background-color: #d6a86c; color: white; border: 0; border-radius: 5px; padding: 5px 10px; cursor: pointer; margin-right: 2%;" class="decline-row">Отклонить</button>'
            }
            }]
        });
    });

    $(document).on('click', '.accept-row', function() {
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        $.ajax({
            url: '../functions/update_entry.php',
            data: { id: id, status: 2 },
            type: 'POST',
            success: function() {
                row.find('td:eq(5)').text('Одобрено');
            },
            error: function() {
                alert('Ошибка при изменении статуса');
            }
        });
    });

    $(document).on('click', '.decline-row', function() {
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        $.ajax({
            url: '../functions/update_entry.php',
            data: { id: id, status: 3 },
            type: 'POST',
            success: function() {
                row.find('td:eq(5)').text('Отклонено');
                window.location.reload();
            },
            error: function() {
                alert('Ошибка при изменении статуса');
            }
        });
    });
</script>