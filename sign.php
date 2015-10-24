
<?php
$error1="";
$message="";

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
            $user_name = strtolower($user_name);
            $first_name=$_POST["firstname"]; 
            $last_name=$_POST["lastname"];
            $email= $_POST["email"];
            $password=$_POST["password"];
            $field=$_POST["field"];
            $security_question=$_POST["security_question"];
            $security_answer=$_POST["security_answer"];

            $user_name=mysqli_real_escape_string($conn, $user_name);
            $first_name=mysqli_real_escape_string($conn, $first_name);
            $last_name=mysqli_real_escape_string($conn, $last_name);
            $email=mysqli_real_escape_string($conn, $email);
            $password=mysqli_real_escape_string($conn, $password);
            $field=mysqli_real_escape_string($conn, $field);
            $security_question=mysqli_real_escape_string($conn, $security_question);
            $security_answer=mysqli_real_escape_string($conn, $security_answer);

            $result = "SELECT user_name FROM signup WHERE user_name = '$user_name'";
            //$final=$conn->query($result);

            if(mysqli_num_rows($conn->query($result)) === 0) 
            {
                $sql = "INSERT INTO signup (first_name, last_name, email, expertise, user_name, pswd, security_question,security_answer)
                VALUES ( '$first_name', '$last_name', '$email','$field', '$user_name','$password', '$security_question','$security_answer')";

                if ($conn->query($sql) === TRUE) 
                {
                    //echo "<h2>Redirecting to login page...</h2>";
                    $conn->query("INSERT INTO profile (user_name) VALUES ( '$user_name')");
                    $message1 = "Thankyou for signing up. Your account has been created. Login to continue.";
                    echo "<script type='text/javascript'>alert('$message1');</script>";
                    echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/index.php">';
                } 

                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;       
                } 
                $conn->close();

            }

            else 
            {   
                $error1=" *Entered username is unavailable.";
            }
        
            
        }
    }

?> 