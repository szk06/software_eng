<!--
THis page represents the code of the store of answers in database 

Code Written By Sami kanafani


 -->

<?php

include("header.htm");

session_start();
$pass = $_SESSION['mempass'];	
$memid = $_SESSION['memid'];
$num = $_SESSION['mycount'];
//print $num;
$counter =1;



//Member Name
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

//print $membername;



while($counter<=$num){
	
	if (isset($_POST[$counter])){
		if(!empty($_POST[$counter])){
			$dbname2 = "forums";			
			$mytext = htmlentities($_POST[$counter]);
			print $mytext."<br>";
			$handler2 = new PDO("mysql:host=$mysqlhost;dbname=$dbname2", $user, $sqlpass);
			$hisid =NULL;
			$pdoQuery = "INSERT INTO `answes` (`ansid`, `quesid`, `name`, `answer`) 
			VALUES (:hisid, :counter, :membername, :mytext)";
			$pdoResult = $handler2->prepare($pdoQuery);
			$pdoExec = $pdoResult->execute(array(":hisid"=>$hisid,":counter"=>$counter,":membername"=>$membername,":mytext"=>$mytext));
			if($pdoExec)
			{
				echo 'Your answer has been posted<br>';
			}else{
				echo 'Error in posting the answer<br>';
			}

		
		}
		
	}
	else {
		exit("Error loading the page<br>");
	}
	
	$counter++;
	
}
?>