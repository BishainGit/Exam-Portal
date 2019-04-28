<?php
session_start()
?>
<html>
<head> </head>

<body>
<?php
    $name = $_SESSION['name'] ;
	$email = $_SESSION['email'];
    $mono =  $_SESSION['mono'];
	$degree = $_SESSION['degree'];
	$branch = $_SESSION['branch'];
	$semester = $_SESSION['semester'];
	$rollno = $_SESSION['rollno'];
	
 
  $conn  = new mysqli("localhost","root","","exam_portal");
   if($conn->connect_error){
      die("Connection failed" .$conn->connect_error);
   }
   $sql1 = "INSERT INTO student (name,email,mono,degree,branch,semester,rollno)
           VALUES ('$name','$email','$mono','$degree','$branch','$semester','$rollno')";
		   
	
	  if($conn->query($sql1) === true){
		  
		  echo " ";
	  }else{
		  echo "Error:" .$sql1. "<br>" .$conn->error ;
	  }
	
	$conn->close();
	   echo "your registration is complete";
       header("location: starter.php"); 
     
  
  	  
?>
</body>
 </html>