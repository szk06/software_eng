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


