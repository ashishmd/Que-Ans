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
	$username=$_POST['username'];
	$qid=$_POST['qid'];
	$remove = $_POST['remove']; 
	$con=mysqli_connect("localhost","tryitbud_ashish","ashishf788545","tryitbud_mini");

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT answer FROM answers WHERE ( aid='$id' AND  user_name ='$username')";

	if ($result=mysqli_query($con,$sql))
	{
		$rowcount=mysqli_num_rows($result);
		if($rowcount==1)
		{
			if($remove==1)
			{
				
				$remove="*Content removed by the admin*";
				
				mysqli_query($con,"UPDATE answers set answer='$remove' where aid='$id'");
				mysqli_query($con,"UPDATE answers set spam= 0 where aid='$id'");
				mysqli_query($con,"UPDATE questions set to_view= 0 where qid='$qid'");
				echo "<script type='text/javascript'>alert('$remove');</script>";
				echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/admin.php">';

		    }
		    else
		    {
		    	$ignore = "You ignored this answer";
		    	mysqli_query($con,"UPDATE answers set spam= 0 where aid='$id'");
		    	mysqli_query($con,"UPDATE answers set votes= 0 where aid='$id'");
				mysqli_query($con,"UPDATE questions set to_view= 0 where qid='$qid'");
				echo "<script type='text/javascript'>alert('$ignore');</script>";
				echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/admin.php">';
		    }
		}
	mysqli_free_result($result);
	}

	mysqli_close($con);

}
?>