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
	$connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
	$db=mysql_select_db("tryitbud_mini",$connection);
	$show=mysql_query("select * from signup where user_name='$login_session'", $connection);
	$row = mysql_fetch_assoc($show);
	$show_first_name =$row['first_name'];
	$username = $login_session;
	$show_last_name = $row['last_name'];
	$expertise = $row['expertise'];
	mysql_close($connection);

	$count=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile</title>
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
           				<li class=""><a href="http://forum.tryitbuddy.com/trending.php"><span class="glyphicon glyphicon-fire"></span><span style="padding-left: 5px;"></span> Trending</a></li>

						</ul>
						<ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search" action="search.php" method="post">
                            <div class="form-group">
                                <input type="text" name="key" class="form-control" placeholder="Enter the keyword here" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" style="padding-right:10px"></span>Search</button>
                        </form>					
						<li class="dropdown active">
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
					<li class="active"><a href="http://forum.tryitbuddy.com/profile.php">Profile</a></li>
					<li><a href="http://forum.tryitbuddy.com/trending.php">Trending</a></li>
					<li><a href="categories.php">Categories</a></li>
					</ul>

				</div>
			</div>

			<div class="col-md-6" style="background-color: #F7F7F7; padding : 30px 30px 30px 30px; border-radius:20px; "  >
				<form action="post-question.php" method="POST"><div class="form-group">
					<label>Have a question?</label>
					<textarea class="form-control" rows="3" name="question" placeholder="Enter the question here. "required></textarea><div style="padding-top:10px;"></div>
					<label for="InputExpertise"> Category</label>
					<input type="text" name="category" class=" form-control"  list="fields" placeholder="Enter the category of the question" required autocomplete="off"><div style="padding-top:2px;"></div>
					<datalist id="fields" name="category">
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
						<option>Medicines</option>
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
					</datalist><br>
					<button type="submit" class="btn btn-primary btn-danger" value="Post Question"><span class="glyphicon glyphicon-send"></span ><span style="padding-left:5px;"></span> Post Question</button></div>
				</form>
			</div>

			<div class="col-md-4">
				<div style="background-color: #F7F7F7; padding : 0px 20px 0px 20px; border-radius:20px; position:fixed">
					<center><h3 style="color:#FF4D4D; padding-top: 20px;" ><span class="glyphicon glyphicon-fire" ></span> Trending</h3></center>
					<?php 
						$connection=mysql_connect("localhost", "tryitbud_ashish", "ashishf788545") or die ("Not connected");
						$db=mysql_select_db("tryitbud_mini",$connection) or die ("no database");

//----------------------- trending question select ------------------------------------
						$select_qid = "SELECT qid FROM questions order by  total_votes desc";
						$aid_order = mysql_query($select_qid);

						$aid_array = array();
						$count=0;
						while($row = mysql_fetch_assoc($aid_order))
						{
							if($count<=4)
							{
								$a= $row['qid'];
								$question_select=mysql_query("select question from questions where qid ='$a'", $connection);
								$select_row_question= mysql_fetch_row($question_select);
								$value=$select_row_question[0];
								echo '<span class="glyphicon glyphicon-bell" style="float:left;"></span><p style="text-align: left;  font-size: 15px; margin-left:30px;"><span style="mrgin-left: 35px;"><a style="text-decoration:none;" class "small" href="http://forum.tryitbuddy.com/question.php?id='.$a.'">'.'   '.$value.'</a></span></p><br>';

								$count++;
							}
						}
//----------------------trending question select ends---------------------------------------


						mysql_close($connection);

					?>

				</div>		
        	</div>
		
		</div>
	</div>


	
	<div class="container">
						<div class="row">

							<div class="col-md-2">
							</div>
							
							<div class="col-md-6" style=" padding : 30px 30px 30px 30px;">  

								<h2 style="color:white" ><span class="glyphicon glyphicon-comment" style="padding-left:50px;" ></span><span style="padding-left: 15px;">Questions Asked By You :</h2>
							</div>

							<div class="col-md-4"> <span></span>
							</div>

						</div>
					</div>

<?php
	$connection = mysql_connect("localhost", "tryitbud_ashish", "ashishf788545"); 
	$db=mysql_select_db("tryitbud_mini",$connection);

	$max = mysql_query("select max(qid) from questions as highest", $connection);
	$question_max = mysql_fetch_row($max);
	$max1=$question_max[0];

	$min = mysql_query("select min(qid) from questions", $connection);
	$question_min = mysql_fetch_row($min);
	$min1=$question_min[0];


load:

$count=0;
	for($i=$max1;$i>=$min1;$i--)
	{
		$questions_qid=mysql_query("select qid from questions where qid ='$i'", $connection);
		$question_rows1 = mysql_fetch_row($questions_qid);
		$value=$question_rows1[0];

		$questions_category=mysql_query("select category from questions where qid ='$i'", $connection);
		$question_rows2 = mysql_fetch_row($questions_category);
		$value1=$question_rows2[0];

		$questions_question=mysql_query("select question from questions where qid ='$i'", $connection);
		$question_rows3 = mysql_fetch_row($questions_question);
		$value2=$question_rows3[0];

		$questions_username=mysql_query("select user_name from questions where qid ='$i'", $connection);
		$question_rows4 = mysql_fetch_row($questions_username);
		$question_asker=$question_rows4[0];



//-------------copied from home.php starts-----------------------


 $select_aid = "SELECT aid FROM answers where qid = $i order by  votes desc";
    $aid_order = mysql_query($select_aid);

    $aid_array = array();
    
    while($row = mysql_fetch_assoc($aid_order))
    {
        $aid_array[] = $row['aid'];
    }

    $length=count($aid_array);


    $a=array_shift($aid_array);




    $questions_id=mysql_query("select qid from answers where aid ='$a'", $connection);
                    $question_rows4 = mysql_fetch_row($questions_id);
                    $qid=$question_rows4[0];



                    $questions_answer=mysql_query("select answer from answers where aid ='$a'", $connection);
                    $question_rows8 = mysql_fetch_row($questions_answer);
                    $answer=$question_rows8[0];


                    $questions_username=mysql_query("select user_name from answers where aid ='$a'", $connection);
                    $question_rows5 = mysql_fetch_row($questions_username);
                    $username_answer=$question_rows5[0];

                    $questions_first_name=mysql_query("select first_name from signup where user_name ='$username_answer'", $connection);
                    $question_rows6 = mysql_fetch_row($questions_first_name);
                    $first_name=$question_rows6[0];


                    $questions_last_name=mysql_query("select last_name from signup where user_name ='$username_answer'", $connection);
                    $question_rows7= mysql_fetch_row($questions_last_name);
                    $last_name=$question_rows7[0];

                    $votes_select=mysql_query("select votes from answers where aid ='$a'", $connection);
                    $votes_fetch = mysql_fetch_row($votes_select);
                    $votes=$votes_fetch[0];
//--------------------------copy ends------------------------------------



		

		
			if($question_asker==$username)

			{
				$count=$count+1;
				if($count>=5)
				{
						echo ' 
						<style>#load{display:block;}</style>
					<div class="container" id="load">
						<div class="row">

							<div class="col-md-2">
							</div>
							
							<div class="col-md-6" ; padding : 30px 30px 30px 30px;">  
								<form method="post">
								<center><button  type="submit" name="load" class="btn btn-default " ><span class="glyphicon glyphicon-repeat" style="padding-right: 10px;"></span>Load More</button></center>
								</form>
							</div>

							<div class="col-md-4"> <span></span>
							</div>

						</div>
					</div>';
					break;
				}
				else{
				echo ' 
					<div class="container">
						<div class="row">

							<div class="col-md-2">
							</div>
							
							<div class="col-md-6 none" style="background-color: #F7F7F7; padding : 20px 20px 20px 20px; border-radius:20px; ">  

								<h3><span class="glyphicon glyphicon-hand-right"></span><span style="padding-left: 15px;"></span><a class "small" href="http://forum.tryitbuddy.com/question.php?id='.$value.'">'.'   '.$value2.'</a></h3>';
								
								if($answer!=null)
                                	echo '<span style="padding-left: 55px;""></span>

                                            <b>'.$first_name.' '.$last_name.' :</b> 
                                            <form action="like.php" method="post">
                                            <input type = "hidden" name ="aid" value ='.$a.'>
                                            <input type = "hidden" name = "username" value="'.$username_answer.'">
                                            <input type = "hidden" name = "qid" value="'.$qid.'">
                                            <button  type= "submit" name="upvote" class="btn btn-danger" style="float :right;" ><span class="glyphicon glyphicon-plus"></span><span style="padding-left: 5px;"></span><b>'.$votes.'</b></button>
                                        </form>  '.'<div style="margin-left: 55px; margin-right : 100px;"><span >'.$answer.'</span></div>';

                                else 
									echo '<div style="margin-left: 55px; margin-right : 100px;"><span class= "glyphicon glyphicon-info-sign navbar-left" style="color:red;"></span><span style="padding-left:10px;"></span>Oops! No Answers recieved yet. </div>';
               					 

               					echo '

							</div>

							<div class="col-md-4"> <span></span>
							</div>

						</div>
					</div><br>';
			}}
		
		else
		{
			continue;
		}
	}

	if(isset($_POST['load'])&&$max1>=$min1)
	{
		$max1=$i;
		echo '<style> #load {display:none}</style>';
		goto load;
		break;
	}

	mysql_close($connection);
?>

</body>
</html>

<?php
}
?>