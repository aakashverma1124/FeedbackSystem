<?php 

error_reporting(E_ALL); 
session_start();
include_once("./includes/connection.php");

?>

<!DOCTYPE html>
<html>
<head>
     <style>
  .nav-link{
    color: #215173;
  }
  .nav-tabs .nav-link.active{
    background-color: #215173;
    color: azure;
  }
  .embed-responsive-1by1::before{
   padding: 0!important;
  }
</style>
	<title>User Dashboard || Feedback System</title>

   <!-- ========== Meta tags ========== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assests/css/userdashboard.css">
      <!-- <link rel="stylesheet" type="text/css" href="./assests/css/homepagestyle.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <!-- ========== Important Links ========== -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

   <!-- ========== User Dashboard Navbar ========== -->
   <header style="width: 100%;">
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
                  <img src="https://admission.abes.ac.in/assets/images/abeslogo.png" id="homestyleimg" alt="ABESEC">
            </div>
            <div class="col-md-10" style="background-color: #A51C30;">
              <div style="margin-top: 1.5%;float: right;">
                <button style="border-color: white;
               color: white;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-danger">Change Passoword</button>
                  <a href="./includes/logout.php"><button style="border-color: white;
               color: white;" type="button" class="btn btn-outline-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</button></a></div>
            </div>
            </div>
          </div>
          <hr>    
       </header>
   <!-- ========== User Dashboard Navbar Ends here ========== -->

   <!-- ========== Fetching data from session using PHP ========== -->
   <?php
         $name = $_SESSION["name"];
         $email = $_SESSION["email"];
         $branch = $_SESSION["branch"];
         $contact = $_SESSION["contact"];
         $admission_number = $_SESSION["admission_number"];

   ?>
   <!-- ========== PHP ends here ========== -->

   <div style="margin-top: 2em;" class="container-fluid">
      <div class="row">

         <!-- ========== User Dashboard Left-Panel ========== -->
         <div style="margin-top: 1.5em;" class="col-md-3">
            <h1 style="font-family: serif;color: brown;">Student Details</h1>
            <ul style="margin-top: 1.8em;" class="list-group">
              <li class="list-group-item"><i class='fas fa-ad'></i><?php echo ' '.$admission_number ?></li>
              <li class="list-group-item"><i class="fas fa-user"></i><?php echo ' '.$name ?></li>
              <li class="list-group-item"><i class='fas fa-book-reader'></i><?php echo ' '.$branch ?></li>
              <li class="list-group-item"><i class='fas fa-envelope'></i>
<?php echo ' '.$email ?></li>
              <li class="list-group-item"><i class="fas fa-phone"></i><?php echo ' '.$contact ?></li>
            </ul>
         </div><br><br>
         <!-- ========== User Dashboard Left-Panel Ends here ========== -->





<!-- 
         ================================================================================
        |                                  Useful Modals                                 |
         ================================================================================ -->

        <!-- ========== Change Password Modal ========== -->
         <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title">Change your Password here.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                  <form id="password-form" name="password-form" action="changepassword.php" method="post">
                    <div class="container">
                      <br>
                      <div class="form-group">
                        <label for="oldPassword"><b>Old Password</b></label>
                        <input class="passsword-value form-control" type="password" placeholder="Enter Your Old Password" name="oldPassword" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="newPassword"><b>New Password</b></label>
                        <input class="passsword-value form-control" type="password" placeholder="Enter Your New Password" name="newPassword" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="confirmNewPassword"><b>Confirm New Password</b></label>
                        <input class="passsword-value form-control" type="password" placeholder="Re-Enter Your New Password" name="confirmNewPassword" required>
                      </div>
                      
                      <button class="button-field btn btn-danger" data-dismiss="modal" type="button" onclick="onPasswordChange();" >Save Changes</button></br></br>

                    </div>
                  </form>
              </div>
            </div>
          </div>
        <!-- ========== Change Password Modal Ends here ========== -->

      

        <!-- 
         ================================================================================
        |                          Useful Modals Ends Here                               |
         ================================================================================ -->





         <!-- ========== User Dashboard Right-Panel ========== -->
         <div class="col-md-9" id="dyanamicContent" style="height: 75vh; overflow: auto;">
            <h1 style="margin-top:0.5em;font-family: serif;color: brown;text-align: center;">Services</h1>

            <div style="margin-top:2em;" class="form-toggle">
                 <button style="background-color: #A51C30" id="campus-service-toggle" onclick="campusService()">Campus</button>
                 <button id="hostel-service-toggle" onclick="hostelService()">Hostel</button>
            </div>

            <div id="all-services" class="embed-responsive embed-responsive-1by1">
               <div class="container-fluid" >
                  <div class="row">

                   </div>
               </div>      
            </div>

            <!-- <div id="hostel-services" class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item" src="./includes/hostel_services.php">
              </iframe>
            </div> -->
         </div>
         <!-- ========== User Dashboard Right-Panel Ends here ========== -->
      </div>
   </div>


   <footer style="background: #A51C30;">
     <div class="footer-copyright text-center py-3">© 2019 Copyright -
       <a style="color:white" href="https://abes.ac.in">ABES Engineering College</a></br>
       Developed by<a style="color:white" href="http://innoskrit.in"> Innoskrit</a>
     </div>
   </footer>

</body>
</html>

<script type="text/javascript">
   
   campusService();
   function campusService(){
       document.getElementById("campus-service-toggle").style.backgroundColor="#A51C30";
       document.getElementById("campus-service-toggle").style.color="#fff";
       document.getElementById("hostel-service-toggle").style.backgroundColor="#fff";
       document.getElementById("hostel-service-toggle").style.color="#222";

      $.get('includes/campus_services.php', (data, status)=>{
         $("#all-services .row").html(data);
      })
   }
   function hostelService(){
      document.getElementById("campus-service-toggle").style.backgroundColor="#fff";
       document.getElementById("campus-service-toggle").style.color="#222";
       document.getElementById("hostel-service-toggle").style.backgroundColor="#A51C30";
       document.getElementById("hostel-service-toggle").style.color="#fff";
      
      $.get('includes/hostel_services.php', (data, status)=>{
         $("#all-services .row").html(data);
      })
   }

   function reply_click(clicked_id)
     {
         $.post('includes/service_questions.php', { "ServiceId" : clicked_id }, (data, status)=>{
            document.getElementById("dyanamicContent").innerHTML = data;
         })         
     }


   // function toggleAdminLogin(){
   //    document.getElementById("campus-service-toggle").style.backgroundColor="#fff";
   //    document.getElementById("campus-service-toggle").style.color="#222";
   //    document.getElementById("hostel-service-toggle").style.backgroundColor="#57b846";
   //    document.getElementById("hostel-service-toggle").style.color="#fff";
   //    document.getElementById("campus-services").style.display="none";
   //    document.getElementById("hostel-services").style.display="block";
   // }

   // function toggleUserLogin(){
   //     document.getElementById("campus-service-toggle").style.backgroundColor="#57B846";
   //     document.getElementById("campus-service-toggle").style.color="#fff";
   //     document.getElementById("hostel-service-toggle").style.backgroundColor="#fff";
   //     document.getElementById("hostel-service-toggle").style.color="#222";
   //     document.getElementById("hostel-services").style.display="none";
   //     document.getElementById("campus-services").style.display="block";
   // }


  function onSubmitFeedbackButtonClicked(){
    var form = document.getElementById("feedback-form");
    let jsonObject = {};
    let service_id, comment_response;
    for(let field of form.elements) {
      if (field.name && field.name!=="service_id" && field.name!=="submit_feedback" && field.name != 'comment_response') {
          jsonObject[field.name] = field.value;
      }
      if (field.name=="service_id") {
        service_id = field.value; 
      }

      if (field.name=="comment_response") {
        comment_response = field.value; 
      }

    }  
    console.log(JSON.stringify(jsonObject)); 
    $.ajax({
     type: "POST",
     url: './savefeedback.php',
     data: {action : JSON.stringify(jsonObject), service_id: service_id, comment_response: comment_response},
     success:function(html) {
       res = html;
       //alert(res);
      document.getElementById("dyanamicContent").innerHTML = res;
     },
     error: function (textStatus, errorThrown) {
          alert("Error Occured!");
      }
    }); 

  }

  function onPasswordChange(){
      var form = document.getElementById("password-form");
      let jsonObject = {};
      for(let field of form.elements) {
        if (field.name) {
            jsonObject[field.name] = field.value;
        }
      }
      console.log(JSON.stringify(jsonObject));   

       $.ajax({
       type: "POST",
       url: './changepassword.php',
       data:{action : JSON.stringify(jsonObject)},
       success:function(html) {
         res = html;
         alert(res);
         //document.getElementById("loadedPage").innerHTML = res;
       },
       error: function (textStatus, errorThrown) {
            alert("Error Occured!");
        }
      }); 
      document.password-form.reset()
    }

    function responseFormSubmit(e){
      e.preventDefault();
    }

</script>


