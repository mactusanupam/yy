<?php
//use Illuminate\Support\Facades\Input;
?>
<!DOCTYPE html>
{!! csrf_field() !!}

<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Vehicle Location</title>
    
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      h5{

        font-weight: bold;

        font-size: 120%;

        color: #66e0ff;

        text-align: center;
    }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
   <h5><center>Vehicle Location<center></h5>
   

  
    <div id="map">
  
<?php
/*$data = Input::all();
//dd($data);
$Latitude = $data['Latitude'];
    $Longitude = $data['Longitude'];
echo $Latitude;
echo $Longitude;
*/
?>
    </div>
    <script>

      function initMap() {

      	var latitude= "<?php echo $data['Latitude']; ?>";
        var longitude= "<?php echo $data['Longitude']; ?>";

        var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

       
        //var myLatLng = {$Latitude, $Longitude};


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB5ihO9wXV9G4vbjSG9dJpeyatiCeBHMo&callback=initMap">
    </script>
  
  </form>
</html>
