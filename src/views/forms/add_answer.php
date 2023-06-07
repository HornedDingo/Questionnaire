<div id="add-form" id="addModal" class="modal popup-bg" style="display: none;"> 
  <div class="popup"  style="background: antiquewhite;"> 
    <div class="modal-header p-5 pb-4 border-bottom-0"> 
      <h1 class="fw-bold mb-0 fs-2" style="margin: auto;">Добавить ответ к вопросу</h1> 
      <button id="closeModalBtn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideEditForm()"></button> 
    </div> 
    <form id="add-answer-form" method="post" action="/src/functions/add_answer.php" style="margin-left: 10%; margin-right: 10%;"> 
      <div class="form-floating mb-3"> 
        <input type="hidden" id="add-answer-id" name="add-answer-id" value=""> 
        <textarea id="add_name_answer" name="add_name_answer" value="" class="form-control rounded-3" placeholder="Вопрос"></textarea> 
        <label for="add_name_answer">Вариант ответа</label> 
      </div> 
      <div class="form-group"> 
        <label for="add_question"></label> 
        <select class="form-control" id="add_question" name="add_question" class="form-control rounded-3" required> 
        <?php 
          connectDB(); 
          $result = $mysqli->query("SELECT ID_question, name_question FROM question"); 
          if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { 
              echo "<option value='" . $row['ID_question'] . "'>" . $row['name_question'] . "</option>"; 
            } 
          } 
          closeDB(); 
        ?> 
        </select> 
      </div> 
      <button style="background-color: #d6a86c; border:0; margin-left:25%; margin-top:10%;" name="add_answer" type="submit" class="w-50 mb-4 btn btn-lg rounded-3 btn-primary" style="width: 2%; margin-bottom: 2%; margin-top: 4%; margin-left: 25%">Добавить</button> 
    </form> 
  </div> 
</div>