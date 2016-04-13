/**
 * Created by Daniel M. Prince on 4/11/16.
 */
function initMap() {
    var map = GMaps("#mapContainer");
    // Get User Location
    if (navigator.geolocation) {
        Loc(map).getAndAddLocationToMap();
    }
}


// when a filter is clicked
$('#dropdown-tr li').click(function (e) {
    e.preventDefault();
});