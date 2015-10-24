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
	$id=$_POST['aid'];
	$username=$_SESSION['login_user'];
	$qid=$_POST['qid'];
	$con=mysqli_connect("localhost","tryitbud_ashish","ashishf788545","tryitbud_mini");

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT * FROM report WHERE ( aid='$id' AND  user_name ='$username')";

	if ($result=mysqli_query($con,$sql))
	{
		$rowcount=mysqli_num_rows($result);
		if($rowcount==1)
		{
			$message = "you already reported this as spam";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/question.php?id='.$qid.'">';
		}
		else
		{
			mysqli_query($con,"insert into report (aid , user_name)  values ('$id','$username')");
			$message1 = "The answer has been reported.";
			

            $spam_select=mysqli_query($con,"select spam from answers where aid='$id'");
            $spam_fetch=mysqli_fetch_row($spam_select);
            $spam = $spam_fetch[0];
            $spam=$spam+1;
            mysqli_query($con,"update answers set spam='$spam' where aid='$id' ");
			echo "<script type='text/javascript'>alert('$message1');</script>";
			echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/question.php?id='.$qid.'">';
			if($spam>4)
			{
				mysqli_query($con,"update questions set to_view = 1  where qid='$qid' ");
			}
		}
	mysqli_free_result($result);
	}

	mysqli_close($con);
}
?>