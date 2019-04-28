<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>  Exam Portal </title>
	
</head>
<body>

<?php
   
	
      $str = date("h:i:s");
      $array = explode(":",$str);
	  
	 
	  
  if( ($_SESSION['m'] < $array[1]) || ($_SESSION['h'] < $array[0]) || (!isset($_COOKIE[$_SESSION['cn']]))){
	    echo "<h4 align=center style=color:#ff0000>Result</h4>";
		echo "<table align=center>";
	    echo "<tr style=color:#f000f0><td>number of total questions in this exam was:<td>".$_SESSION['totalq'];
		echo "<tr style=color:#00ff00><td>total attemped qusetions is:<td>".$_SESSION['attempts'];
		echo "<tr style=color:#0000ff><td>number of correct answers are: :<td>".$_SESSION['truans'];
		$g = $_SESSION['attempts']-$_SESSION['truans'];
		echo "<tr style=color:#f000ff><td>number of wrong answers are:<td>".$g;
		echo "</table>";
		
		
       
  }	  
 
  else if($_POST['submit']=="Next Question"){
	    if(!isset($_POST['ans'])){
		$_SESSION['qn'] = $_SESSION['qn'] + 1;
		}else{
            
		if($_POST['ans'] == $_SESSION['cans']){
		
			$_SESSION['truans'] = $_SESSION['truans'] +1;
			
		} 
		$_SESSION['attempts'] = $_SESSION['attempts'] +1;
		$_SESSION['qn'] = $_SESSION['qn'] + 1;
		
		}
		echo "<p align=center><a  href = ubarbhavani.php>Next Question</p>";
	 } 
	 
      
  else if($_POST['submit']=="Get Result" ){
	    if(!isset($_POST['ans'])){
		$_SESSION['qn'] = $_SESSION['qn'] + 1;
		}else{
	    if($_POST['ans'] == $_SESSION['cans']){
		$_SESSION['truans'] = $_SESSION['truans'] +1;
		}
		$_SESSION['attempts'] = $_SESSION['attempts'] +1;
		$_SESSION['qn'] = $_SESSION['qn'] + 1;
        }
		
        echo "<h4 align=center style=color:#ff0000>Result</h4>";
		echo "<table align=center>";
	    echo "<tr style=color:#f000f0><td>number of total questions in this exam was:<td>".$_SESSION['totalq'];
		echo "<tr style=color:#00ff00><td>total attemped qusetions is:<td>".$_SESSION['attempts'];
		echo "<tr style=color:#0000ff><td>number of correct answers are: :<td>".$_SESSION['truans'];
		$g = $_SESSION['attempts']-$_SESSION['truans'];
		echo "<tr style=color:#f000ff><td>number of wrong answers are:<td>".$g;
		
		echo "</table>";
		
		
		
		
		
  }
 
	
  

?>
<p align="center"><a href="logout.php">logout</a></p>
</body>
</html> 