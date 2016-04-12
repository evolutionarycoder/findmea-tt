/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function (global) {

    // private methods
    var createMap = function (element) {
            return new google.maps.Map(document.querySelector(element), {
                center: {
                    lat: 10.536421,
                    lng: -61.311951
                },
                zoom  : 9
            });
        },
        iterate   = function (array, cb, cond) {
            for (var i = 0; i < array.length; i++) {
                if (cond) {
                    return;
                }
                cb(array[i]);
            }
        };

    var GoogleMaps = function (element) {
        return new GoogleMaps.init(element);
    };


    GoogleMaps.prototype = {
        /**
         *
         * @param latLong
         * @param latLong.lat
         * @param latLong.lng
         * @param {string} title
         * @param {{}}metadata
         * @param {string} listenerType
         * @param {callback} callback
         */
        addMarker : function (latLong, title, metadata, listenerType, callback) {
            Marker(this).add(latLong, title, metadata, listenerType, callback);
        },
        findMarker: function (metaProperty, value) {
            return Marker(this).find(metaProperty, value)
        }
    };


    GoogleMaps.init = function (element) {
        this.map     = createMap(element);
        this.markers = [];
    };


    /**
     * Marker
     * @constructor
     */
    var Marker = function ($this) {
        return new Marker.init($this);
    };

    Marker.init = function ($this) {
        this.GoogleMaps = $this;
    };

    Marker.prototype = {
        add : function (latLong, title, metadata, listenerType, callback) {
            var marker = new google.maps.Marker({
                position: latLong,
                title   : title
            });

            var markerData = metadata || {},
                listener   = listenerType || 'click';
            marker.setValues(markerData);

            if (callback) {
                marker.addListener(listener, callback);
            }

            marker.setMap(this.GoogleMaps.map);
            this.GoogleMaps.markers.push(marker);
            return this;
        },
        find: function (metaProperty, value) {
            var markers        = this.GoogleMaps.markers,
                condition      = false,
                markerToReturn = null;
            iterate(markers, function (marker) {
                if (marker[metaProperty] === value) {
                    markerToReturn = marker;
                    condition      = true;
                }
            }, condition);
            return markerToReturn;
        }
    };

    Marker.init.prototype = Marker.prototype;

    GoogleMaps.init.prototype = GoogleMaps.prototype;

    // adding globally

    global.GMaps = GoogleMaps;
})(window);