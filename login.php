<?php
session_start();
	$username = $_POST['username'];
	$pass = $_POST['pwd'];
	if($username=='admin' && $pass=='admin123')
	{
	  header('location:admin.php');
	}
?>
<?php
	$rollno = $_POST['rollno'];	
	$pwd = $_POST['pwd'];
	$conn = mysqli_connect('localhost','root','','student');
	if(!$conn){
            echo "Connection Failed";
        }
        else{
            $stmt = "select * from students where rollno='$rollno'";
            $res = mysqli_query($conn,$stmt);
			$num = mysqli_num_rows($res);
			if($num == 1){
				$p =mysqli_fetch_assoc($res);
				$x = $p['pswd'];
				if($x == $pwd)
				{
				  if($rollno=='admin' && $pwd=='admin')
				  {
					   header('location:admin.php');
				  }
				  else{
				  $_SESSION['curruser'] = $rollno;
				  header('location:home.php');
				  }
				}
				else{
					echo '<script>alert("Invalid Password")</script>';
					echo "<script>window.open('login.html')</script>";
				}
			}
			else{
				echo '<script>alert("No Account Exists with this RollNo:")</script>';
				echo "<script>window.open('register.html')</script>";
			}
		}
	$conn->close();
                
?>