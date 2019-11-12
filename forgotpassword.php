<?php
    //Creates Forgot Password Link
    //Table Created Is signup
    //Two Fields Are Required
    //1) Email
    //2) forgotlink 
    //3) Password 

    include_once("./connectlogin.php");
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
      $Link="http://localhost/forgotpassword/changepwd.php?reqchange=".$string."";
      echo "Please Visit The Following Link<br><br>";
      echo $Link;
      echo "<br><br><a href=\"".$Link."\">Click Here To Continue</a>";
    }


    //If Email Is Passed As Argument
    if(isset($_POST["email"]))
    {
        $email = test($_POST["email"]);
        //echo "<br>".$email."<br>";

        
      $randomLink= RandomString();
      //echo $randomLink."<br>";

      $stmt = $conn->query("SELECT * FROM signup");
      $users = $stmt->fetchAll();

      $stmt = $conn->query("UPDATE signup SET  forgotlink = '".$randomLink."' WHERE Email = '".$email."';");
        foreach ($users as $user)
        {
            if($user["Email"]==$email)
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
        echo "Email Not Found";
        echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Check Again\">";
        echo "</form>";

	    die();
    }


    else
    {
        echo "<form action=\"\" method=\"POST\">";
        echo "Check Email:<br>";
        echo "<input type=\"text\" name=\"email\" value=\"Email\"><br><br><br>";
        echo "<input type=\"submit\" value=\"Forgot Password\">";
        echo "</form>"; 
    }    
?>



