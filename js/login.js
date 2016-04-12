/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function () {
    var createNewAccount = $(".create-new-account"),
        loginWrapper     = $(".login-wrapper.login"),
        createWrapper    = $(".login-wrapper.create");


    var resetClassesOnWrappers = function () {
        loginWrapper.removeClass("bounceOutLeft bounceInLeft");
        createWrapper.removeClass("bounceOutLeft bounceInLeft");
    };

    // switch to create an account page
    createNewAccount.click(function (e) {
        e.preventDefault();
        loginWrapper.addClass("bounceOutLeft hide").css("position", "absolute");
        createWrapper.removeClass("hide").addClass("bounceInRight");
    });

    // wizard code
    $("#wizard_vertical").steps({
        headerTag         : "h2",
        bodyTag           : "section",
        transitionEffect  : "slideLeft",
        stepsOrientation  : "vertical",
        enableFinishButton: true,
        enableCancelButton: true,
        onCanceled        : function (e) {
            e.preventDefault();
            createWrapper.addClass("bounceOutLeft hide");
            loginWrapper.removeClass("hide").addClass("bounceInRight").css("position", "relative");
            resetClassesOnWrappers();
        },
        onFinishing       : function (e, idx) {
            // means its finished
            if (idx === 2) {

            } else {
                Notify("That's A No No!", "Fill Out Form").error();
            }
        }
    });
})();