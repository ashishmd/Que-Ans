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
    $flag=0;
	$connection=mysql_connect("localhost", "tryitbud_ashish", "ashishf788545") or die ("Not connected");
	$db=mysql_select_db("tryitbud_mini",$connection) or die ("no database");

    $key=$_POST['key'];
//------------- select search results------------------
  $search_select=mysql_query("select qid from questions where question like '%$key%'",$connection);
  $question_array = array();
  while($row = mysql_fetch_assoc($search_select))
    {
      $question_array[] = $row['qid'];
    }

  $length=count($question_array);
//-----------------------------------------


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
?>

<?php
    $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
    $db=mysql_select_db("tryitbud_mini",$connection);
    $show=mysql_query("select * from signup where user_name='$login_session'", $connection);
    $row = mysql_fetch_assoc($show);
    $show_first_name =$row['first_name'];
    $username = $login_session;
    $show_last_name = $row['last_name'];
    $expertise = $row['expertise']; 

//-----------------updating the total votes in table questions
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
//------------------------------------------------------------------



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <body style="background-color:#E6E6FA;">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="http://forum.tryitbuddy.com/home.php">Que and Ans</a>
                    </div>

                    <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="http://forum.tryitbuddy.com/home.php"><span class="glyphicon glyphicon-home"></span><span style="padding-left: 5px;"></span> Home</a></li>
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
                    <div style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; border-radius:20px; position:fixed">

                    <ul class="nav nav-pills nav-stacked fixed">
                    <li class="active"><a href="http://forum.tryitbuddy.com/home.php">Home</a></li>
                    <li><a href="http://forum.tryitbuddy.com/profile.php">Profile</a></li>
                    <li><a href="http://forum.tryitbuddy.com/trending.php">Trending</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    </ul>

                    </div>
                </div>
                <div class="col-md-6">    
                </div>

                <div class="col-md-4">
                </div>
            </div>
        </div>

        <?php
            $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
            $db=mysql_select_db("tryitbud_mini",$connection);
            echo '<div class="container">
                  <div class =" row">
                  <div class="col-md-2"></div>
                  <div class="col-md-6">    <center><h1 style="color:black;">Your search for query "'.$key.'"</h1></center>
                  </div>
                  <div class="col-md-4"></div>
                  </div>
                  </div>';
            for($i=0;$i<$length;$i++)
            {
                $qid = array_shift($question_array);
                $question_select=mysql_query("select question from questions where qid='$qid'",$connection);
                $question_row= mysql_fetch_row($question_select);
                $question = $question_row[0];
                
                $flag=1;
                echo ' 
                            <div class="container">
                            <div class="row" style="padding-top: 20px;">

                            <div class="col-md-2">
                            </div>

                            <div class="col-md-6 none" style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; border-radius:20px;">  

                            <h3><span class="glyphicon glyphicon-hand-right"></span><span style="padding-left: 15px;"></span><a class "small" href="http://forum.tryitbuddy.com/question.php?id='.$qid.'">'.'   '.$question.'</a></h3>
                            </div>

                            <div class="col-md-4" ></div>


                            </div>
                            </div>';

            }

            if($flag==0)
            {
                echo ' 
                            <div class="container">
                            <div class="row" style="padding-top: 20px;">

                            <div class="col-md-2">
                            </div>

                            <div class="col-md-6 none" style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; border-radius:20px;">  

                            <h3>Sorry. No results found for your entered Keyword</h3>
                            </div>

                            <div class="col-md-4" ></div>


                            </div>
                            </div>';

            }
        ?>



    </body>
</html>
<?php
}
?>