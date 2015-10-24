<?php
    include('forgot-password.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Reset</title>

</head>
<body style="background-color:#E6E6FA;">    <br><br> 
    <div class="container">
        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-4" style="box-shadow: 10px 10px 5px #888888; background-color: #F7F7F7; padding : 30px 25px 80px 25px; border-radius:20px; margin-bottom:20px; border-shadow: 0px,1px,1px ">
                <h1 class="text-center">Profile Reset</h1>
                <form action="" method="post" >
                    <div class= "form-group" >
                        <?php echo '<span style="color: red; "><center> <b>'.$error2. '</b> </center> </span>' ?>
                        <label for="InputFirstname"> Username</label>
                        <input type="text" name="username" class=" form-control" id="InputFirstname" placeholder="Username" required autofocus><br>

                        <label for="InputLastname"> Email</label>
                        <input type="text" name="email" class=" form-control" id="InputLastname" placeholder="Email" required><br>
  
                        <label for="security"> Security Question</label>
                        <select class="form-control" name="security_question" id="sel1" placeholder="Enter the field you are expert in">
                                <option>Select a security question</option>
                                <option>What is your pet's name?</option>
                                <option>In which school did you study?</option>
                                <option>What is your nationality?</option>
                                <option>Who is your favourite actor?</option>
                                <option>Which is your favourite book?</option>
                        </select>

                        <label for="securityAnswer"> Answer</label>
                        <input type="text" name="security_answer" class=" form-control" id="security_answer" placeholder="Your answer" required><br>



                        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                    value="Continue"><br>
                        <div class="link text-center"><span class="glyphicon glyphicon-arrow-left"></span><a href="http://forum.tryitbuddy.com/index.php">   Go Back to Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

