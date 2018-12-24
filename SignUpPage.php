<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="SignUp.php" method="post" id="inputForm">
  <div class="containerContent">
    <h2 style="text-align: center;">Sign Up For Colombo Garbage Collection Service</h2>

<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div id="active" class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="index.php">Log In</a>
      <a href="LogOut.php">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
    <p>Please fill the form below to create an account.</p>
    <hr/>
    <label for="userName"><b>User Name</b></label>
    <input type="text" placeholder="Enter Username" name="userName" id="userName" required=""  />

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required="" />

    <label for="contactNumber"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter contact number" name="contactNumber" id="contactNumber" required="" placeholder="Enter Contact Number"/>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password"  required="" />

    <label for="passwordConfirm"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="passwordConfirm" id="passwordConfirm" onChange="checkPassword();"  required="" />
   
    <hr/>
    <p>By creating an account you agree to our <a href="TermsAndConditions.php">Terms & Conditions</a>.</p>

    <button type="button" class="executeButton" id="signUpButton" onclick="setColor(); formValidation();">Sign Up</button>
  </div>
</form>
<script type="text/javascript">
    var count = 1;
    function setColor() {
        
        if (count == 1) {
            document.getElementById("signUpButton").className="executeButtonClicked";
            count = 0;        
        }
        else {
            document.getElementById("signUpButton").className="executeButton";
            count = 1;
        }
    }
    function formValidation()
    {
      
      var form=document.getElementById('inputForm');
      if(form['userName'].value)
      {
        deHighlight("userName");
        if(form['email'].value)
        {
          if(emailValidation())
          {
            deHighlight("email");
            if(form['contactNumber'].value)
            {
              deHighlight("contactNumber");
              if(contactNumberValidation())
              {
                deHighlight("contactNumber");
                if(form['password'].value)
                {
                  deHighlight("password");
                  if(form['passwordConfirm'].value)
                  {
                    deHighlight("passwordConfirm");
                    if(form['password'].value==form['passwordConfirm'].value)
                    {
                      deHighlight("password");
                      deHighlight("passwordConfirm");
                      form.submit();
                    }
                    else
                    {
                      highlight("password");
                      highlight("passwordConfirm");
                      alert("Passwords do not match");
                    }
                  }
                  else
                  {
                    highlight("passwordConfirm");
                  }
                }
                else
                {
                  highlight("password");
                }
              }
              else
              {
                highlight("contactNumber");
                document.getElementById("contactNumber").value="Please enter a valid contact number";
              }
            }
            else
            {
              highlight("contactNumber");
              
            }
          }
          else
          {
            highlight("email");
            document.getElementById("email").value="Please enter a valid E-mail address";
          }
        }
        else
        {
          highlight("email");
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
    function contactNumberValidation()
    {
      var format = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      var contactNumber=document.getElementById("contactNumber").value;
     
                if(contactNumber.match(format))
                {
                 
                  return true;
                }
                else
                {
                  
                  return false;
                }
   }
   function emailValidation()
   {
    var format=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email=document.getElementById("email").value;
    if(email.match(format))
    {
      return true;
    }
    else
    {
      return false;
    }
   }


</script>

</body>
</html>
