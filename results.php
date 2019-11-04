<div style="margin-top: 1.5em; align-items: center;">
  <div class="row">
    <div class="col-md-8">
    <h1 style="font-family: serif;color: brown;">Feedback</h1>
    </div>
    <div class="col-md-4">
    <a style="color:brown;float:right;margin-bottom:2%;" href="./admindashboard.php">Back to Home</a>
  </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <input type="submit" data-toggle="modal" data-target="#add_questions" name="add_questions" class="btn btn-danger add_questions" value="Add Question">
    </div>
  </div>
  <br>
</div>

<div id="accordion">
  <div class="card" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <p>
          Overall Average Score
        </p>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <?php

          include_once("./includes/connection.php");
          $service_id = $_POST['ServiceId'];
          $service_id = intval($service_id);
          //var_dump($service_id);
          $stmt = $conn->prepare("SELECT AVG(responses) as avg FROM response_table where service_id = ?");
          $stmt->execute([$service_id]);
          $responses = $stmt->fetchAll();
          $a = $responses[0]["avg"] * 10;
          echo '<div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: '.$a.'%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div></br>';
          echo '<strong>Min Score: </strong><b>'.round($responses[0]["avg"], 2).'</b></br>';
          echo '<strong>Max Score: </strong><b>10</b>';

        ?>
      </div>
    </div>
  </div>
  <div class="card" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <p>
          Comments Of Students.
        </p>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <?php

          //include_once("./includes/connection.php");
          //$service_id = $_POST['ServiceId'];
          //$service_id = intval($service_id);
          //var_dump($service_id);
          $stmt2 = $conn->prepare("SELECT name, admission_number, branch, responses as comments from comment_response_table c NATURAL join student_table s where c.service_id =?");
          $stmt2->execute([$service_id]);
          $comment_responses = $stmt2->fetchAll();

          echo '<div class="container table-responsive">         
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Ad. No.</th>
                      <th>Branch</th>
                      <th>Response</th>
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($comment_responses as $comment_response) {
              echo '<tr>
                      <td>'.$comment_response["name"].'</td>
                      <td>'.$comment_response["admission_number"].'</td>
                      <td>'.$comment_response["branch"].'</td>
                      <td>'.$comment_response["comments"].'</td>
                    </tr>';
                  }
            echo '</tbody>
                </table>
              </div>';
          //echo $comment_responses['name'];

        ?>
      </div>
    </div>
  </div>
  <div class="card" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <p>
          Question-wise Average Score
        </p>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <?php
        $stmt3 = $conn->prepare("SELECT question, AVG(responses) as Average_Response FROM response_table NATURAL JOIN question_table WHERE service_id = ? GROUP BY ques_no");
        $stmt3->execute([$service_id]);
        $question_wise_responses = $stmt3->fetchAll();

        echo '<div class="container table-responsive">         
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Questions</th>
                      <th>Avg. Response</th>
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($question_wise_responses as $question_wise_response) {
              echo '<tr>
                      <td>'.$question_wise_response["question"].'</td>
                      <td>'.round($question_wise_response["Average_Response"], 2).'</td>
                    </tr>';
                  }
            echo '</tbody>
                </table>
              </div>';

        //var_dump($question_wise_responses);



        ?>
      </div>
    </div>
  </div>
</div>


  <div class="modal" id="add_questions">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Add a questions!</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <form id="add_new_questions_form" name="add_new_questions_form" action="add_question.php" method="post">
              <div class="container">
                <br>
                <div class="form-group">
                  
                  <label for="new_question"><b>Question</b></label>
                  <textarea class="new-question-value form-control" placeholder="Enter a new question!" name="new_question" required></textarea>
                </div>
                
                <button class="button-field btn btn-danger" data-dismiss="modal" type="button" onclick="onAddQuestionButtonClicked(<?php echo $_POST["ServiceId"] ?>);" >Add</button></br></br>

              </div>
            </form>
        </div>
      </div>
    </div>
