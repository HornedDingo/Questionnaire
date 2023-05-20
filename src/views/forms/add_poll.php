<!-- <div id="add-row-modal" class="modal popup-bg" style="display:none;">
    <div id="createUserModalContent" class="popup">
        <div class="modal-header pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Создать новое голосование</h1>
            <button id="add-row-cancel" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="hideEditForm()"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form id="add-poll-form" action="../../../src/functions/add_row.php" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" id="add-poll-id" name="add-poll-id" value="">
                    <input type="text"  id="name_poll" name="name_poll" value="" class="form-control rounded-3" placeholder="Заголовок">
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
                    <button name="add_row" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Добавить запись</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->