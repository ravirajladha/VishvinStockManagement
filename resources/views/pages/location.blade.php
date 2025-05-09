<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>

    $(document).ready(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    });

    function showPosition(position) {
      var lat = position.coords.latitude;
      var lon = position.coords.longitude;
      var city;

      var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&key=AIzaSyDQ69wZR1GPEeLAxyu-vkSSo_dzpZTOV2c";

      $.getJSON(geocodingAPI, function (json) {
          if (json.status == "OK") {
              //Check result 0

              var result = json.results[0];
               city = result.address_components[2].long_name;
               store_info(lat, lon, city);

          }
      });

      function store_info(lat, lon, city) {
        alert(lat);
       $.ajax({
           url  : "{{ route('user_location') }}",
           type : "POST",
           data : {lat: lat, lon: lon, city: city},
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success : function(res)
           {
            window.location.href = "{{ route('index') }}";
           },
           window.location.href = "{{ route('pages_login') }}";
           error: function(err) {
              console.log(err);
           }
       });
      }
    }
    </script>
