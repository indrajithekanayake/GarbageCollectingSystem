<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="LogIn.php" method="post" id="inputForm">	

	<div class="containerContent">
		<h2 style="text-align: center; color: white/*#242f34*/;">Login To Colombo Garbage Collection Service</h2>
	
<div class="navigationbar">
  <a href="WelcomePageGuest.php">Welcome</a>
  
  <a href="ContactPageGuest.php">Contact Us</a>
  <a href="#about">About Us</a>
  <a href="SignUpPage.php" style="float: right;">Sign Up</a>
</div>

		
		<p>Please enter your username and password</p>
		<hr/>
		<br/><br/>
		<label for="userName">User Name</label>
		<input type="text" placeholder="Enter Username" name="userName" required="" id="userName">
		<label for="password">Password</label>
		<input type="password" placeholder="Enter Password" name="password" required="" id="password">
		
		<br/><br/><br/><hr/>
		<p>Forgot password? <a href="PasswordRecoveryPage.php">Recover Password</a>.</p>
    <p>Don't have an account? <a href="SignUpPage.php">Register</a>.</p>

     <button type="button" class="executeButton" id="logInButton" onclick="setColor(); formValidation();">Login</button>
		
	</div>
</form>

<script type="text/javascript">
function formValidation()
    {
      
      if(document.getElementById("userName").value)
      {
        deHighlight("userName");
        if(document.getElementById("password").value)
        {
          deHighlight("password");
          var form = document.getElementById('inputForm');
          form.submit();
        }
        else
        {
          highlight("password");
        }
      }
      else
      {
        highlight("userName");
      }

 
    }
    function highlight(id)
    {
        
        document.getElementById(id).style.backgroundColor="Yellow";
        document.getElementById(id).style.color="black";
    }
    function deHighlight(id)
    {
      document.getElementById(id).style.backgroundColor="#222d32";
      document.getElementById(id).style.color="white";
    }

    var count = 1;
    function setColor() {
        
        if (count == 1) {
            document.getElementById("logInButton").className="executeButtonClicked";
            count = 0;        
        }
        else {
            document.getElementById("logInButton").className="executeButton";
            count = 1;
        }
    }
</script>

</body>
</html>