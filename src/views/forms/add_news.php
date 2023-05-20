<div id="add-form" id="addModal" class="modal popup-bg" style="display:none;">
    <div id="createUserModalContent" class="popup">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Создать новость</h1>
            <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="hideEditForm()"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            <form id="add-news-form" action="../../../src/functions/add_news.php" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" id="add-news-id" name="add-news-id" value="">
                    <input type="text"  id="add-news-title" name="add-news-title" value="" class="form-control rounded-3" placeholder="Заголовок">
                    <label for="add-news-title">Заголовок</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea id="add-news-description" name="add-news-description" value="" class="form-control rounded-3" placeholder="Содержание" style="height: 200px;"></textarea>
                    <label for="add-news-description">Содержание</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="addDate" name="date_of_addition" value="" class="form-control rounded-3 datepicker" placeholder="Дата">
                    <label for="addDate">Дата</label>
                </div>
                <div class="form-floating mb-3">
                    <button id="add_news" name="add_news" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Добавить запись</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,  
      todayHighlight: true
    });
  });
</script>