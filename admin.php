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
echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';
}

else
{
?>


<?php
    $role=$_SESSION['role'];
    if($role == "admin")
    {
        $username = $_SESSION['login_user'];
        $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
        $db=mysql_select_db("tryitbud_mini",$connection);
        $select_user_name=mysql_query("select * from signup where user_name='$username'", $connection);
        $select_row = mysql_fetch_assoc($select_user_name);
        $show_first_name =$select_row['first_name'];
        $show_last_name = $select_row['last_name'];

        $select_aid = "SELECT aid FROM answers order by spam desc";
        $aid_order = mysql_query($select_aid);

        $aid_array = array();
        
        while($row = mysql_fetch_assoc($aid_order))
        {
            $aid_array[] = $row['aid'];
        }

        $length=count($aid_array);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Question</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
                <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>


          <style>
            body { padding-top: 70px;  padding-bottom: 20px;background-image: url(images/body.jpg);
  background-repeat:repeat;}
          </style>
    </head>

    <body style="background-color:#E6E6FA;">


        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="http://forum.tryitbuddy.com/">Que and Ans</a>
                    </div>

                    <div>
                    <ul class="nav navbar-nav">
                    <li class=""><a href="http://forum.tryitbuddy.com/index.php"><span class="glyphicon glyphicon-home"></span><span style="padding-left: 5px;"></span> Home</a></li>
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
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <div style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; text-align:center; border-radius:20px; position:fixed">

                    <B><ul class="nav nav-pills nav-stacked fixed">
                    <li class=""><a href="http://forum.tryitbuddy.com/index.php">Home</a></li>
                    <li><a href="http://forum.tryitbuddy.com/profile.php">Profile</a></li>
                    <li><a href="http://forum.tryitbuddy.com/trending.php">Trending</a></li>
                    <li><a href="#">Categories</a></li>
                    </ul></B>

                    </div>
                </div>
                <div class="col-md-10">
                    <h2 style="color:white" ><span class="glyphicon glyphicon-comment" style="padding-left:100px;" ></span><span style="padding-left: 15px;">Questions To Review :</h2><br>
                </div>
            </div>
        </div>

        <?php
                //--------------code for getting spam answers---------
            for ($i=0; $i<$length ; $i++) 
            { 
                $select_aid = mysql_query("SELECT spam FROM answers  where aid= '$i'",$connection);
                $aid_row = mysql_fetch_row($select_aid);
                $spam=$aid_row[0];
                if($spam>4)
                {
                    $select_qid = mysql_query("SELECT * FROM answers  where aid='$i'",$connection);
                    $aid_row = mysql_fetch_assoc($select_qid);
                    $qid=$aid_row['qid'];
                    $answer=$aid_row['answer'];
                    $answer_user=$aid_row['user_name'];

                    $select_question = mysql_query("SELECT * FROM questions  where qid='$qid'",$connection);
                    $qid_row = mysql_fetch_assoc($select_question);
                    $question=$qid_row['question'];?>




                    <?php echo ' 
                            <div class="container">
                            <div class="row">

                            <div class="col-md-2">
                            </div>

                            <div class="col-md-6 none" style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; border-radius:20px;">  

                            <h3><span class="glyphicon glyphicon-hand-right"></span><span style="padding-left: 15px;"></span><a style= "text-decoration : none;"class "small" href="http://forum.tryitbuddy.com/question.php?id='.$qid.'">'.'   '.$question.'</a></h3>';
                                echo '<span style="padding-left: 55px;""></span>

                                <b>'.$answer_user.' :</b> <form action="remove.php" method="post">
                                <input type = "hidden" name ="aid" value ='.$i.'>
                                <input type = "hidden" name = "username" value="'.$answer_user.'">
                                <input type = "hidden" name = "qid" value="'.$qid.'">
                                <input type = "hidden" name = "remove" value = 0>
                                <button  type= "submit" name="upvote" class="btn btn-success" style="float :right;" ><span class="glyphicon glyphicon-ok"></span><span style="padding-left: 5px;"></span><b>Ignore</b></button><br>
                                </form><div style="margin-left: 55px; margin-right : 100px;"><span >'.$answer.'</span></div>

                                 <form action="remove.php" method="post">
                                <input type = "hidden" name ="aid" value ='.$i.'>
                                <input type = "hidden" name = "username" value="'.$answer_user.'">
                                <input type = "hidden" name = "qid" value="'.$qid.'">
                                <input type = "hidden" name = "remove" value = 1>
                                <button  type= "submit" name="upvote" class="btn btn-danger" style="float :right;" ><span class="glyphicon glyphicon-remove"></span><span style="padding-left: 5px;"></span><b>Remove</b></button>
                                </form>

                             '.'';

                
                            

                            echo '
                            </div>

                            <div class="col-md-4"> <span></span>
                            </div>

                            </div>
                            </div><br>';


                }
                else
                {
                    continue;
                }
            }
    //------------------------
        ?>





<?php
    }
    else
    {

        echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';
    }
}
?>
