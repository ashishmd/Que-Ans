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

    $db = mysql_select_db("tryitbud_mini", $connection);

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


    $show=mysql_query("select * from signup where user_name='$login_session'", $connection);
    $row = mysql_fetch_assoc($show);
    $show_first_name =$row['first_name'];
    $username = $login_session;
    $show_last_name = $row['last_name'];
    $expertise = $row['expertise']; 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Categories</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <style>
            body 
            {  
                padding-top: 170px; 
                padding-bottom: 20px;
                background: url(images/body.jpg) fixed repeat; 
            }
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
    <body style="background-color:#E6E6FA;">

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
          
          <li class="dropdown">
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

        <div class="container" style="">
            <div class="row">
                <div class="col-md-2" ></div>
                <div class="col-xs-8">
                    <center><h1 style="border-radius: 20px;background: #333;color:white; padding: 20px 20px 20px 20px;">Checkout the questions of different categories.</h1></center><br><br>

                    <form method = "post" action ="question-category.php" >
                        <input row="2" class= "form-control" type="text" list="fields" name ="category" autocomplete="off" placeholder="enter the category here" autofocus required ><br>
                        <datalist id="fields" name="category">
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
                            <option>Medicines</option>
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
                        <center><button type="submit" class="btn btn-lg btn-danger" style="text-align:center"><span class="glyphicon glyphicon-search" style="padding-right:10px"></span>Search</button></center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
  }
?>