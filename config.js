var templateRoot = "./templates/";
module.exports   = {
    pages   : {
        site : [
            templateRoot + "/pages/site/**/*.*"
        ],
        blog : [
            templateRoot + "/pages/blog/**/*.*"
        ],
        business: [
            templateRoot + "/pages/business/**/*.*"
        ]
    },
    templates: [
        templateRoot + "/main/",
        templateRoot + "/partials/"
    ]
};