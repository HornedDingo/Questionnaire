<?php require_once dirname(__DIR__) . '../forms/add_user.php';?>
<?php require_once dirname(__DIR__) . '../forms/edit_user.php';?>
<?php require_once dirname(__DIR__) . '../tables/users.php';?>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
            "pageLength": 20,
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

    var modal = document.getElementById('createUserModal');
    var openModalBtn = document.getElementById('openCreateUserModalBtn');
    var closeModalBtn = document.getElementById('closeModalBtn');
    openModalBtn.onclick = function() {
        modal.style.display = 'block';
    }
    closeModalBtn.onclick = function() {
        modal.style.display = 'none';
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    
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

    $('#myTable tbody').on('click', 'button.delete-row', function() {
        var data = $('#myTable').DataTable().row($(this).parents('tr')).data();
        var id = data[0];
        var confirmation = confirm("Вы уверены, что хотите удалить пользователя " + data[3] + " " + data[4] + " " + data[5] + "?");
        if (confirmation) {
            $('#myTable').DataTable().row($(this).parents('tr')).remove().draw();
        }
    });

    $(document).on("click", ".delete-row", function() {
        var row = $(this).closest("tr");
        var id = row.find("td:eq(0)").text();
        $.ajax({
            url: "../controllers/delete.php",
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
    
    $('#editModal').on('submit', function(event) {
        event.preventDefault();
        var id = $('#editUserId').val();
        var login = $('#editLogin').val();
        var password = $('#editPassword').val();
        var surname = $('#editSurname').val();
        var name = $('#editName').val();
        var patronymic = $('#editPatronymic').val();
        $.ajax({
            url: "../functions/edit_user.php",
            method: "POST",
            data: {
            id: id,
            login: login,
            password: password,
            surname: surname,
            name: name,
            patronymic: patronymic
            },
            success: function() {
                alert("Запись обновлена!");
                $('#editModal').hide();
                updateTable();
            },
                error: function() {
                alert("Ошибка обновления записи!");
            }
        });
    });

    function fillEditForm(data) {
        var row = $(data).closest("tr");
        var userId = row.find("td:first-child").text();
        var login = row.find("td:nth-child(2)").text();
        var password = row.find("td:nth-child(3)").text();
        var surname = row.find("td:nth-child(4)").text();
        var name = row.find("td:nth-child(5)").text();
        var patronymic = row.find("td:nth-child(6)").text();
        $("#editUserId").val(userId);
        $("#editLogin").val(login);
        $("#editPassword").val(password);
        $("#editSurname").val(surname);
        $("#editName").val(name);
        $("#editPatronymic").val(patronymic);
    }

    $(document).ready(function() {
        $("#myTable").on("click", ".edit-row", function() {
            fillEditForm($(this));
            $("#editModal").show();
        });

        $("#editModal").on("click", function(event) {
            if (event.target == this) {
                $(this).hide();
            }
        });
    });
</script>
