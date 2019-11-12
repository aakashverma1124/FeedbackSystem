<!DOCTYPE html>
<html>
<head>

<title>Feedback System | ABES Engineering College</title>

	<!-- ========== Meta tags ========== -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

	<!-- ========== Important Links ========== -->
	<link rel="stylesheet" type="text/css" href="./assests/css/homepagestyle.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<!-- ========== Homepage Navbar ========== -->
	<!-- <nav style="background: #A51C30" class="navbar navbar-expand-lg navbar-light">
	  <ul>
	  	<a href="https://abes.ac.in"><img style="width: 50%;" src="./assests/images/abeslogo.jpg"></a>
	  </ul>
	  <div style="background-color: white;" class="col-md-6"></div>
	  <div><h3 style="color: white">Feedback System</h3></div>
	</nav> -->
	<header style="width: 100%;">
		<div class="container-fluid">
          <div class="row">
            <div style="float:center;" class="col-md-2">
                  <img src="https://admission.abes.ac.in/assets/images/abeslogo.png" id="homestyleimg" alt="ABESEC">
            </div>
            <div class="col-md-10" style="background-color: #A51C30;">
                <h2><b style="font-weight: 300; color: #fff; float: right; margin-top: 1%;" id="homestyle">Feedback System | ABESEC</b>
                </h2>
            </div>
            </div>
          </div>
          <hr>    
       </header>
	<!-- ========== Homepage Navbar Ends here ========== -->

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 style="margin-top:0.5em;font-family: serif;color: brown;">Instructions</h1>
				<div class="embed-responsive embed-responsive-1by1">
				  <iframe class="embed-responsive-item" src="./includes/instructions.php">
				  </iframe>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-modal">
				    <div class="form-toggle">
				        <button style="background-color: #A51C30" id="user-login-toggle" onclick="toggleUserLogin()">User Login</button>
				        <button id="admin-login-toggle" onclick="toggleAdminLogin()">Admin Login</button>
				    </div>

				    <div id="user-login-form">
				        <form action="./validate_user.php" method="post">
				        	<?php
				        		if(isset($_GET['status']) && $_GET['status'] == 'failed') {
				        			echo '<p style="color:red;">Invalid User or Password!</p>';
				        		}
				        	?>
				            <input type="text" id="admission_number" name="admission_number" placeholder="Admission Number"/>
				            <input type="password" id="password" name="user_password" placeholder="Password"/>
				            <input style="background-color: #A51C30" type="submit" name="user_login" class="btn login" value="Login">
				            <p><a style="color: #A51C30" href="javascript:void(0)">Forgot password?</a></p>
				            <hr/>
				        </form>
				    </div>

				    <div id="admin-login-form">
				        <form action="./validate_admin.php" method="post">
				        	<?php
				        		if(isset($_GET['status']) && $_GET['status'] == 'failed') {
				        			echo '<p style="color:red;">Invalid User or Password!</p>';
				        		}
				        	?>
				            <input type="text" id="admin_email" name="admin_email" placeholder="Email"/>
				            <input type="password" id="admin_password" name="admin_password" placeholder="Password"/>
				            <input style="background-color: #A51C30" type="submit" name="admin_login" class="btn login" value="Login">
				            <p><a style="color: #A51C30" href="javascript:void(0)">Forgot password?</a></p>
				            <hr/>
				        </form>
				    </div>
				</div>
			</div>

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

	function toggleAdminLogin(){
	   document.getElementById("user-login-toggle").style.backgroundColor="#fff";
	    document.getElementById("user-login-toggle").style.color="#222";
	    document.getElementById("admin-login-toggle").style.backgroundColor="#A51C30";
	    document.getElementById("admin-login-toggle").style.color="#fff";
	    document.getElementById("user-login-form").style.display="none";
	    document.getElementById("admin-login-form").style.display="block";
	}

	function toggleUserLogin(){
	    document.getElementById("user-login-toggle").style.backgroundColor="#A51C30";
	    document.getElementById("user-login-toggle").style.color="#fff";
	    document.getElementById("admin-login-toggle").style.backgroundColor="#fff";
	    document.getElementById("admin-login-toggle").style.color="#222";
	    document.getElementById("admin-login-form").style.display="none";
	    document.getElementById("user-login-form").style.display="block";
	}

</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.location.href.indexOf("status=failed") > -1) {
      alert("Invalid User");
      window.location.href = 'index.php';
    }

  });
</script> -->
