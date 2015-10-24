<?php
    include('sign.php')
?>


<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Signup</title>

</head>
<body style="background-color:#E6E6FA;">    <br><br> 
    <div class="container">
        <div class="row">

            <div class="col-md-4">
            </div>

            <div class="col-md-4" style="box-shadow: 10px 10px 5px #888888; background-color: #F7F7F7; padding : 30px 25px 80px 25px; border-radius:20px; margin-bottom:20px; border-shadow: 0px,1px,1px ">
                <h1 class="text-center">Signup</h1>
                <form action="" method="post" >
                    <div class= "form-group" >
                    
                        <label for="InputFirstname"> First Name</label>
                        <input type="text" name="firstname" class=" form-control" id="InputFirstname" placeholder="First Name" required autofocus><br>

                        <label for="InputLastname"> Last Name</label>
                        <input type="text" name="lastname" class=" form-control" id="InputLastname" placeholder="Last Name" required><br>

                        <label for="InputEmail"> Email Address</label>
                        <input type="email" name="email" class=" form-control" id="InputEmail" placeholder="Email" required><br>

                        <label for="InputExpertise"> Field Of Expertise</label>
                        <input type="text" name="field" class=" form-control"  list="fields" placeholder="Enter the field you are expert in" required autocomplete="off"><br>
                            <datalist id="fields" name="field">
                                <option>Select the field of expertise</option>
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
                        
                        <label for="InputUsername"> Username <?php echo '<span style="color: red; "> <b>'.$error1. '</b> </span>' ?></label>
                        <input type="text" name="username" class=" form-control" id="InputUsername" placeholder="Choose a unique username" required><br>

                        <label for="InputPassword"> Password</label>
                        <input type="password" name="password" class=" form-control" id="InputPassword" placeholder="Keep your Password safe" required><br>

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
                                    value="Create My Free Account"><br>
                        <div class="link text-center"><span class="glyphicon glyphicon-arrow-left"></span><a href="http://forum.tryitbuddy.com/index.php">   Go Back to Login</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
