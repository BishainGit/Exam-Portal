<html>
<head>
<script>
function validateForm() {
  var x = document.forms["myForm"]["qname"].value;
  if (x == "") {
    alert("Name is required");
    return false;
   }
    var y = document.forms["myForm"]["email"].value;
  if (y == "") {
    alert("email is required");
    return false;
  }
  
  
    var y = document.forms["myForm"]["mono"].value;
  if (y.length()<10) {
    alert("correct mono number is required");
    return false;
  }
  
    var y = document.forms["myForm"]["degree"].value;
  if (y == "") {
    alert("degree is required");
    return false;
  }
  
    var y = document.forms["myForm"]["branch"].value;
  if (y == "") {
    alert("branch  is required");
    return false;
  }
  
    var y = document.forms["myForm"]["semester"].value;
  if (y == "") {
    alert("semester is required");
    return false;
  }
  
    var y = document.forms["myForm"]["rollno"].value;
  if (y == "") {
    alert("rollno  is required");
    return false;
  }
  
    
  
  
}
</script>
</head>
<body>

<form name="myForm" action="confirmation.php" onsubmit="return validateForm()" method="post">
<?php
  echo "<table>";
  
  echo "<tr><td>Name:   <td> <input type=text name=qname><br><br>";
  echo "<tr><td>email:  <td> <input type=email name=email><br><br>";
  echo "<tr><td>m.no.:   <td><input type=text name=mono><br><br>";
  echo "<tr><td>degree: <td> <input type=text name=degree><br><br>";
  echo "<tr><td>branch: <td> <input type=text name=branch><br><br>";
  echo "<tr><td>semester:<td><input type=int name=semester><br><br>";
  echo "<tr><td>rollno: <td><input type=text name=rollno><br><br>";
  echo "</table>";
?>  
  <input type="submit" value="Register">
</form>



</body>
</html>