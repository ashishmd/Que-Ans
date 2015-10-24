<?php
include('login.php');
if(isset($_SESSION['login_user'])){
echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';
}
?>
<!DOCTYPE html>
<html> 
<head>
<title>Login</title> 
<link href="css/bootstrap.min.css" rel="stylesheet"> 
</head>
    <body style="background-color:#E6E6FA;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" style="box-shadow: 10px 10px 5px #888888; margin-top:150px ;background-color: #F7F7F7; padding : 20px 50px 50px 50px; border-radius:20px; margin-bottom:20px;">
                    <h1 class="text-center">Login</h1>
                    
                    <form action="" method="post">
                        <input id="name" class="form-control" name="username" placeholder="Username" type="text" autofocus required><br>
                        <input id="password" class="form-control" name="password" placeholder="Password" type="password" required><br>
                        <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value=" Login To My Account"><br><br>
                    </form>
                    
                    <div class="text-center"><?php echo '<b style="color:red">'.$error.'</b>'; ?></div>
                    <div class="link text-center"><a style="text-decoration:none;" href="http://forum.tryitbuddy.com/forgot.php">Forgot Password?</a></div><br>
                    <div class="link text-center"><a style="text-decoration:none;" href="http://forum.tryitbuddy.com/signup.php">Create an account</a></div>
                    
                </div>
            </div>

        </div>
    </body> 
</html> 
