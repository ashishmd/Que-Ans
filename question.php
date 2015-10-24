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

    $username = $_SESSION['login_user'];
    $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
    $db=mysql_select_db("tryitbud_mini",$connection);
    $select_user_name=mysql_query("select * from signup where user_name='$username'", $connection);
    $select_row = mysql_fetch_assoc($select_user_name);
    $show_first_name =$select_row['first_name'];
    $show_last_name = $select_row['last_name'];
    $expertise = $select_row['expertise'];
    $question_id= $_GET['id'];
    $select_question = mysql_query("select question from questions where qid='$question_id'", $connection);
    $select_question_row = mysql_fetch_row($select_question);
    $question = $select_question_row[0];
    $_SESSION['question_id']=$question_id;

//................updating the total votes in table questions................
  $selec_question_max=mysql_query("SELECT max(qid) FROM questions",$connection);
  $question_row = mysql_fetch_row($selec_question_max);
  $max_question=$question_row[0];

  for ($i=1; $i <=$max_question ; $i++) 
  { 

  $select_aid = mysql_query("SELECT SUM(votes) FROM answers  where qid=$i",$connection);
  $aid_row = mysql_fetch_row($select_aid);
  $total_votes=$aid_row[0];

  mysql_query("update questions set total_votes =$total_votes  where qid =$i",$connection);
  $total_votes=0;
  }

//......................................................................................


    $select_aid = "SELECT aid FROM answers order by votes desc";
    $aid_order = mysql_query($select_aid);

    $aid_array = array();
    
    while($row = mysql_fetch_assoc($aid_order))
    {
        $aid_array[] = $row['aid'];
    }

    $length=count($aid_array);





    mysql_close($connection);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Question</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
          <style>
            body { padding-top: 70px; padding-bottom: 20px;background: url(images/body.jpg) fixed repeat; }
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


            <div class="container">
                <div class="row">

                    <div class="col-md-2">
                    </div>

                    <div class="col-md-6" style="background-color: #F7F7F7; border-radius: 20px;"> 
                        <h2 style="padding-left: 10px;"><span style="padding-left: 15px;" ></span> <span class="glyphicon glyphicon-hand-right"></span><span style="padding-left:15px;"></span><?php  echo ' '.'  ' . $question; ?></h2>
                        <form class="form-group" action="answer-question.php" method="POST" style="padding : 20px 20px 20px 20px;">
                            <label style="padding-bottom: 5px;" >If you know the answer</label><br>
                            <textarea class="form-control" rows="3" name="answer" placeholder="Enter the answer here. "required></textarea><br>
                            <button type="submit" class="btn btn-primary" value="Post Answer" ><span class="glyphicon glyphicon-share-alt"></span><span style="padding-left: 5px;" ></span>Give your answer</button></div>
                        </form>
                    </div>

                    <div class="col-md-4">
                    </div>

                </div>
            </div>  <br>


        <?php
            $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
            $db=mysql_select_db("tryitbud_mini",$connection);

            $answer = mysql_query("select * from questions where qid='$question_id'", $connection);
            $answered_fetch = mysql_fetch_assoc($answer);
            $question_answered=$answered_fetch['answered'];

            if($question_answered==1)
            {
           
                for($i=0;$i<$length;$i++)
                {
                    $a=$aid_array[$i];
                    $questions_id=mysql_query("select qid from answers where aid ='$a'", $connection);
                    $question_rows4 = mysql_fetch_row($questions_id);
                    $qid=$question_rows4[0];



                    $questions_answer=mysql_query("select answer from answers where aid ='$a'", $connection);
                    $question_rows3 = mysql_fetch_row($questions_answer);
                    $answer=$question_rows3[0];


                    $questions_username=mysql_query("select user_name from answers where aid ='$a'", $connection);
                    $question_rows5 = mysql_fetch_row($questions_username);
                    $username=$question_rows5[0];

                    $questions_first_name=mysql_query("select first_name from signup where user_name ='$username'", $connection);
                    $question_rows6 = mysql_fetch_row($questions_first_name);
                    $first_name=$question_rows6[0];


                    $questions_last_name=mysql_query("select last_name from signup where user_name ='$username'", $connection);
                    $question_rows7= mysql_fetch_row($questions_last_name);
                    $last_name=$question_rows7[0];

                    $votes_select=mysql_query("select votes from answers where aid ='$a'", $connection);
                    $votes_fetch = mysql_fetch_row($votes_select);
                    $votes=$votes_fetch[0];


                    if($qid==$question_id)
                    {
                        echo ' 
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-2">
                                    </div>

                                    <div class="col-md-6" style="background-color: #F7F7F7; border-radius : 10px; padding : 20px 20px 20px 20px;">
                                        <b>'.$first_name.' '.$last_name.' : </b>
                                            <form action="like.php" method="post">
                                            <input type = "hidden" name ="aid" value ='.$a.'>
                                            <input type = "hidden" name = "username" value="'.$username.'">
                                            <input type = "hidden" name = "qid" value="'.$qid.'">
                                            <button style="float: right;" type= "submit" name="upvote" class="btn btn-success  " ><span class="glyphicon glyphicon-plus"></span><span style="padding-left: 5px;"></span><b>'.$votes.'</b></button><br>
                                        </form> <div style="margin-left: 25px;padding-right:100px;"">'.$answer.'</div>
                                          <form action="report.php" method="post">
                                            <input type = "hidden" name ="aid" value ='.$a.'>
                                            <input type = "hidden" name = "username" value="'.$username.'">
                                            <input type = "hidden" name = "qid" value="'.$qid.'">
                                            <button style="float: right;" type= "submit" name="upvote" class="btn btn-danger  " ><span class="glyphicon glyphicon-minus"></span><span style="padding-left: 5px;"></span><b>spam</b></button>
                                        </form>
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
            }
            else 
            {
                echo ' 
                    <div class="container">
                        <div class="row">

                            <div class="col-md-2">
                            </div>

                            <div class="col-md-6" style="background-color: #F7F7F7; border-radius : 10px; padding-right: 40px; padding-top: 10px;">
                                <h4><b><span class= "glyphicon glyphicon-thumbs-down navbar-left"></span><span style="padding-left:10px;"></span>Oops! No Answers recieved yet. </b></h4>
              
                            </div>

                            <div class="col-md-4"> <span></span>
                            </div>

                        </div>
                    </div><br>';
        }
            mysql_close($connection);
        ?>



    </body>
</html>
<?php
}
?>