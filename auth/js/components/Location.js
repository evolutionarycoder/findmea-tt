/**
 * Created by Daniel M. Prince on 4/12/16.
 */
(function (global) {
    var geoloc = global.navigator.geolocation;

    /**
     *
     * @param {GMaps} map
     * @returns {Location.init}
     * @constructor
     */
    var Location = function (map) {
        return new Location.init(map);
    };


    Location.prototype = {
        /**
         *
         * @param {Function} success - Position is passed to success callback
         * @param {Function} error Error is passed to error callback
         * @returns {Location}
         */
        myLocation: function (success, error) {
            geoloc.getCurrentPosition(success, error);
            return this;
        },
        getAndAddLocationToMap : function () {
            var self = this,
            success = function(position){
                self.map.addMarker({
                    lat : position.coords.latitude,
                    lng : position.coords.longitude
                }, 'This Is Me!', { id : 0 });
            };
            geoloc.getCurrentPosition(success);
        }
    };


    Location.init = function (map) {
        this.map = map;
    };

    Location.init.prototype = Location.prototype;

    window.Loc = Location;

})(window);