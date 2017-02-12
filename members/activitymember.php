<html>
<head>
	<script type="text/javascript">
	
		function validate(max){
			var counter=1;
			//alert(max);
			var checking = false;
			//var element = null;
			while(counter<=max){
				
				//alert("first"+counter);
				var element=document.getElementById(counter);
				//alert("id is:"+element.id+"counter is:"+counter);
				//alert(element.checked);
				if(element!=null){
					if(element.checked){
						
						checking =true;
					}
				}
				counter++;
				//alert("second"+counter);
				
			}
			if(checking==false){
				
				var myerror = document.getElementById("emsg");
				myerror.innerHTML= "You should choose at least one activity\n";
				return false;
			}
		} 	
	
	
	</script>
	<style type="text/css">
	span.formerror{
		color:red;
		font-size:16pt;
		font-weight: bold;
	}
	table {
    border-collapse: collapse;
}

		body{
		background-color:#cccccc;
		
	}
table, th, td {
    border: 1px solid black;
}
td{
	text-align:center;
}
	</style>
</head>

<?php 
	include("header.htm");
	session_start();
	$pass = $_SESSION['mempass'];
	
	$memid = $_SESSION['memid'];
	if(!isset($pass) || !isset($memid)){
		
		
		exit("Error in Loading the page<br>");
	}
	
	$mysqlhost = "localhost";
	
	$user= "root";
	
	$dbname1 = "mydata";
	
	$sqlpass='';
	
	$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
	
	$query = $handler->query("SELECT * FROM activities");
	
	$result = $handler->query("SELECT count(*) FROM activities");
	
	$row = $result->fetch();
	
	$maxnum = $row[0];
	//print "max num of activities is $maxnum<br>";
	?>
	<form method ="POST" action ="activityreg.php" onsubmit="return validate(<?=$maxnum?>)">
	<table width="100%" height="100%" id="tab">
	<tr>
		<td>ID of Class</td>
		<td>Price of Registration</td>
		<td>Name of Class</td>
		<td>Capacity Available</td>
		<td>Time of Class</td>
		<td>Name of Trainer</td>
		<td>Register in Class</td>
		
	</tr>
	<?php
	$active = array();
	while($r = $query->fetch()){
		$abil = true;	
		$name1 = $r['nameactivity'];
		$placein = $r['place'];
		if($placein==0){
			$abil= false;
		}
		$price = $r['Price'];
		$actid = $r['activityId']; 
		$time = $r['time'];
		$coach = $r['Coach'];
		?>
		<tr>
			<td><?="$actid"?></td>
			<td><?="$price"?></td>
			<td><?="$name1"?></td>
			<td><?="$placein"?></td>
			
			<td><?="$time<br>"?></td>
			<td><?="$coach<br>"?></td>
			
			<?php 
			if($abil== true){
				$active[]= $actid;
			?>
			<td>Check the following box  to register<br><input type="checkbox" name="<?=$actid?>" id="<?=$actid?>" value="register">Register</td>
			<br><br>
			
			<?php }
			else {
				?>
				<td>You can't register this activity because<br>there is no place!</td>
			<?php	
			}
		$_SESSION['actvitynum'] = $active;
	}

	
?>
		</table>
		<br><br>
		<input type="Submit" value ="submit">
		<span id ="emsg" class="formerror"></span>
		</form>

		
		