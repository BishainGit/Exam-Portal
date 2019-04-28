<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<?php
       $studentid =$_SESSION['studentid'];
		 $quizerid = $_SESSION['quizerid'];
         $totalq = $_SESSION['totalq'];
		$attempts =$_SESSION['attempts'];
		$score = $_SESSION['truans'];
	
	$conn = new mysqli("localhost","root","","exam_portal");
	    if($conn->connect_error){
       die("Connection failed" .$conn->connect_error);
        }
    
   $sql1 = "insert into storeresult (studentid,quizerid,score,attempts,totalq) 
	           values ('$studentid','$quizerid','$score','$attempts','$totalq')";
		   
	
			   
	  if($conn->query($sql1) === true){
		  
		  echo " ";
	  }else{
		  echo "Error:" .$sql1. "<br>" .$conn->error ;
	  }
      session_destroy(); 
	  
	  $conn->close();
?> 
 <p align="center" style="color:#00ff00">Thank You</p>
</body>
</html>