<?php include("header.htm") ?>
<html>

	<head>
		<title>Apply For Job</title>
		<script type="text/javascript">
			window.onload=pageLoad;
			
			
			function pageLoad(){
				
			}
			function validate(){
				
				var y = document.forms["myForm"]["name"];
				var x= y.value;
				var what= true;
				var mobile = document.forms["myForm"]["mobile"];
				var email = document.forms["myForm"]["email"];
				var add = document.forms["myForm"]["add"];
				var college = document.forms["myForm"]["college"];
				var major = document.forms["myForm"]["major"];
				var day = document.forms["myForm"]["day"];
				var month = document.forms["myForm"]["month"];
				var year = document.forms["myForm"]["year"];
				
				
				if( x==null  || x=="")
				{
					//alert("Your Full Name area is empty,\nFill it out");
					var n= document.getElementById("ename");
					//n.innerHTML="Please Fill Here";
					y.style = 'border:2px solid red';
					what= false;
				}
				if( mobile.value=="" || mobile.value==null)	{
					
					//alert("Your Mobile number is not set");
					
					mobile.style= 'border:2px solid red';
					//var t= document.getElementById("")
					what = false;
				}
				if(email.value =="" || email.value==null)
				{
					email.style='border:2px solid red';
					what=false;
				}
				if(add.value =="" || add.value==null)
				{
					add.style='border:2px solid red';
					what=false;
				}
				if(college.value =="" || college.value==null)
				{
					college.style='border:2px solid red';
					what=false;
				}
				if(major.value =="" || major.value==null)
				{
					major.style='border:2px solid red';
					what=false;
				}
				if(day.value =="" || day.value==null)
				{
					day.style='border:2px solid red';
					what=false;
				}
				if(month.value =="" || month.value==null)
				{
					month.style='border:2px solid red';
					what=false;
				}
				if(year.value =="" || year.value==null)
				{
					year.style='border:2px solid red';
					what=false;
				}
				if(what==false){
					var emptu= document.getElementById("mye");
					emptu.innerHTML="Please fill in the red boxes";
					return false;
				}
				else {
					return true;
				}
					
				
				

			}
		</script>
		<style type="text/css">
		input[type=submit] {
    width: 20em;  height: 2em;
}
		body{
			
			 background-color: #cccccc;
			 background-image:url("back.jpg");
		}
		h1.my{
			color:white;
			background-color:black;
		}
		span#gen{
			font-size:18pt;
			color:#B18904;
		}
		div#myimage{
			float:right;
			margin-right:2%;
			width:25%;
			height:25%;
			margin-right:21%;
			margin-top:02%;
		}
		input[type="text"]{ padding: 0.5px 10px; line-height: 24px; }
		
		div#myform{
			float:left;
			margin-left:2%;
			
		}
		strong#birth{
			font-size:18pt;
			color:#F2F2F2;
		}
		span.error{
			color:#DF0101;
			font-weight: bold;
			font-size:16pt;
		}
		p.error{
			
			color:#DF0101;
			font-weight: bold;
			font-size:16pt;
		
		}
		
		</style>
	</head>
	<body>
	<h1 class="my">Application for Coaches to Join the Center</h1>
	
	<div id="myimage">
		<img src="coach.jpg">
	
	</div>
	<div id="myform">
	<h2><font color="white">Please fill the following Forms and click submit when you finish</font></h2>
	<span id="mye" class="error"></span>
	<form  name="myForm" action="offer.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
	<input type="text" placeholder="Full Name" name="name"><span class="error" id="ename"></span><br><br>
	<input type="text" placeholder="Mobile Number" name="mobile"><span class="error" id="emobile"><br><br>
	<input type="text" placeholder="Email Address" name="email"><span class="error" id="eemail"><br><br>
	<input type="text" placeholder="Address" name="add"><span class="error" id="eadd"><br><br>
	<input type="text" placeholder="College Graduated From" name="college"><span class="error" id="ecollege"><br><br>
	<input type="text" placeholder="Major" name="major"><span class="error" id="emajor"><br><br>
	<strong id ="birth">Birth Date<input type="text" size="2" name="day" placeholder="DD"> - <input type="text" size="2" name="month" placeholder="MM" > - <input type="text" name="year" size="2" placeholder="YY" height="30"></strong>
	<br><br><span id="gen"><font color="white">Gender<input type="radio" name="gender" checked="checked" value="Male">Male<input type="radio" name="gender" value="Female">Female<br><br>
	Your CV:
    <input type="file" name="cv" size="60" /> <br />
	<br><input type="submit" value="Submit">

	</form>
	</div>
	</body>




</html>