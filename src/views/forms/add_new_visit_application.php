<div id="add-new-form" class="modal popup-bg" style="display: none;"> 
  <div class="popup"  style="background: antiquewhite;"> 
    <div class="modal-header pb-4 border-bottom-0"> 
      <h1 class="fw-bold mb-0 fs-2" style="margin-left: 10%; color:#6b3d08;">Новое заявление на въезд</h1> 
      <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideEditForm2()"></button> 
    </div> 
    <form id="add-visit-form" method="post" action="/src/functions/add_visit_application.php" style="margin-left: 10%; margin-right: 10%;"> 
      <div class="form-floating mb-3"> 
            <input type="hidden" id="add-entry-id" name="add-entry-id" value=""> 
      </div> 
      <div class="form-floating mb-3">
            <input type="text"  id="guests_surname" name="guests_surname" value="" class="form-control rounded-3" placeholder="Фамилия гостя">
            <label for="guests_surname">Фамилия гостя</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text"  id="guests_name" name="guests_name" value="" class="form-control rounded-3" placeholder="Имя гостя">
            <label for="guests_name">Имя гостя</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text"  id="guests_patronimyc" name="guests_patronimyc" value="" class="form-control rounded-3" placeholder="Отчество гостя">
            <label for="guests_patronimyc">Отчество гостя</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text"  id="purpose_of_the_visit" name="purpose_of_the_visit" value="" class="form-control rounded-3" placeholder="Цель визита">
            <label for="purpose_of_the_visit">Цель визита</label>
        </div>
      <button style="background-color: #d6a86c; border:0; margin-left:25%; margin-top:5%;" name="add_answer" type="submit" class="w-50 mb-4 btn btn-lg rounded-3 btn-primary" style="width: 2%; margin-bottom: 2%; margin-top: 4%; margin-left: 25%">Добавить</button> 
    </form> 
  </div> 
</div>