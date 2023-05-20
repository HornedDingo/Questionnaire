<div id="add-form" id="addModal" class="modal popup-bg" style="display: none;"> 
  <div class="popup"> 
    <div class="modal-header p-5 pb-4 border-bottom-0"> 
      <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Добавить вопрос</h1> 
      <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideEditForm()"></button> 
    </div> 
    <form id="add-question-form" method="post" action=""> 
      <div class="form-floating mb-3"> 
        <input type="hidden" id="add-question-id" name="add-news-id" value=""> 
        <textarea id="add-name-question" name="add-name-question" value="" class="form-control rounded-3" placeholder="Вопрос"></textarea> 
        <label for="add-name-questione">Вопрос</label> 
      </div> 
      <div class="form-group"> 
        <label for="add-role"></label> 
        <select class="form-control" id="add-role" name="add_role" class="form-control rounded-3" required> 
        <?php 
          connectDB(); 
          $result = $mysqli->query("SELECT ID_role, name_role FROM role"); 
          if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { 
              echo "<option value='" . $row['ID_role'] . "'>" . $row['name_role'] . "</option>"; 
            } 
          } 
          closeDB(); 
        ?> 
        </select> 
      </div> 
      <div class="form-group"> 
        <label for="add-poll"></label> 
        <select class="form-control" id="add-poll" name="add_poll" class="form-control rounded-3" required> 
        <?php 
          connectDB(); 
          $result = $mysqli->query("SELECT ID_poll, name_poll FROM poll"); 
          if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { 
              echo "<option value='" . $row['ID_poll'] . "'>" . $row['name_poll'] . "</option>"; 
            } 
          } 
          closeDB(); 
        ?> 
        </select> 
      </div> 
      <button name="add_question" type="submit" class="w-50 mb-4 btn btn-lg rounded-3 btn-primary" style="width: 2%; margin-bottom: 2%; margin-top: 4%; margin-left: 25%">Добавить</button> 
    </form> 
  </div> 
</div>