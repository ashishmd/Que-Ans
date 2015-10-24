
<?php
    session_start();
    $error2="";
    if (isset($_POST['submit'])) 
    {
        
        $servername = "localhost";
        $username = "tryitbud_ashish";
        $password = "ashishf788545";
        $dbname = "tryitbud_mini";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error); 
        }

        else
        {
            $user_name=$_POST["username"];
            $email= $_POST["email"];
            $security_question=$_POST["security_question"];
            $security_answer=$_POST["security_answer"];

            $user_name=mysqli_real_escape_string($conn, $user_name);
            $email=mysqli_real_escape_string($conn, $email);
            $security_question=mysqli_real_escape_string($conn, $security_question);
            $security_answer=mysqli_real_escape_string($conn, $security_answer);

            $result = "SELECT * FROM signup WHERE user_name = '$user_name' AND email='$email' AND security_question='$security_question' AND security_answer='$security_answer'    ";
            

            if(mysqli_num_rows($conn->query($result)) === 1) 
            {   
                $_SESSION['reset_user']=$user_name;
                echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/password-reset.php">'; 

            }
            else 
            {   
                $error2="Invalid information";
            }            

        }
        $conn->close();
    }

?> 