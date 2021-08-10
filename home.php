<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
     session_start();
	  if(!isset($_SESSION['curruser']))
	  {
		  header('location:login.html');
	  }
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .form-control{
     width:20%;
  }
  .input-group{
	width:20%;
	float:right;
  }
  td{
	   text-align:center;
  }
  #th{
	  text-align:center;
  }

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TrackIT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php" target="_self">Home</a></li>
      <li><a href="profile.php" target="_self">Profile</a></li>
	  <li><a href="logout.php" target="_self">Logout</a></li>
    </ul>
	<form action="" method="post">
	<div class="input-group input-sm">
      <input type="text" class="form-control" placeholder="Search" id="search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"  name="searchbtn"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
	</form>
  </div>
</nav>
  
<div class="container">
  <!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">        
  <table class="table table-bordered">
    <thead>
      <tr>
		<th id="th"><a href="#">RollNo</a></th>
        <th id="th"><a href="#">Firstname</a></th>
        <th id="th"><a href="#">Lastname</a></th>
		<th id="th"><a href="#">Codechef Score</a></th>
		<th id="th"><a href="#">Codeforces Score</a></th>
		<th id="th"><a href="#">Interviewbit Score</a> </th>
		<th id="th"><a href="#">Total Score</a></th>
      </tr>
    </thead>
	<?php
	$conn = mysqli_connect('localhost','root','','student');
	if(isset(($_POST['search'])))
	  {
		  $f = $_POST['search'];
		  $stmt = "select rollno,firstname,lastname,codechefscore,codeforcescore,interviewbitscore,total from students where CONCAT(firstname,lastname,rollno) like '%$f%'";
		  $res = mysqli_query($conn,$stmt);
		if(mysqli_num_rows($res)> 0)
		{
			foreach($res as $row){
				echo "<tr><td>".$row["rollno"]."</td><td>".$row["firstname"]."</td><td>".$row['lastname']."</td><td>".$row['codechefscore']."</td><td>".$row['codeforcescore']."</td><td>".$row['interviewbitscore']."</td><td>".$row['total']."</td></tr>";
		}
			echo "</table>";
	  }
	else{
		echo "<p>No Records Found</p>";
	}
	  }
	  else{
		$stmt = "select rollno,firstname,lastname,codechefscore,codeforcescore,interviewbitscore,total from students order by total desc";
		$res = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($res)> 0)
	{
		foreach($res as $row){
			echo "<tr><td>".$row["rollno"]."</td><td>".$row["firstname"]."</td><td>".$row['lastname']."</td><td>".$row['codechefscore']."</td><td>".$row['codeforcescore']."</td><td>".$row['interviewbitscore']."</td><td>".$row['total']."</td></tr>";
		}
			echo "</table>";
	}
	else{
		echo "<p>No Records Found</p>";
	}
	  }
	  
	$conn->close();
    ?>
</div>

</body>
</html>

</div>

</body>
</html>
