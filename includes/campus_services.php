<?php 

  error_reporting(E_ALL & ~E_NOTICE);
  session_start();
  include_once("./../includes/connection.php");
  $stmt = $conn->query("SELECT * FROM services where type='campus'");
  $campus_services = $stmt->fetchAll();

  foreach($campus_services as $campus_service){
      echo '
      <div style="margin-top: 2%;margin-bottom: 2%;" class="col-6 col-sm-6 col-md-4 col-lg-2">
      
        <div id="'.$campus_service['service_id'].'" onClick="reply_click(this.id)" style="border-radius: 10%;" class="card">
          <img src="./images/services/campus/'.$campus_service['service_id'].'.jpg" alt="service" style="width:100%">
          <div class="container">
            <h6 style="margin-top: 2%;font-family: serif;color: brown;text-align:center;"><b>' .$campus_service['service_name']. '</b></h6>
          </div>
        </div>
      </div>
      ';
    }



      if($_SESSION["admin_loggedin"] == 1){
        echo '
        <div style="margin-top: 2%;margin-bottom: 2%;" class="col-6 col-sm-6 col-md-4 col-lg-2">
      
        <div data-toggle="modal" data-target="#campusModal" style="border-radius: 10%;" class="card">
          <img src="./images/services/hostel/addservice.jpg" alt="service" style="width:100%">
          <div class="container">
            <h6 style="margin-top: 2%;font-family: serif;color: brown;text-align:center;"><b>Add Service</b></h6>
          </div>
        </div>
      </div>
        ';
      }


?>

      <!-- ========== Add Campus Service Modal ========== -->
          <div class="modal" id="campusModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title">Add Campus Service</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                  <form id="add_campus_service_form" name="add_campus_service_form" method="post" enctype="multipart/form-data" onsubmit="onAddCampusService(event, this)">

                    <div class="container">
                      <div class="form-group">
                        <label for="oldPassword"><b>Service Name</b></label>
                        <input class="form-control" type="text" placeholder="Service Name" name="add_campus_service" required>
                      </div>
                      <div class="form-group">
                        <label for="uploadServicePhoto">Select Photo:</label>
                        <div class="photo-field-value">
                          <input type="file" class="form-control" id="uploadedServicePhoto" name="uploadedServicePhoto">
                        </div>
                      </div>
                      <button class="button-field btn btn-danger" type="submit">Add Service</button></br></br>
                    </div>

                  </form>
              </div>
            </div>
          </div>
        <!-- ========== Add Campus Service Modal Ends Here========== -->