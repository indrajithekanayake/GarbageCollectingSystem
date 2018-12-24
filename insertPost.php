<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('session.php');
include('connection.php');


$UserName=$_SESSION['username'];



if(empty($_POST["PostTopic"]))
{
		$errorMessage= "Please enter the topic";
    	echo("<script>alert('$errorMessage');</script>");
    	header("refresh:0;url=createPostPage.php");
    	mysqli_close($connection);
    	exit();
}
else
{
	$PostTopic=$_POST["PostTopic"]; 
	if(empty($_POST["PostDescription"]))
	{
			$errorMessage= "Please enter the description";
    		echo("<script>alert('$errorMessage');</script>");
    		header("refresh:0;url=createPostPage.php");
    		mysqli_close($connection);
    		exit();
	}
	else
	{
			$PostDescription=$_POST["PostDescription"];
		
			if(empty($_FILES["myimage"]["name"]))
			{
				$errorMessage= "Please enter an image";
    			echo("<script>alert('$errorMessage');</script>");
    			header("refresh:0;url=createPostPage.php");
    			mysqli_close($connection);
    			exit();
			}
			else
			{
				$imagename=$_FILES["myimage"]["name"]; 
				if(empty($_POST["latitude"]||empty($_POST["longitude"])))
				{
					$errorMessage= "Please select the location on the map";
    				echo("<script>alert('$errorMessage');</script>");
    				header("refresh:0;url=createPostPage.php");
    				mysqli_close($connection);
    				exit();
				}
				else
				{
					$latitude=$_POST["latitude"];
					$longitude=$_POST["longitude"];
				}
			}
	}
}



//Get the content of the image and then add slashes to it 
$ImageContent=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insertQuery="INSERT INTO Posts(UserName,PostTopic,PostDescription,ImageContent,ImageName,Latitude,Longitude) VALUES('$UserName','$PostTopic','$PostDescription','$ImageContent','$imagename','$latitude','$longitude')";

if(mysqli_query($connection,$insertQuery))
{
	echo "<script>alert('Successfully Published');</script>";
	header("refresh:0;url=PostsPage.php");
}
else
{	
	
	echo "<script>alert('Failed');</script>";
	header("refresh:0;url=PostsPage.php");
}
mysqli_close($connection);
?>