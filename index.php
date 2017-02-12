<!--



This code is written by sami kanafnai
it contains the code of the main page of the system


Last Modified: 26 April 2016


 -->



<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Welcome to the Rock Sport's Center</title>
	<script type="text/javascript">
		/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
		function myFunction() {
			document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
		}
		function validate(){
			//alert("val");
			var dateerror ="";
			var what=true;
			var why=true;
			var name= document.forms["myForm"]["full"];
			var email= document.forms["myForm"]["email"];
			var mobile = document.forms["myForm"]["mobile"];
			
			var pass1 = document.forms["myForm"]["pass1"];
			var pass2 =document.forms["myForm"]["pass2"];
			var day =  document.forms["myForm"]["day"];
			var month =  document.forms["myForm"]["month"];
			var year =  document.forms["myForm"]["year"];
			//alert(name.value);
			if(name.value=="" || name.value==null)
			{
				name.style='border:2px solid red';
				//alert("null");
				what=false;
			}
			/*
			else {
				var n = name.value;
				var namere =  /^[a-zA-Z]{2,}\s{1}[a-zA-Z]{2,}$/;
				var nameres = n.match(namere);
				if(nameres == null){
					why = false;
					var nameerrorprint = document.getElementById("nameerrorprint");
					name.style= 'border:2px solid red';
					
					nameerrorprint.innerHTML = "Your name is not written correctly!\n";
				}
				else{
					var nameerrorprint = document.getElementById("nameerrorprint");
					name.style='border:0.05px solid white';
					nameerrorprint.innerHTML = "";
				}
			}
			*/
			if(email.value=="" || email.value==null)
			{
				email.style='border:2px solid red';
				//alert("null");
				what=false;
			}else
			{
				var x=email.value;
				
				var re = /^[a-zA-Z0-9]{2,}@{1}(.){2,}\.[a-z]{3}$/;
				var res=x.match(re);
				if(res==null)
				{
					why=false;
					var errorprint= document.getElementById("errormail");
					email.style='border:2px solid red';
					errorprint.innerHTML = "Not the form of email\n";
				}
				else{
					var errorprint= document.getElementById("errormail");
					email.style='border:0.02px solid white';
					errorprint.innerHTML = "";
				}
			}
			if(mobile.value=="" || mobile.value==null)
			{
				mobile.style='border:2px solid red';
				//alert("null");
				what=false;
			}else{
				var mobileval= mobile.value;
				var remobile = /^[0-9]{2}\-[0-9]{6}$/;
				var resmobile = mobileval.match(remobile);
				if (resmobile==null){
					why=false;
					var mobileerrorprint= document.getElementById("mobileerrorprint");
					mobileerrorprint.innerHTML= "Wrong format of mobile number\n";
					mobile.style='border:2px solid red';
				}
				else{
					var mobileerrorprint= document.getElementById("mobileerrorprint");
					mobileerrorprint.innerHTML= "";
					mobile.style='border:0.2px solid white';
				}
			}
			if(pass1.value=="" || pass1.value==null)
			{
				pass1.style='border:2px solid red';
				//alert("null");
				what=false;
				
			}
			else{
				var passing = pass1.value;
				if(passing.length<6){
					why = false;
					pass1.placeholder ="The password should be at min 6 chars";
					pass1.style='border:2px solid red';
					var passlen = document.getElementById("passlen");
					passlen.innerHTML = "The password should be at min 6 chars\n";
					
				}
			}
			if(pass2.value=="" || pass2.value==null)
			{
				pass2.style='border:2px solid red';
				//alert("null");
				what=false;
			}
			if(day.value=="" || day.value==null)
			{
				day.style='border:2px solid red';
				//alert("null");
				what=false;
			}
			else{
				if(day.value<1 || day.value>31)
				{
					why =false;
					dateerror= document.getElementById("dateerror");
					day.style='border:2px solid red';
					dateerror.innerHTML = "\nEnter a valid address\n";
				}else{
					dateerror= document.getElementById("dateerror");
					dateerror.innerHTML = "";
					day.style='border:0.02px solid white';
				}
			}
			if(month.value=="" || month.value==null)
			{
				month.style='border:2px solid red';
				//alert("null");
				what=false;
			}else {
				if(month.value<1 || month.value >12)
				{
					why =false;
					dateerror= document.getElementById("dateerror");
					month.style='border:2px solid red';
					dateerror.innerHTML = "\nEnter a valid address\n";
					
				}else {
					dateerror= document.getElementById("dateerror");
					month.style='border:0.02px solid white';
					dateerror.innerHTML = "";
					
				}
				
			}
			if(year.value=="" || year.value==null)
			{
				year.style='border:2px solid red';
				//alert("null");
				what = false;
			}
			
			
			if(pass2.value!=pass1.value)
			{
				document.getElementById("passcheck").innerHTML ="Passwords don't match\n"; 
				why=false;
			}
			/*
			else if(pass2.value == pass1.value){
				document.getElementById("passcheck").innerHTML ="Passwords match\n";
			}
			*/
			
			
			
			
			
			
			if(what==false){
				document.getElementById("error").innerHTML="Fill in the required regions";
				return false;
			}
			
			if(why==false){
				return false;
			}
			
			
			
			
		}
		
	
	
	
	</script>
	<style type="text/css">
	input[type=text].ok {
    width: 18em;  height: 2.2em;
	}
	input[type=password].ok {
    width: 18em;  height: 2.2em;
	}
	id#up{
		margin-left:5px;
	}
	span#sign{
		font-size:25px;
		
		margin-top:10px;
		background-color:white;
		font-color: black;
	}
	div#myme{
		
		/*background-color: #000000;*/
		float:left;
		width: 30%;
		height: 65%;
		margin-right:5%;
		padding: 1%;
		margin-top:0%;
		margin-left:5%;
		
	}
	span.formerror{
		color:red;
		font-size:16pt;
		font-weight: bold;
	}
	div#ana{
		float:right;
		width:55%;
		height:60%;
	}
	
	span#error{
		color:red;
		font-size:16pt;
		font-weight: bold;
	}
	span#passcheck{
		color:red;
		font-size:16pt;
		font-weight:bold;
		background-color:yellow;
	}
	div#up{
		font-size:16pt;
		color:white;
		font-weight:bold;
	}
	
	
	
	
	
	
	ul.topnav {
    list-style-type: none;
    margin: 12px;
    padding: 0;
    overflow: hidden;
  /*  background-color: #333;*/
}

/* 	Float the list items side by side */
	ul.topnav li {float: left;}

/* 	Style the links inside the list items */
	ul.topnav li a {
    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 22px;
	margin-bottom: 5px;
	}
	li#log {
    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 22px;
	margin-bottom: 5px;
	}
	li#norm{
		    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 22px;
	margin-bottom: 5px;
	margin-left:7%;
	}

	/* Change background color of links on hover */
	ul.topnav li a:hover {background-color: #111;}

	/* Hide the list item that contains the link that should open and close the topnav on small screens */
	ul.topnav li.icon {display: none;}
	body{
		background-color:#cccccc;
		background-image:url("back.jpg");
	}
	/* When the screen is less than 680 pixels wide, hide all list items, except for the first one ("Home"). Show the list item that contains the link to open and close the topnav (li.icon) */
@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens */
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
	
	
	
	</style>
</head>

<body>
<ul class="topnav">
  <li><a href="index.php"><strong>Home</strong></a></li>
  <li><a href="job/jobs.php"><strong>Jobs</strong></a></li>

  <li id="norm"><strong>Log In</strong></li>
  <li id="log"><strong><form method="POST" action="members/in.php"><input type="text" name="id" placeholder="Member ID">
  <input type="password" name="pass" placeholder="password"><input type="submit" value="Log In"></form>
  </strong></li> 
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>
	    
	<br><br><br>
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1000);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 70px;
            cursor: pointer;
            background: url('img/a02.png') no-repeat;
            overflow: hidden;
        }
		
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
    </style>

<div id="ana">
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/002.jpg" />
                <div data-u="caption" data-t="0" style="position: absolute; top: 320px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Weight lifting Championship</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/007.jpg" />
                <div data-u="caption" data-t="1" data-3d="1" style="position: absolute; top: -50px; left: 125px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Amazing Football Playgrounds</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/003.jpg" />
                <div data-u="caption" data-t="2" style="position: absolute; top: 30px; left: -380px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Best Weight lifting equipments</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/004.jpg" />
                <div data-u="caption" data-t="3" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Machines will be always up to date</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/005.jpg" />
                <div data-u="caption" data-t="4" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.6); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">The perfect enviroment for weight lifting</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/006.jpg" />
                <div data-u="caption" data-t="5" style="position: absolute; top: 30px; left: 600px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">This is the place to start in!</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/009.jpg" />
                <div data-u="caption" data-t="6" style="position: absolute; top: 30px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Perfect Basketball courts!</div>
            </div>
            <div data-b="0" data-p="112.50" style="display: none;">
                <img data-u="image" src="img/008.jpg" />
                <div data-u="caption" data-t="7" style="position: absolute; top: -50px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">olympic swimming pools</div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/011.jpg" />
                <div data-u="caption" data-t="8" data-3d="1" style="position: absolute; top: 25px; left: 150px; width: 250px; height: 250px; background-color: rgba(40,177,255,0.6); overflow: hidden;">
                    <div data-u="caption" data-t="9" style="position: absolute; top: 100px; left: 25px; width: 200px; height: 50px; font-size: 24px; line-height: 50px;">Best Tennis Courts</div>
                </div>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/010.jpg" />
                <div data-u="caption" data-t="10" data-3d="1" style="position: absolute; top: 25px; left: 100px; width: 250px; height: 250px; background-color: rgba(40,177,255,0.6);">
                    <div style="margin: 15px; font-size: 20px;">
                        <p>
							This is where you will become a Champion
                        </p>
                    </div>
                </div>
            </div>
        
        </div>

        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
</div>
    <!-- #endregion Jssor Slider End -->
	<div id="myme">
		<span id="sign">Sign Up</span><br>
	
	<span id="error"><br></span>
	
	<form name="myForm" method="POST" action="sign/signup.php" onsubmit="return validate()"><br>
	<div id="up">

	<span id = "nameerrorprint" class="formerror"></span>
	<input type = "text" name="full" class="ok" id="full" placeholder="Full Name" height="30"><br><br>
	<span id = "errormail" class="formerror"></span>
	<input type = "text" name="email" class="ok" id="email" placeholder="Email Address"><br><br>
	<span id = "mobileerrorprint" class="formerror"></span>
	<input type="text" name="mobile" class="ok"id="mobile"placeholder="Mobile Number in the form: 01-666555"><br><br>
	<span id="passworderrorprint" class="formerror"></span>
	<input type="password" name="pass1" class="ok"id="pass1" placeholder="Password(A minimum of 6 characters)">
	<span id="passlen" class="formerror"></span>
	<br><br>
	
	<input type="password" name="pass2" class="ok"id="pass2" placeholder="Confrim Password"><br><br>
	<span id="passcheck"></span><br>
	<font color="white">Gender<input type="radio" checked="checked" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<br><br>
	
	Birth Date	<input type="text" size="2" id="day" name="day" placeholder="DD"> - <input type="text" id="month" size="2" name="month" placeholder="MM" > - <input type="text" id="year" name="year" size="2" placeholder="YYYY" height="30">
	<br><span id="dateerror" class="formerror"></span>
	<br><br><input type ="submit" value="Sign Up"></font>
	
	</div>
	</form>
	</div>
</body>


</html>