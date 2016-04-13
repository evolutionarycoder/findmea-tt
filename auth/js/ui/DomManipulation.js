(function (global) {

    var DomManipulation = function (selector) {
        return new DomManipulation.init(selector);
    };

    var methods = {
        iterate: function (array, cb) {
            for (var i = 0; i < array.length; i++) {
                cb(array[i]);
            }
        },
        pub    : {
            delay: function (time, callback) {
                var interval = setInterval(function () {
                    callback();
                    clearInterval(interval);
                }, time)
            }
        }
    };

    DomManipulation.prototype = {};


    DomManipulation.init = function (selector) {
        this.elements = document.querySelectorAll(selector);
    };


    DomManipulation.init.prototype = DomManipulation.prototype;
    global.Dom                     = DomManipulation;

    for(var key in methods.pub){
        if(methods.pub.hasOwnProperty(key)){
            global.Dom[key] = methods.pub[key];
        }
    }
})(window);