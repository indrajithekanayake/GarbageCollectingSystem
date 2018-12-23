<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="containerContentSpecial">
    <h2 style="text-align: center; color: white;">Create a new post</h2>

    
    

  
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a class="active" href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="index.php">Log In</a>
      <a href="LogOut.php">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
    

    <form class="uploadforam" action="insertPost.php" method="post" enctype="multipart/form-data">
  
  <input type="text" class="PostTopic" name="PostTopic" placeholder="Enter a subject"/>
    </input>
    <br/>
    <textarea class="PostDescription" name="PostDescription" placeholder="Enter the description">
    
    </textarea>

  <br/>
  <p style="color: red; font-weight: bold; font-size: 14pt; text-align: center;">Please Make sure that the format is JPG/JPEG</p>
      <input type="file"  value="Browse" name="myimage" class="fileToUpload"/>
    <br/>
     
      <p style="color: red; font-weight: bold; font-size: 14pt; text-align: center;">Please click on the location on the map to obtain the coordinates</p>
      <input id="latitude" type="text" name="latitude"  placeholder="latitude" />
      <input id="longitude" type="text" name="longitude"  placeholder="longitude" />
       <input type="submit" value="Post" name="submit_image" class="post"/>
      <br/>

  
  
</form>

<div id="map" style="width:49%;height:580px; float: right;
margin-top: 5%; margin-bottom: 5%;"></div>
  
  
    
</div>


 

<script>


      var mapProperty={
          center: {lat: 6.923542, lng: 79.854588},  
          zoom: 10
            
        }

        function mapper() {
    
        var map = new google.maps.Map(document.getElementById('map'),mapProperty);
        var infoWindow = new google.maps.InfoWindow;
            
        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) 
          {
            var myCurrentLocation = 
            {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

           var myCenter = new google.maps.LatLng(myCurrentLocation);

           var markerImage = {
            url: 'IconsAndPics/homeIcon.png',
            scaledSize : new google.maps.Size(25, 25)
           };
          
           var marker = new google.maps.Marker
           ({
            position: myCenter,
            icon:markerImage,
            animation: google.maps.Animation.BOUNCE

            });
            marker.setMap(map);
          document.getElementById('latitude').value=myCenter.lat();
          document.getElementById('longitude').value=myCenter.lng();

            infoWindow.setPosition(myCurrentLocation);
            infoWindow.setContent('Your Location');
            infoWindow.open(map);
            map.setCenter(myCurrentLocation);
            
          }, 
          function() {
            errorHandling(true, infoWindow, map.getCenter());
          });
          
          google.maps.event.addListener(map, 'click', function(event) {
          locationMarker(map, event.latLng);
          });

          function locationMarker(map, location) {
          var marker2 = new google.maps.Marker({
          position: location,
          animation: google.maps.Animation.DROP,
          icon:'IconsAndPics/markerIcon.png'
          });
          marker2.setMap(map);
          document.getElementById('latitude').value=location.lat();
          document.getElementById('longitude').value=location.lng();


          }

         

        } else {
          // If the browser doesn't support Geolocation functionality
          errorHandling(false, infoWindow, map.getCenter());
        }
      }
      

      function errorHandling(geolocation_Working, infoWindow, myCurrentLocation) {
        infoWindow.setPosition(myCurrentLocation);
        infoWindow.setContent(geolocation_Working ?
                              'Sorry. The Geolocation service failed.' :
                              'Sorry. Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


   //References www.w3schools.com

    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1G1I7QDPfCPTJ-R6rgfFvo3e4cXQtf0&callback=mapper"></script>

</body>
</html>