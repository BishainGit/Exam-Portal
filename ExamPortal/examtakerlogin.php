<!DOCTYPE html>
<html>
<head>
<style>
</style>
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
  
}
</script>
</head>
<body>

<form name="myForm" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return validateForm()" method="post">
 <?php
  echo "<table>";
  echo "<tr><td>Name:<td><input type=text name=qname><br><br>";
  echo "<tr><td>subjectname:<td><input type=text name=subname><br><br>";
  echo "</table>";
  ?>
  
  <input type="submit" value="Submit">
</form>

<?php
  session_start();
?>
<?php
   if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name = $_POST['qname'];
	  $subname = $_POST['subname'];
	  
	  
	  $conn = new mysqli("localhost","root","","exam_portal");
	  if($conn->connect_error){
	     die ("Conection Failed" .$conn->connect_error);
	  }
	 
       $sql="select quizerid,name,subjectname from quizer where name = '$name' and subjectname = '$subname'";

      
      
 $result = $conn->query($sql);
 $row = mysqli_fetch_assoc($result);
	if($row){

    // output data of each row
           $line1 = $conn->query($sql);
		   $row1 = mysqli_fetch_array($line1,MYSQLI_NUM);
		   
		   $_SESSION["quizerid"] = $row1[0];

	 header("location: putquestion.php");	
		
	  }else{
	     session_destroy();
		 header("location : regQuizer.php");
	  }
	  
   }


?>

</body>
</html>