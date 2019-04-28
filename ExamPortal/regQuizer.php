<?php
session_start();
?>
<html>
<head>
<script>
function validateForm() {
  var x = document.forms["myForm"]["qname"].value;
  if (x == "") {
    alert("Name is required");
    return false;
    
  }
  
    var y = document.forms["myForm"]["subname"].value;
  if (y == "") {
    alert("Subject Name is required");
    return false;
    
  }
   var y = document.forms["myForm"]["timelimit"].value;
  if (y == ""||y ==0) {
    alert("timelimit is required");
    return false;
    
  }
    
  
  
}
</script>
</head>
<body>

<form name="myForm" action="<?php $_SERVER['PHP_SELF'];?>" onsubmit="return validateForm()" method="post">

<?php
  echo "<table>";
  echo "<tr><td>Name: <td><input type=text name=qname><br><br>";
  echo "<tr><td>subjectname:<td><input type=text name=subname><br><br>";
  echo "<tr><td>Time Limit:<td> <input type=int name=timelimit><br><br>";
   echo "</table>";
?>
  <input type="submit" value="Submit">
</form>

<?php
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
	  
  $name = $_POST['qname'] ;
  $subname = $_POST['subname'];
   $timelimit = $_POST['timelimit'];
  $conn  = new mysqli("localhost","root","","exam_portal");
   if($conn->connect_error){
      die("Connection failed" .$conn->connect_error);
   }
   $sql1 = "INSERT INTO quizer(name,subjectname,timelimit)
           VALUES ('$name','$subname','$timelimit')";
		   
	
	  if($conn->query($sql1) === true){
		  
		  echo " ";
	  }else{
		  echo "Error:" .$sql1. "<br>" .$conn->error ;
	  }
		   
		   
       header("location: starter.php"); 
	}	  
?>


</body>
</html>