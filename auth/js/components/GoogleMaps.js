/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function (global) {
    // private properties
    var marker_num        = -1,
        marker_properties = {
            unique_id: 'marker_position'
        };

    // private methods
    var createMap   = function (element) {
            return new google.maps.Map(document.querySelector(element), {
                center: {
                    lat: 10.536421,
                    lng: -61.311951
                },
                zoom  : 9
            });
        },
        getMarkerId = function () {
            return ++marker_num;
        },
        iterate     = function (array, cb, cond) {
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
         * @param {{}}otherOptions
         * @param {string} listenerType
         * @param {callback} callback
         */
        addMarker  : function (latLong, title, metadata, otherOptions, listenerType, callback) {
            Marker(this).add(latLong, title, metadata, otherOptions, listenerType, callback);
        },
        findMarker : function (cb) {
            return Marker(this).find(cb);
        },
        addListener: function (listener, callback) {
            this.map.addListener(listener, callback.bind(this));
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
        add : function (latLong, title, metadata, otherOptions, listenerType, callback) {
            var options = {
                position: latLong,
                title   : title
            };

            metadata[marker_properties.unique_id] = getMarkerId();

            if (otherOptions) {
                $.extend(options, otherOptions);
            }
            var marker = new google.maps.Marker(options);

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
        find: function (cb) {
            var markers   = this.GoogleMaps.markers,
                self      = this,
                condition = false;

            iterate(markers, function (marker) {
                cb.call(self, marker);
            }, condition);

        },
        hide: function (marker, showingValue) {
            marker.setMap(null);
            marker.showing = showingValue || false;
        },
        show: function (marker, showingValue) {
            marker.setMap(this.GoogleMaps.map);
            marker.showing = showingValue || true;
        }
    };

    Marker.init.prototype = Marker.prototype;

    GoogleMaps.init.prototype = GoogleMaps.prototype;

    // adding globally

    global.GMaps = GoogleMaps;
})(window);