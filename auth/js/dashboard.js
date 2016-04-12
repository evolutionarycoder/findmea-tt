/**
 * Created by Daniel M. Prince on 4/11/16.
 */
var map = GMaps("#mapContainer");


// Get User Location
if (navigator.geolocation) {
    Loc(map).getAndAddLocationToMap();
}