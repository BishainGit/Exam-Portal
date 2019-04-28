<?php
session_start();
?>
<html>
<head>

</head>

<body>
<h1>Confirmation Page of Customer Info</h1>

<p>Thank you for registring this form. 

<p>We have successfully received it. 

<p>Below is a summary of the information you provided.<br><br> 

 <?php
echo 'qname : ' . $_POST ["qname"] . '<br>';
echo 'email : ' . $_POST ["email"] . '<br>';
echo 'mono :' . $_POST ["mono"] . '<br>';
echo 'degree : ' . $_POST ["degree"]. '<br>';
echo 'branch :  ' .$_POST["branch"]. '<br>';
echo ' semester : ' .$_POST["semester"]. '<br>';
echo ' rollno : ' .$_POST["rollno"]. '<br>';

   $_SESSION['name'] = $_POST['qname'] ;
  $_SESSION['email'] =$_POST['email'] ;
  $_SESSION['mono']  =$_POST['mono'];
  $_SESSION['degree']  =$_POST['degree'];
  $_SESSION['branch']   =$_POST['branch'];
  $_SESSION['semester'] =$_POST['semester'];
  $_SESSION['rollno'] = $_POST['rollno']; 	 
 
 ?>
<form action="numberlao.php">
<input type="submit"  value="Submit" >
</form>

<div id="center_button"><button onclick="location.href='regWriter.php'">Back</button></div>
</body>
</html>