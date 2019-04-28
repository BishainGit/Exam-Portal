<?php
   session_start();
?>
<html>
<head>
<script>
function validateForm() {
  var x = document.forms["myForm"]["quename"].value;
  if (x.length >200 || x=="") {
    alert("question should be atmost 200 character");
    return false;
   }
   
    var y1 = document.forms["myForm"]["option1"].value;
	var y2 = document.forms["myForm"]["option2"].value;
    var y3 = document.forms["myForm"]["option3"].value;
    var y4 = document.forms["myForm"]["option4"].value;
	
  if ((y1.length >25 && y2.length >25 && y3.length >25 && y4.length >25 )|| y1=="" ||y2==""||y3==""||y4=="") {
    alert("options should be atmost 25 character");
    return false;
    }
  
  var z = document.forms["myForm"]["canswer"].value;
  if (z<1 || z>4 ||z == "") {
    alert("put correct answer among above options");
    return false;
   }  
  
  
}
</script>
</head>
<body>

<form name="myForm" action="<?php $_SERVER['PHP_SELF'];?>" onsubmit="return validateForm()" method="post">
  question: <input type="text" name="quename"><br><br>
  option1: <input type="text" name="option1"><br><br>
   option2: <input type="text" name="option2"><br><br>
    option3: <input type="text" name="option3"><br><br>
	 option4: <input type="text" name="option4"><br><br>
	  answer: <input type="int" name="canswer"><br><br>
  
  <input type="submit" value="Submit">
</form>

<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){

  if(null !== $_SESSION["quizerid"] ){
	  
	  
  
  $quizerid  =  $_SESSION["quizerid"];
  
  $question = $_POST['quename'] ;
  $option1 =  $_POST['option1'];
   $option2 = $_POST['option2'];
   $option3 = $_POST['option3'];
   $option4 = $_POST['option4'];
   $canswer = $_POST['canswer'];
   
  
  
   $conn  = new mysqli("localhost","root","","exam_portal");
   if($conn->connect_error){
      die("Connection failed" .$conn->connect_error);
   }
   $sql1 = "INSERT INTO questions (question,option1,option2,option3,option4,answer,quizerid)
           VALUES ('$question','$option1','$option2','$option3','$option4','$canswer','$quizerid')";
		   
	
	  if($conn->query($sql1) === true){
		  
		  echo " ";
	  }else{
		  echo "Error:" .$sql1. "<br>" .$conn->error ;
	  }
	
       $conn->close();	
      header("location: putquestion.php"); 
		  
  } 
  
  else{
   
     echo "Sorry,you have to login first";
 }
 
 }
	  
?>

<p><a href="starter.php">Over</a></p>

</body>
</html>