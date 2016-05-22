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
  $answer=$_POST['answer'];
  $question_id=$_SESSION['question_id'];
  $answer = stripslashes($answer);

  $connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
  $db=mysql_select_db("tryitbud_mini",$connection);

  mysql_query("insert into answers (qid, answer, user_name) values ('$question_id','$answer','$user_name')", $connection);
  $show=mysql_query("select questions_answered from profile where user_name='$user_name'", $connection);
  $row = mysql_fetch_row($show);
  $questions_answered=$row[0];
  $questions_answered=$questions_answered+1;
  mysql_query("update profile set questions_answered = '$questions_answered' where user_name='$user_name'", $connection);

  mysql_query("update questions set answered = '1' where qid='$question_id'", $connection);

//---------------------update rating of profile----------------------

  $select_rating = mysql_query("SELECT * from profile where user_name='$user_name'", $connection);
  $select_row = mysql_fetch_assoc($select_rating);
  $questions_answered = $select_row['questions_answered'];
  $questions_asked = $select_row['questions_asked'];
  $rating = ($questions_answered*2 + $questions_asked)/100;
  mysql_query("UPDATE profile set rating= '$rating' where user_name = '$user_name'");
//----------------------------------------------------------------------
  mysql_close($connection);
  echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/question.php?id='.$question_id.'">';
}
?>