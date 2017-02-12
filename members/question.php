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

session_start();
$pass = $_SESSION['mempass'];	
$memid = $_SESSION['memid'];
$membername1 = $handler->query("SELECT name FROM signedmembers WHERE memberId='$memid'");
$membername2 = $membername1 ->fetch();
$membername = $membername2[0];

	if(isset($_POST['myquestion'])){
		if(!empty($_POST['myquestion']))
		{
			$myquestion =htmlentities($_POST['myquestion']);
			$dbname2 = "forums";
			$handler2 = new PDO("mysql:host=$mysqlhost;dbname=$dbname2", $user, $sqlpass);
			$hisid =NULL;
			$pdoQuery = "INSERT INTO `questions` (`id`, `username`, `Question`) 
			VALUES (:hisid, :membername, :myquestion)";
			$pdoResult = $handler2->prepare($pdoQuery);
			$pdoExec = $pdoResult->execute(array(":hisid"=>$hisid,":membername"=>$membername,":myquestion"=>$myquestion));
			if($pdoExec)
			{
				echo 'Your question has been posted<br>';
			}else{
				echo 'Error in posting the answer<br>';
			}
			
			
			
			
		}
		else{exit("Empty Submission");}
	}
	else
	{
		exit("Error in Submission<br>");
	}
		
?>