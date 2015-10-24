` <?php

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
	$connection=mysql_connect("localhost", "tryitbud_ashish", "ashishf788545") or die ("Not connected");
	$db=mysql_select_db("tryitbud_mini",$connection) or die ("no database");

    $username = $_SESSION['login_user'];
    $select_user_name=mysql_query("select * from signup where user_name='$username'", $connection);
    $select_row = mysql_fetch_assoc($select_user_name);
    $show_first_name =$select_row['first_name'];
    $show_last_name = $select_row['last_name'];
    $expertise = $select_row['expertise'];

//-------------- trending question select ------------------------------------
    $select_qid = "SELECT qid FROM questions order by  total_votes desc";
    $aid_order = mysql_query($select_qid);

    $aid_array = array();
    $count=0;
//----------------trending question select ends---------------------------------------
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trending</title>
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
          <li class=""><a href="http://forum.tryitbuddy.com/home.php"><span class="glyphicon glyphicon-home"></span><span style="padding-left: 5px;"></span> Home</a></li>
          <li class="active"><a href="http://forum.tryitbuddy.com/home.php"><span class="glyphicon glyphicon-fire"></span><span style="padding-left: 5px;"></span> Trending</a></li>

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
            <li class=""><a href="http://forum.tryitbuddy.com/home.php">Home</a></li>
            <li><a href="http://forum.tryitbuddy.com/profile.php">Profile</a></li>
            <li class="active"><a href="http://forum.tryitbuddy.com/trending.php">Trending</a></li>
            <li><a href="categories.php">Categories</a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-6" style="background-color: #F7F7F7; padding : 30px 30px 30px 30px; border-radius:20px;">
      <center><h1 style="color:white; background: #FF4D4D; padding: 10px 10px 10px 10px;border-radius: 20px;"><span class="glyphicon glyphicon-fire" style="padding-right : 20px;"></span>Trending</h1></center>
      <?php
        while($row = mysql_fetch_assoc($aid_order))
        {
            if($count<=30)
            {
                $a= $row['qid'];
                $question_select=mysql_query("select question from questions where qid ='$a'", $connection);
                $select_row_question= mysql_fetch_row($question_select);
                $value=$select_row_question[0];
                echo '<h3 ><span class="glyphicon glyphicon-hand-right" style="float:left;"></span><div style="margin-left: 40px"><a style="text-decoration:none;"  class "small" href="http://forum.tryitbuddy.com/question.php?id='.$a.'">'.'   '.$value.'</a></div></h3>';
                $count++;
            }
        }
    ?>
      </div>

      <div class="col-md-4" style="padding-left: 30px;" >

              <div style="background-color: #F7F7F7; padding : 0px 20px 0px 20px; border-radius:20px; position:fixed">
      <center><h3 style= "color:#FF4D4D"><span class="glyphicon glyphicon-user"></span >Frequesnt Users</h3></center>
      <?php
   //-------------------------------- frequent users ------------------------------------

                            $select_users = "SELECT * FROM profile order by  rating desc";
                            $users_order = mysql_query($select_users,$connection);
                            $count=0;
                            while($row = mysql_fetch_assoc($users_order))
                            {
                                if($count<=4)
                                {
                                    $a= $row['user_name'];
                                    $question_select=mysql_query("select * from signup where user_name ='$a'", $connection);
                                    $select_row_question= mysql_fetch_assoc($question_select);
                                    $first_name=$select_row_question['first_name'];
                                    $last_name= $select_row_question['last_name'];
                                    echo '<span class="glyphicon glyphicon-flash" style="float:left;"></span><p style="text-align: left; font-size: 15px; margin-left:30px;"><span style="mrgin-left: 35px;"><b>'.$first_name.'   '.$last_name.'</b></span></p><br>';

                                    $count++;
                                }
                            }
//--------------------------frequent users ends---------------------------------------
        mysql_close($connection);
    ?>
      </div>

      </div>
  </div>
</div>

</body>
</html>

<?php
}
?>
