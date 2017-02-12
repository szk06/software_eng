<?php
	
	include("header.htm");
	session_start();
	$pass=$_SESSION['mempass'];
	$memid=$_SESSION['memid'];
	$amount = $_POST['needtopay'];
	$crenum = $_POST['crenum'];
	$crepass = $_POST['crepass'];
	/*
	print "$amount<br>";
	print "$crenum<br>";
	print "$crepass<br>";
	*/
	$mysqlhost = "localhost";
	$user= "root";
	$dbname1 = "mydata";
	$sqlpass='';
	$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
	$due1 = $handler->query("SELECT paydue FROM signedmembers WHERE memberId='$memid'");
	$mydue = $due1 ->fetch();
	$dueto = $mydue[0];
	//print "your due amount is:$dueto<br>";
	
	if(isset ($amount) && isset ($crenum) && isset ($crepass)){
		
		if(empty($amount) ||empty($crenum) ||empty($crepass) )
		{
			
			exit("Error in submission<br>Empty Submission");
		}
		else{
			if($amount>0 && $amount<$dueto ){
				
				$newdueto = $dueto-$amount;
				//print "<h1><font  >";
				print "Your previous amount was:<font color=\"red\"><strong>$dueto$<br></font></strong>";
				$sql = "UPDATE `signedmembers` SET `paydue`=:newdueto WHERE `memberId`=:memid";
				$pdoResult = $handler->prepare($sql);
				$pdoExec=$pdoResult->execute(array(":newdueto"=>$newdueto,":memid"=>$memid));
				if($pdoExec){
					print "Your new due payment is:<font color=\"red\"><strong> $newdueto$</font></strong><br>";
					print "<h3><font color=\"red\">Your payment is done successfully</font></h3>";
				}
				else{
					exit("Data not inserted<br>");
				}
			
			}
			else if($amount<0){
				exit("you can't pay -ve values<br>");
			}
			else {
				exit("Error you can't pay more than your amount due<br>");
			}
		
		}
		
		
	}
	else{
		
		exit("Error in submission<br>");
		
	}



?>