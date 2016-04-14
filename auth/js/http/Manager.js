(function (global) {
    var host = window.location.origin + "/api/";

    var Manage = function (file) {
        return new Manage.init(file);
    };


    Manage.prototype = {
        create : function (data, cb) {
            data.type = "create";
            if (!data) {
                throw new Error('No data given');
            }
            $.post(this.file, data, cb);
        },
        request: function (data, cb) {
            if (!data) {
                throw new Error('No data given');
            }
            $.post(this.file, data, cb);
        },
        getJSON: function (data, cb) {
            $.getJSON(this.file, data, cb);
        }
    };

    Manage.init = function (file) {
        this.file = host + file;
    };

    Manage.init.prototype = Manage.prototype;

    global.HttpManager = Manage;
})(window);