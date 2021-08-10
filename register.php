<?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $rollno = $_POST['rollno'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        $section = $_POST['section'];
        $pswd = $_POST['pswd'];
        $codechef = $_POST['codechef'];
        $interviewbit = $_POST['interviewbit'];
        $codeforces = $_POST['codeforces'];

        $conn = new mysqli('localhost','root','','student');
        if($conn->connect_error){
            die('Connection Failed :'.$conn->connect_error);
        }
			$select = "select firstname from students where rollno = ?";
			$st = $conn->prepare($select);
			$st->bind_param("s",$rollno);
			$st->execute();
			$st->bind_result($rollno);
			$st->store_result();
			$rnum = $st->num_rows;
			if($rnum==0){
				$st->close();
            $stmt = $conn->prepare("insert into students(firstname,lastname,pswd,rollno,year,section,branch,codechef,interviewbit,codeforces) values(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$firstname,$lastname,$pswd,$rollno,$year,$section,$branch,$codechef,$interviewbit,$codeforces);
            $stmt->execute();
		    $stmt->close();
			}
			else{
				echo '<script>alert("RollNo already exists")</script>';
				echo "<script>window.open('register.html')</script>";
			}
            $conn->close();
			echo "<script>window.open('login.html')</script>";

?>    
