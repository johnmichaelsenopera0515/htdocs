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
 
   function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 0, lng: 0 },
            zoom: 12
        });
        geocoder = new google.maps.Geocoder();  
        initAutocomplete()
    }   
  // 
   function initAutocomplete() { 
      console.log(document.getElementById('autocomplete').value)
      autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
      autocomplete.addListener('place_changed', function () {
          var place = autocomplete.getPlace();
          // Handle the selected place, such as extracting address components
          console.log('place.formatted_address',place.formatted_address);
          if(place.formatted_address!=undefined){ 
            searchAddress(place.formatted_address)
          }
      }); 
    }

    google.maps.event.addDomListener(window, 'load', initAutocomplete);  
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

</script>
