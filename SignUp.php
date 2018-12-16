<?php
$serverName = "localhost";
$lhUserName = "root";
$lhPassword = "Asiri#Iroshan#1996";
$database = "GarbageCollectionSystem";
// Create connection
$connection = new mysqli($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

if(!empty( $_POST['userName']))
{
    $username=$_POST['userName'];
}
else
{
    echo "No data has been entered for username";
    exit();
}
if(!empty($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    echo "No data has been entered for email";
    exit();
}
if(!empty($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
    echo "No data has been entered for password";
    exit();
}
if(!empty($_POST['passwordConfirm']))
{
    $passwordConfirm=$_POST['passwordConfirm'];
}

$username=stripslashes($username);
$password=stripslashes($password);
$passwordConfirm=stripslashes($passwordConfirm);
$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);
$passwordConfirm=mysqli_escape_string($connection,$passwordConfirm);
$email=stripslashes($email);
$email=mysqli_real_escape_string($connection,$email);

if($password!=$passwordConfirm)
{
    echo "Passwords don't match";
    exit();
}



//Encrypting Password
$passwordHash=password_hash($password,PASSWORD_DEFAULT);


// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validating the email address


if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $insertQuery="INSERT INTO UserDetails values('$username','$email','$passwordHash')";
    if($connection->query($insertQuery) === TRUE)
    {
        echo "New Record created";
    }
    else
    {
        echo "Record Creating Failed";
    }
}
else
{
    echo "Invalid Email address";
}
$connection->close();
?> 

