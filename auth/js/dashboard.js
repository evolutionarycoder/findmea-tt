/**
 * Created by Daniel M. Prince on 4/11/16.
 */
var map             = GMaps("#mapContainer"),
    locationSuccess = function (position) {
        map.addMarker({
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }, "This is Me", {id : "user"});
    };


// Get User Location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(locationSuccess);
}