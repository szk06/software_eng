<!--
Code Written By Sami Kanafani

Code Represents the Acceptance page 

Last Modified 28 April 2016

-->


<?php	
	include("header.htm");

	$crenum = $_POST['crenum'];
	$crepass= $_POST['crepass'];

	if(isset($crepass) && isset($crenum)){
			
		if(empty($crepass) || empty($crenum)){	
			exit("Empty submission");
		}
		else{
			session_start();

						
			$pass1=$_SESSION['pass'];
			$full= $_SESSION['name'];
			$birthday=$_SESSION['birth'];
			$gender=$_SESSION['gender'];
			$email= $_SESSION['email'];
			$mobile=$_SESSION['mobile'];
		
		?>
		<h1>Welcome to the center<?=$full ?> </h1><br>
		<h2>You are fully registered now</h2><br>
		<h3>Your information are as follows:</h3>
		<?php
			$length = 3;
			
			$randomnum = substr(str_shuffle("0123456789"), 0, $length);
			$randomchar = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
			$userid = "$randomchar$randomnum";
			$av = false; 
			print "Name: $full<br>";
			print "Mobile: $mobile<br>";
			print "email: $email<br>";
			
			print "userID: <strong>$userid<font color=\"red\">	(You should use userID to SignIn)</font></strong><br>";
			print "birthdate: $birthday<br>";
			$mysqlhost = "localhost";
			$user= "root";
			$dbname1 = "mydata";
			$sqlpass='';
			// Create connection
			$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
			
			
			$pdoQuery ="INSERT INTO `signedmembers` (`memberId`, `name`, `password`, `mobilenumber`, `email`, `gender`, `birthdate`) 
			VALUES (:userid, :full, :pass1, :mobile, :email, :gender, :birth)";
			
			$pdoResult = $handler->prepare($pdoQuery);
			
			$pdoExec = $pdoResult->execute(array(":userid"=>$userid,":full"=>$full,":pass1"=>$pass1, ":mobile"=>$mobile, 
			":email"=>$email, ":gender"=>$gender, ":birth"=>$birthday));
			
			if($pdoExec){
				print "You are registered successfully<br>";
			}
			else {print "Error occured in the system<br>";}
			
			//$query = $handler->query("SELECT * FROM signedmembers");
			print "<br><br><h1>You can now go to home and sign in<br>";
			
			/*
			while($r = $query->fetch()){
				
				print $r['memberId']."<br>";
				
			}
			*/

			// Check connection
			

			
		
		}
	}
	else {exit("Error please sign again<br>");}
	


?>