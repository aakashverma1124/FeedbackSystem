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

       <div class="container">

<?php
//Changes Password When Sent Link Is Clicked
//Creates Forgot Password Link
    //Table Created Is signup
    //Two Fields Are Required
    //1) Email
    //2) forgotlink -> Once Password Is Changed Link Expires
    //3) Password 

    include_once("./includes/connection.php");
    
    //Test Function
    function test($data) 
    {
 	 	$data = trim($data);
  		$data = stripslashes($data);
        $data = htmlspecialchars($data);
        //echo $data;  
  		return $data;
    }
    
    //If Email Is Passed As Argument
    if(isset($_GET["reqchange"]))
    {
        $CheckString = test($_GET["reqchange"]);
        echo "<br>".$CheckString."<br>";

        
      $stmt = $conn->query("SELECT * FROM student_table");
      $users = $stmt->fetchAll();
      

        foreach ($users as $user)
        {
            if($user["forgotlink"]==$CheckString)
            {
                echo '
                <div class="row">
                    <div class="col-md-6">
                        <form action="./changepwd.php" method="POST">
                          <div class="form-group">
                            <label for="changepassword">Change Password: </label>
                            <input type="password" name="pass" id="pass" class="form-control" required>
                          </div>
                        <div class="form-group">
                            <input type="hidden" name="change" id="change" class="form-control" value="'.$CheckString.'" required>
                          </div>
                        <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Change Password</button>
                        </form>
                    </div>
                </div>
                ';

                die();
            }
        }
	    // echo "Link Expired";
     //    echo "<form action=\"forgotpassword.php\" method=\"POST\">";
     //    echo "<input type=\"submit\" value=\"Check Again\">";
     //    echo "</form>";


        echo '
            <h2 style="color:#A51C30;">Link is expired!<h2>
            <div class="row">
                    <div class="col-md-6">
                        <form action="./forgotpassword.php" method="POST">
                        <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Check Again</button>
                        </form>
                    </div>
            </div>

        ';

        die();
    }
    elseif(isset($_POST["pass"])&&(isset($_POST["change"])))
    {

        $Pass = test($_POST["pass"]);
        //echo "<br>".$Pass."<br>";
        $randomLink = test($_POST["change"]);
        //echo "<br>".$randomLink."<br>";

        $stmt = $conn->query("UPDATE student_table SET password = '".$Pass."' , forgotlink=' ' WHERE forgotlink = '".$randomLink."';");
        
        // echo "Password Changed Successfully";
        
        // echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        // echo "<input type=\"submit\" value=\"Check Again\">";
        // echo "</form>";


        echo '
            <h2 style="color:#A51C30;">Password Changed Successfully!<h2>
            <div class="row">
                    <div class="col-md-6">
                        <form action="./index.php" method="POST">
                        <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Back to Home</button>
                        </form>
                    </div>
            </div>

        ';

	    die();
    }

    else
    {
        // echo "</br>Data Fetch Failed"; 
        // echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        // echo "<input type=\"submit\" value=\"Check Again\">";
        // echo "</form>";

        echo '
            <h2 style="color:#A51C30;">Data Fetch Failed!<h2>
            <div class="row">
                    <div class="col-md-6">
                        <form action="./forgotpassword.php" method="POST">
                        <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Check Again</button>
                        </form>
                    </div>
            </div>

        ';
    }    
?>

</div>
</body>
</html>




