/**
 * Created by Daniel M. Prince on 4/11/16.
 */
var map;
(function () {
    map = new google.maps.Map(document.querySelector("#mapContainer"), {
        center : {
            lat: 10.536421,
            lng: -61.311951
        },
        zoom   : 10
    });
})();