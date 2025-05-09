<!-- Add a loading element to your page -->
<!-- Add the following CSS to your page -->
<style>
    #loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        margin: 0 auto;
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>

    <!-- Add the following HTML to your page -->
    <div id="loader"></div>
<div id="loading" style="display: none;">Fetching Location...<br>Please have patience.</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script>
$(document).ready(function () {
    if (navigator.geolocation) {
        $('#loader').show();
        $('#loading').show();
        navigator.geolocation.getCurrentPosition(showPosition);
    }
});
function showPosition(position) {
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
//   alert(lat)
  if(lat && lon){
  window.location.href = "/pages/location_fetch/"+lat+"/"+lon;
  }
}
</script>


