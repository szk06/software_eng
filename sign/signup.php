<!-- 
This code is the code of the confirmation page

Written By Sami Kanafani

Last Modified: 25 April 2016
-->

<html>
<head>
	<title>Confirm Registration</title>
	<style type="text/css">
		
		body{
		background-color:#cccccc;
		
	}
	h1.onemore{
		color:blue;
	}
	img#img1{
		float:right;
		width: 40%;
		height:60%;
		margin-right:10%;
		margin-top:7%;
	}
	div#register{
		width: 30%;
		height:100%;
		margin-right:25%;
		margin-left:35%;
		background-color:white;
	}
	
	
	</style>
</head>
<body>


<?php
	
	
	$full = $_POST['full'];
	
	$email = $_POST['email'];
	
	$mobile = $_POST['mobile'];
	
	$pass1 = $_POST['pass1'];
	
	$pass2 = $_POST['pass2'];
	
	$gender = $_POST['gender'];
	
	$day = $_POST['day'];
	
	$month = $_POST['month'];
	print $month;
	
	$year = $_POST['year'];
	
	if(isset($full) && isset($email) && isset($mobile) && isset($pass1) && isset($pass2) && isset($gender) /*&& isset($day)/* && isset($month) && isset($year)*/)
	
	{
	
		if ( empty($full) || empty($email) ||empty($mobile) ||empty($pass1)||empty($pass2) ||empty($gender) /*||empty($day)/*||empty($month)||empty($year)*/ )
		{
			exit("<h1>Error in Submission</h1><br>");
		}
		else {
			if(!preg_match("/^[a-zA-Z0-9]{2,}@{1}(.){2,}\.[a-z]{3}$/",$email)){
				exit("Error in sub<br>");
			}
			else if(!preg_match("/^^[0-9]{2}\-[0-9]{6}$/",$mobile)){
				exit("Error in sub<br>");
			}
			else if($pass1 != $pass2){
				exit("Error in sub<br>");
			}
			else if(strlen($pass1)<6){
				exit("Error in sub<br>");
			}
			else if($day>31 || $day<1){
				exit("Error in sub<br>");
			}
			else if($month>12){
				exit("Error in sub<br>");
			}
			
			else {?>
			<div id="register">
				<h1 class="onemore">Confirmation</h1>
				<br><br><h2>A confirmation was sent to the email you entered</h2>
				<br><br><h2>Check the confirmation code and copy it into the box below</h2> 
				<form action="new.php" method="POST">
					<input type="text" name="crenumber" placeholder="Enter code here"/>
					<input type="submit" value="submit">
				</form>
			</div>
			<?php
				$to =$email;
				$length = 10;
				$birthday = "$day/$month/$year";
				$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
				$subject = "Confirmation Email";
				$txt = "Dear Sir\nYour Account Activation code is:".$randomString."\nWelcome to our center";
				$headers = "From: webmaster@goodfitness.com"."\r\n";
				print"<br>email sent to: $to<br>";
				/*
				if(mail($to,$subject,$txt,$headers)){
						print "<h1>wentok<br></h1>";
				}
				else{
					print "Error sending the email<br>";
				}
				*/
				print "Your validation code is:$randomString<br>";
				session_start();

				$_SESSION['val']=$randomString;
				$_SESSION['pass']=$pass1;
				$_SESSION['name']=$full;
				$_SESSION['birth']=$birthday;
				$_SESSION['gender']=$gender;
				$_SESSION['email']=$email;
				$_SESSION['mobile']=$mobile;
			
			}
		}
	}
	else {exit("<h1>form not submitted</h1>");}

?>




</body>

</html>