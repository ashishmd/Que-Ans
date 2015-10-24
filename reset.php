
<?php
session_start();
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
            $password=$_POST["password"];

            $password=mysqli_real_escape_string($conn, $password);

            $user_name=$_SESSION['reset_user'];
            $result = "SELECT user_name FROM signup WHERE user_name = '$user_name'";            

            if(mysqli_num_rows($conn->query($result)) === 1) 
            {
                $sql = "UPDATE signup set pswd='$password' where user_name='$user_name'";

                if ($conn->query($sql) === TRUE) 
                {
                    //echo "<h2>Redirecting to login page...</h2>";
                    $message="signup completed login to continue";
                    echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/logout.php">';
                } 

                 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;       
                } 
                

            }

            else 
            {   
                $error1=" *Entered username is unavailable.";
            }
        
            
        }
        $conn->close();
    }
}
?>