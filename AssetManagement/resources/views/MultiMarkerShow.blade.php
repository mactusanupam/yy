<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 1350px; height: 600px;"></div>

  <script type="text/javascript">

        var latitude= "<?php echo $data['Latitude']; ?>";
        var longitude= "<?php echo $data['Longitude']; ?>";

        var latitude1= "<?php echo $data['Latitude1']; ?>";
        var longitude1= "<?php echo $data['Longitude1']; ?>";

        var latitude2= "<?php echo $data['Latitude2']; ?>";
        var longitude2= "<?php echo $data['Longitude2']; ?>";

        var latitude3= "<?php echo $data['Latitude3']; ?>";
        var longitude3= "<?php echo $data['Longitude3']; ?>";

        var latitude4= "<?php echo $data['Latitude4']; ?>";
        var longitude4= "<?php echo $data['Longitude4']; ?>";


 

    var locations = [
      ['Mactus tecHnology Solutions',parseFloat(latitude) , parseFloat(longitude), 4],
      ['Akarsh Pharma', parseFloat(latitude1), parseFloat(longitude1), 5],
      ['Fresh & More', parseFloat(latitude2),parseFloat(longitude2) , 3],
      ['L&T Southcity', parseFloat(latitude3), parseFloat(longitude3), 2],
      ['Appolo Parmacy', parseFloat(latitude4), parseFloat(longitude4), 1]
    ];


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude)),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>