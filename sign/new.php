<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0;}
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}

ul.topnav li a:hover {background-color: #111;}

ul.topnav li.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="../index.php">Home</a></li>
  <li><a href="#news">Jobs</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
</ul>



<script>
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}
</script>
<?php


	$posted = $_POST['crenumber'];
	if(isset($posted )){
		
		if(empty($posted)){
			 exit("empty<br>");
			
		}
		else {
			session_start();
			$correct = $_SESSION['val'];
			//print $correct;
			//print "<br>sub:$posted<br>";
			if($correct == $posted){
				print"<br><br>";
				print"<h1>Welcome to our center</h1><br><br>";
				print"<h2>Last step is payment</h2><br>";
				print"<h3>Registration is only for 30$ per month<br></h3>";
				?>
				<form method="POST" action="finalsign.php">
					<input type="text" placeholder="Credit Card Number" name="crenum"/><br><br>
					<input type="password" placeholder="Credit password" name="crepass"><br><br>
					<input type="submit" value="pay">
				
				</form>
				<?php
				
				
				
				
			}
			else {
				print "incorrect<br>";
			}
		
		}
		
	}
	else {
		
		exit ("Error in submission");
	}









?>



</body>
</html>
