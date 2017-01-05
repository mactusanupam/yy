<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Vehicles Locations</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 1350px; height: 600px;"></div>

  <script type="text/javascript">
   
   var latitude= "<?php echo $data['Latitude']; ?>";
        var longitude= "<?php echo $data['Longitude']; ?>";

        var myLatLng = [
        [lat: parseFloat(latitude), lng: parseFloat(longitude)],
        [lat: parseFloat(latitude), lng: parseFloat(longitude)]
        ];

   /* var locations = [
      ['Mactus tecnology Solutions', 12.88828583550081100, 77.59227275848389000, 4],
      ['Akarsh Pharma', 12.88822164618977200, 77.59200755506754000, 5],
      ['Fresh & More', 12.88820700000000000,77.59208100000000000 , 3],
      ['L&T Southcity', 12.88848507064885000, 77.59169708937407000, 2],
      ['Appolo Parmacy', 12.88839565017334000, 77.59187579154968000, 1]
    ];*/


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(12.88828583550081100, 77.59227275848389000),
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