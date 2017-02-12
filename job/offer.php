<?php
	include("header.htm");
	$name = $_POST['name']; 
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$add = $_POST['add'];
	$college = $_POST['college'];
	$major = $_POST['major'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$gender = $_POST['gender'];
	if(isset($name) && isset($mobile) && isset($email) && isset($add) && isset($college) && isset($major) && isset($day) && isset($year) && isset($gender)  )
	{
		if(empty($name) || empty($mobile)|| empty($email) || empty($add) || empty($college) || empty($major) || empty($day) || empty($month)|| empty($year) || empty($gender)){
			exit("Error in submission<br>");	
		
		}else{
			$birthday = "$day/$month/$year";
			print"<h1>Thank you for Choosing the Rock Sport's Center</h1>";
			$mysqlhost = "localhost";
			$user= "root";
			$dbname1 = "mydata";
			$sqlpass='';
			$handler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
			/*
			$pdoQuery="INSERT INTO `appliedco` (`id`, `mobile`, `email`, `address`, `college`, `major`, `birth`, `gender`, `name`) 
			VALUES (NULL, ':mobile', ':email', ':add', ':college', ':major', ':birthday', ':gender,' ,':name')";
			/*
			$pdoResult = $handler->prepare($pdoQuery);
			
			$pdoExec = $pdoResult->execute(array(":mobile"=>$mobile,":email"=>$email,":add"=>$add, ":college"=>$college, 
			":major"=>$major, ":birth"=>$birthday, ":gender"=>$gender,":name"=>$name));
			
			if($pdoExec){
				print "You are registered successfully<br>";
			}
			else {print "Error occured in adding you to the database system<br>";}
			*/
			/*
			$pdoQuery ="INSERT INTO `appliedco` (`id`, `mobile`, `email`, `address`, `college`, `major`, `birth`, `gender`, `name`) VALUES (NULL, '70503030', 'eamiissa@gmail.com', 'dhbch', 'cjndsj', 'ncj', 'jcnd', 'M', 'rami issa')";
			$pdoResult = $handler->prepare($pdoQuery);
				$name = $_POST['name']; 
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$add = $_POST['add'];
	$college = $_POST['college'];
	$major = $_POST['major'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$gender = $_POST['gender'];
			*/
			$myid= NULL;
			$pdoQuery = "INSERT INTO `appliedco`(`id`, `mobile`, `email`, `address`, `college`, `major`, `birth`, `gender`, `name`)
			VALUES (:myid,:mobile,:email,:add,:college,:major,:birthday,:gender,:name)";
			
			$pdoResult = $handler->prepare($pdoQuery);
			$pdoExec = $pdoResult->execute(array(":myid"=>$myid,":mobile"=>$mobile,":email"=>$email,":add"=>$add,":college"=>$college,":major"=>$major,":birthday"=>$birthday,":gender"=>$gender,":name"=>$name));
			if($pdoExec)
			{
				echo 'Data Inserted';
			}else{
				exit ('Data Not Inserted<br>You may have a duplicate in the database<br>Enter another email address<br>');
			}
			
			
			$newhandler = new PDO("mysql:host=$mysqlhost;dbname=$dbname1", $user, $sqlpass);
			$query = $newhandler->query("SELECT * FROM appliedco");
			print "<br><br><h1>You can now go to home and sign in<br>";
			
			
			while($r = $query->fetch()){
				
				print $r['name']."<br>";
				
			}
			
			
			/*$pdoQuery ="INSERT INTO `appliedco` (`memberId`, `name`, `password`, `mobilenumber`, `email`, `gender`, `birthdate`) 
			VALUES (:userid, :full, :pass1, :mobile, :email, :gender, :birth)";*/
			
			
		
		
		}

	}else {
		exit("Error in submission<br>");
	}
	
	
?>