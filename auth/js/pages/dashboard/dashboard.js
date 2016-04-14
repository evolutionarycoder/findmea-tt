/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function (global) {
    var map,
        manage = HttpManager('locations/index.php');

    var initialize = function () {
        map = GMaps("#mapContainer");
        // Get User Location
        if (navigator.geolocation) {
            Loc(map).getAndAddLocationToMap();
        }
        manage.getJSON({
            type: 'fetch'
        }, function (locations) {
            $.each(locations, function (inx, location) {
                location['showing'] = true;
                map.addMarker({
                    lat: location['lat'],
                    lng: location['lng']
                }, location['name'], location, null, 'click', function (e) {
                    var businessCardInfo = $('#business-card-info');
                    businessCardInfo.css('display', 'none');

                    Dom.delay(200, function () {
                        // businessCardInfo.addClass('shake');
                        businessCardInfo.css('display', 'block');
                    });

                    $('#business-name').text(this.name);
                    $('#business-desc').text(this.desc);
                    $('#business-area').text(this.area);
                    $('#business-phone').text(this.phone);
                    $('#business-site').text(this.website);
                });
            })
        });
        MapFilter(map);
    };


    global.initMap = initialize;
})(window);