
<?php
   session_start();
   $quizerid = (int)$_SESSION["quizerid"];
   $conn = mysqli_connect('localhost','root','','exam_portal');
   $result = mysqli_query($conn,"select question,option1,option2,option3,option4,answer from questions where quizerid = $quizerid");
   
   $data = array();
   while($row = mysqli_fetch_assoc($result)){
	    $data[] = $row ;
   }
   
   echo json_encode($data);