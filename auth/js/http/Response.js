/**
 * Created by evolutionarycoder on 3/26/16.
 */
(function (global) {

    var ResponseHandler = function (jsonString) {
        return new ResponseHandler.init(jsonString);
    };

    ResponseHandler.prototype = {
        /**
         * Checks if status returned is OK
         * @returns {boolean}
         */
        statusOk: function () {
            return this.status === 200;
        },

        /**
         * Returns the status
         * @returns {Number|*|null}
         */
        getStatus: function () {
            return this.status;
        },

        /**
         * Returns text from server response
         * @returns {*}
         */
        getText: function () {
            return this.text;
        },

        /**
         * Return a specific parameter from json
         * @param key
         * @returns {*}
         */
        getParam: function (key) {
            if (this.statusOk()) {
                var value = this.json[key];
                if (value) {
                    return value;
                }
            }
            return null;
        }
    };

    ResponseHandler.init = function (jsonString) {
        var json;
        this.status = null;
        this.text   = null;
        try {
            json = JSON.parse(jsonString);
        } catch (e) {
            json = null;
        }


        if (json) {
            this.status = parseInt(json["status"]);
            this.text   = json["text"];
            this.json   = json;
        }

    };

    ResponseHandler.init.prototype = ResponseHandler.prototype;


    global.Response = ResponseHandler;
})(window);