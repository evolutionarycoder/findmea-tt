var templateRoot = "./templates/";
module.exports   = {
    pages   : {
        site : [
            templateRoot + "/pages/site/**/*.*"
        ],
        blog : [
            templateRoot + "/pages/blog/**/*.*"
        ]
    },
    templates: [
        templateRoot + "/main/",
        templateRoot + "/partials/"
    ]
};