<?php
session_start();
$error='';
if (isset($_POST['submit'])) 
{
    if (empty($_POST['username']) || empty($_POST['password'])) 
    {
        $error = "Username or Password is invalid";
    }
    else 
    {
        $username=$_POST['username'];
        $username = strtolower($username);
        $password=$_POST['password'];
        $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $db = mysql_select_db("tryitbud_mini", $connection);
        $query = mysql_query("select * from signup where pswd='$password' AND user_name='$username'", $connection);
        $rows = mysql_num_rows($query);
        if ($rows == 1) 
        {
            $_SESSION['login_user']=$username;
            echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';
        } 
        else 
        {
            $error = "Username or Password is invalid";
        } 
    mysql_close($connection);
    }
}
?>