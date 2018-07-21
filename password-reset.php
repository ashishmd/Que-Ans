<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Reset Password</title>

</head>

<body style="background-color:#E6E6FA;">    <br><br> 
    <div class="container">
        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-4" style="box-shadow: 10px 10px 5px #888888; background-color: #F7F7F7; padding : 30px 25px 80px 25px; border-radius:20px; margin-bottom:20px; border-shadow: 0px,1px,1px ">
            	<p></p>
                <h1 class="text-center">Reset Password</h1>
                <form method="post" action="reset.php">
                    <div class= "form-group" >

                        <label for="InputPassword"> Password</label>
                        <input type="password" name="password" class=" form-control" id="InputPassword" placeholder="Keep your Password safe" required><br>
                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                    value="Reset My Account">
                    </div>
                </form>
                <div class="link text-center"><span class="glyphicon glyphicon-arrow-left"></span><a href="http://forum.tryitbuddy.com/index.php">   Go Back to Login</a></div>
            </div>
        </div>
    </div>
</body>




</html>
