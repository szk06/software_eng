<?php
	include("header.htm");
	$id = $_POST['id'];
	$pass = $_POST['pass'];
	if(isset($id) && isset($pass)){
		
		if(empty($id) || empty($pass)){
			exit("One of the entries is empty<br>");
		}
		else {
			
			$mysqlhost = "localhost";
			$user= "root";
			$dbname1 = "mydata";
			$sqlpass='';
			
			
			$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
			$query = $handler->query("SELECT * FROM signedmembers");
			/*
			if(($r=$query->fetch())==false){
				exit ("ana hone");
			}
			
			if($r = $query->fetch())
			{	if( $r['password']!=$pass){
					exit("Wrong password or userID");
				}
				else {
					print "Welcome home:".$r['name']."<br>";
				}
			}
			else {
				exit("Wrong password or username<br>");
			}
			*/
			$found = $false;
			while($r = $query->fetch()){
				
				//print $r['name']."<br>";
				if($r['memberId']==$id){
					if($r['password']=="$pass"){
						$user_name = $r['name'];
						print "<h1>Welcome back $user_name</h1><br>";
						$payment=$r['paydue'];
						
						$found = true;
						break;
					}
					else {
						exit("Wrong username OR password<br>");
					}
					
					
				}
				
			}
			if($found == false){
				exit ("No such username<br>");
			}
			else {
				session_start();
				$_SESSION['mempass']=$pass;
				$_SESSION['memid']=$id;
				//$mypay=$r['paydaue'];
				print "<h2>Amount of money due to registration of activities is: <font color=\"red\"><strong>$payment</font>
				</strong><br></h2>";
					if ($payment>0){
					?>
					<br><br>
					<h3>You can perform you payment now</h3>
					<form method="POST" action="paynew.php">
						<input type="text" placeholder="Amount you need to pay" name="needtopay"><br><br>
						<input type="text" placeholder="Credit Card Number" name="crenum"><br><br>
						<input type="password" placeholder="Credit Card Password" name="crepass"><br><br>
						<input type="submit" value="submit">
						<br><br>
					</form>
					<?php 
					
					
					}else {print "you don't need to pay anything for the center<br>";}
					
			}
			
			
			
			
			
			/*
			$newhandler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
			$query = $newhandler->query("SELECT * FROM appliedco");
			print "<br><br><h1>You can now go to home and sign in<br>";
			*/
		}
		
		
	}
	else {
		exit("Error submitting the page<br>Go to Home and try again");
	}



?>