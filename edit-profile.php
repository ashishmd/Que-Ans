 <?php

$connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545");

$db = mysql_select_db("tryitbud_mini", $connection);
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select user_name from signup where user_name='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);

$ses_role=mysql_query("select role from signup where user_name='$user_check'", $connection);
$role_select = mysql_fetch_assoc($ses_role);
$role = $role_select['role'];
$_SESSION['role'] =  $role;

$login_session =$row['user_name'];
if(!isset($login_session)){
mysql_close($connection); 
echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/index.php">';
}

else
{
?>
<?php
  $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
  $db=mysql_select_db("tryitbud_mini",$connection);
  $show=mysql_query("select * from signup where user_name='$login_session'", $connection);
  $row = mysql_fetch_assoc($show);
  $show_first_name =$row['first_name'];
  $show_last_name = $row['last_name'];
  $email = $row['email'];
  $expertise = $row['expertise'];
  $user_name = $login_session;
  $expertise = $row['expertise']; 
?>


<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Profile</title>
            <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            body { padding-top: 70px; padding-bottom: 20px;background: url(images/body.jpg) fixed repeat; }
            .fixed > li
            {
            text-align: center;
            font-weight: bold;

            }
            .none a:hover 
            {
            text-decoration: none;
            }

        </style>    

</head>
<body style="background-color:#E6E6FA;">    <br><br> 
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="http://forum.tryitbuddy.com/home.php">Que and Ans</a>
                    </div>

                    <div>
                    <ul class="nav navbar-nav">
                    <li class=""><a href="http://forum.tryitbuddy.com/home.php"><span class="glyphicon glyphicon-home"></span><span style="padding-left: 5px;"></span> Home</a></li>
                    <li class=""><a href="http://forum.tryitbuddy.com/trending.php"><span class="glyphicon glyphicon-fire"></span><span style="padding-left: 5px;"></span> Trending</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search" action="search.php" method="post">
                            <div class="form-group">
                                <input type="text" name="key" class="form-control" placeholder="Enter the keyword here" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" style="padding-right:10px"></span>Search</button>
                        </form>                    
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" style="padding-right: 4px;"></span><?php echo "  ".$show_first_name." ".$show_last_name; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://forum.tryitbuddy.com/profile.php"><span class="glyphicon glyphicon-eye-open" style="padding-right: 4px;" ></span>View Profile</a></li>
                                <li><a href="http://forum.tryitbuddy.com/edit-profile.php"><span class="glyphicon glyphicon-pencil" style="padding-right: 4px;" ></span>Edit Profile</a></li>

                            </ul>
                        </li>
                        <li><a href="http://forum.tryitbuddy.com/logout.php"><span class="glyphicon glyphicon-off"></span><span style="padding-left: 2px;"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container">
        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-4" style="box-shadow: 10px 10px 5px #888888; background-color: #F7F7F7; padding : 30px 25px 80px 25px; border-radius:20px; margin-bottom:20px; border-shadow: 0px,1px,1px ">
                <h1 class="text-center">Edit-Profile</h1>
                <form action="" method="post" >
                    <div class= "form-group" >
                    
                        <label for="InputFirstname"> First Name</label>
                        <input type="text" name="firstname" class=" form-control"  id="InputFirstname" placeholder="First Name" required autofocus><br>

                        <label for="InputLastname"> Last Name</label>
                        <input type="text" name="lastname" class=" form-control"  id="InputLastname" placeholder="Last Name" required><br>

                        <label for="InputEmail"> Email Address</label>
                        <input type="email" name="email" class=" form-control" id="InputEmail" placeholder="Email" required><br>

                        <label for="InputExpertise"> Field Of Expertise</label>
                        <input type="text" name="field" class=" form-control"  list="fields" placeholder="Enter the field you are expert in" required autocomplete="off"><br>
                            <datalist id="fields" name="field">
                                <option>Books</option>
                                <option>Business</option>
                                <option>Cooking</option>
                                <option>Design</option>
                                <option>Economics</option>
                                <option>Education</option>
                                <option>Fashion and Style</option>
                                <option>Fiction</option>
                                <option>Finance</option>
                                <option>Fine Art</option>
                                <option>Food</option>
                                <option>Health</option>
                                <option>History</option>
                                <option>Journalism</option>
                                <option>Literature</option>
                                <option>Marketing</option>
                                <option>Mathematics</option>
                                <option>Movies</option>
                                <option>Music</option>
                                <option>Philosophy</option>
                                <option>Photography</option>
                                <option>Psychology</option>
                                <option>Politics</option>
                                <option>Science</option>
                                <option>Sports</option>
                                <option>Technology</option>
                                <option>Television Series</option>
                                <option>Travel</option>
                                <option>Writing</option>
                            </datalist>
                                                
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                    value="Update My Profile">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

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
            $first_name=$_POST["firstname"]; 
            $last_name=$_POST["lastname"];
            $email= $_POST["email"];
            $field=$_POST["field"];
            
            $first_name=mysqli_real_escape_string($conn, $first_name);
            $last_name=mysqli_real_escape_string($conn, $last_name);
            $email=mysqli_real_escape_string($conn, $email);
            $field=mysqli_real_escape_string($conn, $field);

            //$result = "SELECT user_name FROM signup WHERE user_name = '$user_name'";
            //$final=$conn->query($result);
$sql = "UPDATE signup set first_name = '$first_name', last_name='$last_name', email='$email', expertise='$field' where user_name='$user_name'";
                if ($conn->query($sql) === TRUE) 
                {

               
                    $message1 = "Your account has been updated";
                    echo "<script type='text/javascript'>alert('$message1');</script>";
                    echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';
                 }
                $conn->close();

  
        
            
        }
    }
}
?> 