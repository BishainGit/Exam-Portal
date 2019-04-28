<?php
  session_start();
  $db = new PDO('mysql:host=localhost;dbname=Exam_Portal','root','');
  
  if(!isset($_SESSION['quizerid']) || !isset($_SESSION['studentid'])){
	  header("location : examinlogin.php");
	  
  }else{
	  $quizerid = (int)$_SESSION['quizerid'];
	  $studentid = (int)$_SESSION['studentid'];
	  $questionsQuery = $db->prepare("select qid,question,option1,option2,option3,option4 from questions where quizerid = :quizerid");
	  $questionsQuery->execute([ 'quizerid'=>$quizerid]);
	 $n =0;
	  while($row = $questionsQuery->fetchObject()){
		     $questions[] = $row;
             $n++;			 
	  }  
	   echo $question[1]->option4;
	 if(!isset($_SESSION['qn'])){
		 $_SESSION['qn'] = -1;
		 $_SESSION['truans'] =0;
		 $_SESSION['attempts'] =0;
		 
	 }
	 else{
		 if($submit =='Next Question' && isset($ans)){
			 if($questions[$_SESSION['qn']==$ans]){
				 $_SESSION['trueans'] = $_SESSION['trueans'] +1;
				
			 }
			 $_SESSION['qn'] = $_SESSION['qn'] +1;
			 $_SESSION['attempts'] = $_SESSION['attempts'] +1;
		 }
		 
		 else if($submit=='Get Result' && isset($ans)){
			  if($questions[$_SESSION['qn']==$ans{
				 $_SESSION['trueans'] = $_SESSION['trueans'] +1;
				 $_SESSION['attempts'] = $_SESSION['attempts'] +1;
			  }
			  $_SESSION['qn'] = $_SESSION['qn'] +1;
			  echo "<h1>Result</h1>"
			  echo "<Table align=center> <tr ><td>Total Question</td>.$n";
			  echo "<tr><td>Total Attempts</td>.$_SESSION['attempts']";
			  echo "<tr><td>Write questions</td>.$_SESSION['trueans']";
			  $w = $_SESSION['attempts'] - $_SESSION['trueans'];
			  echo "<tr><td>Wrong questions</td>.$w";
			  echo "</Table>";
		 }
		 unset($_SESSION['qn']);
		 unset($_SESSION['trueans']);
		 unset($_SESSION['quizerid']);
		 unset($_SESSION['studentid']);
		 unset($_SESSION['attempts']);
		 
	 }
	 
	 
	 if($_SESSION['qn'] > $n){
		  unset($_SESSION['qn']);
		  echo "<h1>Some Error Occured</h1>";
		  session_destroy();
		  echo "Please <a href = examinlogin.php> Start Again></a>";
		  exit;
	 }
	 
	echo "<form name="myform" method="post" action = "fightQuiz.php">";
    echo "<table width=100%><tr><td width=30>&nbsp;<td> <table border=0>";	
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="UTF-8">
	 <title>Write Exam</title>
	 
	 <style>
	        
	 </style>
  </head>
     <body>
	    
			
	
	 
	           
	 </body>
     
</html>


	  