<?php include_once("./includes/connection.php") ?>

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
	<title>Admin Dashboard || Feedback System</title>

   <!-- ========== Meta tags ========== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assests/css/admindashboard.css">
      <!-- <link rel="stylesheet" type="text/css" href="./assests/css/homepagestyle.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <!-- ========== Important Links ========== -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- stats -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  
    <!-- ========== User Dashboard Navbar ========== -->
   <!-- <nav style="background: #A51C30" class="navbar navbar-expand-lg navbar-light">
     <ul>
      <a href="https://abes.ac.in"><img style="width: 40%;" src="./assests/images/abeslogo.png"></a>
     </ul>
     <div class="col-md-6 col-sm-1"></div>
     <div>
    <button style="border-color: white;
   color: white;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-success">Change Passoword</button>
      <a href="./includes/logout.php"><button style="border-color: white;
   color: white;" type="button" class="btn btn-outline-success"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</button></a></div>
   </nav> -->


   <header style="width: 100%;">
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
                  <img style="width: 80%;" src="https://admission.abes.ac.in/assets/images/abeslogo.png" id="homestyleimg" alt="ABESEC">
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
         session_start();
         $admin_name = $_SESSION["admin_name"];
         $admin_email = $_SESSION["admin_email"];
         $admin_contact = $_SESSION["admin_contact"];
         $admin_designation = $_SESSION["admin_designation"];

   ?>
   <!-- ========== PHP ends here ========== -->

   <div style="margin-top: 2em;" class="container-fluid">
      <div class="row">

         <!-- ========== Admin Dashboard Left-Panel ========== -->
         <div style="margin-top: 1.5em;" class="col-md-3">
            <h1 style="font-family: serif;color: brown;">Admin Details</h1>
            <ul style="margin-top: 1.8em;" class="list-group">
              <li class="list-group-item"><i class="fas fa-user"></i><?php echo ' '.$admin_name ?></li>
              <li class="list-group-item"><i class="fas fa-envelope"></i><?php echo ' '.$admin_email ?></li>
              <li class="list-group-item"><i class="fas fa-user"></i><?php echo ' '.$admin_designation ?></li>
              <li class="list-group-item"><i class="fas fa-phone"></i><?php echo ' '.$admin_contact ?></li>
            </ul>
         </div><br><br>
         <!-- ========== Admin Dashboard Left-Panel Ends here ========== -->


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

         <!-- ========== User Dashboard Right-Panel ========== -->
         <div class="col-md-9" id="dyanamicContent"  style="height: 75vh; overflow: auto;">
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
   document.getElementById("showStats").style.display = "none";
   $("#dyanamicContent").show();   
</script>

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
         $.post('results.php', { "ServiceId" : clicked_id }, (data, status)=>{
            document.getElementById("dyanamicContent").innerHTML = data;
         })         
     }
   
   // function reply_click(clicked_id)
   //   {    var responseToGraph = [['Response', 'Frequency']];
   //       $.post('includes/servicesfeedback.php', { "ServiceId" : clicked_id }, (data, status)=>{
            
   //          var responseRatingArray = JSON.parse(data);
   //          console.log(responseRatingArray);
   //          for(var i=0;i<10;i++){
   //            responseToGraph.push([""+parseInt(i+1)+"", parseInt(responseRatingArray[i])]);   
   //          }
   //          console.log(responseToGraph) ;
   //          google.charts.load('current', {'packages':['corechart']});
   //          google.charts.setOnLoadCallback(drawChart);
   //          $("#showStats").show();
            
   //          document.getElementById("dyanamicContent").style.display = "none";


            
   //          function drawChart() {
   //            var data = google.visualization.arrayToDataTable(
   //            responseToGraph
   //          );

              
   //            var options = {'title':'Service Details', 'width':400, 'height':400,sliceVisibilityThreshold:0 };

              
   //            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
   //            chart.draw(data, options);
   //          }
   //       })         
   //   }





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
       url: './changeadminpassword.php',
       data:{action : JSON.stringify(jsonObject)},
       success:function(html) {
         res = html;
         alert(res);
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

    



    function onAddHostelService(){
      var form = document.getElementById("add_hostel_service_form");
      let jsonObject = {};
      for(let field of form.elements) {
        if (field.name) {
            jsonObject[field.name] = field.value;
        }
      }
      console.log(JSON.stringify(jsonObject));   

       $.ajax({
       type: "POST",
       url: './add_hostel_service.php',
       data:{action : JSON.stringify(jsonObject)},
       success:function(html) {
         res = html;
         //alert(res);
        document.getElementById("hostel-service-toggle").click();
       },
       error: function (textStatus, errorThrown) {
            alert("Error Occured!");
        }
      }); 
      document.add_hostel_service_form.reset();

    }
    function responseFormSubmit(e){
      e.preventDefault();
    }

</script>


<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>