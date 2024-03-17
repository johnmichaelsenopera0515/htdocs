<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuvYHHq3_kHfy-4KjtnOd-u5OAdMBXin4&libraries=places"></script>  -->

<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()
    $('#example2').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>
<!--Magnify -->
<!-- <script src="magnify/magnify.min.js"></script>
<script>
$(function(){
	$('.zoom').magnify();
});
</script> -->
<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>

<script>
  let autocomplete = ''
  var map;
  var geocoder; 

  // google.maps.event.addDomListener(window, 'load', initMap);
   function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 0, lng: 0 },
            zoom: 12
        }); 
        geocoder = new google.maps.Geocoder();  
        let address = document.getElementById('autocomplete')  
        if(address.value != ""){ 
          getCurrentLocation()
          searchAddress(address.value)
          findRoute()
        } 
    }   
    google.maps.event.addDomListener(window, 'load', initMap);  
  // 
   function initAutocomplete() {
        if(document.getElementById('autocomplete').value != ""){ 
          autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
          autocomplete.addListener('place_changed', function () {
              var place = autocomplete.getPlace();
              // Handle the selected place, such as extracting address components
              console.log(place.formatted_address);
              searchAddress(place.formatted_address)
          });
        } 
    }

    function searchAddress(autocomplete) { 
        geocoder.geocode({ 'address': autocomplete }, function (results, status) {
            console.log('res',results,status)
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                }); 
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function calculateAndDisplayRoute(start, destination) { 
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        var request = {
            origin: start,
            destination: destination,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function (response, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(response);
            } else {
                console.error('Directions request failed due to ' + status);
            }
        });
    }

    function getCurrentLocation(){
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
              location.localhost
              console.log(position.coords.latitude, position.coords.longitude)
              localStorage.setItem('lat',position.coords.latitude)
              localStorage.setItem('long',position.coords.longitude)
              var currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
              
              // console.log('currentLocation',currentLocation)
              autocomplete.set('place', { location: currentLocation, query: 'My Location' });
              console.log('currentLocation',currentLocation)
              
          }, function (error) {
              console.error('Geolocation error:', error);
              alert('Unable to retrieve your location. Please enter a starting point manually.');
          });
      } else {
          alert('Geolocation is not supported by your browser. Please enter a starting point manually.');
      }
    };

    function findRoute() {
        console.log('findRoute', autocomplete);  
        var currentLocation = new google.maps.LatLng(localStorage.getItem('lat'), localStorage.getItem('long'));  

        // Use Geocoder to get the formatted address for the current location
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'location': currentLocation }, function (results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    var start = results[0].formatted_address;
                    var destination = document.getElementById('autocomplete').value;

                    if (start && destination) {
                        calculateAndDisplayRoute(start, destination);
                    } else {
                        alert('Please enter both a starting point and a destination.');
                    }
                } else {
                    alert('No results found for current location.');
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });
    } 





    

</script>
