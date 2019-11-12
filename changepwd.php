
<?php
//Changes Password When Sent Link Is Clicked
//Creates Forgot Password Link
    //Table Created Is signup
    //Two Fields Are Required
    //1) Email
    //2) forgotlink -> Once Password Is Changed Link Expires
    //3) Password 

    include_once("./connectlogin.php");
    
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
        //echo "<br>".$CheckString."<br>";

        
      $stmt = $conn->query("SELECT * FROM signup");
      $users = $stmt->fetchAll();
      

        foreach ($users as $user)
        {
            if($user["forgotlink"]==$CheckString)
            {
                echo "<form action=\"changepwd.php\" method=\"POST\">";
                echo "Change Password:<br><input type=\"text\" id=\"pass\" name=\"pass\" value=\"Your New Password\"><br><br><br>";
                echo "<input type=\"hidden\" id=\"change\" name=\"change\" value=\" ".$CheckString."\">";
                echo "<input type=\"submit\" value=\"Change Password\">";
                echo "</form>";

                die();
            }
        }
	    echo "Link Expired";
        echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Check Again\">";
        echo "</form>";

        die();
    }
    elseif(isset($_POST["pass"])&&(isset($_POST["change"])))
    {

        $Pass = test($_POST["pass"]);
        //echo "<br>".$Pass."<br>";
        $randomLink = test($_POST["change"]);
        //echo "<br>".$randomLink."<br>";

        $stmt = $conn->query("UPDATE signup SET Password = '".$Pass."' , forgotlink=' ' WHERE forgotlink = '".$randomLink."';");
        
        echo "Password Changed Successfully";
        
        echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Check Again\">";
        echo "</form>";

	    die();
    }

    else
    {
        echo "</br>Data Fetch Failed"; 
        echo "<form action=\"forgotpassword.php\" method=\"POST\">";
        echo "<input type=\"submit\" value=\"Check Again\">";
        echo "</form>";
    }    
?>



