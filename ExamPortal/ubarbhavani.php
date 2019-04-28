<?php
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>  OLX laptops </title>
	
</head>
<body>

<?php
     $db = new PDO('mysql:host=localhost;dbname=Exam_Portal','root','');
	 
  if(!isset($_SESSION['quizerid']) || !isset($_SESSION['studentid'])){
             header("location : examinlogin.php");
	 } 
  
  else{
      $quizerid = (int)$_SESSION['quizerid'];
	  $studentid = (int)$_SESSION['studentid'];
	  $questionsQuery = $db->prepare("select qid,question,option1,option2,option3,option4,answer from questions where quizerid = :quizerid");
	  $questionsQuery->execute([ 'quizerid'=>$quizerid]);
	  $n =0;
	  while($row = $questionsQuery->fetchObject()){
		     $questions[] = $row;
             $n++;			 
	  }  
	  
	   $_SESSION['totalq'] = $n;
	  
	   
	    if($_SESSION['qn'] < -1){
		 $_SESSION['qn'] = 0;
		 $_SESSION['truans'] =0;
		 $_SESSION['attempts'] =0;
		 
	   }
	   
	
	  if($_SESSION['qn'] > $n){
		  unset($_SESSION['qn']);
		  echo "<h1>Some Error Occured</h1>";
		  session_destroy();
		  echo "Please <a href = examinlogin.php> Start Again </a>";
		  exit;
	 }
	   
	   echo "<form name=myform method=post action = rabne.php>";
	   echo "<table align=center width =100%> <tr> <td width =30>&nbsp;<td> <table align=center border=0>";
	   $_SESSION['cans']= $questions[$_SESSION['qn']]->answer;
       $var = $questions[$_SESSION['qn']]->question;;
	   $f = $_SESSION['qn'];
	   $f++;
	    echo "<tr><td>Q$f. $var";
	   $var = $questions[$_SESSION['qn']]->option1;
	   echo "<tr><td><input type =radio name = ans value =1>$var";
	      $var = $questions[$_SESSION['qn']]->option2;
	   echo "<tr><td><input type =radio name = ans value =2>$var";
	      $var = $questions[$_SESSION['qn']]->option3;
	   echo "<tr><td><input type =radio name = ans value =3>$var";
	      $var = $questions[$_SESSION['qn']]->option4;
	   echo "<tr><td><input type =radio name = ans value =4>$var";
	   if($_SESSION['qn']<$n-1){
		  
		 echo "<tr><td><input type=submit name=submit value='Next Question'>&nbsp<td><input type=submit name=submit value='Get Result'></form>";
		 
	   }
	   else{
		 echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
	   }
	  
	   echo "</table></table>";
      
  }	  
	
  

?>
    
</body>
</html> 