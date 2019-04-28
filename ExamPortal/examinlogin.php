
<!DOCTYPE html>
<html>
<head>
<script>
function validateForm() {
  var x = document.forms["myForm"]["name"].value;
  if (x == "") {
    alert("Name is required");
    return false;
  }
  
    var y = document.forms["myForm"]["rollno"].value;
  if (y == "") {
    alert("roll number is required");
    return false;
   }
  
  
   var y = document.forms["myForm"]["subname"].value;
  if (y == "") {
    alert("subject name is required");
    return false;
   }
    
    var x = document.forms["myForm"]["qname"].value;
  if (x == "") {
    alert(" quizer name is required");
    return false;
  
  
}
</script>
</head>
<body>



<form name="myForm" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateForm()" method="post">
<?php
 echo "<table>";
 echo "<tr><td> Name:<td> <input type=text name=name><br><br>";
 echo "<tr><td>email:<td><input type=email name=email><br><br>";
 echo "<tr><td>for which subject you are going to write exam:
        <td> <input type=text name=subname><br><br>";
		 
 echo "<tr><td>Enter corrusponding examer/quizer name:
         <td><input type=text name=qname><br><br>";
 echo "</table>";
?>  
  <input type="submit" value="Submit">
  </form>


<?php
  session_start();
?>
<?php
   if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name = $_POST['name'];
	  $email = $_POST['email'];
	  $qname = $_POST['qname'];
	  $subname = $_POST['subname'];
	  
	  
	  
	  $conn = new mysqli("localhost","root","","exam_portal");
	  if($conn->connect_error){
	     die ("Conection Failed" .$conn->connect_error);
	  }
	  $sql = "select studentid from student where name = '$name' and email = '$email'";
	  $result = $conn->query($sql);
       $row = mysqli_fetch_assoc($result);
	if($row){
     
	 
	      $line = $conn->query($sql);
		   $row = mysqli_fetch_array($line,MYSQLI_NUM);
		   
		   $_SESSION["studentid"] = $row[0];
		   
		  
		   
		   $sql1 = "select quizerid,timelimit from quizer where name = '$qname' and subjectname = '$subname'";
		   $result = $conn->query($sql1);
            $row = mysqli_fetch_assoc($result);
	       if($row){
          
			  
	       $line1 = $conn->query($sql1);
		   $row1 = mysqli_fetch_array($line1,MYSQLI_NUM);
		   
		   $_SESSION["quizerid"] = $row1[0];
		   $timelimit = $row[1];
		   
		   
           $cookie_name = "user";
      
		   
	      if(!isset($_COOKIE[$cookie_name])) {
		 
	      echo '<script type="text/javascript">alert("Welcome ' . $name . ' best of luck"); </script>';
          $cookie_value = $name;
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
		   
    
          } else {
		  echo '<script type="text/javascript">alert("Welcome again ' . $name . ' best of luck"); </script>';
		  
          }   
	 $_SESSION['cn']=$cookie_name;
		 $_SESSION['qn'] = -2;
		 $minute =$timelimit;
		 $str = date("h:i:s");
       	 
		 $array = explode(":",$str);
		 $array[1] = ($array[1]+$minute)%60;
		 $array[0] = ($array[0] + ($array[1]+$minute)/60)%12;
		
		 $time = $array[0].":".$array[1].":".$array[2];
		
		 $_SESSION['m'] = $array[1];
		 $_SESSION['h'] = $array[0];
		
		 
	     header("location: ubarbhavani.php");
	  }else
	  {
		  $conn->close();
		  session_destroy();
		  header("location : examinlogin.php");
	  }
		   
	    // header("location: writeExam.php");
	  }else{
		  $conn->close();
	     session_destroy();
		 header("location : examinlogin.php");
	  }
	  
   
   }


?>
<br><br><br><br>
<a href="regWriter.php">new student register</a>
</body>
</html>