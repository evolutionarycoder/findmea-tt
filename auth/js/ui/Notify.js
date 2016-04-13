(function (global) {
    var Notification = function (title, message, sticky) {
        return new Notification.init(title, message, sticky);
    };

    var createNotification = function (type, sticky) {
        var self    = this,
            options = {
                title  : self.title,
                text   : self.message,
                animate: {
                    animate  : true,
                    in_class : 'slideInDown',
                    out_class: 'slideOutUp'
                },
                
            };

        if (type) {
            options.type = type;
        }

        if (sticky) {
            options.hide = false;
        }

        new PNotify(options);
    };

    Notification.prototype = {
        success: function () {
            createNotification.call(this, "success", this.sticky);
        },
        notice : function () {
            createNotification.call(this, null, this.sticky);
        },
        info   : function () {
            createNotification.call(this, "info", this.sticky);
        },
        error  : function () {
            createNotification.call(this, "error", this.sticky);
        }
    };

    Notification.init = function (title, message, sticky) {
        this.title   = title;
        this.message = message;
        this.sticky  = sticky || false;
    };

    Notification.init.prototype = Notification.prototype;

    global.Notify = Notification;
})(window);