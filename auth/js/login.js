/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function () {
    var createNewAccount = $(".create-new-account"),
        loginWrapper     = $(".login-wrapper.login"),
        createWrapper    = $(".login-wrapper.create"),
        manage           = HttpManager('users/index.php'),
        wizard,
        selectedPlan     = 1;

    var Validate = function (text) {
        return new Validate.init(text);
    };

    var validateNames = function (text, prefix) {
        var error = prefix;
        if (text.length > 60) {
            error += ' Name is too long';
            return error;
        }

        if (text.trim().length === 0) {
            error += ' Name is empty';
            return error;
        }
        return true;
    };

    Validate.prototype = {
        firstName: function () {
            return validateNames(this.text, 'First');
        },
        lastName : function () {
            return validateNames(this.text, 'Last')
        },
        password : function (confirm) {
            var error;
            if (this.text !== confirm) {
                error = 'Passwords don\'t match!';
                return error;
            }

            if (this.text.trim().length === 0) {
                error = 'Enter Password';
                return error;
            }

            return true;
        },
        email    : function () {
            var re     = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var result = re.test(this.text),
                error;

            if (result) {
                return true;
            } else {
                error = 'Invalid Email';
                return error
            }

        }
    };

    Validate.init = function (text) {
        this.text = text;
    };

    Validate.init.prototype = Validate.prototype;

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
    wizard = $("#wizard_vertical").steps({
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

            function showError(property, text, flag) {
                $('[data-error="step-' + property + '"]').text(text).css('display', 'block');
            }

            function reset(property) {
                $('[data-error="step-' + property + '"]').text('').css('display', 'block');
            }

            // means its finished
            if (idx === 2) {
                var ids     = {
                        fname   : 'step-fname',
                        lname   : 'step-lname',
                        email   : 'step-email',
                        password: 'step-password'
                    },
                    values  = {},
                    correct = 0;

                $.each(ids, function (property, value) {
                    reset(property);
                    var elValue = $('#' + value).val(),
                        result;

                    if (property == 'fname') {
                        result = Validate(elValue).firstName();
                    }

                    if (property == 'lname') {
                        result = Validate(elValue).lastName();
                    }

                    if (property == 'email') {
                        result = Validate(elValue).email();
                    }

                    if (property == 'password') {
                        result = Validate(elValue).password($('#step-retype').val());
                    }

                    if (result !== true) {
                        showError(property, result);
                    } else {
                        values[property] = elValue;
                        correct++;
                    }
                });

                if (correct === 4) {
                    values.account = selectedPlan;
                    Notify("Validated", "Creating Account!").error();
                    var createAcc = Ladda.create(createNewAccount.get(1));
                    $('a[href="#cancel"]').click();
                    Dom.delay(300, function () {
                        createAcc.start();
                        manage.create(values, function (data) {
                            var response = Response(data),
                                accBtn   = $('.create-new-account.ladda-button');
                            createAcc.stop();
                            if (response.statusOk()) {
                                accBtn.text('Created Successfully');
                                createNewAccount.unbind('click');
                                $('#inputUsernameEmail').val(values.email);
                                $('#inputPassword').val(values.password);
                                Notify("Account Created", "We've took the liberty in filling out your log in form").success();
                            } else {
                                Notify('Problem Occurred', response.getText()).error();
                                accBtn.click();
                            }
                        });
                    });
                }
            } else {
                Notify("That's A No No!", "Fill Out Form").error();
            }
        }
    });

    // get selected plan
    var plan = $('.plan.plan-button');
    plan.click(function (e) {
        plan.css('background-color', '#37BCE5');
        e.preventDefault();
        var type = $(this).attr('data-id');
        if ($.isNumeric(type) && type.length === 1) {
            $(this).css('background-color', "#5CB85C");
            selectedPlan = type;
            wizard.steps('next');
        } else {
            Notify('Why did you do that?', "You Can't hack us!").notice();
            Dom.delay(5000, function () {
                window.location.reload();
            });
        }
    });
})();