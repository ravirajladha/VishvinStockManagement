

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
            // alert(result)
            store_info(result.address_components[2].long_name);
        }
    });

    // function store_info(city) {
    //     // alert(city)
    //     // initiate the session
    //     // alert(lat);
    //     $.ajax({
    //         url: "{{ URL::to('/pages/new_location') }}",
    //         type: "POST",
    //         data: {lat: lat, lon: lon, city: city, _token: '{{ csrf_token() }}' },
    //         success: function (response) {
    //             window.location.href = "{{ URL::to('/pages/home') }}";
    //         }
    //     });
    // }


    function store_info(city) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    session(['user_lat' => $lat]);
    session(['user_lon' => $lon]);
    session(['user_city' => $city]);

    // Redirect to the other page
    // window.location.href = "{{ URL::route('/pages/home') }}";
    window.location.href = "{{ route('pages.home') }}";
}
}
</script>
