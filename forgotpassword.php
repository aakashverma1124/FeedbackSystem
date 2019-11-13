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
    //Creates Forgot Password Link
    //Table Created Is signup
    //Two Fields Are Required
    //1) Email
    //2) forgotlink 
    //3) Password 

    include_once("./includes/connection.php");
    //Function To Create Random String
    function RandomString() {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLen = strlen($chars);
        $randlink = '';
        for ($i = 0; $i < 70; $i++) {
            $randlink .= $chars[rand(0, $charsLen - 1)];
        }
        return $randlink;
    }

    //Test Function
    function test($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      //echo $data;  
        return $data;
    }
    

    //Generates Password Change Link 
    /*
    Add Email Function Here
    */
    function Linkgen($string){
      $Link="http://localhost/FeedbackSystem/changepwd.php?reqchange=".$string."";
      echo "Check your mailbox.<br><br>";

      echo '
        <ul>
            <li>Go to your Email Box.</li>
            <li>Follow the link sent on to your Email ID.</li>
        </ul>
      ';


        $to = $email;
        $subject = "Change Password";
        $txt = $Link;
        $headers = "From: info.aakash11@gmail.com" . "\r\n" .
        "CC: innoskrit@abes.ac.in";

        mail($to,$subject,$txt,$headers);
      // echo $Link;
      // echo "<br><br><a href=\"".$Link."\">Click Here</a>";
    }


    //If Email Is Passed As Argument
    if(isset($_POST["email"]))
    {
        $email = test($_POST["email"]);
        //echo "<br>".$email."<br>";

        
      $randomLink= RandomString();
      //echo $randomLink."<br>";

      $stmt = $conn->query("SELECT * FROM student_table");
      $users = $stmt->fetchAll();

      $stmt = $conn->query("UPDATE student_table SET  forgotlink = '".$randomLink."' WHERE email = '".$email."';");
        foreach ($users as $user)
        {
            if($user["email"]==$email)
            {
                $stmt->execute();
                Linkgen($randomLink);
                //echo "<form action=\"changepwd.php\" method=\"GET\">";
                //echo "RandString:<br>";
                //echo "<input type=\"text\" id=\"reqchange\" name=\"reqchange\" value=\"".$randomLink."\"><br><br><br>";
                //echo "<input type=\"submit\" value=\"Forgot Password\">";
                //echo "</form>"; 
                die();
            }
        }
        // echo "Email Not Found";
        // echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        // echo "<input type=\"submit\" value=\"Check Again\">";
        // echo "</form>";

        echo '
        <div class="row">
            <div class="col-md-6">
                <h2 style="color:#A51C30;">Email not found!<h2>
                <form action="./forgotpassword.php" method="POST">
                    <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Check again!</button>
                </form>
            </div>
        </div>

        ';

	    die();
    }


    else
    {
        // echo "<form action=\"\" method=\"POST\">";
        // echo "Check Email:<br>";
        // echo "<input type=\"text\" name=\"email\" value=\"Email\"><br><br><br>";
        // echo "<input type=\"submit\" value=\"Forgot Password\">";
        // echo "</form>"; 


        echo '
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                <button style="background-color: #A51C30;color:white;" type="submit" class="btn">Change Password</button>
                </form>
            </div>
        </div>

        ';
    }    
?>

       </div>
    <!-- <footer style="background: #A51C30;">
     <div class="footer-copyright text-center py-3">© 2019 Copyright -
       <a style="color:white" href="https://abes.ac.in">ABES Engineering College</a></br>
       Developed by<a style="color:white" href="http://innoskrit.in"> Innoskrit</a>
     </div>
   </footer> -->


</body>
</html>



