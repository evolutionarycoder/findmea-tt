/**
 * Created by Daniel M. Prince on 4/11/16.
 */
(function () {
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


    var createNewAccount = $(".create-new-account"),
        loginWrapper     = $(".login-wrapper.login"),
        createWrapper    = $(".login-wrapper.create"),
        logInBtn         = $('#login'),
        manage           = HttpManager('users/index.php'),
        wizard,
        selectedPlan     = 1,
        cancel           = function () {
            createWrapper.addClass("bounceOutLeft hide");
            loginWrapper.removeClass("hide").addClass("bounceInRight").css("position", "relative");
            resetClassesOnWrappers();
        },
        validateCallback = function (response, values, laddaBtns) {
            if (response.statusOk()) {
                laddaBtns.forEach(function (laddaBtn) {
                    laddaBtn.stop();
                    laddaBtn.remove();
                });
                $('.create-btn').text('Created Successfully');
                $('#inputUsernameEmail').val(values.email);
                $('#inputPassword').val(values.password);
                Notify("Account Created", "We've took the liberty in filling out your log in form").success();
            }
        },
        /**
         *
         * @param ids
         * @param propertyPrefix
         * @param passwordRetype
         * @param {Function} cb
         */
        validate         = function (ids, propertyPrefix, passwordRetype, cb) {
            var prefix = propertyPrefix || '';

            function showError(property, text) {
                $('[data-error="' + prefix + property + '"]').text(text).css('display', 'block');
            }

            function reset(property) {
                $('[data-error="' + prefix + property + '"]').text('').css('display', 'block');
            }

            var values  = {},
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
                    result = Validate(elValue).password($(passwordRetype).val());
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
                Notify("Validated", "Beginning To Create Account...").info();
                var createAccount     = createNewAccount.get(1),
                    createAccBtnLarge = Ladda.create(createAccount),
                    createAccBtnSmall = Ladda.create(document.querySelector('#signup-smallscreen'));
                $('a[href="#cancel"]').click();
                Dom.delay(300, function () {
                    createAccBtnLarge.start();
                    createAccBtnSmall.start();
                    manage.create(values, function (data) {
                        var response = Response(data);
                        if (!response.statusOk()) {
                            Notify('Error!', response.getText()).error();
                            createAccBtnLarge.stop();
                            createAccBtnSmall.stop();
                            createAccount.click();
                        } else {
                            $('.create-btn').unbind('click');
                        }
                        cb(response, values, [createAccBtnLarge, createAccBtnSmall]);
                    });
                });
            }
        };


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
            cancel();
        },
        onFinishing       : function (e, idx) {
            // means its finished
            if (idx === 2) {
                var ids = {
                    fname   : 'step-fname',
                    lname   : 'step-lname',
                    email   : 'step-email',
                    password: 'step-password'
                };
                validate(ids, 'step-', '#step-retype', validateCallback);
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
        var type     = $(this).attr('data-id'),
            inWizard = $(this).attr('data-belongs');
        if ($.isNumeric(type) && type.length === 1) {
            $('a[data-id=' + type + ']').css('background-color', "#5CB85C");
            selectedPlan = type;
            if (inWizard === 'wizard') {
                wizard.steps('next');
            }
        } else {
            Notify('Why did you do that?', "You Can't hack us!").notice();
            Dom.delay(5000, function () {
                window.location.reload();
            });
        }
    });

    // create on small screen
    $('#signup-smallscreen').click(function (e) {
        e.preventDefault();
        var ids = {
            fname   : 'fname',
            lname   : 'lname',
            email   : 'email',
            password: 'password'
        };
        validate(ids, null, '#rpassword', validateCallback);
    });

    // cancel smallscreen
    $('#cancel-smallscreen').click(function (e) {
        e.preventDefault();
        cancel();
    });

    //login user
    logInBtn.click(function (e) {
        e.preventDefault();
        var ladda = Ladda.create(document.querySelector('#login')),
            data  = {
                email   : $('#inputUsernameEmail').val(),
                password: $('#inputPassword').val(),
                type    : 'login'
            };

        if (typeof Validate(data.email.trim()).email() === 'string') {
            Notify('Log In', 'Invalid Email Address').error();
            return;
        }
        if (data.password.trim() === '') {
            Notify('Log In', 'Enter a password').error();
            return;
        }

        ladda.start();

        manage.request(data, function (serverResponse) {
            var response = Response(serverResponse);
            if (response.statusOk()) {
                ladda.stop();
                Notify('Log In', 'Successful! Redirecting you now!').success();
                Dom.delay(3000, function () {
                    window.location = 'auth/';
                });
            } else {
                ladda.stop();
                Notify('Log In', response.getText()).error();
            }
            ladda.remove();
        })

    });
})();