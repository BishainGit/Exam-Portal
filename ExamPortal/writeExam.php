<?php
 session_start();
?>
<html>
   <head>
   
    
	    <style>
		 div#test{ border :#000 1px solid; padding : 10px  40px 40px 40px;}
		
		</style>
	          
	    <script>
		        var ajax = new XMLHttpRequest();
				var method = "GET";
				var url = "data.php";
				var asynchronous = true;
				ajax.open(method,url,asynchronous);
				ajax.send();
				ajax.onreadystatechange = function(){
					
					 if(this.readyState ==4 && this.status ==200){
						  var questions = JASON.parse(this.responseText);
						  console.log(questions);
						// alert(this.responseText);
						alert(questions[0].question);
					 }
					
				}
				
				//alert("questions[0].question");
		     var pos = 0,test,tstatus,question,choice,choices,chA,chB,chC,chD,correct=0;
			 var questions = [
			     ["2+3","4","5","8","9","B"],
				 ["3+3","4","5","6","7","C"]
				 
			 
			 ];
			 function _(x){
				 return document.getElementById(x);
			 }
			 function renderQuestion(){
				 test = _("test");
				 if(pos >= questions.length){
					 test.innerHTML = "<h2>you got "+correct+" questions correct out of "+questions.length+"</h2>";
					 _("tstatus").innerHTML = "test completed";
					 pos =0;
					 correct =0;
					 return false;
					 
				 }
				 
				 _("tstatus").innerHTML = "Question "+(pos+1)+" of "+questions.length;
				 
				  question = questions[pos][0];
				  chA = questions[pos][1];
				  chB = questions[pos][2];
				   chC = questions[pos][3];
				   chD = questions[pos][4];
				   test.innerHTML = "<h3>"+question+"</h3>";
				   test.innerHTML += "<input type ='radio' name='choices' value='A'>" +chA+ "<br>";
				   test.innerHTML += "<input type='radio' name='choices' value='B'>"+chB+"<br>";
				   test.innerHTML += "<input type='radio' name='choices' value='C'>"+chC+"<br>";
				   test.innerHTML += "<input type='radio' name='choices' value='D'>"+chD+"<br><br>";
				   test.innerHTML += "<button onclick='checkAnswer()'>Submit Answer</button>";
			 }
			 function checkAnswer(){
				 choices = document.getElementsByName("choices");
				 for(var i=0;i<choices.length;i++){
					 if(choices[i].checked){
						 choice = choices[i].value;
					 }
					 
				 }
				 if(choice == questions[pos][5]){
					 correct++;
				 }
				 pos++;
				 renderQuestion();
			 }
			 window.addEventListener("load",renderQuestion,false);
		</script>
	 </head>
	 <body>
	    <?php
		    $quizerid = $_SESSION["quizerid"];
			$studentid = $_SESSION["studentid"];
			
			
		?>
	 
		<h2 id="tstatus"></h2>
		<div id="test"></div>
	</body>
</html>