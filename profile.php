<html>
<?php
	session_start();
	$name = $_SESSION['curruser'];	
?>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	
	  table{
		  margin-top:25px;
		  margin-left:80px;
		  margin-right:auto;
		  color: green;
		  border:2px solid black;
	  }
	  td{
		  margin:7px;
		  padding:10px;
		  font-size:16px;
	  }
	  #th{
		  color: black;
	  }
	  h4{
		  color:#4b0082;
		  font-weight:bold;
		  margin-left:90px;
		  margin-top:50px;
		  
	  }
	  #name{
		  color:white;
		  float:right;
		  margin-top:15px;
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
	<div>
	   <div id="name">Logged in as: <?php echo $name; ?></div>
	</div>
	</div>
	</nav>
<h4>Your Profile</h4>
<table>
<?php	
    
	$conn = mysqli_connect('localhost','root','','student');
	$stmt = "select * from students where rollno like '%$name%'";
	$res = mysqli_query($conn,$stmt);
	foreach($res as $row){
			echo "<tr><td id='th'>RollNo</td><td>".$row['rollno']."</td></tr>";
			echo "<tr><td id='th'>FirstName</td><td>".$row['firstname']."</td></tr>";
			echo "<tr><td id='th'>LastName</td><td>".$row['lastname']."</td></tr>";
			echo "<tr><td id='th'>Branch</td><td>".$row['branch']."</td></tr>";
			echo "<tr><td id='th'>Year</td><td>".$row['year']."</td></tr>";
			echo "<tr><td id='th'>Section</td><td>".$row['section']."</td></tr>";
			echo "<tr><td id='th'>Codechef Score</td><td>".$row['codechefscore']."</td></tr>";
			echo "<tr><td id='th'>Codeforces Score</td><td>".$row['codeforcescore']."</td></tr>";
			echo "<tr><td id='th'>Interviewbit Score</td><td>".$row['interviewbitscore']."</td></tr>";
			echo "<tr><td id='th'>Total Score</td><td>".$row['total']."</td></tr>";
		}
			echo "</table>";
			echo "</body>";
			echo "</html>";
	
?>
