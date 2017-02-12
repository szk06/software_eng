<!--
Sami Kanafani
Last Modified: 29 April 2016

 -->

<html>
<head>
	<style type="text/css">
		tr.start{
			background-color :#F5D0A9;
		}
		tr.question{
			background-color: #F3F781;
		}
		tr.answer{
			background-color:#BCF5A9;
		}
		}
table, th, td ,tr{
    border: 1px solid black;
}
	table {
    border-collapse: collapse;
}
	</style>
</head>

<?php 
include("header.htm");

//Declaration of mydata database to get the name of the user

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
print "<h1>Welcome $membername to the Member's forum</h1><br>";
print "<h3>You can ask any question related to the center here<br></h3>";

////////////////////////////////////////////////////
//Connecting the forum questions database database
$dbname2 = "forums";
$handler2 = new PDO("mysql:host=$mysqlhost;dbname=$dbname2", $user, $sqlpass);
$counter = 1;
$result = $handler2->query("SELECT count(*) FROM questions");
$row = $result->fetch();
$maxnum = $row[0];
?>

	<form method="POST" action="answer.php">
<?php
//print $maxnum;
while($counter<=$maxnum){	
	$question1 = $handler2->query("SELECT `Question` FROM questions WHERE `id`='$counter'");
	$name1 = $handler2->query("SELECT `username` FROM questions WHERE `id`='$counter'");
	$name2 = $name1->fetch();
	$quesname = $name2[0];
	$question2 = $question1->fetch();
	$questtodisplay = $question2[0];
	print "<br>Question#$counter";
	?>
	<br><br>
	<table border="1">
	<tr class="start">
	<td>Number of question</td>
	<td>Name</td>
	<td>Message</td>

	</tr>
	<tr class="question">
	<td><?="$counter"?></td>
	<td><?="$quesname"?></td>
	<td><?= "$questtodisplay"?></td>
	<?php
	
	$newresult12 = $handler2->query("SELECT count(*) FROM `answes` WHERE `quesid`='$counter'");
	$newresult1 = $newresult12->fetch();
	$rowans2 = $newresult1[0];
	$newresult = $handler2->query("SELECT count(*) FROM `answes`");
	$ans1 = $newresult->fetch();
	$rowans = $ans1[0];
	?>
	<tr class="ansStart">
	<td colspan="3"><?="Answers to this questions:$rowans2 response/s to this question"?></td>
	</tr>
	<?php
	$count = 1;
	while ($count<=$rowans){
		$nam1ans = $handler2->query("SELECT `name` FROM `answes` WHERE `quesid`='$counter' AND `ansid`='$count' ");
		$nam2ans = $nam1ans->fetch();
		$responder = $nam2ans[0];
		if($responder ==""){
			$sami=false;
		}
		else{
		//fetch the response from database
		$respo1= $handler2->query("SELECT `answer` FROM `answes` WHERE `quesid`='$counter' AND `ansid`='$count' ");
		$respo2= $respo1->fetch();
		$response = $respo2[0];
		?>
		<tr class="answer">
			<td><?=$count?></td>
			<td><?=$responder?></td>
			<td><?=$response?></td>
		
		</tr>
		
		<?php
		
		}
		$count++;
	}
	?>
	<tr class="youanswer">
		<td><?=$count?></td>
		<td><?=$membername?></td>
		<td><input type="text" name="<?=$counter?>" 
		placeholder="Enter your answer here...">
	</tr>
	<?php
	

	$counter++;
	?></table>

	<?php
}	$_SESSION['mycount']=$counter-1;
	?>
	<br>
	<input type="submit" value="submit answers">
	</form>
	<?php

	print "<h2>You can start a new question:<br></h2>";
	?>
	<form method="POST" action ="question.php">
		<input type="text" name="myquestion" placeholder="Enter your question here...">
		<input type="submit" value="Submit Question">
	</form>
	<?php

	
		
?>

</html>