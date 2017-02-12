<?php
	include("header.htm");
	
	session_start();
	$pass = $_SESSION['mempass'];
	
	$memid = $_SESSION['memid'];
	$mysqlhost = "localhost";
	$user= "root";
	$dbname1 = "mydata";
	$sqlpass='';
	$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
	
	$result = $handler->query("SELECT count(*) FROM activities");
	$row = $result->fetch();
	$maxnum = $row[0];
	
	$reg = false;
	$active = $_SESSION['actvitynum'];
	//print_r($active);
	//print "<br>";
	$counter = 0;
	$size = count($active);
	while($counter<$size){
		if(isset($_POST[$active[$counter]])){
			//print "$active[$counter] is set<br>";
			$reg = true;
			$num = $active[$counter];
			$query =  $handler->query("SELECT place FROM activities WHERE activityId='$num'");
			$query2 = $handler->query("SELECT nameactivity FROM activities WHERE activityId='$num'");
			$query3 = $handler->query("SELECT Price FROM activities WHERE activityId='$num'");
			
			$due1 = $handler->query("SELECT paydue FROM signedmembers WHERE memberId='$memid'");
			$mydue = $due1 ->fetch();
			$dueto = $mydue[0];
			//print "Hello<br>$dueto<br>";
			
			$count = 0;
			
			$placeini = $query -> fetch();
			
			$name1 = $query2 -> fetch();
			$name2 = $name1[0];
			$myplace = $placeini[0];
			$price1 = $query3 ->fetch();
			$price2 = $price1[0];
			$dueto= $dueto + $price2;
 			
			//print "The place is: $myplace<br>";
			print "<h1>The name of the activity you have registered is:$name2</h1>";
			$myplace = $myplace-1;
			$sql = "UPDATE `activities` SET `place`=:myplace WHERE `activityId`=:num";
			$sql2 = "UPDATE `signedmembers` SET `paydue`=:dueto WHERE `memberId`=:memid";
			// Prepare statement
			$pdoResult = $handler->prepare($sql);
			$pdoResult2 = $handler ->prepare($sql2);
			
			// execute the query
			$pdoExec=$pdoResult->execute(array(":myplace"=>$myplace,":num"=>$num));
			$pdoExec2= $pdoResult2->execute(array(":dueto"=>$dueto,":memid"=>$memid));
			if($pdoExec){
				echo "Registration was completed successfully<br>";
				print "The amount that you need to pay is:<strong><font color=\"red\">$price2</strong></font>";
			}
			else{
				echo "Data not inserted<br>";
			}
		}
		/*
		else {
			
			print "$active[$counter] is not set<br>";
		
		}
		*/
		$counter++;
	}
	if ($reg == false){
		exit("Error, trying to play with javascript<br>");
	}
	
?>