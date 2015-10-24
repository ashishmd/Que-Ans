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
    $user_name=$_SESSION['login_user'];
    $category=$_POST['category'];
    $question=$_POST['question'];
    
    $category = stripslashes($category);
    $quetion = stripslashes($question);
    


  $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
  $db=mysql_select_db("tryitbud_mini",$connection);

  mysql_query("insert into questions (category, question, user_name) values ('$category','$question','$user_name')", $connection);
  $show=mysql_query("select questions_asked from profile where user_name='$user_name'", $connection);
  $row = mysql_fetch_row($show);
  $questions_asked=$row[0];
  $questions_asked=$questions_asked+1;
  mysql_query("update profile set questions_asked = '$questions_asked' where user_name='$user_name'", $connection);


  mysql_close($connection);
  echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/home.php">';

}
?>

